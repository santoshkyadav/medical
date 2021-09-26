@extends('layouts.admin')
@section('content')
<!--start-->
<script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>

<script src="{{url('public\js\jquery-2.1.0.min.js')}}"></script>
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
     // alert("Ok");

      $(document).ready(function(){
$("#selectstate").change(function(){
   // alert("Ok");
        var sid=$("#selectstate").val();
        $("#selectcity").children('option:not(:first)').remove();
          $("#tabledetail").find("tr:gt(0)").remove();
          if(sid!="")
            { 
                $.ajax({
                   type:'POST',
                   url:'selectstate',
                   data:{'id': sid},
                   headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                   success:function(response) {
                        // console.log(response.result);
                        var res = response.result;
                         var res1 = response.result1;
                        //console.log(res);
                        //var response = res.data;
                         //console.log(res);
                       $.each(res, function(i, item){
                          // console.log(item.CityName);
                         $("#selectcity").append('<option value='+ item.CityName +'> '+item.CityName+'</option>'); 
                      }); 
                        $.each(res1, function(i, item){
                        
                         
                          // console.log(item.CityName);
                         // $("#showdetail").append('<option value='+ item.CityName +'> '+item.CityName+'</option>'); 
                          $("#tabledetail").append('<tr id="tr1"><td> '+item.studio_name+'</td><td> '+item.name+'</td><td> '+item.mobile_no+'</td><td> '+item.city+'</td><td> '+item.state+'</td><td> '+item.AmountPaid+'</td><td> '+item.AmountPaidFor+'</td><td> '+item.CollectionPlace+'</td></tr>'); 
                      }); 
                             
                   }
                });
            }
      });
$("#selectcity").change(function(){
        var city=$("#selectcity").val();
  //$("#row1").remove();       
  //$("#tr1").remove();
   $("#tabledetail").find("tr:gt(0)").remove();
         
        //alert(city);
          if(city!="")
            { 

                $.ajax({
                   type:'POST',
                   url:'selectdetail',
                   data:{'city': city},
                   headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                   success:function(response) {
                        // console.log(response.result);
                        var res = response.result;
                        //console.log(res);
                        //var response = res.data;
                         //console.log(res);
                       $.each(res, function(i, item){
                        
                         
                          // console.log(item.CityName);
                         // $("#showdetail").append('<option value='+ item.CityName +'> '+item.CityName+'</option>'); 
                          $("#tabledetail").append('<tr id="tr1"><td> '+item.studio_name+'</td><td> '+item.name+'</td><td> '+item.mobile_no+'</td><td> '+item.city+'</td><td> '+item.state+'</td><td> '+item.AmountPaid+'</td><td> '+item.AmountPaidFor+'</td><td> '+item.CollectionPlace+'</td></tr>'); 
                      }); 
                            
                            //$("#selectcity").children('option:not(:first)').remove(); 
                   }
                });
            }

      });
$("#distributor1").change(function(){
        var distributor=$("#distributor1").val();
        //alert(distributor);
              //$("#dr1").remove();
              $("#tabledetail").find("tr:gt(0)").remove();
         
        //alert(city);
          if(distributor!="")
            { 

                $.ajax({
                   type:'POST',
                   url:'distributordetail',
                   data:{'distributor': distributor},
                   headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                   success:function(response) {
                        // console.log(response.result);
                        var res = response.result;
                        //console.log(res);
                        //var response = res.data;
                         //console.log(res);
                         //alert(res);
                       $.each(res, function(i, item){
                         
                          // console.log(item.CityName);
                         // $("#showdetail").append('<option value='+ item.CityName +'> '+item.CityName+'</option>'); 
                          $("#tabledetail").append('<tr id="dr1"><td> '+item.studio_name+'</td><td> '+item.name+'</td><td> '+item.mobile_no+'</td><td> '+item.city+'</td><td> '+item.state+'</td><td> '+item.AmountPaid+'</td><td> '+item.AmountPaidFor+'</td><td> '+item.CollectionPlace+'</td></tr>'); 
                      }); 
                            
                            //$("#selectcity").children('option:not(:first)').remove(); 
                   }
                });
            }
           

      });
$("#selecttype").change(function(){
        var selecttype=$("#selecttype").val();
        //alert(type);
              //$("#tr1").remove();
              $("#tabledetail").find("tr:gt(0)").remove();
         
        //alert(city);
          if(selecttype!="")
            { 

                $.ajax({
                   type:'POST',
                   url:'selecttype',
                   data:{'selecttype': selecttype},
                   headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                   success:function(response) {
                        // console.log(response.result);
                        var res = response.result;
                        //console.log(res);
                        //var response = res.data;
                         //console.log(res);
                       $.each(res, function(i, item){
                         
                          // console.log(item.CityName);
                         // $("#showdetail").append('<option value='+ item.CityName +'> '+item.CityName+'</option>'); 
                          $("#tabledetail").append('<tr id="tr1"><td> '+item.studio_name+'</td><td> '+item.name+'</td><td> '+item.mobile_no+'</td><td> '+item.city+'</td><td> '+item.state+'</td><td> '+item.AmountPaid+'</td><td> '+item.AmountPaidFor+'</td><td> '+item.CollectionPlace+'</td></tr>'); 
                      }); 
                            
                            //$("#selectcity").children('option:not(:first)').remove(); 
                   }
                });
            }
           

      });
$("#PaymentStatus").change(function(){
        var status=$("#PaymentStatus").val();

        //$("#tabledetail").remove();
        $("#tabledetail").find("tr:gt(0)").remove();
      
     
     
        // alert(cid);
          if(status!="")
      
            { 
                $.ajax({
                   type:'POST',
                   url:'PaymentStatus',
                   data:{'status': status},
                   headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                   success:function(response) {
                        // console.log(response.result);
                        var res = response.result;
                        //console.log(res);
                        //var response = res.data;
                         //console.log(res);
                       $.each(res, function(i, item){
                          // console.log(item.CityName);
                          $("#tabledetail").append('<tr id="tr" ><td> '+item.studio_name+'</td><td> '+item.name+'</td><td> '+item.mobile_no+'</td><td> '+item.city+'</td><td> '+item.state+'</td><td> '+item.AmountPaid+'</td><td> '+item.AmountPaidFor+'</td><td> '+item.CollectionPlace+'</td></tr>');
                      }); 
                             
                   }
                });
            }

      });
});
  </script>
