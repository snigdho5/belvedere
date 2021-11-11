<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use DataTables;
use App\Advertiser;
use Illuminate\Http\Request;

class AdvertiserController extends Controller
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
     * @param  \App\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function show(Advertiser $advertiser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertiser $advertiser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertiser $advertiser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertiser $advertiser)
    {
        //
    }

    public function insertnewadvert(Request $request){
        $data   =   $request->all();
        if ($request->hasFile('company_logo')){
            //$data['company_logo']   =   $request->file('company_logo')->getClientOriginalName();
            $companyLogo            =   $request->file('company_logo');
            $destinationPath        =   public_path('uploads/advert/');
            //Get the New to upload in the path & update it on DB
            $logo_name              =   pathinfo($companyLogo->getClientOriginalName(), PATHINFO_FILENAME);
            $data['company_logo']   =   (rand(1000,10000)).'-'.$logo_name.'.'.$companyLogo->getClientOriginalExtension();
            $companyLogo->move($destinationPath, $data['company_logo']);
        }
        else{
            $data['company_logo']   =   'not-available.png';
        }        
        unset($data['_token']);        
        $lastInsertId   =   Advertiser::create($data);
        return $lastInsertId;
    }

    public function listalladvertisers(Request $request){
        $user   =   Auth::user();

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
                            
        if ($request->ajax()){
            $data   =   DB::table('advertisers')
                        ->join('advert_counties', 'advert_counties.county_id', '=', 'advertisers.location')
                        ->join('advert_cat', 'advert_cat.adv_cat_id', '=', 'advertisers.category')
                        ->orderBy('advertisers.created_at','DESC')
                        ->select('advertisers.id', 'advertisers.company_name', 'advertisers.company_logo', 'advertisers.job_type', 'advert_counties.county as location', 'advert_cat.adv_cat_name as category')
                        ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){                           
                    $btn = '<h5><a href="javascript:void(0)" id="EditModel" data-id="'. $row->id .'" > <i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp; &nbsp;';
                    $btn .= '<a href="javascript:void(0)" id="DeleteModel" data-id="'. $row->id .'" ><i class="fa fa-trash-o" style="color: red;" onclick="myFunction()"></a></h5>';
                    return $btn;
                })
                ->addColumn('job_type', function($row){
                    if($row->job_type == 1){
                        $row->job_type    =   'Full Time';
                    }
                    else if($row->job_type == 2){
                        $row->job_type    =   'Part Time';
                    }
                    else{
                        $row->job_type    =   'Contractual';
                    }
                    return $row->job_type;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.advertiser', compact('user','job_cat','irelandCounty','ukCounty'));
    }

    public function edit_advertiser(Request $request, $id){
        //$data   =   Advertiser::where('id', '=', $id)->first();
        //return  $data;
        $data   =   DB::table('advertisers')
                    ->join('advert_counties', 'advert_counties.county_id', '=', 'advertisers.location')
                    ->join('advert_cat', 'advert_cat.adv_cat_id', '=', 'advertisers.category')
                    ->orderBy('advertisers.created_at','DESC')
                    ->where('advertisers.id', '=', $id)
                    ->select('advertisers.id', 'advertisers.company_name', 'advertisers.company_logo', 'advertisers.job_type', 'advertisers.job_description as description', 'advertisers.location', 'advertisers.category', 'advertisers.deadline_date', 'advertisers.salary_offer', 'advertisers.adv_email', 'advertisers.adv_phone', 'advert_counties.country_id as country')
                    ->get();
                    //->toJson();
        return  $data;
    }

    public function update_advertiser(Request $request){
        $data   =   $request->all();
        if($request->hasFile('company_logo')){
            $newsImage          =   $request->file('company_logo');
            $destinationPath    =   public_path('uploads/advert/');
            $image_name         =   pathinfo($newsImage->getClientOriginalName(), PATHINFO_FILENAME);
            $data['company_logo']      =   (rand(1000,10000)).'-'.$image_name.'.'.$newsImage->getClientOriginalExtension();
            $newsImage->move($destinationPath, $data['company_logo']);
        }
        else{
            unset($data['company_logo']);
        }        
        $id =   $data['EditId'];
        unset($data['EditId']);
        unset($data['_token']);
        Advertiser::where('id',$id)->update($data);
        return true;
    }

    public function delete_advertiser(Request $request){
        Advertiser::where('id', $request->addid)->delete();
        return true;
    }
}
