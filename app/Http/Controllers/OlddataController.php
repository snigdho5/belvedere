<?php

namespace App\Http\Controllers;

use App\Olddata;
use Illuminate\Http\Request;
use DataTables;
use Image;
use Rap2hpoutre\FastExcel\FastExcel;

class OlddataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if($request->ajax()){
            $data = Olddata::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn    =   '<h5><a href="javascript:void(0)" id="EditModel" data-id="'. $row->id .'" > <i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp; &nbsp;';
                    $btn    .=  '<a href="javascript:void(0)" id="DeleteModel" data-id="'. $row->id .'" ><i class="fa fa-trash-o" style="color: red;" onclick="myFunction()"></a></h5>';
                    return $btn;
                })
                ->addColumn('name', function($row){
                    $name    =      $row->title.' '.$row->first_name.' '.$row->surname;
                    return $name;
                })
                ->rawColumns(['name','action'])
                ->make(true);
        }
        return view('admin.cms.olddata');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Olddata  $olddata
     * @return \Illuminate\Http\Response
     */
    public function show(Olddata $olddata){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Olddata  $olddata
     * @return \Illuminate\Http\Response
     */
    public function edit(Olddata $olddata){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Olddata  $olddata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Olddata $olddata){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Olddata  $olddata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Olddata $olddata){
        //
    }

    public function export_data(Request $request){
        
        //$data['dateFrom']   =   date("Y-m-d", strtotime($request->post('expofromdate')))." 00:00:00";
        // $data['dateTo']     =   date("Y-m-d", strtotime($request->post('expotodate')))." 23:59:59";



        //$oldData    =   Olddata::get();
        //$oldData    =   Olddata::whereBetween('created_at', [$data['dateFrom'], $data['dateTo']])->get();
        $oldData    =   Olddata::whereBetween('year_left', [$request->post('expofromdate'), $request->post('expotodate')])->get();
        if($oldData->count()){
            $file = time()."-export.xlsx" ;
            return (new FastExcel($oldData))->download($file);
        }
        else{
            return back()->with('error','No Data found');
        }
    }
}
