<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\User;
use App\Event;
use App\EventCheckOut;
use App\Sponsor;
use Auth;
use Image;
use Rap2hpoutre\FastExcel\FastExcel;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::where("status", "=", "1")->get();
        $oursponser = Sponsor::get();
        return view('user.pages.event', compact('data', 'oursponser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventcheckout(Request $request)
    {
        if (!Auth::check()) {
            $input = $request->all();
            EventCheckOut::create($input);
        } else {
            $input = $request->all();
            $input['user_id'] = Auth::user()->id;
            EventCheckOut::create($input);
        }
    }

    public function create()
    {
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
        $event          =   Event::where('id', $id)->first();
        $popularevent   =   Event::take(5)->get();
        $oursponser     =   Sponsor::get();
        return view('user.pages.eventdetail', compact('event', 'popularevent', 'oursponser'));
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

    public function export_data(Request $request)
    {

        $data['dateFrom']   =   date("Y-m-d", strtotime($request->post('fromdate'))) . " 00:00:00";
        $data['dateTo']     =   date("Y-m-d", strtotime($request->post('todate'))) . " 23:59:59";
        $data['search_key']     =   $request->post('search_key');
        $filter_type     =   $request->post('filter_type');

        // $dbData    =   EventCheckOut::whereBetween('created_at', [$data['dateFrom'], $data['dateTo']])->get();
        //snigdho

        // echo  $filter_type;
        // echo  $data['dateFrom'];
        // echo  $data['dateTo'];die;

        $from_range_selected = preg_match('/\b1970\b/', $data['dateFrom']);
        $to_range_selected = preg_match('/\b1970\b/', $data['dateTo']);

        if ($data['dateFrom'] != '' && $data['dateTo'] != '' && !$from_range_selected && !$to_range_selected) {

            if ($filter_type == 'event_name') {
                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("events.title", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(event_check_outs.created_at >= '? AND event_check_outs.created_at <= '?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'person_name') {
                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    // 'events.created_at as EventDate',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("event_check_outs.name", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(event_check_outs.created_at >= '? AND event_check_outs.created_at <= '?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'contact_number') {
                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("event_check_outs.phone_no", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(event_check_outs.created_at >= '? AND event_check_outs.created_at <= '?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'year_left') {
                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("event_check_outs.year", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(event_check_outs.created_at >= '? AND event_check_outs.created_at <= '?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'event_date') {

                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("events.created_at", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(event_check_outs.created_at >= '? AND event_check_outs.created_at <= '?)",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == '' && $data['search_key'] == '') {

                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->whereRaw(
                        "(event_check_outs.created_at >= '?' AND event_check_outs.created_at <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else {
                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("events.created_at", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("event_check_outs.phone_no", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("event_check_outs.orderID", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("event_check_outs.address", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("event_check_outs.year", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("event_check_outs.eventfee", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(event_check_outs.created_at >= '?' AND event_check_outs.created_at <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            }
        } else {
            if ($filter_type == 'event_name') {
                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("events.title", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'person_name') {
                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("event_check_outs.name", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'contact_number') {
                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("event_check_outs.phone_no", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'year_left') {
                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("event_check_outs.year", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'event_date') {

                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("events.created_at", "like", "%" . $data['search_key'] . "%")->get();
            } else {
                $dbData = EventCheckOut::select(
                    'events.title as EventTitle',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as EventDate'),
                    // 'event_check_outs.id as id',
                    'event_check_outs.name as PersonName',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as ContactNo',
                    'event_check_outs.year as LeftYear',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID'
                )
                    ->join('events', 'event_check_outs.package', '=', 'events.id')
                    ->where("events.created_at", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("event_check_outs.phone_no", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("event_check_outs.orderID", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("event_check_outs.address", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("event_check_outs.year", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("event_check_outs.eventfee", "like", "%" . $data['search_key'] . "%")->get();
            }
        }




        // echo $data['search_key'];
        // echo '<pre>';
        //     print_r($dbData);
        //     die();
        if ($dbData->count()) {
            $file = time() . "-export.xlsx";
            return (new FastExcel($dbData))->download($file);
        } else {
            return back()->with('error', 'No Data found');
        }
    }

    public function insertEvent(Request $request)
    {
        $data   =   $request->all();
        if ($request->hasFile('image')) {
            //$data['image']   =   $request->file('image')->getClientOriginalName();
            $profile    =   $request->file('image');
            $imageName  =   time() . '.' . request()->image->getClientOriginalExtension();
            $destinationPath    =   public_path() . '/imagess/thumbnail';
            $img = Image::make($profile->path());
            $img->resize(200, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imageName);

            $destinationPath    =   public_path() . '/imagess';
            $profile->move($destinationPath, $imageName);
            $data['image']     =   $imageName;
        }
        //from date
        $fromdate           =   str_replace('/', '-', $data['fromdate']);
        $data['fromdate']   =   date('Y-m-d', strtotime($fromdate));
        //from date
        /*$todate             =   str_replace('/', '-', $data['todate']);
        $data['todate']     =   date('Y-m-d', strtotime($todate));*/
        $data['desc']   = $request->desc;
        Event::create($data);
        return true;
    }

    public function update_event(Request $request)
    {
        $data   =   $request->all();
        if ($request->hasFile('image')) {
            //$data['image']   =   $request->file('image')->getClientOriginalName();
            $profile    =   $request->file('image');
            $imageName  =   time() . '.' . request()->image->getClientOriginalExtension();
            $destinationPath    =   public_path() . '/imagess/thumbnail';
            $img = Image::make($profile->path());
            $img->resize(200, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imageName);

            $destinationPath    =   public_path() . '/imagess';
            $profile->move($destinationPath, $imageName);
            $data['image']     =   $imageName;
        } else {
            unset($data['image']);
        }
        //from date
        $fromdate           =   str_replace('/', '-', $data['fromdate']);
        $data['fromdate']   =   date('Y-m-d', strtotime($fromdate));
        //to date
        /*$todate             =   str_replace('/', '-', $data['todate']);
        $data['todate']     =   date('Y-m-d', strtotime($todate));*/
        $id =   $data['EditId'];
        unset($data['EditId']);
        unset($data['todate']);
        /*echo '<pre>';
        print_r($data);
        die();*/
        
        Event::where('id', $id)->update($data);
        return true;
    }

    public function eventSubscribedUsers(Request $request)
    {
        if ($request->ajax()) {
            //snigdho
            // $data = EventCheckOut::Join('events', function($join) {
            //     $join->on('event_check_outs.package', '=', 'events.id');
            // //})->get()->toArray();
            // })->get();
            $data = DB::table('event_check_outs')
                // ->join('users' , 'event_check_outs.user_id' , '=','users.id')
                ->join('events', 'event_check_outs.package', '=', 'events.id')
                //->select ('event_check_outs.*','users.*','events.*')->get()->toArray();
                ->select(
                    'event_check_outs.id as id',
                    'event_check_outs.eventfee as eventfee',
                    'event_check_outs.payerID as payerID',
                    'event_check_outs.orderID',
                    'event_check_outs.name as name',
                    'event_check_outs.address as bookingEmail',
                    'event_check_outs.phone_no as bookingPhone',
                    'event_check_outs.year as year',
                    'events.title as title',
                    DB::raw('DATE_FORMAT(events.created_at,"%d-%m-%Y %h:%i:%s") as date') 
                )->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function ($row) {
                    $row->date    =   date("d-m-Y", strtotime($row->date));
                    return $row->date;
                })
                ->rawColumns(['date'])
                ->make(true);
            /*echo '<pre>';
            print_r($data);
            die();*/
        }
        return view('admin.eventenrolledmember');
    }

    
    public function event_search(Request $request)
    {

        $search_keyword     =   $request->get('query');

        $data = Event::where("status", "=", "1")
        ->where('title','LIKE','%'.$search_keyword.'%')
        ->paginate(10);

        $oursponser = Sponsor::get();

        return view('user.pages.event',compact('data','oursponser'));
    }


    // archived events

    public function archivedevents()
    {
        $today = date('Y-m-d');

        $data = Event::where("status", "=", "0")
        ->orWhere("fromdate", "<", "'" . $today . "'")
        ->get();
        
        $oursponser = Sponsor::get();
        return view('user.pages.archivedevents', compact('data', 'oursponser'));
    }

    public function showarchivedevents($id)
    {
        $event          =   Event::where('id', $id)->first();
        $popularevent   =   Event::take(5)->get();
        $oursponser     =   Sponsor::get();
        return view('user.pages.archiveeventdetail', compact('event', 'popularevent', 'oursponser'));
    }


    
    public function archived_event_search(Request $request)
    {

        $search_keyword     =   $request->get('query');

        $data = Event::where("status", "=", "0")
        ->where('title','LIKE','%'.$search_keyword.'%')
        ->paginate(10);

        $oursponser = Sponsor::get();

        return view('user.pages.archivedevents',compact('data','oursponser'));
    }

    public function autocomplete(Request $request)
    {
        $search_keyword     =   $request->post('query');
        $status     =   $request->post('status');

        $eData = Event::where("status", "=", $status)
        ->where('title','LIKE','%'.$search_keyword.'%')
        ->paginate(10);

        $outputData     =   '<ul id="suggestions" class="dropdown-menu" style="display:block; position:relative;">';
        $sg  =   1;

        foreach ($eData as $data) {
            $outputData     .=  '<li class="sugg">'.$data->title.'</li>';
            $sg++;
        }

        $outputData     .=  '</ul>';
        echo $outputData;
    }


}
