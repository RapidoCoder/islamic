@extends('template.frontend')
@section('content')
  <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12 blog-page">
          <div class="row">
            <div class="col-md-12 article-block">
              <h3>{!! $book->title!!}</h3>
              <div class="blog-tag-data">
                 <img src="{{asset('assets/media/books/'.$book->image)}}" height="300px" alt="logo" class="logo-default"/>
                <div class="row">
                  <div class="col-md-6">
                                      <ul class="list-inline">
                    <li>
                      <i class="fa fa-calendar glyphicons-icons"></i>
                      <a href="javascript:;">
                      {!! $book->created_at->format('M d Y')!!}  </a>
                    </li>
                    <li>
                      <i class="fa fa-comments glyphicons-icons"></i>
                      <a href="javascript:;">
                      38 Comments </a>
                    </li>
                  </ul>
                  <ul class="list-inline blog-tags">
                    <li>
                      <i class="fa fa-tags glyphicons-icons"></i>
                      <a href="{!! route('by-category',array($book->category_id)) !!}">
                      {!! $book->category->name !!} </a>
                      
                    </li>
                  
                      
                    <li>
                      <i class="fa fa-user glyphicons-icons"></i>
                      <a href="{!! route('by-writer',array($book->category_id)) !!}">
                      {!! $book->writer->name !!} </a>
                      
                    </li>
                </ul>
                  </div>
                </div>
              </div>
              <!--end news-tag-data-->
              <div>
                <p>
              {!! $book->description !!}
                </p>
                <p><a class="btn blue" href="{!! $book->url!!}">
                 Download Book <i class="m-icon-swapright m-icon-white"></i>
                  </a></p>

                
             
          </div>
        </div>
      </div>
      <!-- END PAGE CONTENT-->
  <script>
jQuery(document).ready(function() {

    Metronic.init(); // init metronic core components
      Layout.init(); // init current layout
      Login.init();
      Demo.init();
    });
</script>
@stop