<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Response;
use Illuminate\Database\QueryException;
use DB;
use App\User;
use App\functionNameModel;


class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $status=$request->status;
             $mobile_no=$request->mobile_no;
           try {
            $validator = Validator::make($request->all(), [
                        'status' => 'required',
                        'mobile_no' => 'required|numeric|digits:10',
                        
            ]);

            
             $data=['status' =>$status,'mobile_no' =>$mobile_no];
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {

                $user_data = User::where('mobile_no','=',$mobile_no)->update($data);

                return Response::json(array('status' => 'success', 'message' => 'successfull'))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }

 public function cvv(Request $request)
    {
         //$cvv_id=$request->cvv_id;
             $cvv=$request->cvv;
           try {
            $validator = Validator::make($request->all(), [
                        'cvv' => 'required',
                        
                        
            ]);

            
             $data=['cvv' =>$cvv];
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {

                $user_data = DB::table('cvv')->update($data);

                return Response::json(array('status' => 'success', 'message' => 'successfull'))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }
    public function addpayment(Request $request)
    {
         //$cvv_id=$request->cvv_id;
             $mobile=$request->mobile;
             $AmountPaidFor=$request->software;
           try {
            $validator = Validator::make($request->all(), [
                        'mobile' => 'required',        
               
            ]);

             if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {
                       if($AmountPaidFor=='50book' || $AmountPaidFor=='100book')
                     {
    $CollectionPlace=$request->distributer;
     $CollectedBy=$request->collectedby;
     $Remark=$request->remark;
     $AmountPaid=$request->amount;
      $AmountPaidFor=$request->software;
    
      $data=['CollectionPlace' =>$CollectionPlace,'CollectedBy' =>$CollectedBy,'Remark' =>$Remark,'AmountPaid' =>$AmountPaid,'AmountPaidFor' =>$AmountPaidFor];
      DB::table('payment')->where('StudioMobileNumber','=',$mobile)->update($data);
      //return view('userDashboard');
      //return redirect('user-dashboard');
      return Response::json(array('status' => 'success', 'message' => 'successfull'))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
                        }
                        else
                        {
    $CollectionPlace=$request->distributer;
     $CollectedBy=$request->collectedby;
     $Remark=$request->remark;
     $AmountPaid=$request->amount;
     $AmountPaidFor=$request->other;
    
     $data=['CollectionPlace' =>$CollectionPlace,'CollectedBy' =>$CollectedBy,'Remark' =>$Remark,'AmountPaid' =>$AmountPaid,'AmountPaidFor' =>$AmountPaidFor];
      DB::table('payment')->where('StudioMobileNumber','=',$mobile)->update($data);
       //return view('userDashboard');
      //return redirect('user-dashboard');
      return Response::json(array('status' => 'success', 'message' => 'successfull'))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);

                        }
            

                
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }




       public function changestatus(Request $request)
    {
        
        
              $mobile=$request->mobile;
              $studio_name=$request->studio_name;
              $name=$request->name;
              $password=$request->password;
              $city=$request->city;
              $status=$request->status;
              $AmountPaidFor=$request->amountpaidfor;
              $AmountPaid=$request->amountpaid;
            
            
              
            $data=['studio_name' =>$studio_name,'name' =>$name,'password' =>$password,'city' =>$city,'status' =>$status];
            $data1=['AmountPaidFor' =>$AmountPaidFor,'AmountPaid' =>$AmountPaid];
           try {
            $validator = Validator::make($request->all(), [
                        'mobile' => 'required',
                        
                        
            ]);

            
             
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {
                
                

                 $res=DB::table('studio')->where('mobile_no','=',$mobile)->update($data);
                 if($res)
                 {
                  $res=DB::table('payment')->where('StudioMobileNumber','=',$mobile)->update($data1);
  
                 }

                return Response::json(array('status' => 'success', 'message' => 'successfull'))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
             $mobile_no=$request->mobile_no;
           try {
            $validator = Validator::make($request->all(), [
                        
                       // 'mobile_no' => 'required|numeric|digits:10',
                        
            ]);

            
            
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {


            $data=DB::table('studio')->join('payment','studio.mobile_no','=','payment.StudioMobileNumber')->get(['studio_name','name','password','city','status','AmountPaidFor','AmountPaid','PaymentDate','StudioMobileNumber'])->toArray();
            

                if (count($data) > 0){
                return Response::json(['status' => 'success', 'message' => ' Successfully', 'data' => $data])->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            } else {
                return Response::json(['error' => 'Unauthorized', 'message' => 'Please check credentials'], 401)->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            }
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }
     public function showuserdata(Request $request)
    {
    
             $mobile_no=$request->mobile_no;
           try {
            $validator = Validator::make($request->all(), [
                        
                        'mobile_no' => 'required|numeric|digits:10',
                        
            ]);

            
            
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {


            $data=DB::table('studio')->where('mobile_no','=',$mobile_no)->get();
            

                if (count($data) > 0){
                return Response::json(['status' => 'success', 'message' => ' Successfully', 'data' => $data])->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            } else {
                return Response::json(['error' => 'Unauthorized', 'message' => 'Please check credentials'], 401)->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            }
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }
    
       public function updatecomment(Request $request)
    {
    
             $function_id=$request->function_id;
              $imageid=$request->image_id;
              $folder=$request->folder_name;
              $status=$request->status;
               $comment=$request->comment;
               $data=['Status' =>$status,'Comment' =>$comment];
           try {
            $validator = Validator::make($request->all(), [
                        
                        'function_id' => 'required|numeric',
                         'image_id' => 'required',
                        'folder_name' => 'required',
                        'status' =>'required',
                        'comment' =>'required',
            ]);

            
            
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {

                $data=DB::table('tblfunctiondetail')->where('Function_id','=',$function_id)->where('FolderName','=',$folder)->where('ImageId','=',$imageid)->update($data);

                if ($data){
                return Response::json(['status' => 'success', 'message' => ' Successfully'])->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            } else {
                return Response::json(['error' => 'Unauthorized', 'message' => 'Please check credentials'], 401)->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            }
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }

    public function selectimage(Request $request)
    {
    $folder_name=$request->folder_name;
    $function_id=$request->function_id;

           try {
            $validator = Validator::make($request->all(), [
                        
                        'folder_name' => 'required',
                            'function_id' => 'required',
                        
                        
            ]);

            
            
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {

            $data=DB::table('tblfunctiondetail')->where('FolderName','=',$folder_name)->where('tblfunctiondetail.Function_id','=',$function_id)->get(['FileName','Comment','Status','ImageId']);
            

                if (count($data) > 0){
                return Response::json(['status' => 'success', 'message' => ' Successfully', 'data' => $data])->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            } else {
                return Response::json(['error' => 'Unauthorized', 'message' => 'Please check credentials'], 401)->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            }
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }
    
        public function selectfolder(Request $request)
    {
    $studio_id=$request->studio_mono;
    $customer_id=$request->customer_mono;
    $function_id=$request->function_id;

           try {
            $validator = Validator::make($request->all(), [
                        
                        'studio_mono' => 'required',
                        'customer_mono' => 'required',
                        'function_id' => 'required',
                        
                        
            ]);

            
            
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {


               
                
            $data = DB::table('functiondetailinfo')->
                        select(DB::raw('distinct(FolderName) as FolderName, COUNT(FileName) as TotalImages,sum(Status) AS SelectedFile'))
                     ->where('mobile_no','=',$studio_id)->where('Cust_Username','=',$customer_id)->where('functionid','=',$function_id)
                     ->groupBy('FolderName')
                     ->get();
                     
                     
                if (count($data) > 0){
                return Response::json(['status' => 'success', 'message' => ' Successfully', 'data' => $data])->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            } else {
                return Response::json(['error' => 'Unauthorized', 'message' => 'Please check credentials'], 401)->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            }
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }

         public function selectallimage(Request $request)
    {
    $studio_id=$request->studio_id;
    $customer_id=$request->customer_id;
    $function_id=$request->function_id;

           try {
            $validator = Validator::make($request->all(), [
                        
                        'studio_id' => 'required',
                        'customer_id' => 'required',
                        'function_id' => 'required',
                        
                        
            ]);

            
            
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {

            $data=DB::table('tblfunctiondetail')->where('Studio_Id','=',$studio_id)->where('Customer_Id','=',$customer_id)->where('Function_id','=',$function_id)->get();

                if (count($data) > 0){
                return Response::json(['status' => 'success', 'message' => ' Successfully', 'data' => $data])->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            } else {
                return Response::json(['error' => 'Unauthorized', 'message' => 'Please check credentials'], 401)->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            }
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }
            public function customerlogin(Request $request)
    {
    
             $mobile_no=$request->mobile_no;
             $password=$request->password;
           try {
            $validator = Validator::make($request->all(), [
                        
                        'mobile_no' => 'required|numeric|digits:10',
                        'password' => 'required',
                        
            ]);

            
            
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {

                    //   $data=DB::table('mstcustomer')->join('studio','mstcustomer.studio_id','=','studio.id')->join('mstfunction','mstcustomer.studio_id','=','mstfunction.Studio_Id')->where('Cust_Username','=',$mobile_no)->where('Cust_Password','=',$password)->distinct()->get(['mstcustomer.Customer_id','mstcustomer.studio_id','mstfunction.id','studio.mobile_no']);
                      
                      
                      
                      $data=DB::table('mstcustomer')->join('mstfunction','mstcustomer.Customer_id','=','mstfunction.customer_id')->join('studio','mstcustomer.studio_id','=','studio.id')->where('mstcustomer.Cust_Username','=',$mobile_no)->where('mstcustomer.Cust_Password','=',$password)->get(['mstcustomer.Customer_id','mstcustomer.Studio_Id','mstfunction.id','studio.mobile_no']);
            
            
            

                if (count($data) > 0){
                return Response::json(['status' => 'success', 'message' => ' Successfully', 'data' => $data])->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            } else {
                return Response::json(['error' => 'Unauthorized', 'message' => 'Please check credentials'], 401)->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            }
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }
          
            public function selectcomment(Request $request)
    {
    
             $imageid=$request->image_id;
             
           try {
            $validator = Validator::make($request->all(), [
                        
                        'image_id' => 'required',
                        
                        
            ]);

            
            
            if ($validator->fails()) {
                $errorMsg = $validator->getMessageBag()->toArray();
                return Response::json(array('status' => 'error', 'message' => $errorMsg))->withHeaders([
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                ]);
            } else {

            $data=DB::table('tblfunctiondetail')->where('ImageId','=',$imageid)->get(['Comment','Status']);
            
            

                if (count($data) > 0){
                return Response::json(['status' => 'success', 'message' => ' Successfully', 'data' => $data])->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            } else {
                return Response::json(['error' => 'Unauthorized', 'message' => 'Please check credentials'], 401)->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]);
            }
            }
        } catch (QueryException $ex) {
            return Response::json(array('status' => 'error', 'message' => $ex->getMessage()))->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
