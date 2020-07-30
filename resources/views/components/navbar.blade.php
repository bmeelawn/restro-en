   
<!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"  style="font-weight: bold;" href="/laravel-project/restro-en/public/"><img src="{{ asset('storage/images/logo6_1x.jpg') }}" style="width:50;height:50">Restro</a>
        
        <!-- Search form -->
        @yield('search')

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/laravel-project/restro-en/public">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/laravel-project/restro-en/public/list">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/laravel-project/restro-en/public/add">Add</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Search</a>
            </li>

            @if(!session()->get('user'))
            <li class="nav-item">
                <a class="nav-link" href="/laravel-project/restro-en/public/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/laravel-project/restro-en/public/register">Register</a>
            </li>
            @else 
            <li class="nav-item">
                <a class="nav-link" href="/laravel-project/restro-en/public/login">Welcome | {{session()->get('user')[0]['name']}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/laravel-project/restro-en/public/logout">logout</a>
            </li>
            @endif
            </ul>
        </div>
    </nav>
 <!-- Navbar-->