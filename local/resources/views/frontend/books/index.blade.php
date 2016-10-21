@extends('template.frontend')
@section('content')
 
      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12 blog-page">
          <div class="row">
            <div class="col-md-12 col-sm-12 article-block">
             @foreach($books as $book)
              <div class="row">
                <div class="col-md-4 blog-img blog-tag-data">
                 <img src="{{asset('assets/media/books/'.$book->image)}}" width="300px" height="150px" alt="logo" class="logo-default"/>
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
                <div class="col-md-7 blog-article">
                  <h3>
                  <a href="{!! route('book-detail',array($book->id)) !!}">
                   {!! $book->title!!} </a>
                  </h3>
                  <p>
                      {!! $book->description!!}
                  </p>
                   <a class="btn blue" href="{!! route('book-detail',array($book->id)) !!}">
                  Read more <i class="m-icon-swapright m-icon-white"></i>
                  </a>
                </div>
              </div>
              <hr>

             @endForeach
             
          <ul class="pagination pull-right">
           {{ $books->links() }}
            <!--<li>
              <a href="javascript:;">
              <i class="fa fa-angle-left"></i>
              </a>
            </li>
            <li>
              <a href="javascript:;">
              1 </a>
            </li>
            <li>
              <a href="javascript:;">
              2 </a>
            </li>
            <li>
              <a href="javascript:;">
              3 </a>
            </li>
            <li>
              <a href="javascript:;">
              4 </a>
            </li>
            <li>
              <a href="javascript:;">
              5 </a>
            </li>
            <li>
              <a href="javascript:;">
              6 </a>
            </li>
            <li>
              <a href="javascript:;">
              <i class="fa fa-angle-right"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    -->
      <!-- END PAGE CONTENT-->
    </div>
  </div>
  <!-- END CONTENT -->
  <script>
jQuery(document).ready(function() {

    Metronic.init(); // init metronic core components
      Layout.init(); // init current layout
     // Login.init();
      Demo.init();
    });
</script>
@stop