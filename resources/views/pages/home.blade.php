@extends('layouts.layout')

@section('search')
<!-- Search form -->
<form  method="post" action="/laravel-project/restro-en/public/index" class="form-inline d-flex justify-content-center md-form form-sm mt-0">
    @csrf
  <input class="form-control form-control-sm ml-3 w-75" name="search" type="text" placeholder="Search" aria-label="Search">
    <button><i class="fas fa-search" aria-hidden="true"></i></button>
</form>
@endsection

@section('content')
@if($total_res > 0)
    @php
        $i = $index
    @endphp
    <x-heading heading="Top Restaurants Of Nepal" />

    @foreach ($data as $res)

    <h5 class="card-text" style="font-family:Times New Roman"><a href="/laravel-project/restro-en/public/show/{{$res->id}}">{{$i}}.{{$res->name}}</a></h5>
  <img class="card-img-top img-thumbnail" src="{{ asset("storage/images/restaurant/{$res->image}") }}" alt="Card image cap">
  <div class="card-body">
      <p class="card-text"><small class=""><i class="fa fa-map-marker" style="color:red"></i>{{$res->address}} <i class="fa fa-envelope" style="color:red"></i> {{$res->email}}</small></p>
    <p class="card-text">{{Str::limit($res->body, 300)}}</p>
    <a class="btn btn-primary1" href="/laravel-project/restro-en/public/show/{{$res->id}}" role="button">Read More</a>
  </div>
  @php
  $i++
  @endphp
  @endforeach

@else
<h3 style="font-family:Times New Roman">No restaurants to show</h3><hr>
@endif
@endsection

@section('map')
<div class="col-md-4 col-sm-12 sidebar-contain" id="map" style="position:fixed"></div>
@endsection

@section('pagination')
<nav aria-label="Page navigation example">

  <ul class="pagination justify-content-center">

    @php
      $perPage = 4;
      $no_of_page = ceil($total_res/$perPage);
      $index = app('request')->input('page');
    @endphp

    @if($index >= 2)
    <li class="page-item">
      <a class="page-link" href="index?page={{$index - 1}}" tabindex="-1">Previous</a>
    </li>
    @else 
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    @endif

    @for($i=1; $i<=$no_of_page; $i++)
      @if($index == $i)
        <li class="page-item"><a class=" active-link page-link" href="index?page={{$i}}">{{$i}}</a></li>
      @else
        <li class="page-item"><a class="page-link" href="index?page={{$i}}">{{$i}}</a></li>
      @endif 
    @endfor

    @if($index < $no_of_page)
    <li class="page-item">
      <a class="page-link" href="index?page={{$index + 1}}">Next</a>
    </li> 
    @else
      <li class="page-item disabled">
      <a class="page-link" href="index?page={{$index + 1}}">Next</a>
    </li> 
    @endif

  </ul>
</nav>
@endsection
@section('bottomfooter')
  <!-- Footer -->
        <footer class="page-footer font-small unique-color-dark wrapper">

        <div style="background-color: #6351ce;">
            <div class="container">

            <!-- Grid row-->
            <div class="row py-4 d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                <h6 class="mb-0">Get connected with us on social networks!</h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 col-lg-7 text-center text-md-right">

                <!-- Facebook -->
                <a class="fb-ic">
                    <i class="fab fa-facebook-f white-text mr-4"> </i>
                </a>
                <!-- Twitter -->
                <a class="tw-ic">
                    <i class="fab fa-twitter white-text mr-4"> </i>
                </a>
                <!-- Google +-->
                <a class="gplus-ic">
                    <i class="fab fa-google-plus-g white-text mr-4"> </i>
                </a>
                <!--Linkedin -->
                <a class="li-ic">
                    <i class="fab fa-linkedin-in white-text mr-4"> </i>
                </a>
                <!--Instagram-->
                <a class="ins-ic">
                    <i class="fab fa-instagram white-text"> </i>
                </a>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

            </div>
        </div>

        <!-- Footer Links -->
        <div class="container text-center text-md-left mt-5">

            <!-- Grid row -->
            <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                <!-- Content -->
                <h6 class="text-uppercase font-weight-bold">Restro</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                consectetur
                adipisicing elit.</p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Products</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                <a href="#!">MDBootstrap</a>
                </p>
                <p>
                <a href="#!">MDWordPress</a>
                </p>
                <p>
                <a href="#!">BrandFlow</a>
                </p>
                <p>
                <a href="#!">Bootstrap Angular</a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                <a href="#!">Your Account</a>
                </p>
                <p>
                <a href="#!">Become an Affiliate</a>
                </p>
                <p>
                <a href="#!">Shipping Rates</a>
                </p>
                <p>
                <a href="#!">Help</a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                <p>
                <i class="fas fa-envelope mr-3"></i> info@example.com</p>
                <p>
                <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                <p>
                <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

            </div>
            <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Restro
            <a href="https://mdbootstrap.com/"> restro@123@gmail.com</a>
        </div>
        <!-- Copyright -->

        </footer>
<!-- Footer -->
@endsection

@section('sidebar')
    <div class="list-group sticky-top">
            @foreach ($restaurants as $res)
        <a href="/laravel-project/restro-en/public/show/{{$res->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-2 h5">{{$res->name}}</h5>
        </div>
        <p class="mb-2">{{Str::limit($res->body, 100)}}</p>
        <small>{{$res->email}}</small>
        </a>
        @endforeach
    
     <ul class="list-group list-group-flush">
  <ul class="list-group">
    <li class="list-group-item">
      <a href=""><i class="fab fa-facebook-f" style="color:blue"></i></a> Facebook
    </li>
    <li class="list-group-item">
      <a href=""><i class="fab fa-twitter" style="color:blue"></i></a> Twitter
    </li>
    <li class="list-group-item">
      <a href=""><i class="fab fa-linkedin-in" style="color:blue"></i></a> Linkedin
    </li>
    <li class="list-group-item">
      <a href=""><i class="fab fa-slack-hash" style="color:orange"></i></a> Slack
    </li>
    <li class="list-group-item">
      <a href=""><i class="fab fa-youtube" style="color:red"></i></a> Youtube
    </li>
  </ul>
</ul> 
    </div>
@endsection

