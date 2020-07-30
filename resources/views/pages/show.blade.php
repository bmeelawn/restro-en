@extends('layouts.layout')

@section('content')
 <div class="card mb-3" style="margin:40px 0px 40px 0px;padding: 10px">
    <h5 class="card-text" style="font-family:Times New Roman"><a href="/laravel-project/restro-en/public/show/{{$restaurant->id}}">{{$restaurant->name}}</a></h5>
  <img class="card-img-top img-thumbnail" src="{{ asset("storage/images/restaurant/{$restaurant->image}") }}" alt="Card image cap">
  <div class="card-body">
      <p class="card-text"><small class="text-muted"><i class="fa fa-map-marker" style="color:red"></i>{{$restaurant->address}} <i class="fa fa-envelope" style="color:red"></i> {{$restaurant->email}}</small></p>
    <p class="card-text">{{$restaurant->body}}</p>
  </div>

<h1>Comments</h1>

   <div class="comments">
        <div class="comments-details">
          @include('inc.message')
          <span class="total-comments comments-sort">
          @if(count($comment) > 0 )
            {{count($comment)}} Comments
          @else 
            No Comments
          @endif
          </span>
          <span class="dropdown">
              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">Sort By <span class="caret"></span></button>
              <div class="dropdown-menu">
                <a href="{{$restaurant->id}}?order=top" class="dropdown-item">Top Comments</a>
              <a href="{{$restaurant->id}}?order=latest" class="dropdown-item">Newest First</a>
              </div>
          </span>     
        </div>
        <div class="comment-box add-comment">
          <span class="commenter-pic">
            <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-fluid">
          </span>
          <span class="commenter-name">
            <form method="post" action="/laravel-project/restro-en/public/comment/store/{{$restaurant->id}}">
            @csrf
            <input type="text" placeholder="Add a public comment" name="Add_Comment">
            <button type="submit" class="btn btn-default">Comment</button>
            <button type="cancel" class="btn btn-default">Cancel</button>
            </form>
          </span>
        </div>
    </div>

@foreach ($comment as $com)
    
    <div class="row commentlist">
        <div class="col-md-12">
            <div class="card card-white post">
                <div class="post-heading">
                    <div class="float-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="float-left meta">
                        <div class="title h5">
                            <a href="#"><b>{{$com->user->name}}</b></a>
                            made a post.
                        </div>
                        <h6 class="text-muted time">

                        <!-- time Converter-->
                        @php
                        $diff = time() - strtotime($com->created_at);

                        switch($diff) {
                          case ($diff > 1 && $diff < 60):
                              $diff = $diff."seconds ago";
                          break;
                          case ($diff >=60 && $diff < 3600):
                              $min = intdiv($diff, 60);
                              $diff = $min."minutes ago";
                          break;
                          case ($diff >=3600 && $diff < 86400):
                              $hr = intdiv($diff, 3600);
                              $diff = $hr."hours ago";
                          break;
                          case ($diff >=86400 && $diff < 172800):
                              $diff = "yesterday";
                          break;
                          case ($diff >= 172800):
                              $diff = date('M d,yy', strtotime($com->created_at));
                          break;
                          default:
                          $diff = "Just now";
                      } 
                      @endphp
                      <!-- time Converter-->

                          {{$diff}}
                        </h6>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p>{{$com->comment}}</p>

                </div>
            </div>
        </div>
        
    </div>
@endforeach

@endsection