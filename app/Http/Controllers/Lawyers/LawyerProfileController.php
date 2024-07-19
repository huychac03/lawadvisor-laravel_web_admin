<?php

namespace App\Http\Controllers\Lawyers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Resources\Web\AppointmentSchedulesResource;
use App\Http\Resources\Web\AppointmentTypesResource;
use App\Http\Resources\Web\LawyersResource;
use App\Models\AppointmentSchedule;
use App\Models\AppointmentType;
use App\Models\Lawyer;

class LawyerProfileController extends Controller
{
    public function __construct()
    {
    }

    public function myProfile(Request $request)
    {
        $user = auth()->user();
        $lawyer = $user->lawyer;
        $lawyer = Lawyer::withChildrens()->active()->withAll()->where('id', $lawyer->id)->first();
        if (!$lawyer) {
            abort(404);
        }
        $lawyer = new LawyersResource($lawyer);
        $appointment_types = AppointmentType::active()->get();
        $appointment_types = AppointmentTypesResource::collection($appointment_types);
        return Inertia::render('Lawyers/Profile',[
            'lawyer' => $lawyer,
            'appointment_types' => $appointment_types
        ]);
    }
    public function profile(Request $request)
    {
        $lawyer = Lawyer::withChildrens()->active()->approved()->withAll()->where('user_name',$request->user_name)->first();
        if(!$lawyer){
            abort(404);
        }
        $lawyer = new LawyersResource($lawyer);
        $appointment_types = AppointmentType::active()->get();
        $appointment_types = AppointmentTypesResource::collection($appointment_types);
        return Inertia::render('Lawyers/Profile',[
            'lawyer' => $lawyer,
            'appointment_types' => $appointment_types
        ]);
    }

    public function reviews(Request $request)
    {
        $lawyer = Lawyer::withChildrens()->active()->approved()->withAll()->where('user_name',$request->user_name)->first();
        if(!$lawyer){
            abort(404);
        }
        $lawyer = new LawyersResource($lawyer);
        return Inertia::render('Lawyers/Reviews',[
            'lawyer' => $lawyer
        ]);
    }

    public function bookAppointment(Request $request, $user_name)
    {
        $lawyer = Lawyer::where('user_name', $user_name)->first();
        // $lawyer_id = 3;
        $lawyer_id = $lawyer->id;
        $appointment_type = AppointmentType::select('id','is_schedule_required')->where('type', $request->type)->first();
        $appointment_type_id = $appointment_type->id;
        $day = strtolower(Date('l'));
        if ($appointment_type->is_schedule_required) {
            $schedule = AppointmentSchedule::with('appointment_type')->with('schedule_slots')->where('lawyer_id', $lawyer_id)->where('appointment_type_id', $appointment_type_id)->where('day', $day)->first();
        } else {
            $schedule = AppointmentSchedule::with('appointment_type')->with('schedule_slots')->where('lawyer_id', $lawyer_id)->where('appointment_type_id', $appointment_type_id)->first();
        }
        if ($schedule) {
            $schedule = new AppointmentSchedulesResource($schedule);
        } else {
            $schedule = null;
        }
        return Inertia::render('Lawyers/BookAppointment', [
            'schedule' => $schedule,
            'lawyer_id' => $lawyer_id,
            'lawyer' => $lawyer,
            'appointment_type_name'=> $appointment_type->display_name,
            'appointment_type_id' => $appointment_type_id,
            'is_schedule_required' => $appointment_type->is_schedule_required
        ]);
    }
}
