@extends('admin.layouts.master')

@section('content')

    <div class="card">
            <div class="card-header">
                <div>
                    <h2 class="card-title">{{ __('kyc settings') }}</h2>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.kyc-settings.update') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-md-6">
                            {{--Using My Dynamic Input Toggle Component--}}
                            <x-admin.input-toggle name="nid_verification"  :checked="$kycSetting->nid_verification"/>
                        </div>

                        <div class="col-md-6">
                            {{--Using My Dynamic Input Toggle Component--}}
                            <x-admin.input-toggle name="passport_verification" :checked="$kycSetting->passport_verification"/>
                        </div>


                        <hr/>

                        <div class="col-md-12">
                            {{--Using My Dynamic Input Textarea Component--}}
                            <x-admin.input-textarea name="instructions" placeholder="Content" :value="$kycSetting->instructions"></x-admin.input-textarea>
                        </div>

                        <div class="col-md-6">
                            {{--Using My Dynamic Input Select Component--}}
                            <x-admin.input-select name="auto_approve" >
                                <option @selected($kycSetting->auto_approve == 1 ) value="1">Enable</option>
                                <option @selected($kycSetting->auto_approve ==0 ) value="0">Disabled</option>
                            </x-admin.input-select>
                        </div>

                        <div class="col-md-6">
                            {{--Using My Dynamic Input Select Component--}}
                            <x-admin.input-select name="status" >
                                <option @selected($kycSetting->status == 1 ) value="1">Active</option>
                                <option @selected($kycSetting->status == 0 ) value="0">Inactive</option>
                            </x-admin.input-select>
                        </div>



                    </div>
                </form>
            </div>


            <div class="card-footer text-end">
                <button onclick="$('form').submit();" class="btn btn-primary">{{ __('Save') }}</button>
            </div>

        </div>
@endsection

