@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Create new video format</h3>
		</div>
		<div class="box-body">
			<form action="{{url("video_format")}}" method = "post">
				<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
				<div class="form-group">
                    <label for="video_format_id">ID</label>
                    <input id="video_format_id" name = "video_format_id" type="text" readonly="readonly" value="{{ $video_format_id }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="video_format_name">Name</label>
                    <input id="video_format_name" name = "video_format_name" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="video_format_decscription">Decscription</label>
                    <input id="video_format_decscription" name = "video_format_decscription" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="video_format_coding">Coding</label>
                    <input id="video_format_coding" name = "video_format_coding" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="video_format_extension">Extension</label>
                    <input id="video_format_extension" name = "video_format_extension" type="text" class="form-control">
                </div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Create</button>
                    <a href="{{url('/video_format/')}}" class="btn btn-primary">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection