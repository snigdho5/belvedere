<?php

namespace App\Http\Controllers;

use App\OurClub;
use App\Http\Requests\OurClubRequest;
use Illuminate\Http\Request;

class OurClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OurClub::get();
        return view('admin.ourclub', compact('data'));
    }

    public function show($id)
    {
        $Label = OurClub::where('id', $id)->first();
        return response()->json(['status' => 1,  'success' => 'success', 'data' => $Label]);
    }

    public function AddEdit(OurClubRequest $request)
    {
        $postData = $request->all();
        OurClub::updateOrCreate(["id" => $postData["id"]], $postData);
        return response()->json(['status' => 1,  'success' => 'Record added successfully']);
        //
    }
}
