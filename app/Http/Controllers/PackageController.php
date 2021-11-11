<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Image;
use App\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {        
            $data = Package::query();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<h5><a href="javascript:void(0)" id="EditModel" data-id="'. $row->id .'" > <i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp; &nbsp;';
                            $btn .= '<a href="javascript:void(0)" id="DeleteModel" data-id="'. $row->id .'" ><i class="fa fa-trash-o" style="color: red;" onclick="myFunction()"></a></h5>';
                            return $btn;
                    })
                    ->addColumn('price', function($row){
                        $price  =   '€'.$row->price;
                        return $price;
                    })
                    ->rawColumns(['action','price'])
                    ->make(true);
        }
        return view('admin.managepackage');
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

        if($request->has('EditId')){  
            $id = $input['EditId'];
            unset($input['EditId']);
            Package::where('id',$id)->update($input);
            return response()->json([ 'status' => 1 ,  'success'=>'Record Edited successfully']);

        }else{
            Package::create($input);
            return response()->json([ 'status' => 1 ,  'success'=>'Record added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Package::where('id',$id)->first();
        return response()->json($event);
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
        Package::where("id",$id)->delete();
        return response()->json('Item deleted');
    }
}
