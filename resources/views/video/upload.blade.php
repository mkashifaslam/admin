@extends('scaffold-interface.layouts.app')
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
                    {!! Form::open(array('url'=>'video/uploadVideo','method'=>'POST', 'files'=>true)) !!}
                    <div class="control-group">
                    <div class="controls">
                    {!! Form::file('video') !!}
                    <p class="errors">{!!$errors->first('video')!!}</p>
                    @if(Session::has('error'))
                    <p class="errors">{!! Session::get('error') !!}</p>
                    @endif
                    </div>
                    </div>
                    <div id="success"> </div>
                    {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            </div>
		</div>
	</div>
</section>
@endsection
