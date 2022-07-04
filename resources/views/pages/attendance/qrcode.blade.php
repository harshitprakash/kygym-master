@extends('layouts.admin.master')

@section('title', 'Door QR')

@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Door</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">QR Access</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Door Access Using QR Code..</h4>
                    </div>
                    <div class="card-body">
                        @if($user->CheckAllowed($user->id) == true)
                            <h3 class="text-center">Hello {{Auth::user()->first_name.' '.Auth::user()->last_name}}, @if($user->info->role_id != 5) You are a {{ $user->info->roleDetail->role }}. @else your Package will end on : {{date('jS M, Y', strtotime($user->Access->access_till))}} @endif</h3>
                            <h5 class="text-center">Scan this code in machine to open the door.</h5><br>
                            <div class="container text-center" id="QRCode">{{ QrCode::size('300')->generate($code) }}</div>
                            <br>
                        @else
                            <h5 class="text-danger text-center">Hello {{ Auth::user()->first_name.' '.Auth::user()->last_name }}, Your Membership Or Package has been expired! Kindly renew or Contact Help Desk.</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
