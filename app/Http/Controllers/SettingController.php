<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Repositories\SettingRepository;

class SettingController extends Controller
{
    
    public function __construct(SettingRepository $settingRepository )
    {
        $this->settingRepository = $settingRepository;
    }
/**
     */
    public function update_setting(SettingRequest $request)
    {
        $response = $this->settingRepository->update($request);
        return $response;
    }
}
