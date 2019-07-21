<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!--head-->
@include('layouts.partials.head')
<body>
<div id="wrapper">

    <!----->
    <nav class="navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="">ADMIN</a></h1>
        </div>
        <div class=" border-bottom">
            <div class="full-left">
                <form class=" navbar-left-right">
                    <input type="text" value="Search..." onfocus="this.value = '';"
                           onblur="if (this.value =='') {this.value = 'Search...';}">
                    <input type="submit" value="" class="fa fa-search">
                </form>
                <div class="clearfix"></div>
            </div>


            <!-- Brand and toggle get grouped for better mobile display -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="drop-men">
                <ul class=" nav_1">

                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="clearfix">

            </div>
            <!--navbar-->
            @include('layouts.partials.navbar')
            <!--navbar-->

        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">
            @yield('content')
            <!---->
            <div class="copy">
                <p> &copy; 2019 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/"
                                                                            target="_blank">W3layouts</a></p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!---->
<!--scrolling js-->
<script src="{{asset('web/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('web/js/scripts.js')}}"></script>
<!--//scrolling js-->
<script src="{{asset('web/js/bootstrap.min.js')}}"></script>
</body>
</html>

