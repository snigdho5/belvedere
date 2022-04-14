<?php

use App\Blog;

use Illuminate\Support\Facades\Route;

use App\CmsContent;

use App\Event;

use App\OurClub;

use App\Sponsor;

use App\Package;

use Illuminate\Http\Request;

use App\Mail\ContactMail;
use App\Mail\DemoEmail;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Cache;



Route::get('/config_cache', function(){

    Artisan::call('config:cache');

    Artisan::call('cache:clear');

    Artisan::call('route:clear');

    Artisan::call('view:clear');

    Cache::flush();

    return 'Cache Cleared';

});



Auth::routes();



Route::get('/', function(){

    $cmsData        =   CmsContent::first();

    $eventData      =   Event::where("status", "=", "1")->limit(6)->get();

    $ourClubData    =   OurClub::limit(3)->get();

    $blogData       =   Blog::limit(3)->get();

    $oursponser     =   Sponsor::get();

    $pkg            =   Package::where('type','member')->get();

    // echo '<pre>';print_r($cmsData);die;

    return view('user.pages.home',compact('cmsData','eventData','ourClubData','blogData','oursponser','pkg'));

})->name('home');



Route::get('/contactus', function () {

    $cmsData        =   CmsContent::first();

    $eventData      =   Event::limit(6)->get();

    $ourClubData    =   OurClub::limit(3)->get();

    $blogData       =   Blog::limit(3)->get();

    $oursponser     =   Sponsor::get();

    return view('user.pages.contact', compact('cmsData', 'eventData', 'ourClubData', 'blogData', 'oursponser'));
})->name('contactus');



Route::get('newsletter/unsubscription/{email}', 'UserController@unsubscribe_newsletter');


//new route for User

Route::group(['middleware' => ['auth']], function(){

    // Route::resource('roles','RoleController');

    // Route::resource('users','UserController');

    // Route::resource('products','ProductController');

    /*print_r(auth()->user());

    die();*/    

    Route::get('/dashboard','FrontRegisterController@dashboard')->name('dashboard');

    //user manage dashboard routes

    Route::get('profile','user\ManageDashboard@profile')->name('profile');

    Route::get('msponsor','user\ManageDashboard@getsponserdata')->name('msponsor');

    Route::post('manageprofileuser','FrontRegisterController@profile')->name('manageprofileuser');

    Route::get('public/uploads/profile/{filename}', function($filename)

    {

        $path   =   public_path('uploads') . '/' . $filename;

        $file   =   File::get($path);

        $type   =   File::mimeType($path);

        $response   =   Response::make($file, 200);

        $response->header("Content-Type", $type);

        return $response;

    })->name('getprofileimage');

    //sponsor

    Route::post('managesponsor','user\ManageDashboard@manage_sponsor')->name('managesponsor');

    Route::get('public/imagess/{filename}', function($filename){

        $path       =   public_path('imagess') . '/' . $filename;

        $file       =   File::get($path);

        $type       =   File::mimeType($path);

        $response   =   Response::make($file, 200);

        $response->header("Content-Type", $type);

        return $response;

    })->name('getsponsorimage');

    

    Route::get('changepass','user\ManageDashboard@changeuserpassword')->name('changepass');

    Route::post('/userchangepword', 'CmsController@changepassword')->name('userchangepword');

    

    Route::get('advert','user\ManageDashboard@advert')->name('advert');

    Route::get('myevents','user\ManageDashboard@myevent')->name('myevent');

    Route::get('transactions','user\ManageDashboard@transactions')->name('transactions');



    Route::get('applicants','user\ManageDashboard@job_applicants')->name('applicants');

});



/*******************************Advert Management @ frontend*******************************/

Route::post('/addnewadvert','AdvertiserController@insertnewadvert')->name('addnewadvert');

Route::get('public/uploads/advert/{filename}', function($filename)

{

    $path       =   public_path('uploads/advert') . '/' . $filename;

    $file       =   File::get($path);

    $type       =   File::mimeType($path);

    $response   =   Response::make($file, 200);

    $response->header("Content-Type", $type);

    return $response;

})->name('getadvertimage');



Route::post('/addnewapplicant','user\CareersController@insertnewapplicant')->name('addnewapplicant');



Route::get('news','user\ManageDashboard@news')->name('news');

Route::get('news/{id}','user\ManageDashboard@newsdetail');



Route::post('paybecomemember','user\PaymentdetailController@paybecomemember')->name('paybecomemember');

Route::post('paybecomesponser','user\PaymentdetailController@paybecomesponser')->name('paybecomesponser');

Route::post('payBecomeAdvertiser','user\PaymentdetailController@payBecomeAdvertiser')->name('payBecomeAdvertiser');



