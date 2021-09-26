<?php
namespace App\Http\Controllers;

use App\AdminModel;
use App\StudioListModel;
use App\User;
use App\CustomerloginModel;
use App\cashpaymentuser;
use App\PaymentdetailModel;
use App\distributormodel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use App\cityModel;
use DB;
use Response;
use Carbon\Carbon;
class AdminController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */


      protected function index(){
      	return view('admin.admin_login');

      }

      protected function login_admin(Request $request){
      	$Validator = Validator::make($request->all(),[
      		'mobile_no'=> 'required|numeric|digits:10',
      		'password'=> 'required|string']);

      	if($Validator->fails()){
      		$failedRules = $Validator->getMessageBag();
      		return redirect()->back()->withErrors($failedRules);
      	}else{

      		$admin = AdminModel::where('Mobile', '=', $request->mobile_no)
      		->get()
      		->toArray();
                  if(!empty($admin)){
                        if($request->password === $admin[0]['password']){
                             return redirect('admin_dashboard');
                        }else {
                              return redirect('admin')->with('password', 'Password incorrect!');
                        }
                  }else{
                        return redirect('admin')->with('error', 'Mobile number and Password incorrect!');
                  }
            }
      }

      public function dashboard(){
            $studio_list = DB::table('studiolist')
    ->join('payment', 'studiolist.id', '=', 'payment.Studio_id')->get()->sortByDesc('id');
                 // print_r($studio_list); die;
            return view('admin.dashboard', compact(['studio_list']));
      }

      public function studioviewCustomers(Request $request){
            $id = $request->studio_id;
            $customer_list = CustomerloginModel::where('studio_id', $id)->get();
            return view('admin.StudioViewCustomer_table', compact(['customer_list']));
      }

      public function studiodeleteCustomer(Request $request){
             $studio_id = $request->studio_id;
             $cust_id = $request->delete;
            $customer = CustomerloginModel::where('Customer_id', '=', $cust_id)->delete();
            if($customer){
                  return redirect('admin/studio/customers?studio='.$studio_id)->with('success', 'Customer is deleted Successfully.');
            }else{
                  return redirect('admin/studio/customers?studio='.$studio_id)->with('error', 'Customer does not deleted.');
            }
      }

       public function studioupdateCustomer(Request $request){
            $customer = CustomerloginModel::where('Customer_id', '=', $request->update)->update(['CustomerName' => $request->name,
            'Cust_Username'=> $request->username,
            'Cust_Password' => $request->password,
            'City' => $request->city,
            'State' => $request->state,
            'status'=> $request->status
      ]);
           
            if($customer){
                  return redirect('admin/studio/customers?studio='.$request->studio_id)->with('success', 'Customer updated Successfully!');
            }else{
                  return redirect('admin/studio/customers?studio='.$request->studio_id)->with('error', 'Customer does not updated.');
            }
      }


      public function deleteStudio($id){
            $studio_id = $id;
            $user = User::find($id)->delete();
            if($user){
                  return redirect('admin_dashboard')->with('success', 'Studio is deleted.');
            }else{
                  return redirect('admin_dashboard')->with('error', 'Studio does not exists.');
            }
      }

       public function updateStudio(Request $request){
            if($request->status == 5){
                  $now = Carbon::now();
            $time = strtotime($now);
            $final = date("Y-m-d h:m:s", strtotime("+1 month", $time));
                  $user = User::find($request->update)->update(['studio_name' => $request->studio_name,
            'name'=> $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'mobile_no' => $request->mob_no,
            'address '=> $request->address,
            'status' => $request->status,
            'city' => $request->city,
            'state' => $request->state,
            'ExpiredStudio' => $final,
            'DomainName' => $request->domainname
      ]);
           
            if($user){
                  return redirect('admin_dashboard')->with('success', 'Studio updated Successfully!');
            }else{
                  return redirect('admin_dashboard')->with('error', 'Studio does not exists.');
            }

            }else{
                  $user = User::find($request->update)->update(['studio_name' => $request->studio_name,
            'name'=> $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'mobile_no' => $request->mob_no,
            'address '=> $request->address,
            'status' => $request->status,
            'city' => $request->city,
            'state' => $request->state,
            'ExpiredStudio' => $request->expiredate,
            'DomainName' => $request->domainname
      ]);
           
            if($user){
                  return redirect('admin_dashboard')->with('success', 'Studio updated Successfully!');
            }else{
                  return redirect('admin_dashboard')->with('error', 'Studio does not exists.');
            }
            }
      }

      public function customerTable(){
            $customers_list = CustomerloginModel::all();
            // print_r($customers_list); die;
            return view('admin.customer_table', compact(['customers_list']));
      }

      public function deleteCustomer($id){
            $customer = CustomerloginModel::where('Customer_id', '=', $id)->delete();
            if($customer){
                  return redirect('admin/customers')->with('success', 'Customer is deleted Successfully.');
            }else{
                  return redirect('admin/customers')->with('error', 'Customer does not exists.');
            }
      }

       public function updateCustomer(Request $request){
            $customer = CustomerloginModel::where('Customer_id', '=', $request->update)->update(['CustomerName' => $request->name,
            'Cust_Username'=> $request->username,
            'Cust_Password' => $request->password,
            'City' => $request->city,
            'State' => $request->state,
            'status'=> $request->status
      ]);
           
            if($customer){
                  return redirect('admin/customers')->with('success', 'Customer updated Successfully!');
            }else{
                  return redirect('admin/customers')->with('error', 'Customer does not exists.');
            }
      }

      public function functionNameTable(){
            $functionName = DB::table('mstfunction')->get();
            return view('admin.functionname_table', compact(['functionName']));

      }

      public function deletefunctionname($id){
            $functionname = DB::table('mstfunction')->where('id', '=', $id)->delete();
            if($functionname){
                  return redirect('admin/eventname')->with('success', 'Event is deleted Successfully.');
            }else{
                  return redirect('admin/eventname')->with('error', 'Event does not exists.');
            }
      }

       public function updatefunctionname(Request $request){
            // print_r($request->update); die; 
            $function = DB::table('mstfunction')->where('id', '=', $request->update)->update(['FunctionDate' => $request->functiondate,
            'FunctionType'=> $request->functiontype,
            'AlbumName' => $request->albumname,
            'ImageCount' => $request->imagecount,
            'Remark' => $request->remark,
            'NumberOfSheet'=> $request->noofsheet,
            'status'=> $request->status
      ]);
           
            if($function){
                  // return response($request);
                  return redirect('admin/eventname')->with('success', 'Event updated Successfully!');
            }else{
                  return redirect('admin/eventname')->with('error', 'Event does not exists.');
            }
      }

      public function paymentDetails(){
            $paymentdetails = DB::table('payment')->get();
            return view('admin.payment_table', compact(['paymentdetails']));

      }

      public function updatePayment(Request $request){
// print_r($id); die;
             $function = DB::table('payment')->where('Payment_Id', '=', $request->update)->update(['PaymentDate' => $request->paymentdate,
            'SubscriptionTenure'=> $request->SubscriptionTenure,
            'StartDate' => $request->StartDate,
            'ExpiryDate' => $request->ExpiryDate,
            'Studio_id' => $request->Studio_id,
            'AmountPaid'=> $request->AmountPaid,
            'StudioMobileNumber'=> $request->StudioMobileNumber,
            'PaymentMethord'=> $request->PayMethod,
            'PaymentStatus' => $request->PaymentStatus,
            'Remark' => $request->remark,
            'Deliverystatus' => $request->status
      ]);
           // print_r($function); die;
            if($function){
                  return redirect('admin/paymentdetails')->with('success', 'Payment updated Successfully!');
            }else{
                  return redirect('admin/paymentdetails')->with('error', 'Payment does not updated.');
            }

      }

      public function viewCustomerFunctions(Request $request){
            // print_r($request->customer_id); die;
            $function_detail = DB::table('mstfunction')->where('customer_id', $request->customer_id)->get();
            return view('admin.customer_functionView', compact(['function_detail']));
      }

      public function deleteCustomerfunction(Request $request){
 // print_r($request); die;
            $functionname = DB::table('mstfunction')->where('id','=', $request->function_id)->delete();
            if($functionname){

                  return redirect('admin/customer/functions?customer_id='.$request->customer_id)->with('success', 'Event is deleted Successfully.');
            }else{
                  return redirect('admin/customer/functions?customer_id='.$request->customer_id)->with('error', 'Event does not exists.');
            }
      }

      public function updateCustomerfunction(Request $request){
            // print_r($request->update); die; 
            $function = DB::table('mstfunction')->where('id', '=', $request->function_id)->update(['FunctionDate' => $request->functiondate,
            'FunctionType'=> $request->functiontype,
            'AlbumName' => $request->albumname,
            'ImageCount' => $request->imagecount,
            'Remark' => $request->remark,
            'NumberOfSheet'=> $request->noofsheet,
            'status'=> $request->status
      ]);
           
            if($function){
                  // return response($request);
                  return redirect('admin/customer/functions?customer_id='.$request->customer_id)->with('success', 'Event updated Successfully!');
            }else{
                  return redirect('admin/customer/functions?customer_id='.$request->customer_id)->with('error', 'Event does not exists.');
            }
      }

      public function viewFunctionsImages(Request $request){
            $Image_list = DB::table('tblfunctiondetail')->where('Functionname_id','=', $request->function_id)->get();
            return view('admin.function_imagesView', compact(['Image_list']));
      }

      public function deleteFunctionsImages(Request $request){
 // print_r($request); die;
            $function_image = DB::table('tblfunctiondetail')->where('FunctionId','=', $request->image_id)->delete();
            if($function_image){

                  return redirect('admin/function/Images?function_id='.$request->function_id)->with('success', 'Event is deleted Successfully.');
            }else{
                  return redirect('admin/function/Images?function_id='.$request->function_id)->with('error', 'Event does not exists.');
            }
      }

      public function updateFunctionsImages(Request $request){
            // print_r($request->update); die; 
            $function = DB::table('tblfunctiondetail')->where('FunctionId', '=', $request->image_id)->update(['FolderName' => $request->foldername,
            'FileName'=> $request->filename,
            'Comment' => $request->comment,
            'Status' => $request->status
      ]);
           
            if($function){
                  // return response($request);
                  return redirect('admin/function/Images?function_id='.$request->function_id)->with('success', 'Event updated Successfully!');
            }else{
                  return redirect('admin/function/Images?function_id='.$request->function_id)->with('error', 'Event does not exists.');
            }
      }

      public function paymentForm(){
            return view('admin.paymentform');
      }

      public function paymentFormSubmit(Request $request){
            // print_r($request->paidfor); die;
            $Validator = Validator::make($request->all(),[
                  'studio_name' => 'required',
                  'mobile_no'=> 'required|numeric|digits:10',
                  'remark' => 'required',
                  'paidfor' => 'required',
                  'collection' => 'required',
                  'collectedby' => 'required',
                  'payment_tenure' => 'required',
                  'payment' => 'required',
                  'amount' => 'required']);

            if($Validator->fails()){
                  $failedRules = $Validator->getMessageBag();
                  return redirect()->back()->withErrors($failedRules);
            }else{
                        $user = User::where('mobile_no', $request->mobile_no)->get();
                        $paidfor = json_encode($request->paidfor);
                        // print_r($user[0]->id); die;
            $table = new PaymentdetailModel();

                  $table->Studio_id = $user[0]->id;
                  $table->StudioMobileNumber = $request->mobile_no;
                  $table->Remark = $request->remark;
                  $table->AmountPaidFor = $paidfor;
                  $table->CollectionPlace = $request->collection;
                  $table->CollectedBy = $request->collectedby;
                  $table->SubscriptionTenure = $request->payment_tenure;
                  $table->PaymentMethord = $request->payment;
                  $table->AmountPaid = $request->amount;
                  
                  $table->save();
            
            if($table){
                  return redirect('admin/paymentform')->with('success', 'Payment updated Successfully!');
            }else{
                  return redirect('admin/paymentform')->with('error', 'Payment does not updated.');
            }
      }
      }

      // public function cashPaymentUpdate(Request $request){
      //       // print_r($request->update); die;
      //       $userdetails = cashpaymentuser::where('id', $request->update)->update(['remark' => $request->remark,
      //       'deliverystatus' => $request->status
      //       ]);
      //       if($userdetails){
      //             // return response($request);
      //             return redirect('admin/paymentUserlist')->with('success', 'Cash payment user updated Successfully!');
      //       }else{
      //             return redirect('admin/paymentUserlist')->with('error', 'Cash payment user not updated.');
      //       }
      // }

      public function addTemplateForm(){
            return view('admin.addtemplatepage');
      }

      public function Distributer(){
            $distributor = DB::table('distributor')->join('employee','distributor.distributor_id','=','employee.distributor_id')->get();
            return view('admin.distributer_table',['distributor'=>$distributor]);
      }

      public function deleteDistributer($id){
           //echo $id;die();
            $dist=DB::table('employee')->where('employee_id','=',$id)->delete();
           if($dist){
                  return redirect('admin/distributer')->with('success', 'distributer is deleted Successfully.');
            }else{
                  return redirect('admin/distributer')->with('error', 'distributer does not exists.');
            }
      }

      public function updateDistributer(Request $request){
         $id= $request->id;
            $name=$request->distributorname;
             $employee = $request->employeename;
            $data=['DistributorName'=>$name];
            $data1=['EmployeeName'=>$employee];
      
            $res=DB::table('distributor')->where('distributor_id','=',$id)->update($data);
            
           
            if($res){
                  DB::table('employee')->where('distributor_id','=',$id)->update($data1);
                  return redirect('admin/distributer')->with('success', 'distributer updated Successfully!');
            }else{
                  DB::table('employee')->where('distributor_id','=',$id)->update($data1);
                  return redirect('admin/distributer')->with('error', 'distributer updated Successfully!');
            }
      
      }

       public function dailycode(){
            return view('admin/dailycode');

          
      }
      public function editdailycode(Request $req){

$id=$req->id;
//echo $id;
$cvv=$req->cvv;
//echo $cvv;
$data=['cvv' =>$cvv];
$res=DB::table('cvv')->where('cvv_id','=',$id)->update($data);
if($res){
                  return redirect('admin/dailycode')->with('success', 'dailycode updated Successfully!');
            }else{
                  return redirect('admin/dailycode')->with('error', 'dailycode does not exists.');
            }
      
          
      }

      public function insertDistributer(Request $req){
            $insert= new distributormodel();
            $insert->DistributorName=$req->distributorname;
            $insert->save();
            if($insert){
                  return redirect('admin/distributer')->with('success', 'distributer Inserted Successfully!');
            }else{
                  return redirect('admin/distributer')->with('error', 'distributer does not exists.');
            }
      }
      public function addemployee(Request $req){
             $distributor_id=$req->distributor;
            $employee=$req->employee;
            $data=['distributor_id' =>$distributor_id,'EmployeeName' =>$employee];
            $insert=DB::table('employee')->insert($data);
            if($insert){
                  return redirect('admin/distributer')->with('success', 'employee Inserted Successfully!');
            }else{
                  return redirect('admin/distributer')->with('error', ' employee not Inserted');
            }
      }

      public function logout(){
            Session::flush();
            return redirect('admin');
      }
      
       public function detail_search(Request $req)
       {
            
          
          return view('detail_search'); 
       }
       public function selectstate(Request $req)
       {
            $id=$req->id;
                $selectcity=cityModel::where('State_Id','=',$id)->get();
            $statename=DB::table('state')->where('State_id','=',$id)->get(['StateName']);
$details=DB::table('state_detail')->join('payment','state_detail.id','=','payment.Studio_id')->where('State_id','=',$id)->get();
                  return response()->json(array('result'=>$selectcity,'result1'=>$details), 200);
                  //return response()->json(array('result'=>$selectcity), 200);
                 
       }
       public function selectdetail(Request $req)
       {
         $city=$req->city;

                //echo $id;
                $selectdetail=DB::table('studio')->join('payment','studio.id','=','payment.Studio_id')->where('city','=',$city)->get();
               // print_r($selectcity);

                  return response()->json(array('result'=>$selectdetail), 200);   
       }
        public function distributordetail(Request $req)
       {
         $distributor=$req->distributor;

                //echo $id;
                $selectdistributor=DB::table('payment')->join('studio','studio.id','=','payment.Studio_id')->where('CollectionPlace','=',$distributor)->get();
               // print_r($selectcity);

                  return response()->json(array('result'=>$selectdistributor), 200);   
       }
        public function selecttype(Request $req)
       {
         $selecttype=$req->selecttype;

                //echo $id;
                $distrbutortype=DB::table('studiolist')->join('payment','studiolist.mobile_no','=','payment.StudioMobileNumber')->where('UserSTATUS','=',$selecttype)->get();
               // print_r($selectcity);

                  return response()->json(array('result'=>$distrbutortype), 200);   
       }

        public function PaymentStatus(Request $req)
       {
         $status=$req->status;

                //echo $id;
                $payment_type=DB::table('payment')->join('studio','studio.id','=','payment.Studio_id')->where('PaymentStatus','=',$status)->get();
               // print_r($selectcity);

                  return response()->json(array('result'=>$payment_type), 200);   
       }
       public function dashboard_table()
       {
           $studio_list = DB::table('studiolist')
    ->join('payment', 'studiolist.id', '=', 'payment.Studio_id')->get()->sortByDesc('id');
                 // print_r($studio_list); die;
            return view('admin.dashboard_table', compact(['studio_list']));
       }


}