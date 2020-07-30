    <!-- Side bar -->
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

<!-- Side bar -->

