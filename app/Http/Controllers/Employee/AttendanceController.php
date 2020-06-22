<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Attendance;

class AttendanceController extends EmployeeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.attendance.index', ['title' => 'MY RECORDS']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.attendance.punch_in_out', [
            'title' => 'PUNCH IN/OUT',
            'date' => $this->currentDate(),
            'time' => $this->currentTime(),
            'btnText' => $this->changeButtonText(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->punchChecker() == 0) {
            try {
                $attendance = new Attendance;
                $attendance->employee_id = $this->currentUserID();
                $attendance->in = $request->datetime;
                $attendance->save();
                return redirect()->route('attendance.create')->with('success', 'Punched In Successfully!');
            } catch (Exception $e) {
                return redirect()->route('attendance.create')->with('error', $e);
            }
        } else {
            try {
                $attendance = $this->lastPunch();
                $attendance->out = $request->datetime;
                $attendance->save();
                return redirect()->route('attendance.create')->with('success', 'Punched Out Successfuly!');
            } catch (Exception $e) {
                return redirect()->route('attendance.create')->with('error', $e);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function currentDate()
    {
        $date = Carbon::now()->toDateString();
        return $date;
    }

    public function currentTime()
    {
        $time = Carbon::now()->toTimeString();
        return $time;
    }

    public function lastPunch()
    {
        $last = Attendance::where('employee_id', $this->currentUserID())
                    ->latest('id')
                    ->first();
        return $last;
    }

    /**
     * Check if last punch is in or out, returns 0 for in and 1 for out.
     *
     * @return \Illuminate\Http\Response
     */
    public function punchChecker()
    {
        $lastPunch = $this->lastPunch();
        if ($lastPunch) {
            $lastPunch->out == null ? $result = 1 : $result = 0;
        } else {
            $result = 0;
        }
        return $result;
    }

    public function changeButtonText()
    {
        $this->punchChecker() == 0 ? $text = "IN" : $text = "OUT";
        return $text;
    }
}
