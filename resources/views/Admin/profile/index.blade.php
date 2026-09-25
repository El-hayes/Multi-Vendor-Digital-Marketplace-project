@extends('admin.layouts.master')

@section('content')
    {{-- prfile update --}}
    <div class="col-12">
        <form class="card" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card-body">
                <h3 class="card-title">{{ __('Edit Profile') }}</h3>
                <div class="row row-cards">


                    <div class="col-md-12">
                        <img class="img-fluid img-thumbnail" src="{{ asset(auth('admin')->user()->avatar) }}" width="128" height="128" alt="Profile">
                    </div>

                    <div class="col-md-12">
                        {{-- USing My custmized admin Dynamic backend input component --}}
                        <x-admin.input-text type="file" name="avatar" />
                    </div>

                    <div class="col-sm-6 col-md-6">
                        {{-- USing My custmized admin Dynamic backend input component --}}
                        <x-admin.input-text name="name" placeholder="Name" :value="auth('admin')->user()->name" />
                    </div>

                    <div class="col-sm-6 col-md-6">
                        {{-- USing My custmized admin Dynamic backend input component --}}
                        <x-admin.input-text type="email" name="email" placeholder="Email Address" :value="auth('admin')->user()->email" />
                    </div>


                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
            </div>
        </form>
    </div>


    {{-- password update --}}
    <div class="col-12 mt-2">
        <form class="card" action="{{ route('admin.password.update') }}" method="POST">
            @csrf
            @method('put')

            <div class="card-body">
                <h3 class="card-title">{{ __('Change Password') }}</h3>
                <hr/>
                <div class="row row-cards">


                    <div class="col-md-12">
                        {{-- USing My custmized admin Dynamic backend input component --}}
                        <x-admin.input-text type="password" name="current_password" placeholder="Your Current Password" />
                    </div>

                    <div class="col-sm-6 col-md-6">
                        {{-- USing My custmized admin Dynamic backend input component --}}
                        <x-admin.input-text type="password" name="password" placeholder="New Password"  />
                    </div>

                    <div class="col-sm-6 col-md-6">
                        {{-- USing My custmized admin Dynamic backend input component --}}
                        <x-admin.input-text type="password" name="password_confirmation" placeholder="confirm password"  />
                    </div>


                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">{{ __('Update Password') }}</button>
            </div>
        </form>
    </div>
@endsection
