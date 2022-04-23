<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OvertimeRequest;
use App\Http\Requests\PayRequest;
use App\Repositories\OvertimeRepository;

class OvertimeController extends Controller
{
    public function __construct(OvertimeRepository $overtimeRepository )
    {
        $this->overtimeRepository = $overtimeRepository;
    }


/*fungsi get */
    public function show(OvertimeRequest $request)
    {
        return $this->overtimeRepository->show($request);
    }

    /* fungsi post */
    public function store(OvertimeRequest $request)
    {
        return $this->overtimeRepository->post($request);    
    }

    /* fungi get */
    public function pay(PayRequest $request)
    {
        return $this->overtimeRepository->pay($request);
    }
}
