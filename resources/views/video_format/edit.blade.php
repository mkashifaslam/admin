@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Edit video format</h3>
		</div>
		<div class="box-body">
			<form action="{{url("video_format")}}/{{$video_format->id}}/update" method = "post">
				<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
				<div class="form-group">
                    <label for="video_format_id">ID</label>
                    <input id="video_format_id" name = "video_format_id" readonly="readonly" type="text" readonly="readonly" class="form-control" value="{{$video_format->video_format_id}}">
                </div>
                <div class="form-group">
                    <label for="video_format_name">Name</label>
                    <input id="video_format_name" name = "video_format_name" type="text" class="form-control" value="{{$video_format->video_format_name}}">
                </div>
                
                <div class="form-group">
                    <label for="video_format_decscription">Decscription</label>
                    <input id="video_format_decscription" name = "video_format_decscription" type="text" class="form-control" value="{{$video_format->video_format_decscription}}">
                </div>
                
                <div class="form-group">
                    <label for="video_format_coding">Coding</label>
                    <input id="video_format_coding" name = "video_format_coding" type="text" class="form-control" value="{{$video_format->video_format_coding}}">
                </div>
                
                <div class="form-group">
                    <label for="video_format_extension">Extension</label>
                    <input id="video_format_extension" name = "video_format_extension" type="text" class="form-control" value="{{$video_format->video_format_extension}}">
                </div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Update</button>
                    <a href="{{url('/video_format/')}}" class="btn btn-primary">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection