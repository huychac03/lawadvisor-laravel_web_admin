<?php

namespace App\Http\Controllers\API\Lawyers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\AppointmentSchedulesResource;
use App\Http\Resources\API\AppointmentTypesResource;
use App\Http\Resources\API\LawyersResource;
use App\Models\AppointmentSchedule;
use App\Models\AppointmentType;
use App\Models\Lawyer;
use Carbon\Carbon;

class APILawyerProfileController extends Controller
{
    public function __construct()
    {
    }

    public function bookAppointment(Request $request, $user_name)
    {
     try{
        $request->validate([
            'appointment_type_id' => 'required|exists:appointment_types,id',
            'date' => 'required|date',
        ]);
        $lawyer = Lawyer::where('user_name', $user_name)->first();
        if(!$lawyer){
        $response = generateResponse(null, false, 'Lawyer Not Found', null, 'collection');
        return response()->json($response, 404); 
        }
        $lawyer_id = $lawyer->id;
        $appointment_type = AppointmentType::select('id','is_schedule_required')->where('id', $request->appointment_type_id)->first();
        $day = Carbon::parse($request->date)->format('l');
        if ($appointment_type->is_schedule_required) {
            $schedule = AppointmentSchedule::with('appointment_type')->with('schedule_slots')->where('lawyer_id', $lawyer_id)->where('appointment_type_id', $appointment_type->id)->where('day', $day)->first();
        } else {
            $schedule = AppointmentSchedule::with('appointment_type')->with('schedule_slots')->where('lawyer_id', $lawyer_id)->where('appointment_type_id', $appointment_type->id)->first();
        }
        if ($schedule) {
            $schedule = new AppointmentSchedulesResource($schedule);
        } else {
            $schedule = null;
        }
        $data['schedule'] = $schedule;
      //  $data['lawyer_id'] = $lawyer_id;
      //  $data['lawyer'] = $lawyer;
       // $data['appointment_type'] = $appointment_type;
        $response = generateResponse($data, true, 'Data Featch Successfully', null, 'collection');
        return response()->json($response, 200);
    }
    catch (\Exception $e) {
    $response = generateResponse(null, false, $e->getMessage(), null, 'collection');
    return response()->json($response, 200);
    } 
  }

  public function getLwyerAppointmentTypes(Request $request, $user_name)
  {
   try{
      $lawyer = Lawyer::withAll()->where('user_name', $user_name)->first();
      if(!$lawyer){
      $response = generateResponse(null, false, 'Lawyer Not Found', null, 'collection');
      return response()->json($response, 404); 
      }
       $appointment_types = $lawyer->appointment_schedules()->pluck('appointment_type_id')->toArray();
       $appointment_types = AppointmentType::whereIn('id' , array_unique($appointment_types))->active()->get();
       $appointment_types = AppointmentTypesResource::collection($appointment_types);
       $response = generateResponse($appointment_types, true, 'Data Featch Successfully', null, 'collection');
       return response()->json($response, 200);
  }
  catch (\Exception $e) {
  $response = generateResponse(null, false, $e->getMessage(), null, 'collection');
  return response()->json($response, 200);
  } 
}
}
