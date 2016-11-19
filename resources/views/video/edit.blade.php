@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Edit video</h3>
		</div>
		<div class="box-body">
			<form action="{{url("video")}}/{{$video->id}}/update" method = "post">
				<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
				<div class="form-group">
                    <label for="video_id">ID</label>
                    <input id="video_id" name = "video_id" type="text" readonly="readonly" class="form-control" value="{{$video->video_id}}">
                </div>
                <div class="form-group">
                    <label for="video_title">Title</label>
                    <input id="video_title" name = "video_title" type="text" class="form-control" value="{{$video->video_title}}">
                </div>
                
                <div class="form-group">
                    <label for="video_description">Description</label>
                    <input id="video_description" name = "video_description" type="text" class="form-control" value="{{$video->video_description}}">
                </div>
                
                <div class="form-group">
                    <label for="video_category">Category</label>
                    <select id="video_category_id" name = "video_category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->category_id}}">{{$category->category_name}}</p>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="video_type">Format</label>
                    <select id="video_type_id" name = "video_type_id" class="form-control">
                        @foreach ($formates as $format)
                            <option value="{{$format->video_format_id}}">{{$format->video_format_name}}</p>
                        @endforeach
                    </select>
                </div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Update</button>
                    <a href="{{url('/video/')}}" class="btn btn-primary">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection