@extends('admin.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h2 class="card-title">{{ __('KYC Requests') }}</h2>
            </div>

            <div class="card-actions">

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
                            <th>{{ __('Document Type')}}</th>
                            <th>{{ __('Status')}}</th>
                            <th class="w-8">{{ __('Action') }}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($kycRequests as $request)
                            <tr>
                                <td>{{ ucfirst($request->user->name) }}</td>
                                <td>{{ $request->user->email }}</td>
                                <td>{{ ucfirst($request->document_type) }}</td>

                                <td>
                                    @switch($request->status)
                                        @case('pending')
                                            <span class="badge bg-orange text-blue-fg">{{ $request->status }}</span>
                                            @break
                                        @case('approved')
                                            <span class="badge bg-green text-blue-fg">{{ $request->status }}</span>
                                            @break
                                        @default
                                            <span class="badge bg-red text-blue-fg">{{ $request->status }}</span>
                                    @endswitch
                                </td>

                                <td>
                                        <a class="text-primary" href="{{ route('admin.kyc.show' , $request->id) }}" title="View Request"><i class="ti ti-eye"></i></a>
                                </td>

                            </tr>
                        @empty
                            <td colspan="3" class="text-center">{{ __('No Verification Requests') }}</td>
                        @endforelse

                        </tbody>


                    </table>
                </div>
            </div>

        </div>

        <div class="card-footer">
            {{ $kycRequests->links() }}
        </div>

    </div>
@endsection
