@extends('layouts.app')
@section('content')
<script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script type="text/javascript">
     // alert("Ok");
      $(document).ready(function(){
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


$("#state").change(function(){
        var cid=$("#state").val();
        $("#city").children('option:not(:first)').remove();
        // alert(cid);
          if(cid!="")
            { 
                $.ajax({
                   type:'POST',
                   url:'getstate',
                   data:{'id': cid},
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
                           $("#city").append('<option value='+ item.CityName +'> '+item.CityName+'</option>'); 
                        });         
                   }
                });
            }
      });
});
  </script>

  

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/registerStudio') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('studio_name') ? ' has-error' : '' }}">
                            <label for="studio_name" class="col-md-4 control-label">Studio Name</label>

                            <div class="col-md-6">
                                <input id="studio_name" type="text" class="form-control" name="studio_name" value="{{ old('studio_name') }}">

                                @if ($errors->has('studio_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('studio_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                            <label for="mobile_no" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input id="mobile_no" type="text" class="form-control" name="mobile_no">

                                @if ($errors->has('mobile_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div
                        
                        <div class="form-group{{ $errors->has('distributer') ? ' has-error' : '' }}">
                            <label for="distributer" class="col-md-4 control-label">Select Distributer</label>
                            <div class="col-md-6">
                                @php
                         $distributor=DB::table('distributor')->get();
                        // print_r($distributor);
                             @endphp
                                <select class="form-control" name="distributer" >
                                    <option value="">Select distributor</option>
                                     @foreach($distributor as $user)
                            <option value="{{$user->DistributorName}}">{{$user->DistributorName}}</option>
                            @endforeach
                                </select>

                                @if ($errors->has('distributor'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('distributor') }}</strong>
                                </span>
                                @endif
                            </div>
                            <br><br>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Collected By</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="collectedby" >

                                @if ($errors->has('collectedby'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('collectedby') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('software') ? ' has-error' : '' }}" >
                            <label for="software" class="col-md-4 control-label">Meri Photo Book</label> 

                            <div class="col-md-6" >
                                <input type="radio" name="software" value="50book" id="rdo1"><b>50 Book</b>
                                <input type="radio" name="software" value="100book" id="rdo2"><b>100 Book</b>
                                <input type="radio" name="software" id="rdo3" value="other"><b>Other</b>
                                 @if ($errors->has('50software'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('50software') }}</strong>
                                </span>
                                @endif
                                @if ($errors->has('100software'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('100software') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('software') ? ' has-error' : '' }}">
                            <label for="software" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <input id="input" type="text" class="form-control" name="other" hidden>

                                @if ($errors->has('software'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('software') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                                                
                        
                        
                        
                        

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address"></textarea>
                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                @php 
                                    $states=DB::table('state')->get();
                                   // echo ($states[0]->StateName);
                                    @endphp
                                <select class="form-control" name="state" id="state">
                                    
                                    <option value="Selected">Select State</option> 
                                    @foreach($states as $state)
                                    <option value="{{$state->State_id}}">{{$state->StateName}}</option>
                                    @endforeach 
                                </select>

                                @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <select class="form-control" name="city" id="city">
                                    
                                    <option value="Selected">Select City</option> 
                                    
                                
                                
                                </select>

                                @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        
                    

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('customer_template.footer')
    @endsection

