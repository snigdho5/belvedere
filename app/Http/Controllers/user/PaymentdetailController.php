<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Package;
use App\User;
use App\Userpackage;
use Carbon\Carbon;

class PaymentdetailController extends Controller
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
    public function create()
    {
        //
    }
    public function paybecomemember(Request $request)
    {
        $input              =   $request->all();
        $user               =   Auth::user();
        $package_id         =   $input['member'];

        Userpackage::where('user_id', $user->id)->where('type','member')->update(['status'=>0]);
        $package            =   Package::where('id',$package_id)->first();

        //set user data
        $packagedata['user_id']     =   $user->id;
        $packagedata['username']    =   $user->name;
        $packagedata['useremail']   =   $user->email;
        $packagedata['type']        =   'member';
        
        //set package data        
        $month                      =   $package['month'];   
        $packagedata['start_date']  =   date("Y/m/d");
        $packagedata['end_date']    =   date("Y/m/d", strtotime(" +$month months"));
        $packagedata['price']       =   $package['price'];
        $packagedata['month']       =   $month;

        $packagedata['package_id']  =   $package_id;
        $packagedata['status']      =   1;
        //Userpackage::create($packagedata);
        //User::where('id', $user->id)->update(['member'=>1]);

        //renew module
        $userPackage    =   Userpackage::where('user_id',$user->id)->get()->toArray();

        $key            =   count($userPackage) - 1;
        $todayDate 	    =   date_create(date("Y-m-d"));
        $expiryDate     =   date_create($userPackage[$key]['end_date']);
        $diffence       =   date_diff($todayDate,$expiryDate);        
        $date           =   $diffence->format("%R%a");
        $substrdate     =   ltrim($date, '+');
        
        if($substrdate > 0){           
            $expiryDate                   =   strtotime($userPackage[$key]['end_date']);
            $packagedata['start_date']    =   date($userPackage[$key]['end_date']);
            $packagedata['end_date']      =   date("Y-m-d", strtotime("+$month month", $expiryDate));
            Userpackage::create($packagedata);
            User::where('id', $user->id)->update(['member'=>1]);
        }
        else{
            Userpackage::create($packagedata);
            User::where('id', $user->id)->update(['member'=>1]);
        }
    }

    public function paybecomesponser(Request $request)
    {
        $input          =   $request->all();
        $user           =   Auth::user();
        $package_id     =   $input['sponsor'];

        Userpackage::where('user_id', $user->id)->where('type','sponsor')->update(['status'=>0]);
        $package        =   Package::where('id',$package_id)->first();
        //set user data
        $packagedata['user_id']     =   $user->id;
        $packagedata['username']    =   $user->name;
        $packagedata['useremail']   =   $user->email;
        $packagedata['type']        =   'sponsor';
        
        //set package data   
        
        $month                      =   $package['month'];   
        $packagedata['start_date']  =   date("Y/m/d");
        $packagedata['end_date']    =   date("Y/m/d", strtotime(" +$month months"));
        $packagedata['price']       =   $package['price'];
        $packagedata['month']       =   $month;


        $packagedata['package_id']  =   $package_id;
        $packagedata['status']      =   1;
        //Userpackage::create($packagedata);
        //User::where('id', $user->id)->update(['sponser'=>1]);

        //renew module
        $userPackage    =   Userpackage::where('user_id',$user->id)->get()->toArray();

        $key            =   count($userPackage) - 1;
        $todayDate 	    =   date_create(date("Y-m-d"));
        $expiryDate     =   date_create($userPackage[$key]['end_date']);
        $diffence       =   date_diff($todayDate,$expiryDate);        
        $date           =   $diffence->format("%R%a");
        $substrdate     =   ltrim($date, '+');
        
        if($substrdate > 0){           
            $expiryDate                   =   strtotime($userPackage[$key]['end_date']);
            $packagedata['start_date']    =   date($userPackage[$key]['end_date']);
            $packagedata['end_date']      =   date("Y-m-d", strtotime("+$month month", $expiryDate));
            Userpackage::create($packagedata);
            User::where('id', $user->id)->update(['sponser'=>1]);
        }
        else{
            Userpackage::create($packagedata);
            User::where('id', $user->id)->update(['sponser'=>1]);
        }
    }

    public function payBecomeAdvertiser(Request $request)
    {
        $input        =   $request->all();
        
        $user         =   Auth::user();
        $package_id   =   $input['advertiser'];

        Userpackage::where('user_id', $user->id)->where('type','advertiser')->update(['status'=>0]);
        $package      =   Package::where('id',$package_id)->first();

        //set user data
        $packagedata['user_id']       =   $user->id;
        $packagedata['username']      =   $user->name;
        $packagedata['useremail']     =   $user->email;
        $packagedata['type']          =   'advertiser';
        
        //set package data      
        $month                        =   $package['month'];   
        $packagedata['start_date']    =   date("Y/m/d");
        $packagedata['end_date']      =   date("Y/m/d", strtotime(" +$month months"));
        $packagedata['price']         =   $package['price'];
        $packagedata['month']         =   $month;


        $packagedata['package_id']    =   $package_id;
        $packagedata['status']        =   1;

        //renew module
        $userPackage    =   Userpackage::where('user_id',$user->id)->get()->toArray();

        $key            =   count($userPackage) - 1;
        $todayDate 	    =   date_create(date("Y-m-d"));
        //$expiryDate     =   date_create("2021-04-01");
        $expiryDate     =   date_create($userPackage[$key]['end_date']);

        $diffence       =   date_diff($todayDate,$expiryDate);
        
        $date           =   $diffence->format("%R%a");
        $substrdate     =   ltrim($date, '+');
        
        if($substrdate > 0){
            //echo 'renew Ad';            
            $expiryDate     =   strtotime($userPackage[$key]['end_date']);
            $packagedata['start_date']    =   date($userPackage[$key]['end_date']);
            //$packagedata['end_date']      =   date($userPackage[$key]['end_date'], strtotime(" +$month months"));
            $packagedata['end_date']      =   date("Y-m-d", strtotime("+$month month", $expiryDate));
            Userpackage::create($packagedata);
            User::where('id', $user->id)->update(['advertiser'=>1]);
        }
        else{
            //echo 'New Ad';
            //Userpackage::where('user_id', $user->id)->where('type','advertiser')->update(['status'=>0]);
            Userpackage::create($packagedata);
            User::where('id', $user->id)->update(['advertiser'=>1]);
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
        //
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
