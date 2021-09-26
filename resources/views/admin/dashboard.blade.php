@extends('layouts.admin')
@section('content')
<!--start-->

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
      <div class="col-sm-12" style="min-height: 1000px;">
        <!--start-->
       @php
       //print_r($studio_list);
       @endphp
      
        @foreach($studio_list as $lists)
        
        @endforeach
        <!--end-->
        
         <div id="page-wrapper">
      <div class="main-page">
        <div class="four-grids">
          <div class="col-md-2 four-grid" style="background: #68b828;float: left;min-height: 200px;color:white;font-family: cursor;text-align: center;padding-top: 60px;margin-left: 40px;border-radius: 50%;font-family: monospace;">
            <div class="four-grid1">
              <div class="icon">
                <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
              </div>
              <div class="four-text">
                <h5>Total Sale</h5>
                <h5>
                  @php
                    $sum=0;
                    $count=0;
                    foreach($studio_list as $list)
                    {
                  $total=$list->UserSTATUS;
                  //print_r($total);
                  if($total=='Active' || $total=='active')
                  {
                 $totalcount=DB::table('studiolist')->join('payment','studiolist.mobile_no','=','payment.StudioMobileNumber')->where('UserSTATUS','=',$total)->get();
                //print_r($totalcount);
                 $count=count($totalcount);
                }
                  }
                  //print_r($totalcount);
                   print_r($count);
                   
                   @endphp
              </h5>
                <!-- <h5>Amount</h5> -->
                <h5> 

                  @php
              /*
               //  To show Total Amount

                  $sum=0;
                  foreach($totalcount as $totals)
                  {
                    $amounts=$totals->AmountPaid;
                    $sum=$sum+$amounts;
                   }
                  echo $sum;
                 */
                  @endphp
                   </h5>
                
              </div>
            <!--   <a href="#" data-toggle="modal" data-target="#myModal1">More Info</a> -->
            </div>
          </div>
          <div class="col-md-2 four-grid" style="background: #8080c0;float: left;margin-left:  20px;min-height: 200px;color:white;font-family: cursor;text-align: center;padding-top: 60px;border-radius: 50%;font-family: monospace;">
            <div class="four-grid2">
              <div class="icon">
                <i class="glyphicon glyphicon-align-justify " aria-hidden="true"></i>
              </div>
              <div class="four-text">
                <h5>Average Sale</h5>
                
                <h5>
                 @php
                    $sum=0;
                    $count=0;
                    foreach($studio_list as $list)
                    {
                  $total=$list->UserSTATUS;
                  //print_r($total);
                  if($total=='Active' || $total=='active')
                  {
                 $totalcount=DB::table('studiolist')->join('payment','studiolist.mobile_no','=','payment.StudioMobileNumber')->where('UserSTATUS','=',$total)->get();
                //print_r($totalcount);
                 $count=count($totalcount);
                }
                  }
                  //print_r($totalcount);
                   print_r($count/$count);
                   
                   @endphp 
          
                </h5>
              <!--   <h5>Amount</h5> -->
                <h5> 
                 @php
                 /*
                  $sum=0;
                  foreach($sale as $todaysale)
                  {
                   $AmountPaid=$todaysale->AmountPaid;
                   $sum=$sum+$AmountPaid;
                   //print_r($AmountPaid); 

                    
                  }
                  echo $sum;
                  */
                 @endphp
                 </h5>
                
              </div>
              <!-- <a href="#" data-toggle="modal" data-target="#myModal1">More Info</a> -->
            </div>
          </div>
          <div class="col-md-2 four-grid" style="background: #7c38bc;float: left;margin-left:  30px;min-height: 200px;color:white;font-family: cursor;text-align: center;padding-top: 60px;border-radius: 50%;font-family: monospace;">
            <div class="four-grid2">
              <div class="icon">
                <i class="glyphicon glyphicon-align-justify " aria-hidden="true"></i>
              </div>
              <div class="four-text">
                <h5>Today Sale</h5>
                <p>
                 
                      
                  
                </p>
                <h5>
                  @php
                  $mytime = Carbon\Carbon::now();
                  $dates= $mytime->toDateTimeString();
                  $dat=explode(" ",$dates);
                 //print_r($dat[0]);
                  $sale=DB::table('detail')->whereDate('created_at', Carbon\Carbon::today())->where('UserSTATUS','=','Active')->get();
                  //print_r($sale);
                  $count=count($sale);
                  echo $count;

           @endphp
          
                </h5>
                <!-- <h5>Amount</h5> -->
                <h5> 
                 @php
                 /*
                  $sum=0;
                  foreach($sale as $todaysale)
                  {
                   $AmountPaid=$todaysale->AmountPaid;
                   $sum=$sum+$AmountPaid;
                   //print_r($AmountPaid); 

                    
                  }
                  echo $sum;
                  */
                 @endphp
                 </h5>
                
              </div>
