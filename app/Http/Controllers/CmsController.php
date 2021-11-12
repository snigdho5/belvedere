<?php



namespace App\Http\Controllers;



use Hash;

use App\User;

use Redirect;

use DB;



use App\CmsContent;

use App\Http\Requests\CmsRequest;

use Illuminate\Http\Request;



class CmsController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {

        $data = CmsContent::where('page_type', 'home')->first();

        return view('admin.cms.homecms', compact('data'));
    }



    public function about()
    {

        $data = CmsContent::where('page_type', 'about')->first();

        return view('admin.cms.aboutcms', compact('data'));
    }



    public function whyjoin()
    {

        $data = CmsContent::where('page_type', 'whyjoin')->first();

        return view('admin.cms.whyjoincms', compact('data'));
    }



    public function commitee()
    {

        $data = CmsContent::where('page_type', 'whyjoin')->first();

        return view('admin.cms.committee', compact('data'));
    }



    public function belvedere_benevolent_association()
    {

        $data = CmsContent::where('page_type', 'bba-donate')->first();

        return view('admin.cms.bba-donate', compact('data'));
    }



    public function AddEditCms(CmsRequest $request)
    {

        $postData   =   $request->all();
        $image = $request->file('about_image') ?? '';

        // echo '<pre>';print_r($postData);
 
        // dd($image); 
        if (!empty($image)) {

            $uploadPath = public_path('/uploads/image');

            $extension = $image->getClientOriginalExtension();

            $fileName = time() . "_" . rand(11111, 99999) . '.' . $extension;

            $image->move($uploadPath, $fileName);

            $imagename = $fileName;

            $postData['about_image'] = $imagename;
            // echo $postData['about_image'];die;
        } else {
            // echo 'ss';die;
            $postData['about_image'] = '';
        }

        $pagetype   =   $postData['page_type'];

        $layout     =   CmsContent::where('page_type', $pagetype)->first();

        if ($layout) {

            if ($postData['about_image'] != '') {
                $updArray = array(
                    'title' => $postData['title'],
                    'video_link' => $postData['video_link'],
                    'description' => $postData['description'],
                    'about_image' => $postData['about_image']
                );
            } else {
                $updArray = array(
                    'title' => $postData['title'],
                    'video_link' => $postData['video_link'],
                    'description' => $postData['description']
                );
            }

            DB::table('cms_contents')
                ->where('id', $layout->id)
                ->limit(1)
                ->update($updArray);

            // echo '<pre>';print_r($updArray);die;
            // CmsContent::updateOrCreate(["id" => $layout->id], $postData);
        } else {
            CmsContent::create($postData);
        }

        return back()->withInput();
    }



    /*******************************    ORGANIZED MODULE      *******************************/



    function admindashboard()
    {

        return view('admin.profile.admindashboard');
    }



    function viewprofile()
    {

        //$user = User::find(auth()->user()->id);

        $data   =   User::where('id', auth()->user()->id)->first();

        return view('admin.profile.adminprofile', compact('data'));
    }



    function update_profile(Request $request)
    {

        $profileData    =   $request->all();

        User::updateOrCreate(["id" => auth()->user()->id], $profileData);

        //return back()->withInput();

        return Redirect::back()->withErrors(['Profile data has been updated successfully']);
    }



    /*******************************Change Password Module*******************************/



    function changepass()
    {

        return view('admin.profile.changepassword');
    }



    function changepassword(Request $request)
    {

        $this->validate($request, [

            'old_password'     => 'required',

            'new_password'     => 'required|min:6',

            'confirm_password' => 'required|same:new_password',

        ]);

        $data = $request->all();

        $user = User::find(auth()->user()->id);



        if (!Hash::check($data['old_password'], $user->password)) {

            return Redirect::back()->withErrors(['Incorrect old password']);
        } else {

            $user->password = Hash::make($request->get('confirm_password'));

            $user->save();

            return Redirect::back()->withErrors(['The Password Changed Successfully']);
        }
    }



    /*******************************Change Password Module*******************************/
}
