@extends('layouts.customer_guide')
@section('content')

    <!-- Bootstrap core CSS-->
    <!-- <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/sweetalert.css')}}">
        <!-- datepicker CSS-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!-- Bootstrap core CSS-->
        <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- fontawesome core CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Custom fonts for this template-->
        <link href="{{url('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="{{url('assets/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">


        <!-- Custom styles for this template-->
        <link href="{{url('assets/css/sb-admin.css')}}" rel="stylesheet">
        <link href="{{url('public/css/app.css')}}" rel="stylesheet">
   <div class="container-fluid">     
<div class="row" style="padding:0px;margin:0px;">
<div class="col-sm-12" style="background:white;min-height:380px;padding-top:100px;">
   	<h1>User Guide</h1>
   	<center>
<a href="{{url('customer/home-page?studio_id='.$functiondetail[0]->Studio_Id.'&customer_id='.$functiondetail[0]->customer_id.'&function_id='.$functiondetail[0]->id)}}"><button >Home page</button></a> </center>
</div>
</div>
</div>
@endsection
