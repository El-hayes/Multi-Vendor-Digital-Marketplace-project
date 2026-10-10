<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleStoreRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Mcp\Server\Contracts\Errable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $roles = Role::withCount('permissions')->get();
        // dd($roles);
        return view('admin.access-management.role.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :view
    {
        // dd(Permission::get()->groupBy('group_name'));
        $permissions = Permission::all()->groupBy('group_name');
        return view('admin.access-management.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {
        $role = Role::create([
            'name' => $request->role,
            'guard_name' => 'admin',
        ]);

        $role->syncPermissions($request->permissions);

        NotificationService::CREATED();

        return to_route('admin.roles.index');


    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View|RedirectResponse
    {
        $role = Role::findById($id);

        // To prevent Edit Super Admin Role
        if ($role->name == 'Super Admin') {
            NotificationService::ERROR('This role cannot be edited.');
            return redirect()->route('admin.roles.index');
        }

        $permissions = Permission::all()->groupBy('group_name');
        return view('admin.access-management.role.edit' , compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, string $id)
    {
        $role = Role::findById($id);

        $role->update([
            'name' => $request->role,
        ]);

        $role->syncPermissions($request->permissions);

        NotificationService::UPDATED();

        return to_route('admin.roles.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): JsonResponse|RedirectResponse
    {
        // To prevent Delete Super Admin Role
        if ($role->name == 'Super Admin') {
            NotificationService::ERROR('This role cannot be Deleted.');
            return redirect()->route('admin.roles.index');
        }

        try {
            DB::beginTransaction();

            // Remove role from users
            $role->users()->detach();

            // Detach permissions from role
            $role->permissions()->detach();

            // Delete role
            $role->delete();

            DB::commit();

            NotificationService::DELETED();

            return response()->json([
                'status' => 'success',
                'message' => __('Deleted Successfully'),
            ], 200);

        } catch (\Throwable $th) {
            DB::rollBack();

            Log::error('An error occurred during deleting role', [
                'role_id' => $role->id,
                'exception' => $th,
            ]);

            return response()->json([
                'status' => 'error',
                'message' => __('Something went wrong'),
            ], 500);
        }
    }


}
