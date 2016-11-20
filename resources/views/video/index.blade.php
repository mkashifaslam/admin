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
                    <th>Video Format</th>
                    <th>Video Total Views</th>
					<th>Video Upload Date</th>
                    <th>Actions</th>
				</head>
				<tbody>
					 @foreach($videos as $Video)
					<tr>
						<td>{{$Video->video_title}}</td>
                        @if ($Video->video_category_id > 0) 
                        	<td>{{$Video->category->category_name}}</td>
                        @else
                        	<td>N/A</td>
                        @endif
                        <td>{{$Video->format->video_format_name}}</td>
                        <td>{{$Video->video_total_views}}</td>
                        <td>{{$Video->created_at}}</td>
						<td>
							<a href="{{url('/video/')}}/{{$Video->id}}/edit" class = "btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="#" id="delete_video" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
					@endforeach
					<tr>
					<td colspan="6">
						@include('pagination.default', ['paginator' => $videos])
					</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>
<!-- template for the modal component -->
<script type="text/x-template" id="modal-template">
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
              default header
            </slot>
          </div>

          <div class="modal-body">
            <slot name="body">
              default body
            </slot>
          </div>

          <div class="modal-footer">
            <slot name="footer">
              default footer
              <button class="modal-default-button" @click="$emit('close')">
                OK
              </button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</script>

<!-- app -->
<div id="app">
  <button id="show-modal" @click="showModal = true">Show Modal</button>
  <!-- use the modal component, pass in the prop -->
  <modal v-if="showModal" @close="showModal = false">
    <!--
      you can use custom content here to overwrite
      default content
    -->
    <h3 slot="header">custom header</h3>
  </modal>
</div>
@endsection
