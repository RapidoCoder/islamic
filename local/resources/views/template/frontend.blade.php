f <!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8"/>
  <title>Islamic</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta content="" name="description"/>
  <meta content="" name="author"/>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN THEME STYLES -->
  {!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')!!}
  {!! Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css')!!}
  {!! Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')!!}
  {!! Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css')!!}
  {!! Html::style('assets/global/plugins/uniform/css/uniform.default.css')!!}
  {!! Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')!!}
  {!! Html::style('assets/global/plugins/select2/select2.css')!!}
  {!! Html::style('assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')!!}
  {!! Html::style('assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')!!}
  {!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')!!}
  {!! Html::style('assets/global/css/components.css')!!}
  {!! Html::style('assets/global/css/plugins.css')!!}
  {!! Html::style('assets/admin/layout/css/layout.css')!!}
  {!! Html::style('assets/admin/layout/css/themes/darkblue.css')!!}
  {!! Html::style('assets/admin/layout/css/blog.css')!!}
  {!! Html::style('assets/admin/layout/css/custom.css')!!}
  {!! Html::style('assets/global/plugins/bootstrap-summernote/summernote.css')!!}
  {!! Html::style('assets/global/plugins/icheck/skins/all.css')!!}
  {!! Html::style('assets/admin/pages/css/timeline.css')!!}
  
  {!! Html::script('assets/global/plugins/jquery.min.js')!!}
  {!! Html::script('assets/global/plugins/jquery-migrate.min.js')!!}
  {!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js')!!}
  {!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js')!!}
  {!! Html::script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')!!}
  {!! Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')!!}
  {!! Html::script('assets/global/plugins/jquery.blockui.min.js')!!}
  {!! Html::script('assets/global/plugins/jquery.cokie.min.js')!!}
  {!! Html::script('assets/global/plugins/uniform/jquery.uniform.min.js')!!}
  {!! Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')!!}
  {!! Html::script('assets/global/plugins/select2/select2.min.js')!!}
  {!! Html::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')!!}
  {!! Html::script('assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')!!}
  {!! Html::script('assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')!!}
  {!! Html::script('assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')!!}
  {!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')!!}
  {!! Html::script('assets/global/scripts/metronic.js')!!}
  {!! Html::script('assets/admin/layout/scripts/layout.js')!!}
  {!! Html::script('assets/admin/layout/scripts/quick-sidebar.js')!!}
  {!! Html::script('assets/admin/layout/scripts/demo.js')!!}
  {!! Html::script('assets/admin/pages/scripts/table-managed.js')!!}
  {!! Html::script('assets/admin/layout/scripts/moment.js')!!}
  {!! Html::script('assets/admin/layout/scripts/bootstrap-datetimepicker.js')!!}
  {!! Html::script('assets/global/plugins/bootstrap-summernote/summernote.min.js')!!}
  {!! Html::script('assets/global/plugins/icheck/icheck.min.js')!!}

  <style>
  .prettyline {
    height: 5px;
    border-top: 0;
    background: #c4e17f;
    border-radius: 5px;
    background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
    background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  }
  </style>
  <body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo">
    <!-- BEGIN HEADER -->
    <div class="page-header -i navbar navbar-fixed-top">
     <!-- BEGIN HEADER INNER -->
     <div class="page-header-inner">
      <!-- BEGIN LOGO -->
      <div class="page-logo">
       <a href="{{route('admin-dashboard')}}">
         <img src="{{asset('assets/media/image/logo1.png')}}" alt="logo" class="logo-default"/>
       </a>
       <div class="menu-toggler sidebar-toggler">
       </div>
     </div>
     <!-- END LOGO -->
     <!-- END LOGO -->
     <!-- BEGIN RESPONSIVE MENU TOGGLER -->
     <div class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
       <!-- BEGIN TOP NAVIGATION MENU -->

     </div>
     @if(Auth::guard('user')->check()) 

     <div class="top-menu">
       <ul class="nav navbar-nav pull-right">
        <li class="dropdown dropdown-user">
         <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
           <img alt="" class="img-circle" src="{!! asset('assets/media/users/'. Auth::guard('user')->user()->image)!!}"/>
           <span class="username username-hide-on-mobile">

             {{ Auth::guard('user')->user()->name }}


           </span>
           <i class="fa fa-angle-down"></i>
         </a>
         <ul class="dropdown-menu dropdown-menu-default">
          <li>

            <a href="{!! route('user-logout')!!}"><i class="icon-key"></i> Log Out </a>


          </li>
        </ul>
      </li>
      <!-- END QUICK SIDEBAR TOGGLER -->
    </ul>
  </div>
  @else
  <div class="top-menu">
   <ul class="nav navbar-nav pull-right">
    <li class="dropdown dropdown-user">
      <a  href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Sign In/Register</a>
    </li>
    <!-- END QUICK SIDEBAR TOGGLER -->
  </ul>
</div>
@endIf
<!-- END TOP NAVIGATION MENU -->

</div>
<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->


<div class="page-container">
 <!-- BEGIN SIDEBAR -->
 <div class="page-sidebar navbar-collapse collapse">
  <!-- BEGIN SIDEBAR MENU1 -->
  <ul class="page-sidebar-menu hidden-sm hidden-xs" data-auto-scroll="true" data-slide-speed="200">

    <li>
      <a href="javascript:;">
        <i class="fa fa-clock-o"></i>
        <span class="title">
          Books List</span>
          <span class="arrow ">
          </span>
        </a>
        <ul class="sub-menu">
         <li>
          <a href="{{route('alim-books')}}">
            Manage Books</a>
          </li>
          <li>
            <a href="{{route('alim-add-book')}}">
              Add Book </a>
            </li>
          </ul>
        </li>
        <li>

        </ul>
        <!-- END SIDEBAR MENU1 -->
        <!-- BEGIN RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
        <ul class="page-sidebar-menu visible-sm visible-xs" data-slide-speed="200" data-auto-scroll="true">

          <li>
            <a href="javascript:;">
              <i class="fa fa-clock-o"></i>
              <span class="title">
                Books List</span>
                <span class="arrow ">
                </span>
              </a>
              <ul class="sub-menu">
               <li>
                <a href="{{route('alim-books')}}">
                  Manage Books</a>
                </li>
                <li>
                  <a href="{{route('alim-add-book')}}">
                    Add Book </a>
                  </li>
                </ul>
              </li>
              <li>


               <!-- END RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
             </div>
             <!-- END SIDEBAR -->
             <!-- BEGIN CONTENT -->
             <div class="page-content-wrapper">
              <div class="page-content">

                <div class="page-bar">
                  <ul class="page-breadcrumb">
                   @foreach($breadcrumb as $breadcrumbElement)
                   <li>
                    @if($breadcrumbElement['homeIcon'])
                    <i class="fa fa-home"></i>
                    @endIf
                    @if($breadcrumbElement['rightSide'] != false)
                    {{HTML::linkRoute($breadcrumbElement['url'],$breadcrumbElement['title'] )}}
                    @else
                    {{HTML::link("#",$breadcrumbElement['title'] )}}
                    @endIf
                    @if($breadcrumbElement['rightSide'])
                    <i class="fa fa-angle-right"></i>
                    @endIf
                  </li>
                  @endForeach
                </ul>
              </div>
              @if ($errors->any())
              <div class="alert alert-danger" role="alert">
               {!!  implode('', $errors->all('<p class="text-center">:message</p>')) !!}
             </div>
             @endif
             @if(Session::has('msg'))
             <div class="{{Session::get('msg')['type']}}" role="alert">

              <p class="text-center">{{Session::get('msg')['message']}}</p>
            </div>
            @endif
            <h3 class="page-title">
              {{ $title }}
            </h3>
            <!-- Page Content Goes Here -->
            
            
            @yield('content')
            <!-- End Of Page Content-->
            <div class="clearfix"></div>
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
               <div class="modal-content">
                <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                 <h4 class="modal-title">Modal title</h4>
               </div>
               <div class="modal-body">
                 Widget settings form goes here
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn blue">Save changes</button>
                 <button type="button" class="btn default" data-dismiss="modal">Close</button>
               </div>
             </div>
             <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
       </div>
     </div>
   </div>
 </div>
</div>
<div class="page-footer">
 <div class="page-footer-inner">
  {!! date("Y")!!} &copy; Islamic.
</div>
<div class="scroll-to-top">
  <i class="icon-arrow-up"></i>
</div>
</div>
<!-- END JAVASCRIPTS -->




<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <br>
      <div class="bs-example bs-example-tabs">
        <ul id="myTab" class="nav nav-tabs">
          <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
          <li class=""><a href="#signup" data-toggle="tab">Register</a></li>

        </div>
        <div class="modal-body">
          <div id="myTabContent" class="tab-content">

            <div class="tab-pane fade active in" id="signin">
              <form class="form-horizontal">
                <fieldset>
                  <!-- Sign In Form -->
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="userid">Alias:</label>
                    <div class="controls">
                      <input required="" id="userid" name="userid" type="text" class="form-control" placeholder="JoeSixpack" class="input-medium" required="">
                    </div>
                  </div>

                  <!-- Password input-->
                  <div class="control-group">
                    <label class="control-label" for="passwordinput">Password:</label>
                    <div class="controls">
                      <input required="" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="********" class="input-medium">
                    </div>
                  </div>

                  <!-- Multiple Checkboxes (inline) -->
                  <div class="control-group">
                    <label class="control-label" for="rememberme"></label>
                    <div class="controls">
                      <label class="checkbox inline" for="rememberme-0">
                        <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                        Remember me
                      </label>
                    </div>
                  </div>

                  <!-- Button -->
                  <div class="control-group">
                    <label class="control-label" for="signin"></label>
                    <div class="controls">
                      <button id="signin" name="signin" class="btn btn-success">Sign In</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
            <div class="tab-pane fade" id="signup">

              {{ Form::open( [ 'url' => route('register-user'), 'method' => 'post', 'files' => true, 'id'=>'registeration_form', 'class'=>'form-horizontal' ] ) }}
              <fieldset>
                <!-- Sign Up Form -->
                <!-- Text input-->
                <div class="control-group alert-danger" id="message">

                </div>
                <div class="control-group">
                  <label class="control-label" for="Email">Email:</label>
                  <div class="controls">
                    <input id="reg_user_email" name="reg_email" class="form-control" type="text" placeholder="JoeSixpack@sixpacksrus.com" class="input-large" required="">
                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="userid">Name:</label>
                  <div class="controls">
                    <input id="userid" name="reg_name" class="form-control" type="text" placeholder="JoeSixpack" class="input-large" required="">
                  </div>
                </div>
                <!-- image -->
                <div class="control-group">
                  <label class="control-label" for="password">Image:</label>
                  <div class="controls">
                   <input type="file" class="form-control" id="image"  name="reg_image" required="">
                   <em>1-8 Characters</em>
                 </div>
               </div>
               <!-- Password input-->
               <div class="control-group">
                <label class="control-label" for="password">Password:</label>
                <div class="controls">
                  <input id="password" name="reg_password" id="" class="form-control" type="password" placeholder="********" class="input-large" required="">
                  <em>1-8 Characters</em>
                </div>
              </div>

              <!-- Text input-->
              <div class="control-group">
                <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
                <div class="controls">
                  <input id="confirm_password" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required="">
                </div>
              </div>



              <!-- Button -->
              <div class="control-group">
                <label class="control-label" for="confirmsignup"></label>
                <div class="controls">
                  <input type="hidden" id ="csrf_reg" name="_token" value="{{ csrf_token() }}">
                  <button  id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
<script>
var password = document.getElementById("password")
, confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

$("#confirmsignup").on('click', function(event){

 event.preventDefault();
 if($('#registeration_form')[0].checkValidity()){
   var email = $("#reg_user_email").val();
   var csrf = $("#csrf_reg").val();
   $.ajax({
    type: 'POST',
    url:'{!! route("user-exist") !!}',
    data: {email : email, _token: csrf},
    success: function(response) {
      console.log(response);
      var response = JSON.parse(response);
      if( response.exist){
        $("#message").html("User Already Register");
      }else{
        $('#registeration_form').submit();

      } 

    }

  });
 }else{
   $("#message").html("Fill All Fields Properly");
 }


});
</script>
</body>         
</html>