<!--               <a href="#" data-toggle="modal" data-target="#myModal1">More Info</a> -->
            </div>
          </div>
          <div class="col-md-2 four-grid" style="background: #0e62c7;float: left;margin-left:  30px;min-height: 200px;color:white;font-family: cursor;text-align: center;padding-top: 60px;border-radius: 50%;font-family: monospace;">
            <div class="four-grid3">
              <div class="icon">
                <i class="glyphicon glyphicon-bell" aria-hidden="true"></i>
              </div>
              <div class="four-text">
                <h5>Total Ebook</h5>
                <h5>
                @php
                  $sum=0;
                  foreach($totalcount as $totals)
                  {
                    $amounts=(int)$totals->AmountPaidFor;
                    

                    $sum=$sum+$amounts;
                    
                  }
                  echo $sum;
                 
                     @endphp 
                </h5>
                
                
              </div>
              <!-- <a href="#" data-toggle="modal" data-target="#myModal1">More Info</a> -->
            </div>
          </div>
          <div class="col-md-2 four-grid" style="background: #f7aa47;float: left;margin-left:  30px;min-height: 200px;color:white;font-family: cursor;text-align: center;padding-top: 60px;border-radius: 50%;font-family: monospace;">
            <div class="four-grid3">
              <div class="icon">
                <i class="glyphicon glyphicon-bell" aria-hidden="true"></i>
              </div>
              <div class="four-text">
                <h5>Under Trial</h5>
                <h5>
                  @php
                  $count=0;
                     foreach($studio_list as $lists)
                       if($lists-> UserSTATUS=='Trial' || $lists-> UserSTATUS=="trial" )

                       {
                          $count++;
                       }
                      echo $count;
                  @endphp 

                </h5>
              </div>
           <!--    <a href="#" data-toggle="modal" data-target="#myModal1">More Info</a> -->
            </div>
          </div>
          
          <div class="clearfix"></div>
        </div>
        
          </div>
        
        </div>
        <!--table-->

        <!--End table-->
         

      </div>
    </div>
        @php
        $detail=DB::table('detail')->distinct()->get(['city']);
        //print_r($detail);
        @endphp

    <div class="row" style="margin-top: -40%;">
      <div class="col-sm-6" style="min-height: 300px;">
           <table border="1" style="margin-top: -250px;" width="100%" >
           <tr>
             <th style="text-align: center;font-family: cursor;">City Name</th>
             <th style="text-align: center;font-family: cursor;">Total sale</th>
             <th style="text-align: center;font-family: cursor;">SW</th>
             <th style="text-align: center;font-family: cursor;">SLW</th>
             <th style="text-align: center;font-family: cursor;">TW</th>
             <th style="text-align: center;font-family: cursor;">TLW</th>
           </tr>

        @foreach($detail as $details)
         
        <tr>
            <td style="padding-left: 30px;"><a href="detail_search?city={{$details->city}}"> {{$details->city}}</a></td>
              <td  style="text-align: center;">
                @php   
                $sale=DB::table('detail')->where('city','=',$details->city)->get();
              $totalno=count($sale);
                print_r($totalno);
              @endphp
            </td>
            <td  style="text-align: center;">
              
               @php 
               /*
              $saleweak=DB::table('detail')->select()->where('created_at','>','DATE_SUB( CURDATE(), INTERVAL 1 WEEK')->where('UserSTATUS','=','Active')->where('city','=',$details->city)->get(['AmountPaidFor','created_at']);
               print_r($saleweak);

                 // DB::select('select * from detail where created_at BETWEEN  //Carbon\Carbon::today(),INTERVAL 1 WEEK ')->get();
              //print_r($saleweak);*/


//start

$mygetdate = \Carbon\Carbon::today()->subDays(7);
$members = DB::table('detail')->where('created_at', '>=', $mygetdate)->where('UserSTATUS','=','Active')->where('city','=',$details->city)->get();
//print_r($members);
$count=0;
foreach($members as $member)
{
$count++;
}
echo $count;







