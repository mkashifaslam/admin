@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>All Video Categories</h3>
		</div>
		<div class="box-body">
			@if(Session::has('success'))
			<div class="alert-box success">
			<h2>{!! Session::get('success') !!}</h2>
			</div>
			@endif
			<a href="{{url("video_category")}}/create" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Add New Category</a>
			<table class="table table-striped">
				<head>
					<th>Category Id</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Actions</th>
				</head>
				<tbody>
					 @foreach($video_categories as $Video_category)
					<tr>
						<td>{{$Video_category->category_id}}</td>
                        <td>{{$Video_category->category_name}}</td>
                        <td>{{$Video_category->category_description}}</td>
						<td>
							<a href="/video_category/{{$Video_category->id}}/edit" class = "btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="/video_category/{{$Video_category->id}}/delete" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection