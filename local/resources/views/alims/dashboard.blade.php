@extends('../template.backend')
@section('content')
<div class="row">

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat blue-madison">
      <div class="visual">
        <i class="fa fa-comments"></i>
      </div>
      <div class="details">
        <div class="number">

        </div>
        <div class="desc">
          Books Manager
        </div>
      </div>
      <a class="more" href="{!! route('alim-books') !!}">
        View Books <i class="m-icon-swapright m-icon-white"></i>
      </a>
    </div>
  </div>
</div>
 
<script>
jQuery(document).ready(function() {    
                 Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            QuickSidebar.init(); // init quick sidebar
            //Demo.init(); // init demo features
          });
</script>
@stop