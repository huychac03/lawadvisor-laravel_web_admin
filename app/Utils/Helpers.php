<?php

use Carbon\Carbon;

function generateResponse($arr, $success, $message, $errors, $type = 'paginated')
{
    if ($type == 'paginated') {
        if (!isset($arr['data'])) {
            $arr['data'] = [];
        }
        $arr['success'] = $success;
        $arr['message'] = $message;
        $arr['errors'] = $errors;
        return $arr;
    } else {
        $response = [];
        $response['data'] = $arr;
        $response['success'] = $success;
        $response['message'] = $message;
        $response['errors'] = $errors;
        return $response;
    }
}
function uploadFile($request,$key,$folder,$previous_file = null){
    if ($previous_file && file_exists(public_path($previous_file))) {
        unlink(public_path($previous_file));
    }
    if ($request->file($key)) {
        $file = $request->file($key);
        $name = strtotime(now()) . $file->getClientOriginalName();
        $file->move(public_path() . '/files'.'/'.$folder, $name);
        $url = '/files'.'/'.$folder.'/' . $name;
        return $url;
    }else{
        return null;
    }
}
function uploadArrayFile($request,$key,$folder,$previous_file = null){
    if ($previous_file && file_exists(public_path($previous_file))) {
        unlink(public_path($previous_file));
    }
    if ( $request[$key]) {
        $file = $request[$key];
        $name = strtotime(now()) . $file->getClientOriginalName();
        $file->move(public_path() . '/files'.'/'.$folder, $name);
        $url = '/files'.'/'.$folder.'/' . $name;
        return $url;
    }else{
        return null;
    }
}

function uploadCroppedFile($request,$key,$folder,$previous_file = null){
    // if ($previous_file && file_exists(public_path($previous_file))) {
    //     unlink(public_path($previous_file));
    // }
    if($request->{$key}){
        $image_parts = explode(";base64,", $request->{$key});
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $path = '/images'.'/'.$folder;
        $imageFullPath = $path.'/'.$imageName;
        if(!is_dir(public_path($path))){
            mkdir(public_path($path));
        }
        file_put_contents(public_path().$imageFullPath, $image_base64);
        $url = $imageFullPath;
        return $url;
    }
    else if($previous_file){
        return $previous_file;
    }
    else{
        return null;
    }
}

function translations($json)
{
    if (!file_exists($json)) {
        if (file_exists(resource_path('lang/en.json'))) {
            return json_decode(file_get_contents(resource_path('lang/en.json')), true);
        } else {
            return [];
        }
    }
    return json_decode(file_get_contents($json), true);
}

function filterArray($arr)
{
    $temp = [];
    foreach ($arr as $item) {
        if ($item) {
            $temp[] = $item;
        }
    }
    return $temp;
}

// function updateGeneralCacheSettings()
// {
//     $general_settings = generalSettings();
//     \Illuminate\Support\Facades\Cache::put('general_settings', $general_settings);
//     return $general_settings;
// }

function getLawFirmDefaultPricingPlan(){
    $pricing_plan = \App\Models\PricingPlan::active()->lawFirm()->default()->first();
    return $pricing_plan;
}
function getLawyerDefaultPricingPlan(){
    $pricing_plan = \App\Models\PricingPlan::active()->lawyer()->default()->first();
    return $pricing_plan;
}

function allLanguages(){
    $languages = \App\Models\Language::active()->get();
    return $languages;
}
function generalSettings()
{
    $settings = \App\Models\GeneralSetting::select('name', 'value')->pluck('value', 'name')->toArray();
    return $settings;
}
function checkPermission($to_check, $permissions)
{
    if (is_array($to_check)) {
        foreach ($to_check as $val) {
            if (array_key_exists($val, $permissions) && $permissions[$val]) {
                return true;
            }
        }
    } else {
        if (array_key_exists($to_check, $permissions) && $permissions[$to_check]) {
            return true;
        }
    }
    return false;
}


function getModelFillables($modelName, $directory = "SJ")
{
        $model = 'App\Models' . $modelName;
    return \Illuminate\Support\Facades\App::make($model)->getFillable();
}




function ConvertToReadableTime($seconds)
{
    $minutes = 0;
    if ($seconds < 60) {
        $return_time = (int)$seconds . ' Secs';
    } else {
        $minutes = (int)$seconds / 60;
    }
    if ($minutes != 0) {
        if ($minutes < 60) {
            $return_time = (int)$minutes . ' Min';
        } else if ($minutes >= 60 && $minutes <= 1440) {
            $minutes = $minutes / 60;
            $return_time = (int)$minutes . ' Hours';
        } else {
            $minutes = $minutes / 1440;
            $return_time = (int)$minutes . ' Days';
        }
    }
    return $return_time;
}


function fileExtensionValidator(array $allowed_extensions, $file)
{
    $error = collect();
    $error['file'] = ['The file must be a file of type: ' . implode(', ', $allowed_extensions)];
    if (!in_array(strtolower($file->getClientOriginalExtension()), $allowed_extensions)) {
        return [
            'status' => false,
            'error' => $error
        ];
    }
    return [
        'status' => true,
        'error' => null
    ];
}
function pagesTranslations()
{
    $pages_contents = \App\Models\PagesContent::all();
    $all_page_content = [];
    foreach ($pages_contents as $pages_content) {
        $temp['name'] = $pages_content->name;
        $temp['value'] = $pages_content->getTranslation('value' , session()->get('locale') ?? app()->getLocale());
        $temp['page'] = $pages_content->page;
        $temp['type'] = $pages_content->type;
        $all_page_content[] = $temp;
    }
    return $all_page_content;
}



function dateTimeDiff($first_value, $second_value)
{
    $first_value = Carbon::parse($first_value);
    $second_value = Carbon::parse($second_value);
    return $first_value->diffInDays($second_value);
}
