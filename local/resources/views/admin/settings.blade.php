
@extends('../template.backend')

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
    <!-- Nav tabs --><div class="card">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#name" aria-controls="name" role="tab" data-toggle="tab">Name</a></li>
      <li role="presentation"><a href="#email" aria-controls="email" role="tab" data-toggle="tab">Email</a></li>
      <li role="presentation"><a href="#password" aria-controls="password" role="tab" data-toggle="tab">Password</a></li>
      
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active form-group " id="name">
       <form method="post" action="{{route('admin-change-name')}}">
         <label for="Name">Name</label>
         <input type="text" class="form-control " value="{{Auth::guard('admin')->user()->name}}" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
         <div class="margiv-top-10">
           {!! csrf_field() !!}
           <a href="javascript:;" class="btn green" onclick="$(this).closest('form').submit()"> Save Changes </a>
         </div>
       </form>
     </div>
     <div role="tabpanel" class="tab-pane" id="email">
      <form method="post" action="{{route('admin-change-email')}}">
        <label for="Name">Email</label>
        <input type="email" class="form-control " value="{{Auth::guard('admin')->user()->email}}" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter Name">
        <div class="margiv-top-10">
         {!! csrf_field() !!}
         <a href="javascript:;" class="btn green" onclick="$(this).closest('form').submit()"> Save Changes </a>
       </div>
     </form>
   </div>
   <div role="tabpanel" class="tab-pane" id="password">
     <form method="post" action="{{route('admin-change-password')}}" id="passwordFrom">
      <label for="Name">Password</label>
      <input type="password" class="form-control "  name="password" id="password" aria-describedby="emailHelp" placeholder="Enter Password" required>
      <input type="password" class="form-control margiv-top-10"  name="confirm_password" id="confirm_password" aria-describedby="emailHelp" placeholder="Enter confirm Password" required>
      <div class="margiv-top-10">
       {!! csrf_field() !!}
       <a href="javascript:;" class="btn green" onclick="$(this).closest('form').submit()"> Save Changes </a>
     </div>
   </form>
 </div>
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
</script>
@stop

