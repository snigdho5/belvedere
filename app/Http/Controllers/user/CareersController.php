<?php

namespace App\Http\Controllers\user;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\career;
use Mail;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = career::paginate(5);

        $advertisers    =   DB::table('advertisers')
                            ->join('users', 'users.id', '=', 'advertisers.advertiser_id')
                            ->join('advert_counties', 'advert_counties.county_id', '=', 'advertisers.location')
                            ->join('advert_cat', 'advert_cat.adv_cat_id', '=', 'advertisers.category')
                            ->orderBy('advertisers.created_at','DESC')
                            ->select('advertisers.id','advertisers.company_name', 'advertisers.company_logo', 'advertisers.job_type', 'advertisers.adv_email', 'advertisers.adv_phone', 'advert_counties.county', 'advert_counties.county', 'advert_cat.adv_cat_name as category', 'advertisers.job_description', 'advertisers.deadline_date', 'advertisers.salary_offer', 'advertisers.created_at as posted_on')
                            /*->get()
                            ->toArray()*/
                            ->paginate(10);

        return view('user.pages.career',compact('data','advertisers'));
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

    public function insertnewapplicant(Request $request){
        $data   =   $request->all();
        unset($data['_token']);
        unset($data['applicant_cv']);
        DB::table('job_applicants')->insert($data);
        $lastInsertId   =   DB::getPDO()->lastInsertId();
        return $lastInsertId;
    }

    public function search(Request $request)
    {
        $data = career::paginate(5);

        $search_keyword     =   $request->get('query');

        $advertisers        =   DB::table('advertisers')
                                ->join('users', 'users.id', '=', 'advertisers.advertiser_id')
                                ->join('advert_counties', 'advert_counties.county_id', '=', 'advertisers.location')
                                ->join('advert_cat', 'advert_cat.adv_cat_id', '=', 'advertisers.category')
                                ->orderBy('advertisers.created_at','DESC')
                                ->where('advertisers.company_name','LIKE','%'.$search_keyword.'%')
                                ->orWhere('advert_counties.county','LIKE','%'.$search_keyword.'%')
                                ->orWhere('advert_cat.adv_cat_name','LIKE','%'.$search_keyword.'%')
                                ->select('advertisers.id','advertisers.company_name', 'advertisers.company_logo', 'advertisers.job_type', 'advert_counties.county', 'advert_counties.county', 'advert_cat.adv_cat_name as category', 'advertisers.job_description', 'advertisers.adv_email', 'advertisers.adv_phone', 'advert_counties.county', 'advert_counties.county', 'advert_cat.adv_cat_name as category', 'advertisers.job_description', 'advertisers.deadline_date', 'advertisers.salary_offer', 'advertisers.created_at as posted_on')
                                /*->get()
                                ->toArray()*/
                                ->paginate(10);

        return view('user.pages.search',compact('data','advertisers'));
    }

    public function autocomplete(Request $request)
    {
        $search_keyword     =   $request->post('query');

        $advertisers        =   DB::table('advertisers')
                                ->join('users', 'users.id', '=', 'advertisers.advertiser_id')
                                ->join('advert_counties', 'advert_counties.county_id', '=', 'advertisers.location')
                                ->join('advert_cat', 'advert_cat.adv_cat_id', '=', 'advertisers.category')
                                ->orderBy('advertisers.created_at','DESC')
                                ->where('advertisers.company_name','LIKE','%'.$search_keyword.'%')
                                ->select('advertisers.id','advertisers.company_name', 'advertisers.company_logo', 'advertisers.job_type', 'advert_counties.county', 'advert_counties.county', 'advert_cat.adv_cat_name as category', 'advertisers.job_description', 'advertisers.adv_email', 'advertisers.adv_phone', 'advert_counties.county', 'advert_counties.county', 'advert_cat.adv_cat_name as category', 'advertisers.job_description', 'advertisers.deadline_date', 'advertisers.salary_offer', 'advertisers.created_at as posted_on')
                                ->get();

        $outputData     =   '<ul id="suggestions" class="dropdown-menu" style="display:block; position:relative;">';
        $sg  =   1;
        foreach ($advertisers as $data) {
            $outputData     .=  '<li class="sugg">'.$data->company_name.'</li>';
            $sg++;
        }

        $outputData     .=  '</ul>';
        echo $outputData;
    }
}
