@extends('layouts.admin')
@section('content')
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{url('/admin_dashboard')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Distributer</li>
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
  <div class="row">
    <div class="col-xl-12">
      <div class="card mb-12 xl-12">
        <div class="card-header">
          <i class="fas fa-table"></i>Distributer Table
              <a href="{{url('admin_dashboard')}}"class="back-icon float-right">Back <i class="fa fa-undo" aria-hidden="true"></i></a> 

              <a href="#" class="update_studio float-right btn btn-primary"  data-toggle="modal" data-target="#addemployee" title="Update Customer" style="margin-right: 3%; background: #f3f3f3; color: #007bff; border: 2px solid #007bff;">
                      <i class="fa fa-plus" ></i> Add Employee
              </a> 
              <a href="#" class="update_studio float-right btn btn-primary"  data-toggle="modal" data-target="#adddistributor" title="Update Customer" style="margin-right: 3%; background: #f3f3f3; color: #007bff; border: 2px solid #007bff;">
                      <i class="fa fa-plus" ></i> Add Distributor
              </a> 
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">S.No.</th>
                  <th style="text-align: center;">Distributer Name</th>
                 <th style="text-align: center;">Distributer Employee Name</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i= 1;
              //print_r($distributor);
                @endphp
              @foreach($distributor as $dist)
          
                <tr>
                  <td style="text-align: center;">@php echo $i; @endphp</td>
                  <td style="text-align: center;">{{$dist->DistributorName}}</td>
                  <td style="text-align: center;">{{$dist->EmployeeName}}</td>
                
                  <td>
                    <a href="distributer/delete=<?php echo $dist->employee_id;?>">
                      <i class="fa fa-trash"></i>
                    </a>

                    <a href="#" class="update_studio"  data-id="{{$dist->distributor_id}}" data-toggle="modal" data-target="{{'#newModel'.$dist->distributor_id}}" title="Update Distributer">
                      <i class="far fa-edit"></i>
                    </a>
                    <!-- model -->
                    <div class="modal fade" id="{{'newModel'.$dist->distributor_id}}" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Update Info</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          </div>
                          <div class="modal-body">
                            
                            @php
                            echo $dist->distributor_id;
                            
                       $distributorname=DB::table('distributor')->join('employee','distributor.distributor_id','=','employee.distributor_id')->get();
                            //print_r($distributorname);

                            @endphp
                            @foreach($distributorname as $dist)
                            
                            @endforeach
                            <form method="post" action="updatedistributor?id=<?php echo $dist->distributor_id;?>">
                              {{csrf_field() }}
                              @php
                              $alldist=DB::table('distributor')->get();
                              //print_r($alldist);
                              @endphp
                              <div class="form-group">
                                <label for="distributertype" >Distributor Name</label>
                                <select name="distributorname" class="form-control">
                                  <option value="{{$dist->DistributorName}}" >{{$dist->DistributorName}}</option>
                                  @foreach($alldist as $dist1)
                                  <option value="{{$dist1->DistributorName}}">{{$dist1->DistributorName}}</option>
                                  @endforeach
                                </select>
                                </div>
                              <div class="form-group">
                                <label for="functiondate">Distributer Employee Name</label>
                                <input type="text" class="form-control" name="employeename" value="{{$dist->EmployeeName}}" >
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
   
  <!-- model -->
                    <div class="modal fade" id="adddistributor" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Add Distributor </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          </div>
                          <div class="modal-body">
                           
                            <form method="post" action="{{url('admin/adddistributer')}}">
                              {{csrf_field() }}
                              <div class="form-group">
                                <label for="distributertype" >Distributor Name</label>
                                <input type="text" name="distributorname" class="form-control">
                              </div>
                               
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" >Add</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end model -->
                    <!-- model -->
                    <div class="modal fade" id="addemployee" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Add Employee </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          </div>
                          <div class="modal-body">
                             @php
                            $distribute=DB::table('distributor')->get();
                            //print_r($distribute);
                            @endphp
                            <form method="post" action="{{url('admin/addemployee')}}">
                              {{csrf_field() }}
                              <div class="form-group">
                                <label for="distributertype">Distributor Name</label>
                                <select class="form-control" name="distributor">
                                  <option value="">Select Distributor Name</option>
                                @foreach($distribute as $dist)
                                <option value="{{$dist->distributor_id}}">{{$dist->DistributorName}}</option>
                              @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="functiondate">Distributor Employee Name</label>
                                <input type="text" class="form-control" name="employee">
                              </div> 
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" >Add</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end model -->

  <!-- Sticky Footer -->
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © Your Website 2018</span>
      </div>
    </div>
  </footer>
</div>
<!-- /.content-wrapper -->
@endsection
@section('js')
<script type="text/javascript">
  $(function () {
    $("#expirydate").datepicker({
        dateFormat: "yy-mm-dd",
        orientation: "bottom",
    });
});

</script>
@endsection