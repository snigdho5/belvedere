<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Event;
use App\Blog;
use App\Userpackage;
use App\Sponsor;
use Auth;
use Image;
class ManageDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function profile(){

        $user       =   Auth::user();
       
        $userpackage = Userpackage::select('*')
            ->join('users', 'userpackages.id', '=', 'users.id')
            ->where("user_id", "=", $user->id)
            ->get();

            if(!empty($userpackage)){
                $userpackage = $userpackage[0];
            }else{
                $userpackage = [];
            } 
        return view('user.pages.dashboard.profile',compact('user', 'userpackage'));
    }

    public function getsponserdata(){
        $user       =   Auth::user();
        $sponser    =   Sponsor::where('user_id', '=', $user->id)->get();
        return view('user.pages.dashboard.sponsor',compact('user','sponser'));
    }

    public function manage_sponsor(Request $request){
        $user           =  Auth::user();
        $sponsorData    =  DB::table('sponsors')->where('user_id', '=', $user->id)->count();
        
        $input  =   $request->all();
            
        if($request->hasFile('image')){
            $profile            =   $request->file('image');
            //$destinationPath    =   public_path().'/imagess';
            $image_name         =   pathinfo($profile->getClientOriginalName(), PATHINFO_FILENAME);            
            $data['image']      =   $image_name.'-'.(rand(1000,10000)).'.'.$profile->getClientOriginalExtension();
            
            $destinationPath    =   public_path().'/imagess/thumbnail';
            $img = Image::make($profile->path());
            $img->resize(200, 80, function($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$data['image']);
            
            $destinationPath    =   public_path().'/imagess';
            $profile->move($destinationPath, $data['image']);
            $input['image']     =   $data['image'];
        }
        else{
            unset($input['image']);
        }
        unset($input['_token']);
        if($sponsorData){            
            Sponsor::where('user_id', '=', $user->id)->update($input);
        }
        else{
            Sponsor::create($input);
        }
        return redirect('msponsor');  
    }

    public function changeuserpassword(){

        $user       =   Auth::user();
        return view('user.pages.dashboard.changepassword',compact('user'));
    }

    public function advert(){

        $user       =   Auth::user();
        
        $job_cat        =   DB::table('advert_cat')
                            ->select('adv_cat_id', 'adv_cat_name')
                            ->get()
                            ->toArray();
        $irelandCounty  =   DB::table('advert_counties')
                            ->where('advert_counties.country_id', '=', '1')
                            ->select('county_id', 'county')
                            ->get()
                            ->toArray();
        
        $ukCounty       =   DB::table('advert_counties')
                            ->where('advert_counties.country_id', '=', '2')
                            ->select('county_id', 'county')
                            ->get()
                            ->toArray();
                        
        $advertisers    =   DB::table('advertisers')
                            ->join('users', 'users.id', '=', 'advertisers.advertiser_id')
                            ->join('advert_counties', 'advert_counties.county_id', '=', 'advertisers.location')
                            ->join('advert_cat', 'advert_cat.adv_cat_id', '=', 'advertisers.category')
                            ->orderBy('advertisers.created_at','DESC')
                            ->where('advertisers.advertiser_id', '=', $user->id)
                            ->select('advertisers.id', 'advertisers.company_name', 'advertisers.company_logo', 'advertisers.job_type', 'advert_counties.county', 'advert_counties.county', 'advert_cat.adv_cat_name as category', 'advertisers.job_description', 'advertisers.deadline_date', 'advertisers.salary_offer', 'advertisers.adv_email', 'advertisers.adv_phone', 'advertisers.created_at as posted_on')
                            ->paginate(6);
                            /*->get()
                            ->toArray();*/

        return view('user.pages.dashboard.advert',compact('user','job_cat','irelandCounty','ukCounty','advertisers'));
    }

    public function myevent(){

        $user   =   Auth::user();
        $data   =   Event::take(3)->get();
        return view('user.pages.dashboard.event',compact('user','data'));
    }

    public function transactions(){

        $user       =   Auth::user();
        $user_id    =   Auth::user()->id;
        $data       =   Userpackage::where('user_id',$user_id)->paginate(5);
       return view('user.pages.dashboard.transactionhistory',compact('user','data'));
    }

    public function news(){
        
        $user       =   Auth::user();
        $data = Blog::paginate(5);
        $oursponser = Sponsor::get();
        return view('user.pages.news',compact('user','data','oursponser'));
    }

    public function newsdetail($id){
        
        $user       =   Auth::user();
        $data = Blog::where('id',$id)->first();
        $oursponser = Sponsor::get();
        return view('user.pages.newsdeatil',compact('user', 'data','oursponser'));
    }

    public function job_applicants(){

        $user           =   Auth::user();
        $applicants     =   DB::table('job_applicants')
                            ->join('advertisers', 'advertisers.id', '=', 'job_applicants.advertise_id')
                            ->orderBy('job_applicants.created_at','DESC')
                            ->where('advertisers.advertiser_id', '=', $user->id)
                            ->select('job_applicants.applicant_id', 'advertisers.id', 'job_applicants.first_name', 'job_applicants.last_name', 'job_applicants.applicant_email', 'job_applicants.applicant_phone', 'advertisers.company_name', 'advertisers.company_logo', 'advertisers.job_type', 'job_applicants.created_at as applied_on')
                            ->paginate(10);
                            /*->get()
                            ->toArray();*/
        return view('user.pages.dashboard.applicants',compact('user','applicants'));
    }    
}