//manage user profile



Route::post('post-register','FrontRegisterController@create')->name('post-register');


Route::post('req_reset_password', 'FrontRegisterController@reqResetPassword')->name('req_reset_password');

Route::get('auth-login','FrontRegisterController@login')->name('auth-login');

Route::post('login-check','FrontRegisterController@loginCheck')->name('login-check');



Route::get('access','FrontRegisterController@admin_login')->name('access');

Route::post('access-check','FrontRegisterController@adminCheck')->name('access-check');



Route::get('sponsor','FrontRegisterController@sponser')->name('sponsor');

Route::post('becomesponser','FrontRegisterController@becomesponser')->name('becomesponser');



Route::get('advertiser','FrontRegisterController@advertiser')->name('advertiser');

Route::post('becomeadvertiser','FrontRegisterController@becomeadvertiser')->name('becomeadvertiser');



Route::get('event','user\EventController@index')->name('event');

Route::get('eventdetail/{id}','user\EventController@show');

Route::get('event-search','user\EventController@event_search');

Route::post('autocomplete/fetch_ev','user\EventController@autocomplete')->name('autocomplete.fetch_ev');

Route::get('careers','user\CareersController@index')->name('careers');

Route::get('archived-event-search','user\EventController@archived_event_search');

Route::post('autocomplete/fetch_ar_ev','user\EventController@autocomplete')->name('autocomplete.fetch_ar_ev');

Route::post('eventcheckout', 'user\EventController@eventcheckout')->name('eventcheckout');

Route::get('search','user\CareersController@search');

Route::post('autocomplete/fetch','user\CareersController@autocomplete')->name('autocomplete.fetch');


//archived events
Route::get('archived-events','user\EventController@archivedevents')->name('archived-events');

Route::get('archived-event-detail/{id}','user\EventController@showarchivedevents');


Route::get('about','user\AboutController@index');

Route::get('whyjoin','user\AboutController@whyjoin');

Route::get('committi','user\AboutController@commiti');

Route::get('belvederebenevolentassociation','user\AboutController@belvedere_benevolent_association');

Route::post('benevolentcheckout', 'user\AboutController@save_benevolent_donate')->name('benevolentcheckout');


Route::post('layout/addeditlayout', 'LayoutsController@AddEditLayout');

Route::post('cms/addeditcms', 'CmsController@AddEditCms');

Route::post('ourclub/addedit', 'user\EventController@index');


Route::get('/mail_test', function (Request $request){

    Mail::send(new DemoEmail($request));

    return redirect('/');

});



// Route::post('/contact', function (Request $request){
// print_r($request);die;
//     Mail::send(new ContactMail($request));

//     return redirect('/contactus');

// });

Route::post('contact_submit', 'UserController@contact_submit');



Route::get('/test', function () {

    return view('test');

});



/*******************************Advertisor Management @ (common for both) *******************************/

Route::get('editadvertiser/{id}','AdvertiserController@edit_advertiser');

Route::post('deleteadvertisement','AdvertiserController@delete_advertiser')->name('deleteadvertisement');

Route::post('/updateadvertiser','AdvertiserController@update_advertiser')->name('updateadvertiser');

/*******************************Advertisor Management @ (common for both)*******************************/



//admin

