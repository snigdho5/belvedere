<?php

namespace App\Http\Controllers;

use DB;
use File;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Redirect;
use Auth;
use App\Userpackage;
use App\Sponsor;
use App\Package;
use App\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use App\Rules\MatchOldPassword;

class FrontRegisterController extends Controller
{
    public function create(Request $request){        
        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users,email',
            'password'  =>  'required',
            'year_left'  =>  'required',
            //'rolename' => 'required'
        ]);
        //|same:confirm-password
            
        $input  =   $request->all();
        $input['password']  =   Hash::make($input['password']);
        $user   =   User::create($input);

        // $package_id     =   $input['member'];
        $package_id     =   $input['package'];
        Userpackage::where('user_id', $user->id)->where('type','member')->update(['status' => '0']);
        $package = Package::where('id',$package_id)->first();
        //set user data
        $packagedata['user_id']     =   $user->id;
        $packagedata['username']    =   $user->name;
        $packagedata['useremail']   =   $user->email;
        $packagedata['type']        =   'member';
        //set package data   
      
        $month = $package['month'];   
        $year_left = $input['year_left'];   
        $packagedata['start_date']  =   date("Y/m/d");
        $packagedata['end_date']    =   date("Y/m/d", strtotime(" +$month months"));
        $packagedata['price']       =   $package['price'];
        $packagedata['month']       =   $month;
        $packagedata['package_id']  =   $package_id;
        $packagedata['year_left']   =   $year_left;
        $packagedata['status']      =   1;
        Userpackage::create($packagedata);
        User::where('id', $user->id)->update(['member'=> '1']);  

        $maildata = ([
            'name' => $user->name,
            'email' => $user->email,
            'month' => $packagedata['month'],
            'start_date' => $packagedata['start_date'],
            'end_date' => $packagedata['end_date'],
            'year_left' => $packagedata['year_left'],
            ]);

        Mail::to($user->email)->send(new RegisterMail($maildata));
    }
    
    /*********************************************      SPONSER      *********************************************/
    
    public function sponser(Request $request){
        $oursponser =   Sponsor::get();
        $pkg        =   Package::where('type','sponsor')->get();
        return view('user.pages.becomesponser',compact('pkg','oursponser'));
    }
    
    public function becomesponser(Request $request){
        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users,email',
            'password'  =>  'required',
           // 'rolename' => 'required'
        ]);
        //|same:confirm-password
            
        $input  =   $request->all();
        /*echo '<pre>';
        print_r($input);
        die();*/
        $input['password']  =   Hash::make($input['password']);
        $user   =   User::create($input);

        $package_id = $input['package'];
        Userpackage::where('user_id', $user->id)->where('type','member')->update(['status'=>0]);
        $package = Package::where('id',$package_id)->first();
        //set user data
        $packagedata['user_id']     =   $user->id;
        $packagedata['username']    =   strtolower($user->name);
        $packagedata['useremail']   =   strtolower($user->email);
        $packagedata['type']        =   'sponsor';
        //set package data   
        $month  =   $package['month'];   
        $packagedata['start_date']  =   date("Y/m/d");
        $packagedata['end_date']    =   date("Y/m/d", strtotime(" +$month months"));
        $packagedata['price']       =   $package['price'];
        $packagedata['month']       =   $month;
        $packagedata['package_id']  =   $package_id;
        $packagedata['status']      =   1;
        Userpackage::create($packagedata);
        User::where('id', $user->id)->update(['sponser' => '1']);
        
        //$user->assignRole($request->input('rolename'));
    }
    
    /*********************************************      SPONSER      *********************************************/
    
    /*********************************************      ADVERTISER      *********************************************/
    
    public function advertiser(Request $request){
        $oursponser =   Sponsor::get();
        $pkg        =   Package::where('type','advertiser')->get();
        return view('user.pages.becomeadvertiser',compact('pkg','oursponser'));
    }
    
    public function becomeadvertiser(Request $request){
        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users,email',
            'password'  =>  'required',
           // 'rolename' => 'required'
        ]);
        //|same:confirm-password
            
        $input  =   $request->all();
        
        $input['password']  =   Hash::make($input['password']);
        $user   =   User::create($input);

        //$package_id = $input['package'];// need packages fixation on this
        $package_id     =   6;
        Userpackage::where('user_id', $user->id)->where('type','member')->update(['status'=>'0']);
        $package = Package::where('id',$package_id)->first();
        //set user data
        $packagedata['user_id']     =   $user->id;
        $packagedata['username']    =   strtolower($user->name);
        $packagedata['useremail']   =   strtolower($user->email);
        $packagedata['type']        =   'advertiser';
        //set package data   
        $month  =   $package['month'];   
        $packagedata['start_date']  =   date("Y/m/d");
        $packagedata['end_date']    =   date("Y/m/d", strtotime(" +$month months"));
        $packagedata['price']       =   $package['price'];
        $packagedata['month']       =   $month;
        $packagedata['package_id']  =   $package_id;
        $packagedata['status']      =   1;
        Userpackage::create($packagedata);
        User::where('id', $user->id)->update(['advertiser' => '1']);        
        //$user->assignRole($request->input('rolename'));
    }
    
    /*********************************************      ADVERTISER      *********************************************/

    public function profile(Request $request){
        /*$request->validate([
            'current_password'  =>  ['required', new MatchOldPassword],
            'new_password'      =>  ['required'],
            'confirm_password'  =>  ['same:password']
        ]);*/
        //dd('');
        
        $validatedData = $request->validate([
            'name'          =>  'required',
            'profile_img'   =>  'sometimes|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        
        $user   =   Auth::user();
        $input  =   $request->all();
        $year_left = $input['year_left'];
        
        if(count($input) > 7){
            $input['notification']  =   1;
        }
        else{
            $input['notification']  =   0;
        }

        if($request->hasFile('profile_img')){
            $profile                =   $request->file('profile_img');
            $destinationPath        =   public_path().'/uploads/profile';
            //Get the Old Banner to delete replace with the new one
            //$getOldImage            =   User::where('id', $user->id)->first();
            //File::delete($destinationPath.$getOldImage->profile_img);
            $image_name             =   pathinfo($profile->getClientOriginalName(), PATHINFO_FILENAME);            
            $data['profile_img']    =   $image_name.'-'.(rand(1000,10000)).'.'.$profile->getClientOriginalExtension();
            $profile->move($destinationPath, $data['profile_img']);
            $input['profile_img']   =   $data['profile_img'];
        }
        
        //$input['password']  =   Hash::make($input['new_confirm_password']);
        unset($input['_token']);
        unset($input['year_left']);
        /*unset($input['current_password']);
        unset($input['new_password']);
        unset($input['new_confirm_password']);*/
        //dd($input);
        
        User::where('id', $user->id)->update($input);
        Userpackage::where('user_id', $user->id)->where('type','member')->update(['year_left'=>$year_left]);
        
        return redirect('profile');
    }
    
    public function login(Request $request){
        $oursponser =   Sponsor::get();
        $pkg        =   Package::where('type','member')->get();
        return view('user.pages.login',compact('pkg','oursponser'));
    }
    
    public function loginCheck(Request $request){
        $this->validate($request, [
            'email'     =>  'required|email',
            'password'  =>  'required',
        ]);  

        $userdata   =   [
            'email'     =>  $request->email ,
            'password'  =>  $request->password
        ];

        if (Auth::attempt($userdata)){
            if(!Auth::user()->member && !Auth::user()->sponser && !Auth::user()->advertiser){
                return Redirect::to('admin');
            }
            else{
                return Redirect::to('dashboard');
            }            
        }
        else{
            return redirect()->back()->withInput($request->only('email'))->withErrors(['Authentication failed']);
        }
    }
    
    public function admin_login(Request $request){
        return view('admin.authentication.login');
    }
    
    public function adminCheck(Request $request){
        $this->validate($request, [
            'email'     =>  'required|email',
            'password'  =>  'required',
        ]);  

        $userdata   =   [
            'email'     =>  $request->email ,
            'password'  =>  $request->password
        ];

        if (Auth::attempt($userdata)){
            if(!Auth::user()->member && !Auth::user()->sponser && !Auth::user()->advertiser){
                return Redirect::to('admin');
            }
            else{
                return Redirect::to('dashboard');
            }            
        }
        else{
            //return Redirect::to('access');
            return redirect()->back()->withInput($request->only('email'))->withErrors(['Authentication failed']);
        }
    }

    public function dashboard(Request $request){
        $user = Auth::user();
        // $userPackage=Userpackage::
        // whereHas('packages', function ($query) {
        //     return $query->where('type', '=', 'member');
        // })->
        // where('user_id',$user->id)->where('status',1)->first();
        $events                 =   Event::orderBy('id', 'DESC')->paginate(2);

        $userPackage            =   Userpackage::where('type', 'member')
                                    ->where('user_id',$user->id)
                                    ->where('status','1')->first();

        $userSponserPackage     =   Userpackage::where('type', 'sponsor')
                                    ->where('user_id',$user->id)
                                    ->where('status','1')->first();

        $userAdvertiserPackage  =   Userpackage::where('type', 'advertiser')
                                    ->where('user_id',$user->id)
                                    ->where('status','1')->first();
        /*echo '<pre>';
        print_r($event);
        echo '</pre>';*/
        //dd($userSponserPackage);
        //die();
        $package    =   Package::get();

        return view('user.pages.member_dashboard',compact('user','package','userPackage','userSponserPackage','userAdvertiserPackage','events'));
    }

    
    public function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 12; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function reqResetPassword(Request $request)
    {

        // if ($request->ajax()) {

            $reqData   =   $request->all();

            $email = $reqData['reset_email'];

            if($email){
                $userData = Userpackage::Join('users', function ($join) {
                    $join->on('userpackages.user_id', '=', 'users.id');
                })
                    ->where('users.email', $email)
                    ->first();
    
                // echo '<pre>';print_r($userData);die;
    
                if (!empty($userData)) {

                    $userData = $userData->toArray();
    
                    $password_rand = self::randomPassword();
                    $password_hash = Hash::make($password_rand);
    
                    User::where('id', $userData['user_id'])
                        ->update([
                            'password' => $password_hash,
                            'reset_requested' => 1
                        ]);
    
                    $mailData   =   [
                        "first_name"    =>  ucfirst($userData['name']),
                        "last_name"     =>  ucfirst($userData['surname']),
                        "email"         =>  $userData['email'],
                        "phone"         =>  $userData['phone_no'],
                        "password"      =>  $password_rand,
                        "body"          =>  "There was a request to change your password!"
                    ];
    
                    Mail::send('admin.mail.reset_password', $mailData, function ($message) use ($userData) {
                        $message->to($userData['email'], $userData['name'])
                            // ->cc('belunion.dev@gmail.com')
                            ->subject('Reset Password - Belvedere');
                        $message->from('noreply@belvedereunion.com', 'Belvedere');
                    });
    
                    $respData = array(
                        'success' => '1',
                        'msg' => 'Reset email successfuly sent!'
                    );
                } else {
                    $respData = array(
                        'success' => '0',
                        'msg' => 'User not found!'
                    );
                }
            }else{
                $respData = array(
                    'success' => '0',
                    'msg' => 'Email field is mandatory!'
                );
            }
            

            
            $respData2 = json_encode($respData);
 
            return $respData['msg'];
        // }
    }
}
