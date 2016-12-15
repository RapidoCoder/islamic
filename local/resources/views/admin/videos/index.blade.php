@extends('../../template.backend')

@section('content')

@if ($errors->any())
<div class="alert alert-danger" role="alert">
 {!!  implode('', $errors->all('<p class="text-center">:message</p>')) !!}
</div>
@endif

@if(Session::has('msgs'))
<div class="{{Session::get('msgs')['type']}}" role="alert">

  <p class="text-center">{{Session::get('msgs')['msg']}}</p>
</div>
@endif

<div class="row">
	<div class="col-md-12">


		<div class="portlet box green-haze">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-globe"></i>Videos List
				</div>
				<div class="tools">
					<a href="javascript:;" class="reload" data-original-title="" title="">
					</a>
					<a href="javascript:;" class="remove" data-original-title="" title="">
					</a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
          <div class="row">
           <div class="col-md-6">
            <div class="btn-group">

              <a href="{!! route('admin-add-video')!!}" style="color:white;"><button id="sample_editable_1_new" class="btn green">Add New <i class="fa fa-plus"></i> 
              </button></a>


            </div>
          </div>

        </div>
      </div>
      <table class="table table-striped table-bordered table-hover" id="sample_2">
       <thead>
        <tr>
         <th>
          Id
        </th>
        <th>
          Video Thumbnail
        </th>
        <th>
          Category
        </th>  
        <th>
          Title
        </th>
        <th>
          Description
        </th>
        <th>
          Created By
        </th>
        <th>
          Posted By
        </th>
        <th>
          Status
        </th>
        <th>
          Options
        </th>
      </tr>
    </thead>
    <tbody>

      @foreach($videos as $video)
      <tr>
       <td>{{ $video->id }}</td>
       <td >{{ Html::image( 'https://img.youtube.com/vi/'.$video->youtube_id.'/0.jpg','',array("width"=>"200")) }}</td>
       <td>{{ $video->category->name }}</td>
       <td>{{$video->title }}</td>
       <td>{{ $video->description }}</td>
       <td>{{ $video->created_at }}</td>
       <td>{{ $video->posted_by }}</td>
       <td>{{ $video->status }}</td>
       <td>
        {{ link_to_route("admin-update-video","" ,array("id"=> $video->id ),array("class"=>"glyphicon glyphicon-pencil","aria-hidden"=>"true","style"=>"padding:0 5px 0 5px;"))}}{{ link_to_route("admin-delete-video","" ,array("id"=> $video->id ),array("class"=>"glyphicon glyphicon-trash","aria-hidden"=>"true", "onClick"=>"return confirm('Are You Sure to delete the record');"))}}
        <a href="#" youtube-id="{{$video->youtube_id}}" class="video_view"><i class="glyphicon glyphicon-eye-open"></i></a>
      </td>
    </tr>
    @endForeach

  </tbody>
</table>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->

</div>
</div>
<!-- Modal -->
<div class="modal fade" id="video" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      <p class="videowrapper"><iframe id="youtube_video" 
          src="https://www.youtube.com/embed/XGSy3_Czz8k">
        </iframe></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
  jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
TableManaged.init();
});
  $(".video_view").on("click", function(event){
    var url = "https://www.youtube.com/embed/"+$(this).attr("youtube-id");
   $("#video .modal-content .modal-body p  #youtube_video").attr("src",url);
   $("#video").modal("show");
 });
$(document).on('hide.bs.modal','#video', function () {
    $("#video .modal-content .modal-body p  #youtube_video").attr("src","");
});
</script>
@stop

