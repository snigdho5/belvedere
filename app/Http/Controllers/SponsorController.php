<?php

namespace App\Http\Controllers;

// use DB;
use App\User;
use App\Userpackage;
use App\Sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Image;
use DateTime;
use Auth;

class SponsorController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user   =   Auth::user();
        if ($request->ajax()) {
            $data = Sponsor::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<h5><a href="javascript:void(0)" id="EditModel" data-id="' . $row->id . '" > <i class="fa fa-pencil" style="color: #28a745;"></i></a>&nbsp; &nbsp;';
                    $btn .= '<a href="javascript:void(0)" id="DeleteModel" data-id="' . $row->id . '" ><i class="fa fa-trash-o" style="color: red;" onclick="myFunction()"></a></h5>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.sponsor', compact('user'));
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
        if ($request->has('editlogo')) {
            //user side request manage
            if ($request->has('image')) {
                $imageName  =   time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('imagess'), $imageName);
                $get_img    =   public_path("imagess/" . $imageName);
                $thumbnail  =   public_path("imagess/thumb-" . $imageName);
                Image::make($get_img)->resize(170, 68)->save($thumbnail);
                $input['image'] = $imageName;
            }
            // Sponsor::updateOrCreate($input);
            unset($input['editlogo']);
            $flight = Sponsor::updateOrCreate(['user_id' => Auth::user()->id], $input);
            return response('operation compoleted');
        }

        if ($request->has('image')) {
            $profile    =   $request->file('image');
            $imageName  =   time() . '.' . request()->image->getClientOriginalExtension();
            /*request()->image->move(public_path('imagess'), $imageName);
            $get_img    =   public_path("imagess/" . $imageName);
            //$thumbnail  =   public_path("imagess/thumb-" . $imageName);
            //Image::make($get_img)->resize(270, 270)->save($thumbnail);
            $thumbnail  =   public_path("imagess/thumbnail" . $imageName);
            Image::make($get_img)->resize(200, 80)->save($thumbnail);       
            $input['image']=$imageName;*/

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
            $id = $input['EditId'];
            unset($input['EditId']);
            Sponsor::where('id', $id)->update($input);
            return response()->json(['status' => 1,  'success' => 'Record Edited successfully']);
        } else {
            Sponsor::create($input);
            return response()->json(['status' => 1,  'success' => 'Record added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }

    public function getUserData(Request $request)
    {
        //$userData   =   User::where('id', $request->userid)->get();
        $data = Userpackage::Join('users', function ($join) {
            $join->on('userpackages.user_id', '=', 'users.id');
        })
            ->where('users.id', $request->userid)
            ->get();
        //->get()->toArray();
        $data = $data[0]->toJson();
        return $data;
    }

    public function updateUserData(Request $request)
    {
        $data   =   $request->all();
        $id     =   $data['userId'];
        $status     =   $data['status'];
        $price     =   $data['price'];
        $month     =   $data['month'];
        $year_left     =   $data['year_left'];
        $type     =   $data['type'];

        unset($data['userId']);
        unset($data['status']);
        unset($data['email']);
        unset($data['price']);
        unset($data['month']);
        unset($data['year_left']);
        unset($data['type']);


        User::where('id', $id)->update($data);

        $pkg_upd = array(
            'status' => $status,
            'price' => $price,
            'month' => $month,
            'year_left' => $year_left,
            'type' => $type
        );

        Userpackage::where('user_id', $id)->update($pkg_upd);
        return true;
    }

    public function deleteuserbyadmin(Request $request)
    {
        //$result     =   DB::table('users')->where('id', $request->userid)->delete();
        User::where('id', $request->userid)->delete();
        Userpackage::where('user_id', $request->userid)->delete();
        return true;
    }

    /***************************************    Sponsor Admin Module    ***************************************/

    public function edit_sponsor(Request $request, $id)
    {
        $data   =   Sponsor::where('id', '=', $id)->first();
        return  $data;
    }

    public function delete_sponsor(Request $request, $id)
    {
        $affected = Sponsor::where("id", $id)->delete();
        return $affected;
    }

    /***************************************    Sponsor Admin Module    ***************************************/
}
