@extends('scaffold-interface.layouts.app')
<link href="{{ asset('dropzone/dropzone.css') }}" rel="stylesheet">
<script src="{{ asset('dropzone/dropzone.js') }}"></script>
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>All Videos</h3>
		</div>
		<div class="box-body">
			<div class="about-section">
            <div class="text-content">
                <div class="span7 offset1">
                    <div class="secure">Upload form</div>
                    {!! Form::open(array('url'=>'video/uploadVideo','method'=>'POST', 'files'=>true, 'class' => 'dropzone')) !!}
                    <div class="control-group">
                    <div class="controls">
                    <div class="fallback">
                    {!! Form::file('video') !!}
                    </div>
                    </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            </div>
		</div>
	</div>
</section>
@endsection
