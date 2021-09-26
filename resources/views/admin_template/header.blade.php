<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>Studio Admin</title>

<!-- Date picker CSS-->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- Bootstrap core CSS-->
  <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="{{url('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{url('assets/css/sb-admin1.css')}}" rel="stylesheet">
  <style type="text/css">
    a.admin_menu {
      color: #fbf8f8;
      font-size: 500;
      font-size: larger;
    }
    /*.submenu_c li :hover{
      background-color: #c2e4f5f0;
    }*/
    .submenu_c li a{
      color: #212223;
      text-decoration: none;
    }
    .submenu_c .admin_page{
      text-align: left;
      margin-left: 20px;
      margin-bottom: 5px;
      margin-right: 10px;
    }
    

  </style>
</head>

<body id="page-top">
 <div class="row bg-dark">
  <div class="col-md-10">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="{{url('admin_dashboard')}}">Admin</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <ul class="nav navbar-nav">
      
      <li class="dropdown"><a class="dropdown-toggle admin_menu" data-toggle="dropdown" href="#" id="dropmenu1">Master<span class="caret"></span></a>
        <ul class="dropdown-menu submenu_c">
          <li class="admin_page"><a href="{{url('/admin_dashboard')}}">Studio</a></li>
          <li class="admin_page"><a href="{{url('admin/distributer')}}">Distributer</a></li>
          <li class="admin_page"><a href="{{url('admin/addtemplate')}}">Add Template</a></li>
        </ul>
      </li>
      
      <li class="dropdown"><a class="dropdown-toggle admin_menu" data-toggle="dropdown" href="#" id="dropmenu2">Customer<span class="caret"></span></a>
        <ul class="dropdown-menu submenu_c">
            <li class="admin_page"><a href="{{url('admin/customers')}}">Customer</a></li>
          <li class="admin_page"><a href="{{url('admin/eventname')}}">Function Type & Name</a></li>
        </ul>
      </li>
      
      <li class="dropdown"><a class="dropdown-toggle admin_menu" data-toggle="dropdown" href="#" id="dropmenu3">Payment Details<span class="caret"></span></a>
        <ul class="dropdown-menu submenu_c" >
          <li class="admin_page"><a href="{{url('admin/paymentdetails')}}" >Payment Details</a></li>
          <li class="admin_page"><a href="{{url('admin/paymentform')}}">Cash Payment Form</a></li>
           <li class="admin_page"><a href="{{url('admin/dailycode')}}">CVV No</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle admin_menu" data-toggle="dropdown" href="#" id="dropmenu1">More<span class="caret"></span></a>
        <ul class="dropdown-menu submenu_c">
         <li class="admin_page"><a href="{{url('admin/dashboard_table')}}">Studio Info</a></li>
         
        </ul>
      </li>
    </ul>
    </div>
    <!-- Navbar -->
    <div class="col-md-2">
      <ul class="navbar-nav ml-auto ml-md-0 bg-dark">
        <li class="nav-item dropdown no-arrow ">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
  </nav>

