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
use App\Rules\MatchOldPassword;

class FrontRegisterController extends Controller
{
    public function create(Request $request){        
        $this->validate($request, [
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users,email',
            'password'  =>  'required',
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
        $packagedata['start_date']  =   date("Y/m/d");
        $packagedata['end_date']    =   date("Y/m/d", strtotime(" +$month months"));
        $packagedata['price']       =   $package['price'];
        $packagedata['month']       =   $month;
        $packagedata['package_id']  =   $package_id;
        $packagedata['status']      =   1;
        Userpackage::create($packagedata);
        User::where('id', $user->id)->update(['member'=> '1']);  
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
        /*unset($input['current_password']);
        unset($input['new_password']);
        unset($input['new_confirm_password']);*/
        //dd($input);
        
        User::where('id', $user->id)->update($input);
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
}
