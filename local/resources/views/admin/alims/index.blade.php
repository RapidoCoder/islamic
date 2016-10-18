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
					<i class="fa fa-globe"></i>Alims List
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

            <a href="{!! route('admin-add-alim')!!}" style="color:white;"><button id="sample_editable_1_new" class="btn green">Add New <i class="fa fa-plus"></i> 
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
        Image
      </th>
      <th>
        Name
      </th>  
      <th>
        Email
      </th>  
      <th>
        Description
      </th>
      <th>
        Options
      </th>
    </tr>
  </thead>
  <tbody>

    @foreach($alims as $alim)
    <tr>
     <td>{{ $alim->id }}</td>
     <td >{{ Html::image("assets/media/alims/".$alim->image,'',array("width"=>"200")) }}</td>
     <td>{{ $alim->name }}</td>
     <td>{{ $alim->email }}</td>
     <td>{{ $alim->description }}</td>
      <td>
        {{ link_to_route("admin-update-alim","" ,array("id"=> $alim->id ),array("class"=>"glyphicon glyphicon-pencil","aria-hidden"=>"true","style"=>"padding:0 5px 0 5px;"))}}{{ link_to_route("admin-delete-alim","" ,array("id"=> $alim->id ),array("class"=>"glyphicon glyphicon-trash","aria-hidden"=>"true", "onClick"=>"return confirm('Are You Sure to delete the record');"))}}
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
<script>
jQuery(document).ready(function() {       
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
TableManaged.init();
});
</script>
@stop

