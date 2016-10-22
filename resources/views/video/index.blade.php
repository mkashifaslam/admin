@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>All Videos</h3>
		</div>
		<div class="box-body">
			@if(Session::has('success'))
			<div class="alert-box success">
			<h2>{!! Session::get('success') !!}</h2>
			</div>
			@endif
			<a href="{{url('video/upload/new')}}" class = "btn btn-success"><i class="fa fa-upload fa-md" aria-hidden="true"></i> Upload New Video</a>
			<table class="table table-striped">
				<head>
					<th>Video Title</th>
                    <th>Video Category</th>
                    <th>Video Type</th>
                    <th>Video Total Views</th>
					<th>Video Upload Date</th>
                    <th>Actions</th>
				</head>
				<tbody>
					 @foreach($videos as $Video)
					<tr>
						<td>{{$Video->video_title}}</td>
                        <td>{{$Video->video_category_id}}</td>
                        <td>{{$Video->video_type_id}}</td>
                        <td>{{$Video->video_total_views}}</td>
                        <td>{{$Video->created_at}}</td>
						<td>
							<a href="{{url('/video/edit')}}/{{$Video->id}}" class = "btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="{{url('/video/delete')}}/{{$Video->id}}" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection
