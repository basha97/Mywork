

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />

    <link href="{{ URL::asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ URL::asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ URL::asset('pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="{{ URL::asset('pages/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    
    @yield('page-level-css')

  </head>
  <body class="fixed-header menu-pin" ng-app="ezrecruit">
    @include('includes.sidebar')
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      @include('includes.header')
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START JUMBOTRON -->
          @include('includes.breadcrumb')
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class=" container-fluid   container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <!-- END PLACE PAGE CONTENT HERE -->@yield('content')
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->
        @include('includes.footer')
    </div>
    <!-- END PAGE CONTAINER -->
    @include('includes.quickView')
    @include('includes.search')

    <!-- BEGIN VENDOR JS -->
    <script src="{{ URL::asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/jquery/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/tether/js/tether.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script  src="{{ URL::asset('assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script  src="{{ URL::asset('assets/plugins/classie/classie.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
    

    
    <!-- END VENDOR JS -->
    
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{ URL::asset('pages/js/pages.min.js') }}"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ URL::asset('assets/js/scripts.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script src="{{  URL::asset('assets/js/angular.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{  URL::asset('assets/js/sortable.js') }}" type="text/javascript"></script>
    @yield('page-level-scripts')    
    <!-- END PAGE LEVEL JS -->

    <script>
        var app = angular.module('ezrecruit', ['ui.sortable']);
    </script>
    @yield('scripts')
  </body>
</html>