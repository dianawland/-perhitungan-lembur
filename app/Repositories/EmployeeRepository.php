<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Resources\EmployeeCollection;
class EmployeeRepository
{
    public function findAll($params)
    {
        $per_page = 10;
        $page = 1;
        $order_by = 'name';
        $order_type = 'ASC';

        if($params->per_page){
            $per_page = $params->per_page;
        }
        if($params->page){
            $page = $params->page;
        }
        if($params->order_by){
            $order_by = $params->order_by;
        }
        if($params->order_type){
            $order_type = $params->order_type;
        }

        $employee = Employee::orderBy($order_by, $order_type)->paginate($per_page, '*', 'Employee Page', $page);
        return new EmployeeCollection($employee);
    }

    public function post($request)
    {
        try{
            $employee = Employee::create([
                'name' => $request->name,
                'status_id' => (int)$request->status_id,
                'salary' => $request->salary,
            ]);
            $employee->save();
        } catch (\Throwable $e) {
            return response()->json(['msg' => 'Data Tidak Berhasil Ditambahkan'], 500);
        }

        return response()->json([
            'msg' => 'Data Berhasil Ditambahkan',
            'data' => $employee
        ], 201);
    }
}