Route::group(['middleware' => ['is_admin']], function(){



    Route::get('admin', 'CmsController@admindashboard');



    Route::resources([

        'manageevent'       =>  'EventController',

        'managecareer'      =>  'CareerController',

        'primiummember'     =>  'PrimiumController',

        'managesponsors'    =>  'SponsorController',

        'layout'            =>  'LayoutsController',

        //'cms' => 'CmsController',

        'ourclub'           =>  'OurClubController',

        'managecommiitee'   =>  'CommitteeController',

        'managepackage'     =>  'PackageController',

        'olddatalist'       =>  'OlddataController',

    ]);

    

    Route::get('subs_list', 'PrimiumController@indexSubsList');
    
    Route::post('filter_member', 'PrimiumController@filterMember');

    Route::post('import_newsletter_multi_member', 'UserController@importNewsletterMultiMember');

    Route::post('aboutadded', 'CmsController@AddEditCms');

    Route::get('homecms','CmsController@index');

    Route::get('aboutcms','CmsController@about')->name('cmsabout');

    Route::get('whyjoincms', 'CmsController@whyjoin');

    Route::get('committeecms', 'CmsController@commitee');

    Route::get('committeecms', 'CmsController@commitee');    

    Route::get('adbelvederebenevolentassociation', 'CmsController@belvedere_benevolent_association');       

    

    /*******************************User Module*******************************/

    //edit delete user info from admin dashboard

    Route::post('addnewuser', 'UserController@createNewUser');

    Route::post('/edituserdata', 'SponsorController@getUserData')->name('edituserdata');

    
    Route::post('reset_password_email', 'PrimiumController@resetPasswordEmail')->name('resetPasswordEmail');

 
    Route::post('/updateuserinfo','SponsorController@updateUserData')->name('updateuserinfo');

    Route::post('/deleteuser', 'SponsorController@deleteuserbyadmin')->name('deleteuser');

    /*******************************Change Module*******************************/

    

    /*******************************User Password*******************************/



    Route::get('/changepassword', 'CmsController@changepass')->name('changepassword');

    Route::post('/changepword', 'CmsController@changepassword')->name('changepword');



    /*******************************Change Password*******************************/

    

    /*******************************Profile Management*******************************/

    

    Route::get('/editprofile', 'CmsController@viewprofile')->name('viewprofile');

    Route::post('/updateprofile', 'CmsController@update_profile')->name('updateprof');

    

    /*******************************Profile Management*******************************/



    /*******************************Event Management @ admin*******************************/

    Route::post('/addevent','user\EventController@insertEvent')->name('addevent');

    Route::post('/updateevent','user\EventController@update_event')->name('updateevent');

    Route::get('geteventsubscribers', 'user\EventController@eventSubscribedUsers')->name('geteventsubscribers');

    

    /*******************************News Management @ admin*******************************/

    Route::get('/newslist','EventController@news_list')->name('newslist');

    Route::post('/addnews','EventController@insert_news')->name('addnews');

    Route::get('editnews/{id}','EventController@edit_news');

    Route::get('deletenews/{id}','EventController@delete_news');

    //Route::post('/updatenews','EventController@update_news')->name('updatenews');

    Route::post('news/updatenews','EventController@update_news')->name('updatenews');

    /*******************************News Management @ admin*******************************/



    /*******************************Sponsor Management @ admin*******************************/

    Route::get('editsponsor/{id}','SponsorController@edit_sponsor');

    Route::get('deletesponsor/{id}','SponsorController@delete_sponsor');

    /*******************************Sponsor Management @ admin*******************************/

    /*******************************Advertisor Management @ admin *******************************/

    Route::get('/advertisers','AdvertiserController@listalladvertisers')->name('advertisers');

    /*******************************Advertisor Management @ admin *******************************/

    Route::get('/addnewuser','PrimiumController@add_new_user')->name('addnewuser');

    Route::post('/insertuser','PrimiumController@insert_new_user')->name('PrimiumController.insertuser');



    Route::get('/membersbilling','PrimiumController@get_user_billing_history')->name('membersbilling');



    Route::post('/export_old_data','OlddataController@export_data')->name('exportolddata');

    Route::post('/export_event_data','EventController@export_data')->name('exporteventdata');

    Route::post('/export_renewal_data','PrimiumController@export_data')->name('exportrenewaldata');

    Route::post('/export_primium_data','PrimiumController@export_primium_data')->name('exportprimiumdata');

    Route::post('/export_event_bill_data','user\EventController@export_data')->name('exportbilldata');

    Route::post('/import_excel/import', 'PrimiumController@import_member_data');

    Route::get('/listallusers', 'PrimiumController@list_all_users')->name('listallusers');



    Route::get('/subscriberslist', 'UserController@subscriberlist')->name('subscriberslist');

    Route::get('/contactlistdetails/{id}', 'UserController@contact_list_details')->name('contactlistdetails');

    Route::get('/deletecontact/{id}', 'UserController@delete_contact_list')->name('deletecontact');

    Route::post('/import_excel/subscribers', 'UserController@import_subscriber_data');

    Route::get('/newsletter', 'UserController@newsletter')->name('newsletter');

    Route::post('newsletter/subscription', 'UserController@send_newsletter');

    Route::post('addtosubslist', 'UserController@add_to_subslist');

    Route::get('/newsletterlogs', 'UserController@newsletter_logs')->name('newsletterlogs');

    Route::get('/newsletterdetails/{id}', 'UserController@subscription_details')->name('newsletterdetails');

    // Route::get('/newsletterdetails', 'UserController@subscription_details')->name('newsletterdetails');

    //template master
    Route::get('/templates', 'UserController@templates')->name('templates');
    Route::post('template/create', 'UserController@save_template');
    Route::get('gettemplate/{id}','UserController@getTemplate');
    Route::post('template/delete', 'UserController@deleteTemplate');

    Route::get('ckeditor_upload/{csrf}','UserController@ckeditorUpload');

});