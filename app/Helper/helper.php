<?php



use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

use App\Services\PushNotification;

use App\User;

$now = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$dtime =  $now->format("Y-m-d H:i:s");
$dtime2 =  $now->format("Y-m-d-H-i-s");

define("DTIME", $dtime);
define('DTIME2', $dtime2);
define('EMAIL', 'hello@bingehq.com');
define('PHONE', '15');
define('COMP_NAME', 'BingeHQ.com');


function replace_null_with_empty_string($array)

{



    $array = collect($array)->toArray();



    foreach ($array as $key => $value) {

        if (is_array($value)) {

            if (empty($value)) {

                $array[$key] = (object)[];

            } else {

                $array[$key] = replace_null_with_empty_string($value);

            }

        } else {

            if (is_null($value))

                $array[$key] = "";

        }

    }



    return $array;

}



function RandomPassword($length)

{

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";

    $password = substr(str_shuffle($chars), 0, $length);

    return $password;

}



function HashPassword($password)

{

    return Hash::make($password);

}



function getFormatedDate($date, $format = NULL)

{

    $return = '';

    if (isset($date) && !empty($date) && $date != null) {

        if (!isset($format)) {

            $format = 'Y-m-d H:i:s';

        }

        return Carbon::parse($date)->format($format);

    }

    return $return;

}



function getDbCompetibleDateFormat($date)

{

    return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d H:i:s');

}

function moneyFormat($value)

{

    return number_format($value, 2);

}



function be64($id)

{

    return base64_encode($id);

}



function bd64($id)

{

    return base64_decode($id);

}



function uploadUserImage($image, $location = "others", $oldfile = "")

{

    $img_name = time() . "_" . Str::random() . "_" . rand(111111, 999999) . "." . $image->getClientOriginalExtension();

    $path = \Storage::disk('public')->putFileAs(

        $location,

        $image,

        $img_name

    );

    if (!empty($oldfile) && file_exists(public_path('storage/' . $oldfile))) {

        unlink(public_path('storage/' . $oldfile));

    }

    return $img_name;

}

function ImageUpload($image, $folder)

{

    $uploadPath =   public_path('/uploads/' . $folder);

    $extension  =   $image->getClientOriginalExtension();

    $fileName   =   time() . "_" . rand(11111, 99999) . '.' . $extension;

    $image->move($uploadPath, $fileName);

    $image      =   $fileName;

    return $image;

}





if(!function_exists('getContentLanguage')){

    function getContentLanguage()

    {

        $getallheaders = getallheaders();

        $locate = '1';

        if (!empty($getallheaders) && array_key_exists('Content-Language', $getallheaders)) {

            $locate = $getallheaders['Content-Language'];

        }

        return $locate;

    }

}



if(!function_exists('subscriberlist')){

    function subscriberlist()

    {

        $data   =   DB::table('subscriber_list_master')

                    ->get()

                    ->toArray();

        return $data;

    }

}


function print_obj($obj, $return = FALSE)
{
    $str = "<pre>";
    if (is_array($obj)) {
        // to prevent circular references
        if (is_a(current($obj), 'Data_record')) {
            foreach ($obj as $key => $val) {
                $str .= '[' . $key . ']';
                $str .= $val;
            }
        } else {
            $str .= print_r($obj, TRUE);
        }
    } else {
        if (is_a($obj, 'Data_record')) {
            $str .= $obj;
        } else {
            $str .= print_r($obj, TRUE);
        }
    }
    $str .= "</pre>";
    if ($return) return $str;
    echo $str;
}



