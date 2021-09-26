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
    <div class="col-sm-12">
      <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="font-size: 12px;">SNo</th>
                  <th style="font-size: 12px;">Payment Date</th>
                  <th style="font-size: 12px;">Studio Name</th>
                  <th style="font-size: 12px;">Name</th>
                  
                  <th style="font-size: 12px;">Mobile No.</th>
                  <th style="font-size: 12px;">State</th>
                  <th style="font-size: 12px;">City</th>
                  <th style="font-size: 12px;">Amount
                  PaidFor</th>
                  <th style="font-size: 12px;">Amount Paid</th>
                  <th style="font-size: 12px;">BALANCE</th>
                  <th style="font-size: 12px;">Distributor</th>
              
                  <th style="font-size: 12px;">Password</th>
              
                  <th style="font-size: 12px;">Status</th>
                  <th style="font-size: 12px;">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i= 1;

                @endphp
                @php

                @endphp
                @foreach($studio_list as $studio)
                @php 
                //print_r($studio);
                @endphp
                
                <tr>
                  <td  style="font-size: 14px;">{{$i}}</td>
                  <td  style="font-size: 14px;">{{$studio->PaymentDate}}</td>
                  <td  style="font-size: 14px;">{{$studio->studio_name}}</td>
                  <td  style="font-size: 14px;">{{$studio->name}}</td>
                 
                  <td  style="font-size: 14px;">{{$studio->mobile_no}}</td>
                 
                  
                  <td  style="font-size: 14px;">
                    @php
                   // print_r($studio->state);
                    $state=DB::table('state')->where('State_id','=',"$studio->state")->get();
                    //print_r($state);
                    @endphp
                    @foreach($state as $states)
                    {{$states->StateName}}
                    @endforeach
                  </td>
                  <td  style="font-size: 14px;">{{$studio->city}}</td>
                  <td  style="font-size: 14px;">{{$studio->AmountPaidFor}}</td>
                  <td  style="font-size: 14px;">{{$studio->AmountPaid}}</td>
                  <td  style="font-size: 14px;">
                    @php if( $studio->AmountPaidFor=='50book')
                      echo (1000-$studio->AmountPaid);
                      else if($studio->AmountPaidFor=='100book')
                    echo (1500-$studio->AmountPaid);
                      else
                      echo "0";

                   @endphp
                 </td>
                 <td style="font-size: 14px;">{{$studio->CollectionPlace}}</td>
                  <td style="font-size: 14px;">{{$studio->password}}</td>
                  <td style="font-size: 14px;">{{$studio->UserSTATUS}}</td>
                  <td style="font-size: 14px;">
                    <a href="{{url('/admin/studio/customers?studio_id='.$studio->id)}}" title="Studio details">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    <a href="{{url('admin/studio_list/delete='.$studio->id)}}" title="Delete Studio">
                      <i class="fa fa-trash"></i>
                    </a>
                    <a href="#" class="update_studio" data-id="{{$studio->id}}" data-toggle="modal" data-target="{{'#newModel'.$studio->id}}" title="Update Studio">
                      <i class="far fa-edit"></i>
                    </a> 
                    <div class="modal fade" id="{{'newModel'.$studio->id}}" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Update Studio</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          </div>
                          <div class="modal-body">
                            <form method="post" action="{{url('admin/studio_list?update='.$studio->id)}}">
                              {{csrf_field() }}
                              @php 
                              $studio = DB::table('studiolist')->where('id', '=', $studio->id)->get();
                              @endphp
                              <div class="form-group">
                                <label for="studio_name">Studio Name:</label>
                                <input type="text" class="form-control" name="studio_name" value="{{$studio[0]->studio_name}}">
                              </div>
                              <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{$studio[0]->name}}">
                              </div>
                              <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{$studio[0]->email}}">
                              </div>
                              <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" value="{{$studio[0]->password}}">
                              </div>
                              <div class="form-group">
                                <label for="mob_no">Mobile Number:</label>
                                <input type="text" class="form-control" name="mob_no" value="{{$studio[0]->mobile_no}}">
                              </div>
                              <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" value="{{$studio[0]->address}}">
                              </div>
                              <div class="form-group">
                                <label for="status">Status:</label>
                                @if($studio[0]->UserSTATUS === 'Active')
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="1">Verified
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="2" checked>Active
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="3">Expired
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="4">Blocked
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="5">Trial
                                </label>
                                @elseif($studio[0]->UserSTATUS === 'Expired')
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="1">Verified
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="2">Active
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="3" checked>Expired
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="4">Blocked
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="5">Trial
                                </label>
                                @elseif($studio[0]->UserSTATUS === 'Verified')
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="1" checked>Verified
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="2">Active
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="3">Expired
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="4">Blocked
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="5">Trial
                                </label>
                                @elseif($studio[0]->UserSTATUS === 'Trial')
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="1">Verified
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="2">Active
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="3">Expired
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="4">Blocked
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="5" checked>Trial
                                </label>
                                @else
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="1">Verified
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="2">Active
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="3">Expired
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="4" checked>Blocked
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="status" value="5">Trial
                                </label>
                                @endif
                              </div>
                              <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" value="{{$studio[0]->city}}">
                              </div>
                              <div class="form-group">
                                <label for="state">State:</label>
                                <input type="text" class="form-control" name="state" value="{{$studio[0]->state}}">
                              </div>
                <div class="form-group">
                                <label for="state">Expire Date:</label>
                                <input type="text" class="form-control" name="expiredate" value="{{$studio[0]->ExpiredStudio}}">
                              </div>
                <div class="form-group">
                                <label for="state">Domain Name:</label>
                                <input type="text" class="form-control" name="domainname" value="{{$studio[0]->DomainName}}">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end model -->

                  </td>
                </tr>
                @php
                $i++;
                @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
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