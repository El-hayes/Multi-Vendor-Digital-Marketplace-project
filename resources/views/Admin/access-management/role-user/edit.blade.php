@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">{{ __('Update User') }}</h2>
            </div>

            <div class="card-actions">
                <a href="{{ route('admin.user-roles.index') }}" class="btn btn-primary">
                    <i class="ti ti-arrow-narrow-left"></i>
                    {{ __('Back') }}
                </a>
            </div>

        </div>

        <div class="card-body">
            <form action="{{ route('admin.user-roles.update' , $admin->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <x-admin.input-text name="name" value="{{ $admin->name }}" :placeholder="__('Enter Name')"/>
                        </div>

                        <div class="col-md-6">
                            <x-admin.input-text name="email" value="{{ $admin->email }}" :placeholder="__('Enter Email')"/>
                        </div>

                        <div class="col-md-6">
                            <x-admin.input-text type="password" name="password" :placeholder="__('Enter Password')" />
                        </div>

                        <div class="col-md-6">
                            <x-admin.input-text type="password" name="password_confirmation" :label="__('Confirm Password')" :placeholder="__('Confirm Password')" />
                        </div>

                        <div class="col-md-12">
                            <x-admin.input-select name="role">
                                @foreach($roles as $role)
                                    <option @selected($admin->roles->contains('id', $role->id)) value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </x-admin.input-select>
                        </div>

                    </div>
                </div>
            </form>

        </div>


        <div class="card-footer text-end">
            <button onclick="$('form').submit();" class="btn btn-primary">{{ __('Update') }}</button>
        </div>

    </div>
@endsection
