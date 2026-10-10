@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">{{ __('All Roles') }}</h2>
            </div>

            <div class="card-actions">
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus"></i>
                    {{ __('Add New') }}
                </a>
            </div>

        </div>

        <div class="card-body">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Role') }}</th>
                                <th>{{ __('Permissions')}}</th>
                                <th class="w-8">{{ __('Action') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>

                                <td class="text-secondary">
                                    @if($role->name == 'Super Admin')
                                       <span class="badge bg-blue text-blue-fg">{{ __('All Permissions') }}</span>
                                    @else
                                       <span class="badge bg-blue text-blue-fg">{{ $role->permissions_count }}</span>
                                    @endif
                                </td>

                                <td>
                                    @if($role->name != 'Super Admin')
                                        <a class="text-primary" href="{{ route('admin.roles.edit' , $role->id) }}" title="Edit Role"><i class="ti ti-edit"></i></a>
                                        <a class="text-danger delete-item" href="{{ route('admin.roles.destroy' , $role->id) }}" title="Delete Role"><i class="ti ti-trash"></i></a>
                                    @endif
                                </td>


                            </tr>
                        @empty
                            <td colspan="3" class="text-center">{{ __('No Roles Data') }}</td>
                        @endforelse

                        </tbody>


                    </table>
                </div>
            </div>

        </div>

        <div class="card-footer"></div>

    </div>
@endsection