/*
                  $sum=0;  
                $sale=DB::table('detail')->where('city','=',$details->city)->get();
                $cur_date=Carbon\Carbon::now();
                $current_date=$cur_date->toDateTimeString();
                print_r($current_date);
                echo "<br>";
            foreach($sale as $sales)
            {
              $date=(string)$sales->created_at;
              $sum++;
              echo "<br>";
              print_r($date);
              //$final_date = $current_date->diffInDays($date);
              //print_r($final_date);
            }
             
            //echo $sum;*/
              @endphp
            </td>

            <td  style="text-align: center;">
              @php



                    //start

                    $AgoDate=\Carbon\Carbon::now()->subWeek(2)->format('Y-m-d');
                    $Date=\Carbon\Carbon::now()->subWeek()->format('Y-m-d');
                    //print_r($AgoDate);
                    //$currentDate = \Carbon\Carbon::now();
                  
                    $NowDate=\Carbon\Carbon::now()->format('Y-m-d'); 
                    //print_r($Date);

            
                    //$AgoDate = $currentDate->subDays($currentDate->dayOfWeek)->subWeek(); 
                       
                      $res=DB::table('detail')->whereBetween('created_at', array($AgoDate,$Date))->where('UserSTATUS','=','Active')->where('city','=',$details->city)->get();
                      //print_r($res);
                      $count1=0;
                      foreach($res as $ress)
                      {
                        $count1++;
                      }
                    echo $count1;
              @endphp
            </td>
            <td  style="text-align: center;">
              @php
              $mygetdate = \Carbon\Carbon::today()->subDays(7);
                $members = DB::table('detail')->where('created_at', '>=', $mygetdate)->where('UserSTATUS','=','Trial')->where('city','=',$details->city)->get();
                //print_r($members);
                $count=0;
                foreach($members as $member)
                {
                $count++;
                }
                echo $count;
              @endphp
            </td>

            <td  style="text-align: center;">
              @php



                    //start

                    $AgoDate=\Carbon\Carbon::now()->subWeek(2)->format('Y-m-d');
                    $Date=\Carbon\Carbon::now()->subWeek()->format('Y-m-d');
                    //print_r($AgoDate);
                    //$currentDate = \Carbon\Carbon::now();
                  
                    $NowDate=\Carbon\Carbon::now()->format('Y-m-d'); 
                    //print_r($Date);

            
                    //$AgoDate = $currentDate->subDays($currentDate->dayOfWeek)->subWeek(); 
                       
                      $res=DB::table('detail')->whereBetween('created_at', array($AgoDate,$Date))->where('UserSTATUS','=','Trial')->where('city','=',$details->city)->get();
                      //print_r($res);
                      $count1=0;
                      foreach($res as $ress)
                      {
                        $count1++;
                      }
                    echo $count1;
              @endphp
            </td>

            </tr>
            @endforeach 
            
         </table>
      </div>
      <div class="col-sm-6" style="min-height: 300px;">
         <table border="1" style="margin-top: -250px;" width="100%">
           <tr>
             <th style="text-align: center;font-family: cursor;">City Name</th>
             <th style="text-align: center;font-family: cursor;">Payment</th>
             <th style="text-align: center;font-family: cursor;">Balance</th>
             
           </tr>
                
           
        @foreach($detail as $details)
         
        <tr>
            <td style="padding-left: 30px;"><a href="detail_search?city={{$details->city}}"> {{$details->city}}</a></td>
              <td style="text-align: center;">
                @php   
                $sale=DB::table('detail')->where('city','=',$details->city)->get();
              $totalno=count($sale);
                //print_r($totalno);
                $sum=0;
                foreach($sale as $payment)
                {
                  $totalpayment=$payment->AmountPaid;
                 

                 $sum=$sum+$totalpayment;
                  
                }
                print_r($sum);
              @endphp
            </td>
            <td  style="text-align: center;">
              @php   
                $sale=DB::table('detail')->where('city','=',$details->city)->get();
              $totalno=count($sale);
               // print_r($totalno);
               
              $sum=0;
              $sum1=0;
                foreach($sale as $payment)
                {
                  $totalpayment=$payment->AmountPaidFor;
                  //print_r($totalpayment);
                $amount=$payment->AmountPaid;
               // print_r($amount);
                  $sum=$sum+$amount;
                  //print_r($sum);
                   $amount1=(int)$payment->cost;
                 $sum1=$sum1+$amount1;
                 //print_r($sum1);
                 $final=$sum1-$sum;
                 
                    

               }
                print_r($final);
                

               
                
             
              @endphp
            </td>
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