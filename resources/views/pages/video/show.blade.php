@extends('layouts.admin.master')
@section('title','Post Details')
@section('custom-css')
    <base href="{{asset('videos/')}}">
@endsection
@section('content')
    <script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>
    <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Package</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">video list</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-body">
                    <video  controls preload="auto" data-setup='{"fluid":true,"liveui": true}' class="vjs-matrix video-js vjs-big-play-centered">
                        <source src="3DIlSlaWoyZduXUdEaXnCimTMXTljTwijMcbR5nZ.mp4" type="video/*">
                    </video>
                </div>
            </div>
        </div>
    </div>
@endsection
