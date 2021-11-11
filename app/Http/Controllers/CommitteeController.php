<?php

namespace App\Http\Controllers;

use App\Committee;
use Illuminate\Http\Request;
use DataTables;
use Image;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {        
            $data = Committee::query();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            
                           
                            $btn = '<h5><a href="javascript:void(0)" id="EditModel" data-id="'. $row->id .'" > <i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp; &nbsp;';
                            $btn .= '<a href="javascript:void(0)" id="DeleteModel" data-id="'. $row->id .'" ><i class="fa fa-trash-o" style="color: red;" onclick="myFunction()"></a></h5>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.cms.commiti');


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
        $input = $request->all();

        if($request->has('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('imagess'), $imageName);
            $get_img = public_path("imagess/" . $imageName);
            $thumbnail = public_path("imagess/thumb-" . $imageName);
            Image::make($get_img)->resize(270, 270)->save($thumbnail);       
            $input['image']=$imageName;
        } 


        if($request->has('EditId')){  
            $id = $input['EditId'];
            unset($input['EditId']);
            Committee::where('id',$id)->update($input);
            return response()->json([ 'status' => 1 ,  'success'=>'Record Edited successfully']);

        }else{
            Committee::create($input);
            return response()->json([ 'status' => 1 ,  'success'=>'Record added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $committi = Committee::where('id',$id)->first();
       
        return response()->json($committi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function edit(Committee $committee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Committee $committee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Committee::where("id",$id)->delete();
        return response()->json('Item deleted');
    }
}
