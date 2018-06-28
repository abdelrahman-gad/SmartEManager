<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Projects Manager </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@yield('header')


<style media="screen">
a.title
{
  color: white;
}

/*  css for single user page data */
body {
  background-color: #006666;
}
body * {
  box-sizing: border-box;
}

.header {
  background-color: #327a81;
  color: white;
  font-size: 1.5em;
  padding: 1rem;
  text-align: center;
  text-transform: uppercase;
}

.userimg {
  border-radius: 50%;
  height: 60px;
  width: 60px;
}

.table-users {
  border: 1px solid #327a81;
  border-radius: 10px;
  box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
  max-width: calc(100% - 2em);
  margin: 1em auto;
  overflow: hidden;
  width: 800px;
}

table {
  width: 100%;
}
table td, table th {
  color: #2b686e;
  padding: 10px;
}
table td {
  text-align: center;
  vertical-align: middle;
}
table td:last-child {
  font-size: 0.95em;
  line-height: 1.4;
  text-align: left;
}
table th {
  background-color: #daeff1;
  font-weight: 300;
}
table tr:nth-child(2n) {
  background-color: white;
}
table tr:nth-child(2n+1) {
  background-color: #edf7f8;
}

@media screen and (max-width: 700px) {
  table, tr, td {
    display: block;
  }

  td:first-child {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
    width: 100px;
  }
  td:not(:first-child) {
    clear: both;
    margin-left: 100px;
    padding: 4px 20px 4px 90px;
    position: relative;
    text-align: left;
  }
  td:not(:first-child):before {
    color: #91ced4;
    content: '';
    display: block;
    left: 0;
    position: absolute;
  }
  td:nth-child(2):before {
    content: 'Name:';
  }
  td:nth-child(3):before {
    content: 'Email:';
  }
  td:nth-child(4):before {
    content: 'Phone:';
  }
  td:nth-child(5):before {
    content: 'Comments:';
  }

  tr {
    padding: 10px 0;
    position: relative;
  }
  tr:first-child {
    display: none;
  }
}
@media screen and (max-width: 500px) {
  .header {
    background-color: transparent;
    color: white;
    font-size: 2em;
    font-weight: 700;
    padding: 0;
    text-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
  }

  .userimg {
    border: 3px solid;
    border-color: #daeff1;
    height: 100px;
    margin: 0.5rem 0;
    width: 100px;
  }

  td:first-child {
    background-color: #c8e7ea;
    border-bottom: 1px solid #91ced4;
    border-radius: 10px 10px 0 0;
    position: relative;
    top: 0;
    -webkit-transform: translateY(0);
            transform: translateY(0);
    width: 100%;
  }
  td:not(:first-child) {
    margin: 0;
    padding: 5px 1em;
    width: 100%;
  }
  td:not(:first-child):before {
    font-size: .8em;
    padding-top: 0.3em;
    position: relative;
  }
  td:last-child {
    padding-bottom: 1rem !important;
  }

  tr {
    background-color: white !important;
    border: 1px solid #6cbec6;
    border-radius: 10px;
    box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
    margin: 0.5rem 0;
    padding: 0;
  }

  .table-users {
    border: none;
    box-shadow: none;
    overflow: visible;
  }
}
/* end single user page data */
.sidebar-module h4
{
  color: #eee;
  font-size: 22px;
}

.sidebar-module li a
{
  color: #ddd;
  font-size: 18px;
  text-decoration: none;
}
.sidebar-module li a:hover
{
  color: 	#fff;
  font-size: 20px;
}
/* End sidebar  */





</style>


    <script src="https://use.fontawesome.com/6141190bc6.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                      Projects Manager
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                        <li> <a href="/pmanager/public/companies"><i class="fa fa-building"> </i> {{trans('manager.companies')}}</a> </li>

                            <li> <a href="/pmanager/public/projects"><i class="fa fa-briefcase"> </i> {{trans('manager.projects')}}</a> </li>
                            <li>  <a href="/pmanager/public/tasks"><i class="fa fa-tasks"> </i> {{trans('manager.tasks')}}</a> </li>

                            @if(Auth::user()->role_id==1)
   <!--start private addition(dropdown) it is only for the Admin  -->

   <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
                                <i class="fa fa-cog"></i>     {{trans('manager.admindashboard')}} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                <li> <a href="/pmanager/public/companies"><i class="fa fa-building"> </i>All Companies </a> </li>

                            <li> <a href="/pmanager/public/projects"><i class="fa fa-briefcase"> </i>All  Projects</a> </li>
                            <li>  <a href="/pmanager/public/tasks"><i class="fa fa-tasks"> </i>All  Tasks</a> </li>
                              <li>  <a href="/pmanager/public/users"><i class="fa fa-tasks"> </i>All Users  </a> </li>


                                </ul>
                            </li>




                           @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li><a   href="/pmanager/public/users/{{Auth::user()->id}}/show"> <i class="fa fa-user">   </i> Profile </a>  </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                                     <i class="fa fa-power-off" aria-hidden="true"></i> {{trans('manager.logout')}}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>


                                </ul>
                            </li>
{{--
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
<i class="fa fa-globe" ></i> {{trans('manager.lang')}} <span class="caret"></span>
</a>
<ul class="dropdown-menu" role="menu">
    <li class="text-center">
       <a href="/pmanager/public/lang/ar"> العربية</a>
    </li>

    <li  class="text-center">  <a href="/pmanager/public/lang/en">English </a>
    </li>
</ul>

</li>
--}}
                        @endif
                    </ul>
                </div>
            </div>
        </nav>











        <div class="container">

{{--

<!-- card -->
          <div class="card transition">
  <h2 class="transition">Awesome Headline</h2>
  <p>Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla.</p>
  <div class="cta-container transition"><a href="#" class="cta">Call to action</a></div>
  <div class="card_circle transition"></div>
</div>
<!-- Card  -->


--}}

   @include('partials.errors')
   @include('partials.success')
        <div class="row">
          @yield('content')
        </div>
        </div>
    </div>

@yield('script')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<!-- Compiled and minified JavaScript -->

<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js" ></script>





</body>
</html>
