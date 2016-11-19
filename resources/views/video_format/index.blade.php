@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>All Video Formates</h3>
		</div>
		<div class="box-body">
			@if(Session::has('success'))
			<div class="alert-box success">
			<h2>{!! Session::get('success') !!}</h2>
			</div>
			@endif
			<a href="{{url("video_format")}}/create" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Add New Format</a>
			<table class="table table-striped">
				<head>
					<th>Video Format Id</th>
                    <th>Video Format Name</th>
                    <th>Video Format Decscription</th>
                    <th>Video Format Coding</th>                    
                    <th>Video Format Extension</th>
					<th>Actions</th>
				</head>
				<tbody>
					 @foreach($video_formats as $Video_format)
					<tr>
						<td>{{$Video_format->video_format_id}}</td>
                        <td>{{$Video_format->video_format_name}}</td>
                        <td class="description-col">{{$Video_format->video_format_decscription}}</td>
                        <td>{{$Video_format->video_format_coding}}</td>
                        <td>{{$Video_format->video_format_extension}}</td>
						<td>
							<a href="/video_format/{{$Video_format->id}}/edit" class = "btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="/video_format/{{$Video_format->id}}/delete" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
					@endforeach
					<tr>
					<td colspan="6">
						@include('pagination.default', ['paginator' => $video_formats])
					</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection