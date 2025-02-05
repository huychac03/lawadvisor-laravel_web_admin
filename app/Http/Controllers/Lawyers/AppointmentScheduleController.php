<?php

namespace App\Http\Controllers\Lawyers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lawyers\Appointments\AddScheduleRequest;
use App\Http\Resources\Web\LawyersResource;
use App\Http\Requests\Lawyers\Appointments\CreateRequest;
use App\Http\Requests\Lawyers\Appointments\DeleteRequest;
use App\Http\Resources\Web\AppointmentSchedulesResource;
use App\Models\AppointmentSchedule;
use App\Models\AppointmentScheduleSlot;

class AppointmentScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('lawyer');
    }
    public function saveAppointmentSchedule(CreateRequest $request)
    {
        $data = $request->all();
        $user = Auth()->user();
        $lawyer_id = $user->lawyer->id;
        $data['lawyer_id'] = $lawyer_id;
        if ($request->is_schedule_required) {
            $records = AppointmentSchedule::where('lawyer_id', $lawyer_id)->where('appointment_type_id', $request->appointment_type_id)->get();
            $schedule_ids = $records->pluck('id')->toArray();
            if ($records) {
                AppointmentScheduleSlot::whereIn('schedule_id', $schedule_ids)->delete();
                $records->each->delete();
            }

            foreach ($request->selected_days as $key => $day) {

                $schedule =  AppointmentSchedule::create([
                    'lawyer_id' => $lawyer_id,
                    'appointment_type_id' => $request->appointment_type_id,
                    'fee' => $request->fee,
                    'day' => $day,
                    'is_holiday' => count($request->generated_slots[$day]) > 0 ? 1 : 0,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'slot_duration' => $request->interval,
                ]);
                foreach ($request->generated_slots[$day] as $key => $slot) {
                    AppointmentScheduleSlot::create(
                        [
                            'schedule_id' => $schedule->id,
                            'start_time' => $slot['start_time'],
                            'end_time' => $slot['end_time'],
                            'is_active' => $slot['is_active'],
                        ]
                    );
                }
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Schedules have been added Successfully',
                ]);
            }
        } else {
            AppointmentSchedule::where('lawyer_id', $lawyer_id)->where('appointment_type_id', $request->appointment_type_id)->delete();
            if ($request->fee) {
                AppointmentSchedule::create($data);
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Schedules fee has been added Successfully',
                ]);
            }
            else
            {
                request()->session()->flash('alert', [
                    'type' => 'info',
                    'message' => 'Schedule has been deleted Successfully',
                ]);
            }
        }
    }
    public function getAppointmentSchedules(Request $request)
    {
        $request->validate([
            'appointment_type_id' => 'required|integer',
            'is_schedule_required' => 'required|integer',
        ]);
        $user = Auth()->user();

        if ($request->is_schedule_required) {
            $schedules = AppointmentSchedule::withAll()->where('lawyer_id', $user->lawyer->id)->where('appointment_type_id', $request->appointment_type_id)->get();
            $schedules = AppointmentSchedulesResource::collection($schedules)->keyBy('day');
            $response = generateResponse($schedules, true, "Appointment Schedules Fetched Successfully", null, 'collection');
            return response()->json($response);
        } else {
            $schedule = AppointmentSchedule::withAll()->where('lawyer_id', $user->lawyer->id)->where('appointment_type_id', $request->appointment_type_id)->first();
            if ($schedule) {
                $schedule = new AppointmentSchedulesResource($schedule);
            } else {
                $schedule = null;
            }
            $response = generateResponse($schedule, true, "Appointment Schedule Fetched Successfully", null, 'collection');
            return response()->json($response);
        }
    }
    public function deleteAppointmentScheduleSlots(DeleteRequest $request)
    {
        $user = Auth()->user();
        $schedule = AppointmentSchedule::withAll()->where('lawyer_id', $user->lawyer->id)->where('appointment_type_id', $request->appointment_type_id)->where('day', $request->day)->first();
        $schedule->schedule_slots()->delete();
        $schedule->delete();
        request()->session()->flash('alert', [
            'type' => 'info',
            'message' => 'Schedule slots have been deleted Successfully',
        ]);
        return redirect()->back();
    }
    public function addNewAppointmentSchedule(AddScheduleRequest $request)
    {
        $user = Auth()->user();
        $lawyer_id = $user->lawyer->id;
        $schedule = AppointmentSchedule::withAll()->where('lawyer_id', $lawyer_id)->where('appointment_type_id', $request->appointment_type_id)->first();
        $created = AppointmentSchedule::create([
            'lawyer_id' => $lawyer_id,
            'appointment_type_id' => $request->appointment_type_id,
            'fee' => $schedule->fee,
            'day' => $request->day,
            'is_holiday' => count($request->generated_slots) > 0 ? 1 : 0,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'slot_duration' => $request->interval,
        ]);
        foreach ($request->generated_slots as $key => $slot) {
            AppointmentScheduleSlot::create(
                [
                    'schedule_id' => $created->id,
                    'start_time' => $slot['start_time'],
                    'end_time' => $slot['end_time'],
                    'is_active' => $slot['is_active'],
                ]
            );
        }
        request()->session()->flash('alert', [
            'type' => 'info',
            'message' => 'Schedule has been deleted Successfully',
        ]);
        return redirect()->back();
    }
}
