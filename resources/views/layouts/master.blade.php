<!-- 3GX Hulugan V2.1 -->
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>3GX Hulugan | @yield('title')</title>

    <!-- Load CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/plugins/dyscrollup/dyscrollup.css">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
</head>
<body class="">
    <div id="wrapper"> 

        <!-- Sidebar -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="profile-element">
                            <span>
                                <!-- Display Logo -->
                                <img  alt="image" src="img/home-logo-medium.png"/>
                            </span>
                            <a href="{{ url('system-user/profile') }}" align="middle">
                                <span class="clear">
                                    <!-- Display Current User and Role -->
                                    <span class="block m-t-xs"><strong class="font-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong></span>
                                    <span class="text-muted text-xs block">IT Administrator</span>
                                </span>
                            </a>
                        </div>
                        <!-- end profile details -->
                        <div class="logo-element">
                            <!-- Diplay Logo when the sidebar is minimized -->
                            <img alt="image" class="img-circle" src="img/home-logo-small.png" />
                        </div>
                    </li>
                    <!-- end Sidebar header -->
                    <li class="{{Request::path() == 'home' ? 'active' : '' }}">

                        <a href="{{ url('home') }}"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
                    </li>
                    <li class="{{Request::path() == 'products' ? 'active' : '' }}">
                        <a href="{{ url('products') }}"><i class="fa fa-diamond"></i> <span class="nav-label">Products</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-comments"></i> <span class="nav-label">Inquiries</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('/customers') }}"><i class="fa fa-plus-circle"></i>Create New</a></li>
                            <li><a href="{{ url('/customers/getinquirylist') }}"><i class="fa fa-comments-o"></i>Inquiries</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-tasks"></i> <span class="nav-label">Loan Applications</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('/customers/getinquirylist') }}"><i class="fa fa-plus-circle"></i>Create New</a></li>
                            <li><a href="{{ url('applications/for-ci-investigation') }}"><i class="fa fa-gavel"></i>For Investigation</a></li>
                            <li><a href="{{ url('applications/for-auditing') }}"><i class="fa fa-id-card-o"></i>For Auditing</a></li>
                            <li><a href="{{ url('applications/for-admin-approval') }}"><i class="fa fa-thumbs-o-up"></i>For Admin Aproval</a></li>
                            <li><a href="{{ url('applications/for-release') }}"><i class="fa fa-truck"></i>For Release</a></li>
                            <li><a href="{{ url('applications/borrowers') }}"><i class="fa fa-shopping-basket"></i>Borrowers</a></li>
                            <li><a href="{{ url('applications/for-release') }}"><i class="fa fa-thumbs-o-down"></i>Declined</a></li>
                            <li><a href="{{ url('applications/pulled-out') }}"><i class="fa fa-ban"></i>Pulled Out</a></li>
                            <li><a href="{{ url('applications/cancelled') }}"><i class="fa fa-times-rectangle"></i>Cancelled</a></li>
                            <li><a href="{{ url('applications/fully-paid') }}"><i class="fa fa-check"></i>Fully Paid</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Customers</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('applicants/inquirers') }}"><i class="fa fa-comments"></i>Inquirers</a></li>
                            <li><a href="{{ url('applicants/principals') }}"><i class="fa fa-user"></i>Principal Applicants</a></li>
                            <li><a href="{{ url('applicants/borrowers') }}"><i class="fa fa-shopping-basket"></i>Borrowers</a></li>
                            <li><a href="{{ url('applicants/fully-paid') }}"><i class="fa fa-check"></i>Fully Paid</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('system-users') }}""><i class="fa fa-user-circle-o"></i><span class="nav-label">System Users</span></a></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-info-circle"></i> <span class="nav-label">Reports</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('reports/') }}"><i class="fa fa-info-circle"></i>Soon..</a></li>
                            <li><a href="{{ url('reports/') }} }}"><i class="fa fa-info-circle"></i>Soon..</a></li>
                        </ul>
                    </li>
                <!-- end Metis Menu-->
                </ul>
            <!-- end Sibebar collapse -->
            </div>
        <!-- end Sibebar -->
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <!-- Topbar -->
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="{{ url('search_results') }}">
                <div class="form-group">
                    <input type="text" placeholder="Search Something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <!-- end topbar header -->
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to 3GX Hulugan</span>
                </li>
                <li>
                    <a class="count-info" href="{{ url('sms') }}">
                        <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                    </a>
                </li>
                <li>
                    <a class="count-info" target="_blank" href="http://3gxhulugan.com/">
                        <i class="fa fa-question-circle"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </nav>
        <!-- end Topbar -->
        </div>
        <!-- end row -->

        @if(Session::has('message'))
            <div class="alert alert-info">
              {{Session::get('message')}}
            </div>
        @endif

        <!-- Main Page Content -->
        @section('page-content')
        @show

        <!-- footer -->
        <div class="footer">
            <div class="pull-right">
                <strong>Copyright</strong> 3GX Computers and IT Solutions &copy; 2017
            </div>
        </div>

        </div>
        <!-- end page wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- Data picker -->

    <!--steps-->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>
    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>
    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>


    <!-- initialize sroll-to-top button -->
    <script src="js/plugins/dyscrollup/dyscrollup.js"></script>
    <script>dyscrollup.init();</script>
    
 @stack('scripts')
</body>
</html>