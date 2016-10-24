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
                <p class="col-md-offset-6"><a class="btn blue" href="{!! $book->url!!}">
                 Download Book <i class="m-icon-swapdown m-icon-white"></i>
               </a></p>



             </div>
           </div>
         </div>
         <!-- BEGIN PAGE CONTENT-->

         <div class="timeline">

          @foreach($comments as $comment)
          <div class="timeline-item">
            <div class="timeline-badge">
              <img class="timeline-badge-userpic" src="{!! asset('assets/media/users/' . $comment->user->image) !!}">
            </div>
            <div class="timeline-body">
              <div class="timeline-body-arrow">
              </div>
              <div class="timeline-body-head">
                <div class="timeline-body-head-caption">
                  <a href="javascript:;" class="timeline-body-title font-blue-madison">{!! $comment->user->name!!}</a>
                  <span class="timeline-body-time font-grey-cascade">{!!$comment->created_at->format('M d Y h:i A') !!}</span>
                </div>
                <div class="timeline-body-head-actions">
                </div>
              </div>
              <div class="timeline-body-content">
                <span class="font-grey-cascade">
                  <p>

                   {!! $comment->comments !!}
                 </p>
               </span>
             </div>
           </div>
         </div>

         @endForeach
         @if(Auth::guard('user')->check())
         <form action="{!! route('submit_comment')!!}" method="post" >
         <div class="timeline-item" style="backgro">
          <div class="media">
            <img class="todo-userpic pull-left" src="{!!asset('assets/media/users/'. Auth::guard('user')->user()->image) !!}" >
            <div class="media-body">
              <textarea class="form-control todo-taskbody-taskdesc" name="comment" rows="4" placeholder="Type comment..."></textarea>
            </div>
          </div>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="submit" class="pull-right btn btn-sm btn-circle green-haze" value="submit"> </input>
      </div>
    </form>
      @else
       Sign In To Comment
      @endIf
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