@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">{{ __('Role Users') }}</h2>
            </div>

            <div class="card-actions">
                <a href="{{ route('admin.user-roles.create') }}" class="btn btn-primary">
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
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email')}}</th>
                            <th>{{ __('Role')}}</th>
                            <th class="w-8">{{ __('Action') }}</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forelse($admins as $admin)
                                <tr>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>

                                    <td>
                                        <span class="badge bg-blue text-blue-fg">
                                            {{ $admin->getRoleNames()->implode(', ') ?: 'No Role' }}
                                        </span>

                                    </td>

                                    <td>
                                        @if($admin->getRoleNames()->first() != 'Super Admin')
                                            <a class="text-primary" href="{{ route('admin.user-roles.edit' , $admin->id) }}" title="Edit Role"><i class="ti ti-edit"></i></a>
                                            <a class="text-danger delete-item" href="{{ route('admin.user-roles.destroy' , $admin->id) }}" title="Delete Role"><i class="ti ti-trash"></i></a>
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
