@extends('layouts.app')

@section('content')
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<script src="http://vjs.zencdn.net/ie8/1.1.0/videojs-ie8.min.js"></script>
<script src="http://vjs.zencdn.net/5.0.2/video.js"></script>
<div class="container">
    <div class="row">
    @foreach($videos as $video)
    <div class="col-md-4 margin-bottom-10">
        <video id="video_{{ $video->video_id }}" width="325" height="150" class="video-js vjs-default-skin" controls="true" preload="auto" poster="{{ config('app.video_thumbnail_images_path').'/'.$video->video_thumbnail_path }}" data-setup="{}">
            <source src="{{ config('app.video_storage_path').'/'.$video->video_storage_path }}" type="video/mp4">
            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
        </video>
    </div>
    @endforeach
    <div class="col-md-12">
        @include('pagination.default', ['paginator' => $videos])
    </div>
    </div>
</div>
@endsection
