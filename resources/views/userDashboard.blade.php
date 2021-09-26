<!DOCTYPE HTML>
<html>
<head>
<title>japware.com</title>
 <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<meta name="keywords" content="Ultra Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="text/javascript" src="{{url('public/js/jquery-2.1.0.min.js')}}">
  //alert("ok");
</script>
<script type="text/javascript">
     // alert("Ok");
      $(document).ready(function(){
          //alert("Ok");
        $("#input").hide();
         //alert("Ok");
       $("#rdo3").click(function(){
            //alert("Ok"):
            if($(this).is(":checked"))
            {
                $("#input").show();
            }

         });
       $("#rdo1").click(function(){
            //alert("Ok"):
            if($(this).is(":checked"))
            {
                $("#input").hide();
            }
            
         });
       $("#rdo2").click(function(){
            //alert("Ok"):
            if($(this).is(":checked"))
            {
                $("#input").hide();
            }
            
         });



      });
  </script>

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{url('public/css/bootstrap.css')}}" rel="stylesheet" type="text/css" /> -->
    
    <!-- Bars Css -->
    <link rel="stylesheet" href="public/css/bar.css">
    <!--// Bars Css -->
    <!-- Calender Css -->
    <link rel="stylesheet" type="text/css" href="public/css/pignose.calender.css" />
    <!--// Calender Css -->
    <!-- Common Css -->
    <link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="public/css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="public/css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{url('assets/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="{{url('assets/css/style (2).css')}}" rel='stylesheet' type='text/css' />
<!-- <link href="{{url('assets/css/style.css')}}" rel='stylesheet' type='text/css' /> -->
<link href="{{url('assets/css/sb-admin.css')}}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="{{url('assets/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!--skycons-icons-->
<script src="{{url('assets/jss/skycons.js')}}"></script>
<!--//skycons-icons-->

 <!-- js-->
  <script src="{{url('assets/jss/bootstrap.js')}}"></script>
<script src="{{url('assets/jss/jquery-1.11.1.min.js')}}"></script>
<script src="{{url('assets/jss/modernizr.custom.js')}}"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Comfortaa:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic' rel='stylesheet' type='text/css'>
<!--//webfonts-->  
<!-- Metis Menu -->
<script src="{{url('assets/jss/metisMenu.min.js')}}"></script>
<script src="{{url('assets/jss/custom.js')}}"></script>
<link href="{{url('assets/css/custom (2).css')}}" rel="stylesheet">
<!--//Metis Menu -->
<link href="{{url('assets/css/jquerysctipttop.css')}}" rel="stylesheet" type="text/css">
<script src="{{url('assets/jss/jquery.sparkline.min.js')}}"></script>

</head> 
<body class="cbp-spmenu-push">
  <div class="main-content">
    <!--left-fixed -navigation-->
    
    <!--left-fixed -navigation-->
    <!-- header-starts -->
    <div class="sticky-header header-section " style="background: #00c887;" >
      <div class="header-left">
        <!--logo -->
        @php
    $session = Session::all();
    //print_r( $session['studio_id']);
    @endphp
        <div class="logo11" style="padding-top: 20px;padding-left: 20px;">
          <a href="{{url('/user_dashboard')}}" style="color: white;"><h2><b>{{$session['studio_name']}}</b></h2></a>
        </div>
        <!--//logo-->
          <div class="user-right">
                                                      
               </div>
        <div class="clearfix"> </div>
      </div>
      <div class="profile_medile"><!--notifications of menu start -->
        
      </div>
      <div class="header-right">
          <!--toggle button start-->

          <div class="user-right" style="padding-top: 28px; float: right;padding-right: 20px;">
          
        <a href="{{url('studioLogout')}}" class=" Logout" style=" padding-left: 20px;font-size: 20px; font-family: cursor; text-decoration: none;color: #fff;"><i class="fa fa-sign-out"></i>Logout</a>

                                 
                </div>    
                                        
        <button id="showLeft" data-toggle="modal" data-target="#adddistributor" style="font-size: 20px;font-family: cursor;text-decoration: none; float: right;color: #fff;background: #00c88703;">Add Payment</i></button>
          

        <div class="clearfix"> </div>
         
        <!--toggle button end-->
      </div>
      <div class="clearfix"> </div> 
    </div>
    <!-- //header-ends -->
    @if (session('error'))
  <div class="alert alert-danger" role="alert">
    <strong>{{ session('error') }}</strong>
  </div>
  @endif
    <div id="page-wrapper">
      <div class="main-page">
        <div class="row">
          <div class="col-md-6">
            <div class="four-grids">
          @php
              $session = Session::all();
              // print_r($session);die();

         
            @endphp
          <div class="row">
            <div class="col-xl-12">
                 <div class="outer-w3-agile col-xl">
                        
                       
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Software Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                  <tr>
                                    <th>ID</th>
                                    <th>Event Name</th>
                                    <th>Created date</th>
                                  </tr>
                                </tfoot> -->
                                <tbody>
                                    @php
                                    $software_path = Config::get('app.SOFTWARE_PATH');
                                    $software=DB::table('software')->get();
                                    @endphp
                                    @foreach($software as $item)
                                    @if($item->IsActive==1)
                                    <tr>
                                        <td>{{$item->sw_name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>
                                            <a href="{{$software_path.$item->file_name}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Software Download">
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                   </div>
               </div>

          
          
          <div class="clearfix"></div>
            </div>
            

          </div>
          
          <div class="col-md-6">
          <div class="four-grids">
         
          <div class="row">
            <div class="col-xl-12">
                 <div class="outer-w3-agile col-xl">
                        <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-primary" style="margin-bottom: 20px;">
                            <div class="s-l" style="float: left;padding-top:  10px;">
                                <h5 style="padding-left: 20px;">Customers</h5>
                                <p class="paragraph-agileits-w3layouts text-white">Japware</p>
                            </div>
                            <div class="s-r" style="    padding-top: 20px;">
                                <h6 style="padding-left: 20px;padding-bottom: 20px;">
                                    <i class="far fa-edit"></i>
                                
                                
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-success" style="background: #219e1f;margin-bottom: 20px;">
                            <div class="s-l" style="float: left;padding-top:  10px;">
                                <h5 style="padding-left: 20px;">Ebook Sharing</h5>
                                <p class="paragraph-agileits-w3layouts">Japware</p>
                            </div>
                            <div class="s-r" style="    padding-top: 20px;">
                                <h6 style="padding-left: 20px;padding-bottom: 20px;">
                                    <i class="far fa-smile"></i>
                                </h6>
                            </div>
                        </div>
                        
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-warning" style="background: #e0db2e;">
                            <div class="s-l" style="float: left;padding-top:  10px;">
                                
                                 
                            
                                <p class="paragraph-agileits-w3layouts" style="padding-top: 10px;padding-left: 20px;">Japware</p>
                            </div>
                            <div class="s-r"  style="    padding-top: 20px;">
                                <h6 style="padding-left: 20px;padding-bottom: 20px;">0
                                    <i class="fas fa-users"></i>
                                </h6>
                            </div>
                        </div>
                      </div>
                     </div>
                   </div>


<div class="clearfix"></div>


<!-- model -->
                    <div class="modal fade" id="adddistributor" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title"><center>Under Info</center> </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          </div>
                          <div class="modal-body">
                         
                          @php 
                              $session = Session::all();
                              //print_r($session);
                              $mobile=session()->get('mobile');
                              //print_r($mobile);
                              $user=DB::table('payment')->where('StudioMobileNumber','=',$mobile)->get()->toArray();
                            // print_r($user);

                              @endphp
                              @foreach($user as $software)
                              
                              @endforeach
                            <form action="updateCollectedBy?id={{$software->Payment_Id}}" method="post">
                              {{csrf_field() }}
                              <div class="form-group">
                             
                              
                                
                                <label for="functiondate">Meri photo book</label><br>
                                <input type="radio" name="software" value="50book" id="rdo1" <?php if($software->AmountPaidFor=='50book') echo "checked='checked'";?>><b>50 book</b>
                                <input type="radio" name="software" value="100book" id="rdo2" <?php if($software->AmountPaidFor=='100book') echo "checked='checked'";?>><b>100 book</b>
                                <input type="radio" name="software" value="" id="rdo3" <?php if($software->AmountPaidFor!='50book' && $software->AmountPaidFor!= '100book') echo "checked='checked'";?>><b>Other</b>
                                <input type="text" name="other" id="input" value="{{$software->AmountPaidFor}}" checked>
                                
                              </div>
                              <div class="form-group">
                                 @php
                                 $distributor=DB::table('distributor')->get();
                                // print_r($distributor);
                                 @endphp
                                <label for="functiondate">Distributor</label>
                                <select class="form-control" name="distributor">
                                  
                                  <option value="{{$software->CollectionPlace}}">{{$software->CollectionPlace}}</option>
                                  @foreach($distributor as $dist)
                                  <option value="{{$dist->DistributorName}}">{{$dist->DistributorName}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="functiondate">Collected By</label>
                                <input type="text" class="form-control" name="collectedby" value="{{$software->CollectedBy}}">
                              </div>
                              <div class="form-group">
                                <label for="functiondate">Amount</label>
                                <input type="text" class="form-control" name="amount" value="{{$software->AmountPaid}}">
                              </div>
                              <div class="form-group">
                                <label for="functiondate">Remark</label>
                                <input type="text" class="form-control" name="remark" value="{{$software->Remark}}">
                              </div>   
                        
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" >Update</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    <!-- end model -->

        </div>

        </div>
        </div>
      
  </div>
    
                <div class="copy-section1" style="background: #000;color: #fff; min-height: 60px;text-align: center;line-height: 60px;">
                           <p>Copyright © Japware.com</p>
                         </div>
  
        
      <!-- Classie -->
        <script src="{{url('assets/jss/classie.js')}}"></script>
        <script>
          var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
            showLeftPush = document.getElementById( 'showLeftPush' ),
            body = document.body;
            
          showLeftPush.onclick = function() {
            classie.toggle( this, 'active' );
            classie.toggle( body, 'cbp-spmenu-push-toright' );
            classie.toggle( menuLeft, 'cbp-spmenu-open' );
            disableOther( 'showLeftPush' );
          };
          

          function disableOther( button ) {
            if( button !== 'showLeftPush' ) {
              classie.toggle( showLeftPush, 'disabled' );
            }
          }
        </script>
      <!-- Bootstrap Core JavaScript --> 
        
        <script type="text/javascript" src="{{url('assets/jss/bootstrap.min.js')}}"></script>
        <!--scrolling js-->
        <script src="{{url('assets/jss/jquery.nicescroll.js')}}"></script>
        <script src="{{url('assets/jss/scripts.js')}}"></script>
        
        <!--//scrolling js-->
        

      <!-- //Register -->
<script type="text/javascript">
    $('#payment_tenure').on('change', function(){
      var selected_month = $('#payment_tenure').val();
      var moneytopay = '{{Config::get('app.payment_money')}}';
      var installment_money = moneytopay/selected_month;
      $('#amount').val(installment_money);

    });
  </script>

</body>
</html>

