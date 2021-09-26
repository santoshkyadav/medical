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
      <div class="card mb-12 xl-12 ">
        <div class="card-header">
          <i class="fas fa-table"></i>CVV Table
              <a href="{{url('admin_dashboard')}}"class="back-icon float-right">Back <i class="fa fa-undo" aria-hidden="true"></i></a> 

               
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Number</th>
                  <th>Edit</th>
                  
                </tr>
              </thead>
              <tbody>
                @php
                $i= 1;
                $cvvs=DB::table('cvv')->get();
                //print_r($cvvs[1]->cvv);
                @endphp
                
                <tr>
                  @foreach($cvvs as $cvv)
                  <td>@php echo $i; @endphp</td>
                  <td>{{$cvv->cvv}}</td>
                  <td><a href="#"  data-toggle="modal" data-target="#cvv1" style="margin-right: 3%; background: #f3f3f3; color: #007bff;">
                      <i class="fa fa-edit" ></i>
              </a> </td>
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
                    <div class="modal fade" id="cvv1" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Update Daily Code Number</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          </div>
                          <div class="modal-body">
                            <form method="post" action="editdailycode?id=<?php echo $cvvs[0]->id;?>">
                              {{csrf_field() }}
                              @php
                              $cvvs=DB::table('cvv')->get();
                              //echo $cvvs;
                              @endphp
                              
                              <div class="form-group">
                                <label for="functiondate">Daily Code Number</label>
                                <input type="text" class="form-control" name="cvv" value="{{$cvvs[0]->cvv}}">
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