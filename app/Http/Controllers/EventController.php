<?php



namespace App\Http\Controllers;



use App\Event;

use Illuminate\Http\Request;

use DataTables;

use Image;

use DB;

use DateTime;

use App\Blog;

use Rap2hpoutre\FastExcel\FastExcel;

//use Yajra\Datatables\Datatables;

//use Illuminate\Support\Facades\DB;



class EventController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */



    public function index(Request $request)

    {

        if ($request->ajax()) {

            $data = Event::query();

            return DataTables::of($data)

                ->addIndexColumn()

                ->addColumn('status', function ($row) {

                    if($row->status == 1){
                        $btn_st    =   'Active';
                    }else{
                        $btn_st    =   'Inactive';
                    }

                    return $btn_st;
                })

                ->addColumn('action', function ($row) {

                    $btn    =   '<h5><a href="javascript:void(0)" id="EditModel" data-id="' . $row->id . '" > <i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp; &nbsp;';

                    $btn    .=  '<a href="javascript:void(0)" id="DeleteModel" data-id="' . $row->id . '" ><i class="fa fa-trash-o" style="color: red;" onclick="myFunction()"></a></h5>';

                    return $btn;
                })

                ->addColumn('fromdate', function ($row) {

                    $timestamp      =   strtotime($row->fromdate);

                    $row->fromdate  =   date("d-m-Y", $timestamp);

                    return $row->fromdate;
                })

                ->rawColumns(['action', 'fromdate'])

                ->make(true);
        }

        return view('admin.event');
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

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

        $input  =   $request->all();

        $date   =   $input['date'];



        $newDate    =   date("Y-m-d", strtotime($date));



        $input['date']  =   $newDate;



        if ($request->has('image')) {

            /*$imageName      =   time().'.'.request()->image->getClientOriginalExtension();

            request()->image->move(public_path('imagess'), $imageName);

            $get_img        =   public_path("imagess/" . $imageName);

            $thumbnail      =   public_path("imagess/thumb-" . $imageName);

            Image::make($get_img)->resize(570, 461)->save($thumbnail);       

            $input['image'] =   $imageName;*/



            $profile    =   $request->file('image');

            $imageName  =   time() . '.' . request()->image->getClientOriginalExtension();

            $destinationPath    =   public_path() . '/imagess/thumbnail';

            $img = Image::make($profile->path());

            $img->resize(200, 80, function ($constraint) {

                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imageName);



            $destinationPath    =   public_path() . '/imagess';

            $profile->move($destinationPath, $imageName);

            $input['image']     =   $imageName;
        }





        if ($request->has('EditId')) {

            $id     =   $input['EditId'];

            unset($input['EditId']);

            Event::where('id', $id)->update($input);

            return response()->json(['status' => 1,  'success' => 'Record Edited successfully']);
        } else {

            Event::create($input);

            return response()->json(['status' => 1,  'success' => 'Record added successfully']);
        }
    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Event  $event

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $event  =   Event::where('id', $id)->first();

        $date   =   $event['date'];

        $newDate    =   \Carbon\Carbon::parse($date)->format('m-d-Y');

        $event['date']  =   $newDate;

        return response()->json($event);
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Event  $event

     * @return \Illuminate\Http\Response

     */

    public function edit(Event $event)

    {

        dd('edit');
    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Event  $event

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Event $event)

    {

        dd('update');
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Event  $event

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        Event::where("id", $id)->delete();

        return response()->json('Item deleted');
    }



    public function export_data(Request $request)

    {

        $data['dateFrom']   =   date("Y-m-d", strtotime($request->post('expofromdate'))) . " 00:00:00";

        $data['dateTo']     =   date("Y-m-d", strtotime($request->post('expotodate'))) . " 23:59:59";

        $data['search_key']     =   $request->post('search_key');
        $filter_type     =   $request->post('filter_type');
        $status     =   $request->post('set_status');

        //$dbData    =   Event::get();

        $from_range_selected = preg_match('/\b1970\b/', $data['dateFrom']);
        $to_range_selected = preg_match('/\b1970\b/', $data['dateTo']);

        if ($data['dateFrom'] != '' && $data['dateTo'] != '' && !$from_range_selected && !$to_range_selected) {
            if ($filter_type == 'title') {
                $dbData = Event::select(
                    'title',
                    DB::raw('DATE_FORMAT(fromdate,"%d-%m-%Y %h:%i:%s") as fromdate'),
                    DB::raw('DATE_FORMAT(todate,"%d-%m-%Y %h:%i:%s") as todate'),
                    'time',
                    'cost',
                    'desc',
                    'phone_no',
                    'email',
                    'address',
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                ->where("title", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(fromdate >= '?' AND fromdate <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'location') {
                $dbData = Event::select(
                    'title',
                    DB::raw('DATE_FORMAT(fromdate,"%d-%m-%Y %h:%i:%s") as fromdate'),
                    DB::raw('DATE_FORMAT(todate,"%d-%m-%Y %h:%i:%s") as todate'),
                    'time',
                    'cost',
                    'desc',
                    'phone_no',
                    'email',
                    'address',
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                ->where("address", "like", "%" . $data['search_key'] . "%")
                    ->whereRaw(
                        "(fromdate >= '?' AND fromdate <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == 'status') {

                $dbData = Event::select(
                    'title',
                    DB::raw('DATE_FORMAT(fromdate,"%d-%m-%Y %h:%i:%s") as fromdate'),
                    DB::raw('DATE_FORMAT(todate,"%d-%m-%Y %h:%i:%s") as todate'),
                    'time',
                    'cost',
                    'desc',
                    'phone_no',
                    'email',
                    'address',
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                ->where("status", "like", "%" . $status . "%")
                    ->whereRaw(
                        "(fromdate >= '?' AND fromdate <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else if ($filter_type == '' && $data['search_key'] == '') {
                $dbData = Event::select(
                    'title',
                    DB::raw('DATE_FORMAT(fromdate,"%d-%m-%Y %h:%i:%s") as fromdate'),
                    DB::raw('DATE_FORMAT(todate,"%d-%m-%Y %h:%i:%s") as todate'),
                    'time',
                    'cost',
                    'desc',
                    'phone_no',
                    'email',
                    'address',
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                ->whereRaw(
                        "(fromdate >= '?' AND fromdate <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            } else {
                $dbData = Event::select(
                    'title',
                    DB::raw('DATE_FORMAT(fromdate,"%d-%m-%Y %h:%i:%s") as fromdate'),
                    DB::raw('DATE_FORMAT(todate,"%d-%m-%Y %h:%i:%s") as todate'),
                    'time',
                    'cost',
                    'desc',
                    'phone_no',
                    'email',
                    'address',
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                ->where("title", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("address", "like", "%" . $data['search_key'] . "%")
                    ->orWhere("status", "like", "%" . $status . "%")
                    ->whereRaw(
                        "(fromdate >= '?' AND fromdate <= '?')",
                        [
                            $data['dateFrom'],
                            $data['dateTo']
                        ]
                    )->get();
            }
        } else { 
            if ($filter_type == 'title') {
                $dbData = Event::select(
                    'title',
                    DB::raw('DATE_FORMAT(fromdate,"%d-%m-%Y %h:%i:%s") as fromdate'),
                    DB::raw('DATE_FORMAT(todate,"%d-%m-%Y %h:%i:%s") as todate'),
                    'time',
                    'cost',
                    'desc',
                    'phone_no',
                    'email',
                    'address',
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                ->where("title", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'location') {
                $dbData = Event::select(
                    'title',
                    DB::raw('DATE_FORMAT(fromdate,"%d-%m-%Y %h:%i:%s") as fromdate'),
                    DB::raw('DATE_FORMAT(todate,"%d-%m-%Y %h:%i:%s") as todate'),
                    'time',
                    'cost',
                    'desc',
                    'phone_no',
                    'email',
                    'address',
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                ->where("address", "like", "%" . $data['search_key'] . "%")->get();
            } else if ($filter_type == 'status') {
                $dbData = Event::select(
                    'title',
                    DB::raw('DATE_FORMAT(fromdate,"%d-%m-%Y %h:%i:%s") as fromdate'),
                    DB::raw('DATE_FORMAT(todate,"%d-%m-%Y %h:%i:%s") as todate'),
                    'time',
                    'cost',
                    'desc',
                    'phone_no',
                    'email',
                    'address',
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                ->where("status", "like", "%" . $status . "%")->get();
            } else {
                $dbData = Event::select(
                    'title',
                    DB::raw('DATE_FORMAT(fromdate,"%d-%m-%Y %h:%i:%s") as fromdate'),
                    DB::raw('DATE_FORMAT(todate,"%d-%m-%Y %h:%i:%s") as todate'),
                    'time',
                    'cost',
                    'desc',
                    'phone_no',
                    'email',
                    'address',
                    DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y %h:%i:%s") as created_at')
                )
                ->where("title", "like", "%" . $data['search_key'] . "%")
                ->orWhere("address", "like", "%" . $data['search_key'] . "%")
                ->orWhere("status", "like", "%" . $status . "%")
                ->get();
            }
        }

        //$dbData    =   Event::whereBetween('fromdate', [$data['dateFrom'], $data['dateTo']])->get();

        if ($dbData->count()) {

            $file = time() . "-export.xlsx";

            return (new FastExcel($dbData))->download($file);
        } else {

            return back()->with('error', 'No Data found');
        }
    }



    /***************************************    News Module    ***************************************/



    public function news_list(Request $request)
    {

        if ($request->ajax()) {

            $data = Blog::query();

            return DataTables::of($data)

                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    //$btn    =   '<h5><a href="javascript:void(0)" id="EditModel" data-id="'. $row->id .'" > <i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp; &nbsp;';

                    $btn    =   '<h5><a href="editnews/' . $row->id . '"> <i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp; &nbsp;';

                    $btn    .=  '<a href="javascript:void(0)" id="DeleteModel" data-id="' . $row->id . '" ><i class="fa fa-trash-o" style="color: red;" onclick="myFunction()"></a></h5>';

                    return $btn;
                })

                ->rawColumns(['action'])

                ->make(true);
        }

        return view('admin.news');
    }



    public function insert_news(Request $request)
    {

        $data   =   $request->all();

        if ($request->hasFile('image')) {

            $data['image']   =   $request->file('image')->getClientOriginalName();
        } else {

            $data['image']   =   'no-image.jpg';
        }

        Blog::create($data);

        return true;
    }



    public function edit_news(Request $request, $id)
    {

        //$data   =   Blog::where('id', '=', $id)->first();

        //return  $data;

        $data   =   Blog::where('id', '=', $id)->get()->toArray();

        return view('admin.cms.editnews', compact('data'));
    }



    public function update_news(Request $request)
    {

        $data   =   $request->all();

        if ($request->hasFile('image')) {

            $newsImage          =   $request->file('image');

            $destinationPath    =   public_path('uploads/residential/');

            $image_name         =   pathinfo($newsImage->getClientOriginalName(), PATHINFO_FILENAME);

            $data['image']      =   (rand(1000, 10000)) . '-' . $image_name . '.' . $newsImage->getClientOriginalExtension();

            $newsImage->move($destinationPath, $data['image']);
        } else {

            unset($data['image']);
        }

        /*$id =   $data['EditId'];

        unset($data['EditId']);

        Blog::where('id',$id)->update($data);

        return true;*/

        $id =   $data['id'];

        unset($data['id']);

        unset($data['_token']);

        Blog::where('id', $id)->update($data);

        return back()->withInput();
    }



    public function delete_news(Request $request, $id)
    {

        $affected = Blog::where("id", $id)->delete();

        //return response()->json('News deleted');

        return $affected;
    }



    /***************************************    News Module    ***************************************/
}
