@extends('layouts.admin.master')
@section('title','Post Details')
@section('custom-css')
    <base href="{{asset('')}}">
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
                    <table class="table">
                       <thead>
                      <tr>
                          <td>S.no.</td>
                          <td>Video</td>
                          <td>Title</td>
                          <td>Description</td>
                          <td>Visibility</td>
                      </tr>
                       </thead>
                        <tbody>
                        @if(count($videos)>0)

                            @foreach($videos as $key=>$video)
                          <tr>
                              <td>{{$key+1}}</td>
                              <td width="150px" height="70px">
                                  <video controls preload="auto" data-setup='{"fluid":true,"liveui": true}' class="vjs-matrix video-js vjs-small-play-centered">
                                      <source src="{{$video->video}}" type="video/mp4">
                                  </video>
                              </td>
                              <td>{{$video->title}}</td>
                              <td>{{$video->description}}</td>
                              <td>@if($video->visibility='public')
                                      <span class="badge badge-rounded badge-success">{{$video->visibility}}</span>
                                  @else
                                      <span class="badge badge-rounded badge-danger">{{$video->visibility}}</span>
                              @endif

                              </td>
                          </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
