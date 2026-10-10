<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleUserStoreRequest;
use App\Http\Requests\Admin\RoleUserUpdateRequest;
use App\Models\Admin;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $admins = Admin::with('roles')->get();
        return  view('admin.access-management.role-user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $roles = Role::all();
        return  view('admin.access-management.role-user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleUserStoreRequest $request) : RedirectResponse
    {

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // assign role to user
        $admin->assignRole($request->role);

        NotificationService::CREATED();

        return to_route('admin.user-roles.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View|RedirectResponse
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::all();
        $admin->load('roles');

        // To prevent Edit Super Admin User
        if ($admin->getRoleNames()->first() == 'Super Admin') {
            NotificationService::ERROR('This role cannot be Editing.');
            return redirect()->route('admin.roles.index');
        }

        return view('admin.access-management.role-user.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUserUpdateRequest $request, string $id) : RedirectResponse
    {
        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            ($request->has('password') && $request->filled('password')) ??
                'password' => Hash::make($request->password)


        ]);

        $admin->assignRole($request->role);

        NotificationService::UPDATED();

        return to_route('admin.user-roles.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : JsonResponse|RedirectResponse
    {
        $admin = Admin::findOrFail($id);
        // To prevent Delete Super Admin User
        if ($admin->getRoleNames()->first() == 'Super Admin') {
            NotificationService::ERROR('This role cannot be Deleting.');
            return redirect()->route('admin.roles.index');
        }

        try {
            $admin->syncRoles([]);
            $admin->delete();
            NotificationService::DELETED();
            return response()->json(['status' => 'success' , 'message' => __('Role User Deleted Successfully')]);

        } catch (\Throwable $th) {
            return response()->json(['status' => 'error' , 'message' => $th->getMessage()]);
        }

    }


}
