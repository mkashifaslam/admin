@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Create new video category</h3>
		</div>
		<div class="box-body">
			<form action="{{url("video_category")}}" method = "post">
				<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
				<div class="form-group">
                    <label for="category_id">ID</label>
                    <input id="category_id" name = "category_id" readonly="readonly" value="{{ $category_id }}" type="text" class="form-control">
                </div>
				<div class="form-group">
                    <label for="category_name">Name</label>
                    <input id="category_name" name = "category_name" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="category_description">Description</label>
                    <input id="category_description" name = "category_description" type="text" class="form-control">
                </div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Create</button>
                    <a href="{{url('/video_category/')}}" class="btn btn-primary">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection