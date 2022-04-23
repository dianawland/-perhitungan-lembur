<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    /** menampilkan paginate employee */

    public function __construct(EmployeeRepository $employeeRepository )
    {
        $this->employeeRepository = $employeeRepository->orderBy('name', 'asc')->paginate(10);
    }


    public function show(EmployeeRequest $request)
    {
        return $this->employeeRepository->findAll(request());
    } 

     /*--- menampilkan post gaji 
     */
    public function store(EmployeeRequest $request)
    {
        return $this->employeeRepository->post($request);
        
        
    }
}
