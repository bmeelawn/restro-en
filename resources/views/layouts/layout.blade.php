<x-header />
    <x-navbar />

        <!-- Content-->
        <div class="container">
            <div class = "row">
                <div class="col-md-8">
                    @yield('content')
                    @yield('pagination')
                </div>
                <div class="col-md-4">
                    @yield('sidebar')
                </div>
            </div>
        </div>
         <!-- Content -->

        @yield('bottomfooter')

<x-footer/>