@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">{{ __('Update Role') }}</h2>
            </div>

            <div class="card-actions">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">
                    <i class="ti ti-arrow-narrow-left"></i>
                    {{ __('Back') }}
                </a>
            </div>

        </div>

        <div class="card-body">
            <form action="{{ route('admin.roles.update' , $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <x-admin.input-text name="role" label="Role Name" value="{{ $role->name }}" placeholder="Enter Role Name" />
                    <hr />
                    <div class="row">
                        {{--get permissions --}}
                        @foreach ($permissions as $groupName => $permissionsItem)
                            <div class="col-md-4">

                                <h3>{{ $groupName }}</h3>
                                @foreach ($permissionsItem as $permission)
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $permission->name }}"
                                               name="permissions[]" @checked($role->hasPermissionTo($permission->name)) >
                                        <span class="form-check-label">{{ $permission->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @endforeach

                    </div>
                </div>
            </form>

        </div>


        <div class="card-footer text-end">
            <button onclick="$('form').submit();" class="btn btn-primary">{{ __('Update') }}</button>
        </div>

    </div>
@endsection
