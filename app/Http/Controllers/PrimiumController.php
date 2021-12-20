<?php

namespace App\Http\Controllers;

use App\User;
use App\Sponsor;
use App\Userpackage;
use App\Package;
use App\Olddata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Image;
use DateTime;
use Auth;
use Hash;
use DB;
//use Exporter;
//use Importer;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use Rap2hpoutre\FastExcel\FastExcel;

class PrimiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            //$data       =   new Userpackage();
            $data = Userpackage::Join('users', function ($join) {
                $join->on('userpackages.id', '=', 'users.id');
            });
            /*echo '<pre>';
            print_r($data->get());
            die();*/
            $testRedio  =   $request->myKey;

            if ($testRedio === 'All') {
                $data   =   $data->get();
            } else {
                $data   =   $data->where('type', $testRedio)->get();
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    $html    =   '<input type="checkbox" class="check-member" name="check_member" id="check_member" value="'.$row->user_id.'" />';
                    return $html;
                })
                ->addColumn('action', function ($row) {
                    $btn    =   '<h5><a href="javascript:void(0)" id="EditModel" data-id="' . $row->id . '" > <i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp; &nbsp;';
                    $btn    .=  '<a href="javascript:void(0)" id="DeleteModel" data-id="' . $row->id . '" ><i class="fa fa-trash-o" style="color: red;" onclick="myFunction()"></a></h5>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $row->status    =   'Active';
                    } else {
                        $row->status    =   'Inactive';
                    }
                    return $row->status;
                })
                ->addColumn('company', function ($row) {
                    if ($row->company) {
                        $row->company   =   $row->company;
                    } else {
                        $row->company   =   'NA';
                    }
                    return $row->company;
                })
                ->addColumn('title', function ($row) {
                    if ($row->title) {
                        $row->title   =   $row->title;
                    } else {
                        $row->title   =   'NA';
                    }
                    return $row->title;
                })
                ->addColumn('industry', function ($row) {
                    if ($row->industry) {
                        $row->industry   =   $row->industry;
                    } else {
                        $row->industry   =   'NA';
                    }
                    return $row->industry;
                })
                ->addColumn('price', function ($row) {
                    if ($row->price) {
                        $price  =   '€' . $row->price;
                    } else {
                        $price  =   $row->price;
                    }
                    return $price;
                })
                ->addColumn('phone_no', function ($row) {
                    if ($row->phone_no) {
                        $row->phone_no   =   $row->phone_no;
                    } else {
                        $row->phone_no   =   'NA';
                    }
                    return $row->phone_no;
                })
                ->addColumn('start_date', function ($row) {
                    $row->start_date    =   date("d-m-Y", strtotime($row->start_date));
                    return $row->start_date;
                })
                ->addColumn('end_date', function ($row) {
                    $row->end_date    =   date("d-m-Y", strtotime($row->end_date));
                    return $row->end_date;
                })
                ->rawColumns(['checkbox','action', 'status', 'company', 'title', 'phone_no', 'industry'])
                ->make(true);
        }
        return view('admin.payedmember');
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

    public function add_new_user()
    {
        return view('admin.add_member');
    }

    public function get_user_billing_history(Request $request)
    {
        if ($request->ajax()) {
            $data       =   new Userpackage();

            $testRedio  =   $request->myKey;
            if ($testRedio === 'All') {
                $data   =   $data->get();
            } else {
                $data   =   $data->where('type', $testRedio)->get();
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $row->status    =   'Active';
                    } else {
                        $row->status    =   'Inactive';
                    }
                    return $row->status;
                })
                ->addColumn('price', function ($row) {
                    if ($row->price) {
                        $price  =   '€' . $row->price;
                    } else {
                        $price  =   $row->price;
                    }
                    return $price;
                })
                ->addColumn('start_date', function ($row) {
                    $row->start_date    =   date("d-m-Y", strtotime($row->start_date));
                    return $row->start_date;
                })
                ->addColumn('end_date', function ($row) {
                    $row->end_date    =   date("d-m-Y", strtotime($row->end_date));
                    return $row->end_date;
                })
                ->addColumn('action', function ($row) {
                    $btn    =   '<h5><a href="javascript:void(0)" id="EditModel" data-id="' . $row->id . '" > <i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp; &nbsp;';
                    $btn    .=  '<a href="javascript:void(0)" id="DeleteModel" data-id="' . $row->id . '" ><i class="fa fa-trash-o" style="color: red;" onclick="myFunction()"></a></h5>';
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('admin.payedmemberlogs');
    }

    public function insert_new_user(Request $request)
    {
        $data   =   $request->all();
        if ($request->hasFile('image')) {
            $newsImage              =   $request->file('image');
            $destinationPath        =   public_path('uploads/profile/');
            $image_name             =   pathinfo($newsImage->getClientOriginalName(), PATHINFO_FILENAME);
            $data['profile_img']    =   (rand(1000, 10000)) . '-' . $image_name . '.' . $newsImage->getClientOriginalExtension();
            $newsImage->move($destinationPath, $data['profile_img']);
        } else {
            unset($data['image']);
        }
        if (!empty($data['password'])) {
            $data['password']  =   Hash::make($data['password']);
        } else {
            $data['password']  =   Hash::make($data['name'] . '123');
        }
        if ($data['usertype'] == 'sponser') {
            $data['sponser']  =    '1';
        } else if ($data['usertype'] == 'advertiser') {
            $data['advertiser']  =    '1';
        } else {
            $data['member']  =    '1';
        }
        unset($data['_token']);
        unset($data['usertype']);
        User::create($data);
        //return back()->withInput();
        return back()->with('message', 'User Added Successfully');
    }

    public function export_data(Request $request)
    {

        $data['dateFrom']   =   date("Y-m-d", strtotime($request->post('expofromdate'))) . " 00:00:00";

        $data['dateTo']     =   date("Y-m-d", strtotime($request->post('expotodate'))) . " 23:59:59";

        $data['search_key']     =   $request->post('search_key');
        $filter_type     =   $request->post('filter_type');

        //$dbData    =   Userpackage::get();

        $from_range_selected = preg_match('/\b1970\b/', $data['dateFrom']);
        $to_range_selected = preg_match('/\b1970\b/', $data['dateTo']);

        if ($data['dateFrom'] != '' && $data['dateTo'] != '' && !$from_range_selected && !$to_range_selected) {
            if ($filter_type == 'type') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("type", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= '?' AND start_date <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'useremail') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("useremail", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= '?' AND start_date <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'username') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("username", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= '?' AND start_date <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'month') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("month", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= '?' AND start_date <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'end_date') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("end_date", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= '?' AND start_date <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == '' && $data['search_key'] == '') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->whereRaw(
                        "(start_date >= '?' AND start_date <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("type", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("useremail", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("username", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("month", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("end_date", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= '?' AND start_date <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            }
        } else {
            if ($filter_type == 'type') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("type", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'useremail') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("useremail", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'username') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("username", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'month') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("month", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'end_date') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("end_date", "like", "%" . $data['search_key'] . "%")->get();
            } else {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->where("type", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("useremail", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("username", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("month", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("end_date", "like", "%" . $data['search_key'] . "%")
                    ->get();
            }
        }


        if ($dbData->count()) {
            $file = time() . "-export.xlsx";
            return (new FastExcel($dbData))->download($file);
        } else {
            return back()->with('error', 'No Data found');
        }
    }

    public function export_primium_data(Request $request)
    {

        $data['dateFrom']   =   date("Y-m-d", strtotime($request->post('expofromdate'))) . " 00:00:00";

        $data['dateTo']     =   date("Y-m-d", strtotime($request->post('expotodate'))) . " 23:59:59";

        $data['search_key']     =   $request->post('search_key');
        $filter_type     =   $request->post('filter_type');
        $status     =   $request->post('set_status');

        //$dbData    =   Userpackage::get();

        $from_range_selected = preg_match('/\b1970\b/', $data['dateFrom']);
        $to_range_selected = preg_match('/\b1970\b/', $data['dateTo']);

        if ($data['dateFrom'] != '' && $data['dateTo'] != '' && !$from_range_selected && !$to_range_selected) {
            if ($filter_type == 'type') {

                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("type", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'useremail') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("useremail", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'username') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("username", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'month') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("month", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'end_date') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("end_date", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'year_left') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as year_left'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("year_left", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'company') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("company", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'title') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("title", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'phone_no') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("phone_no", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'status') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("userpackages.status", "like", "%" . $status . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == '' && $data['search_key'] == '') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("type", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("useremail", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("username", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("month", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("end_date", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("year_left", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("company", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("title", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("phone_no", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("userpackages.status", "like", "%" . $status . "%")
                    ->whereRaw(
                        "(start_date >= ? AND start_date <= ?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            }
        } else {
            if ($filter_type == 'type') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("type", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'useremail') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("useremail", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'username') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("username", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'month') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("month", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'end_date') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("end_date", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'year_left') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("year_left", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'company') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("company", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'title') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("title", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'phone_no') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("phone_no", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'status') {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("userpackages.status", "like", "%" . $status . "%")->get();
            } else {
                $dbData = Userpackage::select(
                    'username',
                    'useremail',
                    'type',
                    'price',
                    'month',
                    'year_left as Year Left',
                    'name as firstname',
                    'surname',
                    'email',
                    'company',
                    'phone_no',
                    DB::raw('DATE_FORMAT(start_date,"%d-%m-%Y %h:%i:%s") as start_date'),
                    DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y %h:%i:%s") as end_date'),
                    DB::raw('DATE_FORMAT(userpackages.created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                    ->join('users', 'userpackages.id', '=', 'users.id')
                    ->where("type", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("useremail", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("username", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("month", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("end_date", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("year_left", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("company", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("title", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("phone_no", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("userpackages.status", "like", "%" . $status . "%")
                    ->get();
            }
        }

        //old
        // $data['dateFrom']   =   date("Y-m-d", strtotime($request->post('fromdate'))) . " 00:00:00";
        // $data['dateTo']     =   date("Y-m-d", strtotime($request->post('todate'))) . " 23:59:59";

        // $dbData     =   Userpackage::Join('users', function ($join) {
        //     $join->on('userpackages.id', '=', 'users.id');
        // })
        //     ->whereBetween('users.created_at', [$data['dateFrom'], $data['dateTo']])
        //     ->get();

        if ($dbData->count()) {
            $file = time() . "-export.xlsx";
            return (new FastExcel($dbData))->download($file);
        } else {
            return back()->with('error', 'No Data found on selective date range');
        }
    }

    public function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 12; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }


    public function import_member_data(Request $request)
    {
        $this->validate($request, [
            'select_file'   =>  'required|mimes:xls,xlsx'
        ]);

        $data = (new FastExcel)->import($request->file('select_file')->getRealPath());
        //echo "<pre>";
        //print_r($data);

        /*foreach($data as $key => $value){
                // print_r($value);
                Olddata::create($value);
            }*/

        //die();
        if ($data->count() > 0) {
            foreach ($data as $key => $value) {

                $insertData[]   =   [
                    'name'          =>  $value['first_name'],
                    'surname'       =>  $value['last_name'],
                    'email'         =>  $value['email'],
                    'password'      =>  Hash::make(self::randomPassword()),
                    'mail_pass'     =>  self::randomPassword(),
                    'company'       =>  $value['company'],
                    'title'         =>  $value['title'],
                    'phone_no'      =>  $value['phone_no'],
                    'industry'      =>  $value['industry'],
                    'member'        =>  1,
                    'sponser'       =>  0,
                    'advertiser'    =>  0,
                    'package_id'    =>  $value['package_id'],
                    'start_date'    =>  $value['start_date']->format('Y-m-d'),
                ];

                $packagesData[]   =   [
                    'username'      =>  $value['first_name'],
                    'useremail'     =>  $value['email'],
                    'type'          =>  'member',
                    'price'         =>  $value['price'],
                    'month'         =>  $value['month'],
                    'start_date'    =>  $value['start_date']->format('Y-m-d'),
                    //'end_date'      =>  $value['end_date']->format('Y-m-d'),
                    'package_id'    =>  $value['package_id'],
                    'status'        =>  $value['status'],
                ];
            }
            //print_r($insertData); die();
            if (!empty($insertData) && !empty($packagesData)) {
                foreach ($insertData as $key => $insert) {
                    //echo $insert['package_id'];
                    $users      =   User::where('email', '=', $insert['email'])->first();
                    if (Package::where('id', '=', $insert['package_id'])->first() === null) {
                        return back()->with('error', 'Package id added on your excel not found');
                    } else {
                        $package    =   Package::where('id', '=', $insert['package_id'])->get()->toArray();
                        //subscription expiry calculation
                        $convertDate    =   strtotime($insert['start_date']);
                        $expiryDate     =   date("Y-m-d", strtotime("+" . $package[0]['month'] . " month", $convertDate));
                        //renew date
                        $xpriryDate     =   strtotime($expiryDate);
                        $renewalDate    =   date("Y-m-d", strtotime("+1 day", $xpriryDate));
                        $packagesData[$key]['end_date']  =   $renewalDate;
                        unset($insertData[$key]['package_id']);
                        unset($insertData[$key]['start_date']);
                    }

                    if ($users === null) {
                        $data   =   [
                            "first_name"    =>  ucfirst($insert['name']),
                            "last_name"     =>  ucfirst($insert['surname']),
                            "email"         =>  $insert['email'],
                            "phone"         =>  $insert['phone_no'],
                            "password"      =>  $insert['mail_pass'],
                            "body"          =>  "Welcome to Belvedere",
                            "subscribed_on" =>  $insert['start_date'],
                            "renew_date"    =>  $renewalDate
                        ];
                        Mail::send('admin.mail.import_member', $data, function ($message) use ($insert) {
                            $message->to($insert['email'], 'Belvedere')
                                ->subject('Welcome to Belvedere');
                            $message->from('noreply@belvedereunion.com', 'Belvedere');
                        });
                        unset($insert['mail_pass']);
                        //User::create($insert);
                        //dd($insert);
                        $packagesData[$key]['user_id']  =   User::create($insert)->id;
                    } else {
                        return back()->with('error', 'Remove redundant data from Excel');
                    }
                }
                foreach ($packagesData as $pkey => $packages) {
                    Userpackage::create($packages);
                }
            }
            return back()->with('success', 'Member Data Imported successfully');
        } else {
            return back()->with('error', 'Data not found on the spreadsheet');
        }
        //return back()->with('success','Mail send');
    }
}