<!--end
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
    
    </ol>
  </div>
  <!-- /.container-fluid -->
  @if (session('error'))
  <div class="alert alert-danger" role="alert">
    <strong>{{ session('error') }}</strong>
  </div>
  @endif
  @if (session('success'))
  <div class="alert alert-success" role="alert">
    <strong>{{ session('success') }}</strong>
  </div>
  @endif


 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <h4 style="text-align: center;">Search Record</h4>
    </div>
  </div>
  <div class="row">
   <div class="col-sm-12" style="min-height: 80px; background: #e9ecef;padding: 0px;margin: 0px;text-align: center;padding-top: 20px;">
    <label>State</label>
    @php
    $state=DB::table('state')->orderBy('StateName', 'asc')->get();
    @endphp
    <select  id="selectstate" name="selectstate" >
      <option value="">Select State</option>
      @foreach($state as $states)
      <option value="{{$states->State_id}}">{{$states->StateName}}</option>
      @endforeach
    </select>
    <label>City</label>
    @php
    $city=DB::table('city')->orderBy('CityName', 'asc')->get();
    @endphp
     <select id="selectcity" name="selectcity">
      <option value="">Select City</option>
      @foreach($city as $cities)
       <option value="{{$cities->CityName}}">{{$cities->CityName}}</option>
      @endforeach
    </select>
    <label>Distributor</label>
    @php
    $distributor=DB::table('distributor')->orderBy('DistributorName', 'asc')->get();
    @endphp
     <select id="distributor1" name="distributor1">
      <option value="">Select Distributor</option>
      @foreach($distributor as $distributors)
      <option value="{{$distributors->DistributorName}}">{{$distributors->DistributorName}}</option>
      @endforeach
    </select>
    <label>Instalation Type</label>
     <select id="selecttype" name="selecttype">
      <option value="">Select Instalation Type</option>
      <option value="Trial">Trial</option>
      <option value="Active">Active</option>
      <option value="Blocked">Blocked</option>
      <option value="Expire">Expire</option>
      <option value="Verified">Verified</option>
    </select>
    <label>Payment Status</label>
     <select id="PaymentStatus" name="PaymentStatus">
      <option value="">Select Payment Status</option>
       <option value="0">Pending</option>
        <option value="1">Success</option>
         <option value="2">Failed</option>
    </select>
   </div>
   </div>
   <div id="mytab">
     
   </div>
  @php
  $city=app('request')->input('city');
  //echo $city;
  $city_detail=DB::table('studio')->join('payment','studio.id','=','payment.Studio_id')->where('city','=',$city)->get();
  //print_r($city_detail);

  @endphp
  <div class="row" style="margin-top: 20px;">
   <div class="col-sm-12" style="min-height: 360px;">
    <table border="1" width="100%" align="center" id="tabledetail">
      <tr id="showdetail" name="showdetail">
        <th style="text-align: center;">Studio Name</th>
        <th style="text-align: center;">Name</th>
        <th style="text-align: center;">Mobile No</th>
        <th style="text-align: center;">City</th>
        <th style="text-align: center;">State</th>
        <th style="text-align: center;">AmountPaid</th>
        <th style="text-align: center;">AmountPaidFor</th>
        <th style="text-align: center;">Distributor</th>
      </tr>
      @foreach($city_detail as $detail)
      <tr id="row1" name="row1">
        <td style="text-align: center;">{{$detail->studio_name}}</td>
         <td style="text-align: center;">{{$detail->name}}</td>
          <td style="text-align: center;">{{$detail->mobile_no}}</td>
           <td style="text-align: center;">{{$detail->city}}</td>
             <td style="text-align: center;">{{$detail->state}}</td>
           <td style="text-align: center;">{{$detail->AmountPaid}}</td>
           <td style="text-align: center;">{{$detail->AmountPaidFor}}</td>
            <td style="text-align: center;">{{$detail->CollectionPlace}}</td>
           
         
      </tr>
      @endforeach
    </table>
   </div>
   </div>
 </div>

  <!-- Sticky Footer -->
        <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Japware.com</span>
          </div>
        </div>
      </footer>

</div>
<!-- /.content-wrapper -->
@endsection