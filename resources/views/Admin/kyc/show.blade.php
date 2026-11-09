@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">{{ __('KYC Details') }}</h2>
            </div>

            <div class="card-actions">
                <a href="{{ route('admin.kyc.index') }}" class="btn btn-primary">
                    <i class="ti ti-arrow-narrow-left"></i>
                    {{ __('Back') }}
                </a>
            </div>

        </div>

        <div class="card-body">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">

                        <tbody>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <td>{{ $kyc->user->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Email') }}</th>
                                <td>{{ $kyc->user->email }}</td>
                            </tr>

                            <tr>
                                <th>{{ __('Document Type') }}</th>
                                <td>{{ $kyc->document_type }}</td>
                            </tr>

                            <tr>
                                <th>{{ __('Document number') }}</th>
                                <td>{{ $kyc->document_number }}</td>
                            </tr>

                            <tr>
                                <th>{{ __('Document Attachments') }}</th>
                                <td>
                                    @php
                                        $attachments = json_decode($kyc->documents)
                                    @endphp
                                    @foreach($attachments as $key => $attachment)
                                        <a href="{{ route('admin.kyc.download-document', ['kyc' => $kyc->id , 'attachment_id' => $loop->index]) }}">
                                            {{ __('Attachment') }} ({{ $loop->iteration }})
                                        </a>
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <th>{{ __('Status') }}</th>
                                <td>
                                    @switch($kyc->status)
                                        @case('pending')
                                            <span class="badge bg-orange text-blue-fg">{{ $kyc->status }}</span>
                                            @break
                                        @case('approved')
                                            <span class="badge bg-green text-blue-fg">{{ $kyc->status }}</span>
                                            @break
                                        @default
                                            <span class="badge bg-red text-blue-fg">{{ $kyc->status }}</span>
                                    @endswitch
                                </td>
                            </tr>

                            <tr>
                                <form action="{{ route('admin.kyc.update-status', $kyc->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <th>{{ __('Action') }}</th>
                                    <td>
                                        <x-admin.input-select name="status" label="status" id="status">
                                            <option value="pending" @selected($kyc->status == 'pending')>Pending</option>
                                            <option value="approved" @selected($kyc->status == 'approved')>Approved</option>
                                            <option value="rejected" @selected($kyc->status == 'rejected')>Rejected</option>
                                        </x-admin.input-select>

                                        <div id="reason" class="{{ ($kyc->status == 'rejected' ? '' : 'd-none') }}">
                                            <x-admin.input-textarea name="reason"  label="Rejected Reason" :value="$kyc->reject_reason" />
                                        </div >
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </td>
                                </form>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="card-footer">
        </div>

    </div>
@endsection

{{--when status changed  text area display or hidden--}}
@push('scripts')
    <script>
        'use strict'
            $(function (){
                $('#status').on('change', function() {
                    let status = $(this).val();
                    if (status === 'rejected') {
                        $('#reason').removeClass('d-none');
                    } else {
                        $('#reason').addClass('d-none');
                    }
                })
            })
    </script>

@endpush
