<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;

use App\Olddata;

use App\Userpackage;

use App\EventCheckOut;

use Spatie\Permission\Models\Role;

use DataTables;

use DB;

use Hash;

use stdClass;

use Illuminate\Support\Facades\Mail;

use Rap2hpoutre\FastExcel\FastExcel;

class UserController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        $data = User::orderBy('id', 'DESC')->paginate(5);

        return view('users.index', compact('data'))

            ->with('i', ($request->input('page', 1) - 1) * 5);
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $roles = Role::pluck('name', 'name')->all();

        return view('users.create', compact('roles'));
    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|same:confirm-password',

            'roles' => 'required'

        ]);





        $input = $request->all();

        $input['password'] = Hash::make($input['password']);





        $user = User::create($input);

        $user->assignRole($request->input('roles'));





        return  redirect()->route('users.index')

            ->with('success', 'User created successfully');
    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $user = User::find($id);

        return view('users.show', compact('user'));
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $user = User::find($id);

        $roles = Role::pluck('name', 'name')->all();

        $userRole = $user->roles->pluck('name', 'name')->all();



        return view('users.edit', compact('user', 'roles', 'userRole'));
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

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email,' . $id,

            'password' => 'same:confirm-password',

            'roles' => 'required'

        ]);





        $input = $request->all();

        if (!empty($input['password'])) {

            $input['password'] = Hash::make($input['password']);
        } else {

            $input = array_except($input, array('password'));
        }





        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();





        $user->assignRole($request->input('roles'));





        return redirect()->route('users.index')

            ->with('success', 'User updated successfully');
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::find($id)->delete();

        return redirect()->route('users.index')

            ->with('success', 'User deleted successfully');
    }



    public function createNewUser(Request $request)
    {

        $input = $request->all();

        if (!empty($input['password'])) {

            $input['password']  =   Hash::make($input['password']);
        } else {

            $input['password']  =   Hash::make($input['name'] . '123');
        }

        //print_r($input);

        User::create($input);

        return true;
    }



    public function subscriberlist(Request $request)

    {

        if ($request->ajax()) {

            // $data =   DB::table('user_newsletter')->get();

            $data =   DB::table('subscriber_list_master')
                // ->orderBy('id', 'DESC')
                ->orderByDesc('id')
                ->get();

            return DataTables::of($data)

                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn    =   '<a href="/contactlistdetails/' . $row->id . '"> <i class="fa fa-eye" style="color: #28a745;"></i></a>&nbsp;&nbsp;&nbsp;';

                    $btn    .=  '<a href="/deletecontact/' . $row->id . '" ><i class="fa fa-trash-o" style="color: red;"></a>';

                    return $btn;
                })

                ->rawColumns(['action'])

                ->make(true);
        }

        return view('admin.newsletter');
    }



    public function contact_list_details(Request $request, $id)

    {

        $data   =   DB::table('subscriber_list_child')

            ->join('subscriber_list_master', 'subscriber_list_master.id', '=', 'subscriber_list_child.list_id')

            ->join('user_newsletter', 'user_newsletter.id', '=', 'subscriber_list_child.user_id')

            ->where("subscriber_list_child.list_id", '=', $id)

            ->select('subscriber_list_child.*', 'user_newsletter.first_name', 'user_newsletter.last_name', 'user_newsletter.email', 'subscriber_list_master.list_name')

            // ->get()

            // ->toArray();

            ->paginate(10);

        return view('admin.contact_list_details', compact('data'));
    }



    public function import_subscriber_data(Request $request)

    {


        if ($request->input('radioName') == 'member' || $request->input('radioName') == 'addlist') {

            $data     =   User::where('member', '=', 1)->select('name as first_name', 'surname as last_name', 'email')->get();

            if ($data->count() > 0) {

                $data->toArray();

                $listData   =   ['list_name' => $request->input('list_name')];

                $listId     =   DB::table('subscriber_list_master')->insertGetId($listData);

                foreach ($data as $key => $value) {

                    $insertData[]   =   [

                        'first_name'    =>  ucfirst($value['first_name']),

                        'last_name'     =>  ucfirst($value['last_name']),

                        'email'         =>  strtolower($value['email']),

                        'member'        =>  '1',

                        'sponser'       =>  '0',

                        'advertiser'    =>  '0',

                        'event_attende' =>  '0',

                        'old_db'        =>  '0',

                        'excel'         =>  '0'

                    ];
                }

                if (!empty($insertData)) {

                    $c = 0;

                    foreach ($insertData as $key => $insert) {

                        if (!DB::table('user_newsletter')->where('email', '=', $insert['email'])->first() && filter_var($insert['email'], FILTER_VALIDATE_EMAIL)) {

                            $usr_id     =   DB::table('user_newsletter')->insertGetId($insert);

                            $ncl_array  =   [

                                'user_id'   =>  $usr_id,

                                'list_id'   =>  $listId

                            ];

                            DB::table('subscriber_list_child')->insert($ncl_array);

                            $c++;
                        }
                    }

                    if ($c == 0) {

                        $getData    =   DB::table('user_newsletter')->where('member', '=', '1')->select('id')->get()->toArray();

                        foreach ($getData as $key => $user) {

                            $ncl_array  =   [

                                'user_id'   =>  $user->id,

                                'list_id'   =>  $listId

                            ];

                            DB::table('subscriber_list_child')->insert($ncl_array);
                        }
                    }
                }

                if ($c) {

                    $success    =   '(' . $c . ') Data Imported successfully';
                } else {
                    if ($request->input('radioName') == 'addlist') {
                        $success    =   'Subscription List added successfully!';
                    } else {
                        $success    =   'No new data to import';
                    }
                }

                return back()->with('success', $success);
            } else {

                return back()->with('error', 'Data not found on the spreadsheet');
            }
        }

        if ($request->input('radioName') == 'sponser') {

            $data     =   User::where('sponser', '=', 1)->select('name as first_name', 'surname as last_name', 'email')->get();

            if ($data->count() > 0) {

                $data->toArray();

                $listData   =   ['list_name' => $request->input('list_name')];

                $listId     =   DB::table('subscriber_list_master')->insertGetId($listData);

                foreach ($data as $key => $value) {

                    $insertData[]   =   [

                        'first_name'    =>  ucfirst($value['first_name']),

                        'last_name'     =>  ucfirst($value['last_name']),

                        'email'         =>  strtolower($value['email']),

                        'member'        =>  '0',

                        'sponser'       =>  '1',

                        'advertiser'    =>  '0',

                        'event_attende' =>  '0',

                        'old_db'        =>  '0',

                        'excel'         =>  '0'

                    ];
                }

                if (!empty($insertData)) {

                    $c = 0;

                    foreach ($insertData as $key => $insert) {

                        if (!DB::table('user_newsletter')->where('email', '=', $insert['email'])->first() && filter_var($insert['email'], FILTER_VALIDATE_EMAIL)) {

                            $usr_id     =   DB::table('user_newsletter')->insertGetId($insert);

                            $ncl_array  =   [

                                'user_id'   =>  $usr_id,

                                'list_id'   =>  $listId

                            ];

                            DB::table('subscriber_list_child')->insert($ncl_array);

                            $c++;
                        }
                    }

                    if ($c == 0) {

                        $getData    =   DB::table('user_newsletter')->where('sponser', '=', '1')->select('id')->get()->toArray();

                        foreach ($getData as $key => $user) {

                            $ncl_array  =   [

                                'user_id'   =>  $user->id,

                                'list_id'   =>  $listId

                            ];

                            DB::table('subscriber_list_child')->insert($ncl_array);
                        }
                    }
                }

                if ($c) {

                    $success    =   '(' . $c . ') Data Imported successfully';
                } else {

                    $success    =   'No new data to import';
                }

                return back()->with('success', $success);
            } else {

                return back()->with('error', 'Data not found on the spreadsheet');
            }
        }

        if ($request->input('radioName') == 'advertiser') {

            $data     =   User::where('advertiser', '=', 1)->select('name as first_name', 'surname as last_name', 'email')->get();

            if ($data->count() > 0) {

                $data->toArray();

                $listData   =   ['list_name' => $request->input('list_name')];

                $listId     =   DB::table('subscriber_list_master')->insertGetId($listData);

                foreach ($data as $key => $value) {

                    $insertData[]   =   [

                        'first_name'    =>  ucfirst($value['first_name']),

                        'last_name'     =>  ucfirst($value['last_name']),

                        'email'         =>  strtolower($value['email']),

                        'member'        =>  '0',

                        'sponser'       =>  '0',

                        'advertiser'    =>  '1',

                        'event_attende' =>  '0',

                        'old_db'        =>  '0',

                        'excel'         =>  '0'

                    ];
                }

                if (!empty($insertData)) {

                    $c = 0;

                    foreach ($insertData as $key => $insert) {

                        if (!DB::table('user_newsletter')->where('email', '=', $insert['email'])->first() && filter_var($insert['email'], FILTER_VALIDATE_EMAIL)) {

                            $usr_id     =   DB::table('user_newsletter')->insertGetId($insert);

                            $ncl_array  =   [

                                'user_id'   =>  $usr_id,

                                'list_id'   =>  $listId

                            ];

                            DB::table('subscriber_list_child')->insert($ncl_array);

                            $c++;
                        }
                    }

                    if ($c == 0) {

                        $getData    =   DB::table('user_newsletter')->where('advertiser', '=', '1')->select('id')->get()->toArray();

                        foreach ($getData as $key => $user) {

                            $ncl_array  =   [

                                'user_id'   =>  $user->id,

                                'list_id'   =>  $listId

                            ];

                            DB::table('subscriber_list_child')->insert($ncl_array);
                        }
                    }
                }

                if ($c) {

                    $success    =   '(' . $c . ') Data Imported successfully';
                } else {

                    $success    =   'No new data to import';
                }

                return back()->with('success', $success);
            } else {

                return back()->with('error', 'Data not found on the spreadsheet');
            }
        }

        if ($request->input('radioName') == 'old') {

            if ($request->input('dateFrom') && $request->input('dateTo')) {

                $listData   =   ['list_name' => $request->input('list_name')];

                $listId     =   DB::table('subscriber_list_master')->insertGetId($listData);

                $data     =   Olddata::where('email', '!=', '')

                    ->whereBetween('year_left', [$request->input('dateFrom'), $request->input('dateTo')])

                    ->select('first_name', 'surname as last_name', 'email', 'year_left')

                    ->get();

                if ($data->count() > 0) {

                    $data->toArray();

                    $listData   =   ['list_name' => $request->input('list_name')];

                    $listId     =   DB::table('subscriber_list_master')->insertGetId($listData);

                    foreach ($data as $key => $value) {

                        $insertData[]   =   [

                            'first_name'    =>  ucfirst($value['first_name']),

                            'last_name'     =>  ucfirst($value['last_name']),

                            'email'         =>  strtolower($value['email']),

                            'year_left'     =>  strtolower($value['year_left']),

                            'member'        =>  '0',

                            'sponser'       =>  '0',

                            'advertiser'    =>  '0',

                            'event_attende' =>  '0',

                            'old_db'        =>  '1',

                            'excel'         =>  '0'

                        ];
                    }

                    if (!empty($insertData)) {

                        $c  =   0;

                        foreach ($insertData as $key => $insert) {

                            if (!DB::table('user_newsletter')->where('email', '=', $insert['email'])->first() && filter_var($insert['email'], FILTER_VALIDATE_EMAIL)) {

                                $usr_id     =   DB::table('user_newsletter')->insertGetId($insert);

                                $ncl_array  =   [

                                    'user_id'   =>  $usr_id,

                                    'list_id'   =>  $listId

                                ];

                                DB::table('subscriber_list_child')->insert($ncl_array);

                                $c++;
                            }
                        }

                        if ($c == 0) {

                            $getData    =   DB::table('user_newsletter')->where('old_db', '=', '1')->select('id')->get()->toArray();

                            foreach ($getData as $key => $user) {

                                $ncl_array  =   [

                                    'user_id'   =>  $user->id,

                                    'list_id'   =>  $listId

                                ];

                                DB::table('subscriber_list_child')->insert($ncl_array);
                            }
                        }
                    }

                    if ($c) {

                        $success    =   '(' . $c . ') Data Imported successfully';
                    } else {

                        $success    =   'No new data to import';
                    }

                    return back()->with('success', $success);
                } else {

                    return back()->with('error', 'Data not found on the spreadsheet');
                }
            } else {

                return back()->with('error', 'Please add year in field');
            }
        }

        if ($request->input('radioName') == 'events') {

            $data     =   EventCheckOut::where('address', '!=', '')->select('name', 'address')->get();

            if ($data->count() > 0) {

                $data->toArray();

                $listData   =   ['list_name' => $request->input('list_name')];

                $listId     =   DB::table('subscriber_list_master')->insertGetId($listData);

                foreach ($data as $key => $value) {



                    $name   =   explode(' ', $value['name']);

                    if (count($name) > 1) {

                        $firstName      =   $name[0];

                        $lastName       =   $name[1];
                    } else {

                        $firstName      =   $name[0];

                        $lastName       =   '';
                    }



                    $insertData[]   =   [

                        'first_name'    =>  ucfirst($firstName),

                        'last_name'     =>  ucfirst($lastName),

                        'email'         =>  strtolower($value['address']),

                        'member'        =>  '0',

                        'sponser'       =>  '0',

                        'advertiser'    =>  '0',

                        'event_attende' =>  '1',

                        'old_db'        =>  '0',

                        'excel'         =>  '0'

                    ];
                }

                if (!empty($insertData)) {

                    $c  =   0;

                    foreach ($insertData as $insert) {

                        if (!DB::table('user_newsletter')->where('email', '=', $insert['email'])->first() && filter_var($insert['email'], FILTER_VALIDATE_EMAIL)) {

                            $usr_id     =   DB::table('user_newsletter')->insertGetId($insert);

                            $ncl_array  =   [

                                'user_id'   =>  $usr_id,

                                'list_id'   =>  $listId

                            ];

                            DB::table('subscriber_list_child')->insert($ncl_array);

                            $c++;
                        }
                    }

                    if ($c == 0) {

                        $getData    =   DB::table('user_newsletter')->where('event_attende', '=', '1')->select('id')->get()->toArray();

                        foreach ($getData as $key => $user) {

                            $ncl_array  =   [

                                'user_id'   =>  $user->id,

                                'list_id'   =>  $listId

                            ];

                            DB::table('subscriber_list_child')->insert($ncl_array);
                        }
                    }
                }

                if ($c) {

                    $success    =   '(' . $c . ') Data Imported successfully';
                } else {

                    $success    =   'New list created';
                }

                return back()->with('success', $success);
            } else {

                return back()->with('error', 'Data not found on the spreadsheet');
            }
        }

        if ($request->input('radioName') == 'manual') {

            if ($request->input('email') && $request->input('save2') == 'savetonew') {

                $emailExist =   DB::table('user_newsletter')->where('email', '=', $request->input('email'))->get();

                if ($emailExist->count() == 0) {

                    $user   =   [

                        'first_name'    =>  ucfirst($request->input('first_name')),

                        'last_name'     =>  ucfirst($request->input('last_name')),

                        'email'         =>  strtolower($request->input('email'))

                    ];



                    $list   =   ['list_name' => $request->input('list_name')];



                    $ncl_array  =   [

                        'user_id'   =>  DB::table('user_newsletter')->insertGetId($user),

                        'list_id'   =>  DB::table('subscriber_list_master')->insertGetId($list)

                    ];

                    DB::table('subscriber_list_child')->insert($ncl_array);

                    return back()->with('success', 'User added successfully');
                } else {

                    $list   =   ['list_name' => $request->input('list_name')];



                    $ncl_array  =   [

                        'user_id'   =>  $emailExist->toArray()[0]->id,

                        'list_id'   =>  DB::table('subscriber_list_master')->insertGetId($list)

                    ];

                    DB::table('subscriber_list_child')->insert($ncl_array);

                    return back()->with('success', 'User added successfully');
                }
            } else if ($request->input('email') && $request->input('save2') == 'savetoexist') {

                $emailExist =   DB::table('user_newsletter')->where('email', '=', $request->input('email'))->get();

                if ($emailExist->count() == 0) {

                    $user   =   [

                        'first_name'    =>  ucfirst($request->input('first_name')),

                        'last_name'     =>  ucfirst($request->input('last_name')),

                        'email'         =>  strtolower($request->input('email'))

                    ];

                    $ncl_array  =   [

                        'user_id'   =>  DB::table('user_newsletter')->insertGetId($user),

                        'list_id'   =>  $request->input('templateno')

                    ];

                    DB::table('subscriber_list_child')->insert($ncl_array);

                    return back()->with('success', 'User added successfully');
                } else {

                    $ncl_array  =   [

                        'user_id'   =>  $emailExist->toArray()[0]->id,

                        'list_id'   =>  $request->input('tempodropd')

                    ];

                    DB::table('subscriber_list_child')->insert($ncl_array);

                    return back()->with('success', 'User added successfully');
                }
            } else {

                return back()->with('error', 'invalid email');
            }
        }

        $this->validate($request, [

            'select_file'   =>  'required|mimes:xls,xlsx'

        ]);



        $data = (new FastExcel)->import($request->file('select_file')->getRealPath());



        // echo '>> nn>'.$request->input('radioName');die;
        if ($data->count() > 0) {

            $list_name = $request->input('list_name');

            if ($list_name != '') {
                $subsData = DB::table('subscriber_list_master')
                    ->select(array(DB::raw('*')))
                    ->where("list_name", "=", $list_name)
                    // ->where("list_name", "like", "%" . $list_name . "%")
                    ->get()
                    ->first();

                // print_r($subsData);
                if (!empty($subsData)) {
                    $listData = $subsData->id;
                } else {
                    $insArray = array('list_name' => $list_name);
                    $id = DB::table('subscriber_list_master')->insertGetId($insArray);

                    $listData = $id;
                }


                // echo 'ss ' . $listData;die;
            } else {
                $listData = $request->input('slist_id');
            }

            //$listId     =   DB::table('subscriber_list_master')->insertGetId($listData);

            foreach ($data as $key => $value) {

                if ($value['first_name'] != ''  && $value['email'] != '') {
                    $insertData[]   =   [

                        'first_name'    =>  $value['first_name'],

                        'last_name'     => ($value['last_name'] != '') ? $value['last_name'] : '',

                        'email'         =>  $value['email'],

                        'member'        =>  '0',

                        'sponser'       =>  '0',

                        'advertiser'    =>  '0',

                        'event_attende' =>  '0',

                        'old_db'        =>  '0',

                        'excel'         =>  '1'

                    ];
                }
            }

            //print_r($insertData); die();

            if (!empty($insertData)) {

                $c = 0;

                $mlist_id = $listData;

                foreach ($insertData as $key => $insert) {

                    if (!DB::table('user_newsletter')->where('email', '=', $insert['email'])->first()) {

                        //$usr_id     =   DB::table('user_newsletter')->insertGetId($insert);

                        $ncl_array  =   [

                            'user_id'   =>  DB::table('user_newsletter')->insertGetId($insert),

                            'list_id'   =>  $mlist_id

                        ];

                        DB::table('subscriber_list_child')->insert($ncl_array);

                        $c++;
                    } else {

                        $emailExist =   DB::table('user_newsletter')->where('email', '=', $insert['email'])->get();

                        $ncl_array  =   [

                            'user_id'   =>  $emailExist->toArray()[0]->id,

                            'list_id'   =>  $mlist_id

                        ];

                        DB::table('subscriber_list_child')->insert($ncl_array);
                    }
                }
            }

            // if ($c) {

            $success    =   'Data Imported successfully';
            // } else {

            //     $success    =   'No new data to import';
            // }

            return back()->with('success', $success);
        } else {

            return back()->with('error', 'Data not found on the spreadsheet');
        }
    }



    public function newsletter()

    {
        $tempData = DB::table('templates')
            ->select('template_name', 'temp_id')
            ->where("active", '=', 1)
            ->orderByDesc('temp_id')
            ->get();

        // print_obj($tempData);die;

        if (!empty($tempData)) {
            $tempData     =   $tempData->toArray();
            return view('admin.sendnewsletter', ['template_data' => $tempData]);
        } else {
            return view('admin.sendnewsletter', ['template_data' => '']);
        }
    }

    public function send_newsletter(Request $request)

    {

        if ($request->input('template') && $request->input('mailSubject') && $request->input('mailBody') && $request->input('templateno')) {



            $data               =   [];

            // $dbData             =   DB::table('user_newsletter')->get();

            $dbData             =   DB::table('subscriber_list_child')

                ->join('user_newsletter', 'user_newsletter.id', '=', 'subscriber_list_child.user_id')

                ->where("subscriber_list_child.list_id", '=', $request->input('templateno'))

                ->select('subscriber_list_child.*', 'user_newsletter.first_name', 'user_newsletter.last_name', 'user_newsletter.email')

                ->get();
            //->toSql();


            // echo $request->input('templateno');die;
            // print_obj($dbData);die;


            $data['sending_id'] =   rand(1000, 1000000);

            $data['tmp_id']     =   $request->input('template');

            $data['subject']    =   strip_tags($request->input('mailSubject'));

            $mailBody       =   $request->input('mailBody');

            $data['body']       =   $mailBody;

            //print_obj($dbData);die;



            if ($dbData->count() > 0) {

                $dbData     =   $dbData->toArray();

                foreach ($dbData as $key => $user) {

                    $user->mail_subject  =   strip_tags($request->input('mailSubject'));

                    if (mb_strpos($mailBody, '[[name]]')) {
                        //echo 'true';die;
                        $usr_fullname = ucfirst($user->first_name) . ' ' . ucfirst($user->last_name);
                        $user->mailBody_final = str_replace("[[name]]", $usr_fullname, $mailBody);
                    } else {
                        //echo 'false';die;
                        $user->mailBody_final = $mailBody;
                    }

                    $user->mailBody_final .= '<p><span class="apple-link">Belvedere College Union,<br> 6 Great Denmark Street,<br> Dublin 1, Ireland.</span>
                    <br><br> Do not like these emails? <a href="' . secure_url('newsletter/unsubscription/' . $user->email) . '">Unsubscribe</a>.</p>';

                    // echo $user->mailBody_final;die;

                    Mail::send([], [], function ($message) use ($user) {
                        $message->to($user->email, 'Belvedere')
                            ->subject($user->mail_subject)
                            ->from('noreply@belvedereunion.com', 'Belvedere')
                            ->setBody($user->mailBody_final, 'text/html');
                    });

                    // $mail   =   [

                    //     "first_name"    =>  ucfirst($user->first_name),

                    //     "last_name"     =>  ucfirst($user->last_name),

                    //     "body"          =>  $mailBody

                    // ];


                    // if ($request->input('template') == '1') {

                    //     Mail::send('admin.mail.template_1', $mail, function ($message) use ($user) {

                    //         $message->to($user->email, 'Belvedere')

                    //             ->subject($user->subject);

                    //         $message->from('noreply@belvedereunion.com', 'Belvedere');
                    //     });
                    // } else {

                    //     Mail::send('admin.mail.template_2', $mail, function ($message) use ($user) {

                    //         $message->to($user->email, 'Belvedere')

                    //             ->subject($user->subject);

                    //         $message->from('noreply@belvedereunion.com', 'Belvedere');
                    //     });
                    // }
                    $data['newsletter_user_id']     =    $user->user_id;
                    //$data['newsletter_user_id']     =    $user->id;

                    DB::table('newsletter_logs')->insert($data);
                }

                return back()->with('success', 'Newsletter sent successfully');
            }

            return back()->with('error', 'No user found to send newsletter');
        } else {

            return back()->with('error', 'Form validation failed');
        }
    }



    public function newsletter_logs(Request $request)

    {

        if ($request->ajax()) {

            $data =   DB::table('newsletter_logs')
                ->groupBy(DB::raw('sending_id'))
                ->orderByDesc('id')
                ->get();

            //print_obj($data);die;

            return DataTables::of($data)

                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $btn    =   '<a href="/newsletterdetails/' . $row->sending_id . '"> <i class="fa fa-eye" style="color: #28a745;"></i></a>';

                    return $btn;
                })

                ->rawColumns(['action'])

                ->make(true);
        }

        return view('admin.newsletterlogs');
    }



    public function subscription_details(Request $request, $id)

    {

        $data   =   DB::table('newsletter_logs')

            ->join('user_newsletter', 'user_newsletter.id', '=', 'newsletter_logs.newsletter_user_id')

            ->where("newsletter_logs.sending_id", '=', $id)

            ->select('newsletter_logs.*', 'user_newsletter.first_name', 'user_newsletter.last_name', 'user_newsletter.email')

            //->get()

            //->toArray();

            // ->toSql();
            ->paginate(10);

        //print_obj($data);die;

        return view('admin.subscription_details', compact('data'));
    }



    public function delete_contact_list(Request $request, $id)

    {

        DB::table('subscriber_list_master')->where('id', $id)->delete();

        DB::table('subscriber_list_child')->where('list_id', $id)->delete();

        return redirect()->back()->with('success', 'Data deleted successfully');
    }


    public function templates()

    {

        $tempData = DB::table('templates')
            ->select('template_name', 'temp_id')
            ->where("active", '=', 1)
            ->orderByDesc('temp_id')
            ->get();

        // print_obj($tempData);die;

        if (!empty($tempData)) {
            $tempData     =   $tempData->toArray();
            return view('admin.vw_templates', ['template_data' => $tempData]);
        } else {
            return view('admin.vw_templates', ['template_data' => '']);
        }
    }

    public function save_template(Request $request)

    {

        if ($request->input('template') && $request->input('mailBody')) {

            $tmp_id          =   strip_tags($request->input('template'));
            $temp_body       =   $request->input('mailBody');
            $temp_name       =   strip_tags($request->input('temp_name'));

            if ($tmp_id == 'create') {

                if ($temp_name != '') {
                    $tempExists = DB::table('templates')
                        ->select(array(DB::raw('*')))
                        ->where('template_name', '=', $temp_name)
                        ->get()
                        ->first();

                    //$tempExists = DB::select('SELECT * FROM templates WHERE template_name = ?', [$temp_name]);
                    if (empty($tempExists)) {
                        $insertParam = array(
                            'template_name' => $temp_name,
                            'template_html' => $temp_body,
                            'created_dtime' => DTIME,
                            'created_by' => 1
                        );

                        DB::table('templates')->insert($insertParam);

                        return back()->with('success', 'Template created successfully!');
                    } else {
                        return back()->with('error', 'Template already exists with the same name!');
                    }
                } else {
                    return back()->with('error', 'Form validation failed: Please enter template name!');
                }
            } else if ($tmp_id != 'create' && is_numeric($tmp_id)) {

                $tempExists = DB::table('templates')
                    ->select(array(DB::raw('*')))
                    ->where('temp_id', '=', $tmp_id)
                    ->where('active', '=', 1)
                    ->get()
                    ->first();

                if (!empty($tempExists)) {
                    $updateParam = array(
                        //'template_name' => $temp_name,
                        'template_html' => $temp_body,
                        'edited_dtime' => DTIME,
                        'edited_by' => 1
                    );

                    DB::table('templates')
                        ->where('temp_id', $tmp_id)
                        ->update($updateParam);

                    return back()->with('success', 'Template updated successfully!');
                } else {
                    return back()->with('error', 'Template not found!');
                }
            }

            //print_obj($tempExists);die;

        } else {

            return back()->with('error', 'Form validation failed');
        }
    }

    public function getTemplate(Request $request, $tid)
    {

        if ($tid != '' && $tid > 0) {
            $tData = DB::table('templates')
                ->select(array(DB::raw('*')))
                ->where('temp_id', '=', $tid)
                ->where('active', '=', 1)
                ->get()
                ->first();

            //print_obj($tData);die;
            if (!empty($tData)) {
                $data = array(
                    'success' => '1',
                    //'tempid' => $tData->temp_id,
                    'temphtml' => $tData->template_html
                );
                return  $data;
            } else {
                $data = array(
                    'success' => '0',
                    'temphtml' => '<p>Template not found!</p>'
                );
                return  $data;
            }
        } else {
            $data = array(
                'success' => '0',
                'temphtml' => '<p>Template cannot be blank!</p>'
            );
            return  $data;
        }
    }

    public function deleteTemplate(Request $request)
    {
        $tmp_id          =   strip_tags($request->input('tmpid'));
        if ($tmp_id != '' && is_numeric($tmp_id)) {
            $tData = DB::table('templates')
                ->select(array(DB::raw('*')))
                ->where('temp_id', '=', $tmp_id)
                ->where('active', '=', 1)
                ->get()
                ->first();

            //print_obj($tData);die;
            if (!empty($tData)) {

                $updateParam = array(
                    'active' => 2
                );

                DB::table('templates')
                    ->where('temp_id', $tmp_id)
                    ->update($updateParam);
                $data = array(
                    'success' => '1',
                    //'tempid' => $tData->temp_id,
                    'msg' => 'Template deleted successfully!'
                );
                return  $data;
            } else {
                $data = array(
                    'success' => '0',
                    'msg' => 'Template not found!'
                );
                return  $data;
            }
        } else {
            $data = array(
                'success' => '0',
                'msg' => 'Template cannot be blank!'
            );
            return  $data;
        }
    }



    public function add_to_subslist(Request $request)

    {

        if ($request->ajax()) {

            $data   =   $request->all();

            $dataArr = (array) $data['arr'];
            // print_r($data);die;

            $list_name = $data['sub_list_name'];

            if ($list_name != '') {
                $subsData = DB::table('subscriber_list_master')
                    ->select(array(DB::raw('*')))
                    ->where("list_name", "=", $list_name)
                    // ->where("list_name", "like", "%" . $list_name . "%")
                    ->get()
                    ->first();

                // print_r($subsData);
                if (!empty($subsData)) {
                    $choose_list = $subsData->id;
                } else {
                    $insArray = array('list_name' => $list_name);
                    $id = DB::table('subscriber_list_master')->insertGetId($insArray);

                    $choose_list = $id;
                }
            } else {
                $choose_list = $data['subs_id'];
            }

            // echo 'ss ' . $choose_list;die;
            $msg = '';

            foreach ($dataArr as $key => $user_id) {


                $tDataUser = Userpackage::select(
                    'user_id',
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
                    ->where("userpackages.id", "=", $user_id)->get()->first();

                // print_r($tData);die;
                if (!empty($tDataUser)) {


                    $sData = DB::table('user_newsletter')
                        ->select(array(DB::raw('*')))
                        ->where('email', '=', $tDataUser->email)
                        ->get()
                        ->first();

                    if (empty($sData)) {

                        $insArray2 = array(
                            'first_name'    =>  ucfirst($tDataUser->firstname),
                            'last_name'     =>  ucfirst($tDataUser->surname),
                            'email'         =>  strtolower($tDataUser->email)
                        );
                        $userid = DB::table('user_newsletter')->insertGetId($insArray2);
                    } else {
                        $userid = $sData->id;
                    }

                    $sData2 = DB::table('subscriber_list_child')
                        ->select(array(DB::raw('*')))
                        ->where('user_id', '=', $userid)
                        ->where('list_id', '=', $choose_list)
                        ->get()
                        ->first();

                    if (empty($sData2)) {
                        $ncl_array  =   array(
                            'user_id'   =>  $userid,
                            'list_id'   =>  $choose_list
                        );

                        DB::table('subscriber_list_child')->insert($ncl_array);
                        $msg = 'User added to this subscribers list!';
                    } else {
                        $msg = 'User already exists to this subscribers list!';
                    }
                }


                //$msg = 'User added to this subscribers list!';
            }

            $msgdata = array(
                'success' => '1',
                'msg' => $msg
            );

            return  $msgdata;
        }

        return view('admin.payedmember');
    }



    public function importNewsletterMultiMember(Request $request)

    {

        if ($request->ajax()) {

            $data   =   $request->all();

            $list_name = $data['list_name'];

            if ($list_name != '') {
                $subsData = DB::table('subscriber_list_master')
                    ->select(array(DB::raw('*')))
                    ->where("list_name", "=", $list_name)
                    // ->where("list_name", "like", "%" . $list_name . "%")
                    ->get()
                    ->first();

                // print_r($subsData);
                if (!empty($subsData)) {
                    $choose_list = $subsData->id;
                } else {
                    $insArray = array('list_name' => $list_name);
                    $id = DB::table('subscriber_list_master')->insertGetId($insArray);

                    $choose_list = $id;
                }


                // echo 'ss ' . $choose_list;die;
            } else {
                $choose_list = $data['choose_list'];
            }



            $multi_mem_input = $data['multi_mem_input'];
            $multi_mem_input = explode(',', $multi_mem_input);
            // print_r($data);
            // print_r($multi_mem_input);die;



            $msg = '';

            foreach ($multi_mem_input as $key => $user_type) {

                $tData = Userpackage::select(
                    'user_id',
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
                    ->where("type", "like", "%" . $user_type . "%")->get();

                // print_r($tData);die;
                if (!empty($tData)) {
                    foreach ($tData as $key => $value) {
                        // $msg .= '>>' . $value['user_id'] . '<br>  ';

                        $sData = DB::table('user_newsletter')
                            ->select(array(DB::raw('*')))
                            ->where('email', '=', $value['email'])
                            ->get()
                            ->first();

                        if (empty($sData)) {

                            $insArray2 = array(
                                'first_name'    =>  ucfirst($value['firstname']),
                                'last_name'     =>  ucfirst($value['surname']),
                                'email'         =>  strtolower($value['email'])
                            );
                            $userid = DB::table('user_newsletter')->insertGetId($insArray2);
                        } else {
                            $userid = $sData->id;
                        }



                        $sData2 = DB::table('subscriber_list_child')
                            ->select(array(DB::raw('*')))
                            ->where('user_id', '=', $userid)
                            ->where('list_id', '=', $choose_list)
                            ->get()
                            ->first();

                        if (empty($sData2)) {
                            $ncl_array  =   array(
                                'user_id'   =>  $userid,
                                'list_id'   =>  $choose_list
                            );

                            DB::table('subscriber_list_child')->insert($ncl_array);
                            $msg = 'User added to this subscribers list!';
                        } else {
                            $msg = 'User already exists to this subscribers list!';
                        }
                    }
                } else {
                    $msg = 'Users not found for this user type!';
                }

                // echo $msg; die;

            }

            $data = array(
                'success' => '1',
                'msg' => $msg
            );
            return  $data;
        }

        return view('admin.payedmember');
    }


    public function ckeditorUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $newsImage              =   $request->file('upload');
            $destinationPath        =   public_path('uploads/image/');
            $image_name             =   pathinfo($newsImage->getClientOriginalName(), PATHINFO_FILENAME);
            $img_filepath    =   (rand(1000, 10000)) . '-' . $image_name . '.' . $newsImage->getClientOriginalExtension();
            $newsImage->move($destinationPath, $img_filepath);

            $ckeditorfunc           =   $request->input('CKEditorFuncNum');
            $url = asset('uploads/image/' . $img_filepath);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditorfunc, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset-utf-8');
            echo  $response;
        }
    }


    public function unsubscribe_newsletter($email)

    {
        // echo 'email: ' . $email;die;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $out = 'correct';

            $sData = DB::table('user_newsletter')
                ->select(array(DB::raw('*')))
                ->where('email', '=', $email)
                ->get()
                ->first();

            if (!empty($sData) && isset($sData->id)) {
                DB::table('user_newsletter')->where('email', $email)->delete();

                $sDataUser = DB::table('users')
                    ->select(array(DB::raw('*')))
                    ->where('email', '=', $email)
                    ->first();
                if (isset($sDataUser->id)) {
                    $sData2 = DB::table('subscriber_list_child')
                        ->select(array(DB::raw('*')))
                        ->where('user_id', '=', $sDataUser->id)
                        ->get()
                        ->first();

                    if (!empty($sData2)) {
                        DB::table('subscriber_list_child')->where('user_id', $sDataUser->id)->delete();
                        $out = $email . ' deleted from our subscription list!';
                    } else {
                        $out = 'Mail id not found!';
                    }
                } else {
                    DB::table('subscriber_list_child')->where('user_id', $sData->id)->delete();
                    $out = $email . ' deleted from our subscription list!';
                }


                // $out = $email . ' deleted from our subscription list!';
            } else {
                $out = 'Mail id not found!!';
            }
        } else {
            $out = 'Mail id error!';
        }

        echo $out;
    }
    public function contact_submit(Request $request)

    {
        $user = new stdClass();
        // $user->email = 'snigdho.lnsel@gmail.com';
        $user->email = 'belvedereunion@belvederecollege.ie';
        $user->mail_subject = 'Contact Us Mail';
        $user->mailBody_final = '<p>Hi,</p>';
        $user->mailBody_final .= '<p>You have got a new contact email.</p></br>';
        $user->mailBody_final .= '<p>Name: ' . $request->name . '</p>';
        $user->mailBody_final .= '<p>Email: ' . $request->email . '</p>';
        $user->mailBody_final .= '<p>Subject: ' . $request->subject . '</p>';
        $user->mailBody_final .= '<p>Message: ' . $request->message . '</p>';

        Mail::send([], [], function ($message) use ($user) {
            $message->to($user->email, 'Belvedere')
                ->subject($user->mail_subject)
                ->from('noreply@belvedereunion.com', 'Belvedere')
                ->setBody($user->mailBody_final, 'text/html');
        });

        return back()->with('success', 'Mail sent successfully');
    }
}
