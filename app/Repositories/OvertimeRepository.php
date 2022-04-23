<?php

namespace App\Repositories;

use App\Models\Overtime;
use App\Http\Resources\OvertimeCollection;
use App\Models\Setting;
use App\Models\Employee;

class OvertimeRepository
{
    
    public function show($request)
    {
        try{
            $overtime = Overtime::whereBetween('date', [date($request->date_start),date($request->date_ended)])->get();
        } catch (\Throwable $e) {
            return response()->json(['msg' => 'Data Tidak Ditemukan'], 404);
        }
        return response()->json([
            'msg' => 'Data Ditemukan',
            'data' => new OvertimeCollection($overtime)
        ]);
    }

    public function post($request)
    {
        try{
            $overtime = Overtime::create([
                'employee_id' => (int)$request->employee_id,
                'date' => $request->date,
                'time_started' => (string)$request->time_started,
                'time_ended' => (string)$request->time_ended,
            ]);
            $overtime->save();
        } catch (\Throwable $e) {
            return response()->json(['msg' => 'Data Tidak Berhasil Ditambahkan'], 500);
        }

        return response()->json([
            'msg' => 'Data Berhasil Ditambahkan',
            'data' => $overtime
        ], 201);
    }

    public function pay($request)
    {
        $sum_hours = 0;
        $date = explode('-',$request->month);
        $employees = Employee::whereHas('overtime', function($query) use ($date){
                        $query->whereYear('date', $date[0])->whereMonth('date' , $date[1]);
                    })->with('overtime')->get();
        if($employees->isEmpty()){
            return response()->json(['msg' => 'Data Tidak Ditemukan'], 404);
        }
        $result = $this->operation($employees);
        
        return response()->json($result , 200);
    }
    


    protected function duration($employee, $hours){
        if($employee->id === 3){
            $duration = floor($hours)-1; 
        }else{
            $duration = floor($hours);
        }
        return (int)$duration;
    }

    protected function salary($employee, $hours)
    {
        $setting = Setting::first();
        if($setting->value === 1){
            $salary = $employee->salary/173 * $hours;
        }else{
            $salary = 10000*$hours;
        }
        return (int)$salary;
    }

    protected function operation($employees)
    {
        $sum_hours = 0;
        foreach($employees as $key => $employee){
            foreach($employee->overtime as $item){
                $started  = new \DateTime($item->date.''.$item->time_started);
                $ended = new \DateTime($item->date.''.$item->time_ended);
                $sum_day = $ended->diff($started)->format('%h');
                $hours = $this->duration($employee, $sum_day);
                $total_salary_day[] = [
                    'id' => $item->id,
                    'date' => $item->date,
                    'time_started' => $item->time_started,
                    'time_ended' => $item->time_ended,
                    'total_hours' => $hours
                ];
                $sum_hours += $hours;
            }
            $result[$key] =[
                'id' => $employee->id,
                'name' => $employee->name,
                'status_id' => [
                    'name' => $employee->status->name
                ],
                'salary' => $employee->salary,
                'overtimes' => $total_salary_day,
                'total_hours_month' => $sum_hours,
                'salary_month' => $this->salary($employee, $sum_hours),
            ];

            $sum_hours=0;
        }
        return $result;
    }
}