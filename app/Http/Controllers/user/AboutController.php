<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CmsContent;
use App\Committee;
USE App\Sponsor;
use Auth;
use App\DonateCheckOut;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $content    =   CmsContent::where('page_type','about')->first();
        $oursponser =   Sponsor::get();
        return view('user.pages.about',compact('content','oursponser'));
    }
    public function whyjoin(){
        $content    =   CmsContent::where('page_type','whyjoin')->first();
        $oursponser =   Sponsor::get();
        return view('user.pages.whyjoin',compact('content','oursponser'));
    }

    public function commiti(){
        $member     =   Committee::get();
        return view('user.pages.committi',compact('member'));
    }

    public function belvedere_benevolent_association(){
        $content    =   CmsContent::where('page_type','bba-donate')->first();
        $oursponser =   Sponsor::get();
        return view('user.pages.bba-donate',compact('content','oursponser'));
    }

    public function save_benevolent_donate(Request $request)
    {
        if(!Auth::check()){
            $input = $request->all();
            DonateCheckOut::create($input); 
        }
        else{
            $input = $request->all();
            $input['user_id'] = Auth::user()->id;
            DonateCheckOut::create($input);           
        }
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
}
