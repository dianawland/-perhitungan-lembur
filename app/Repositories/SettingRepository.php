<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Setting;
class SettingRepository
{
    public function update($request)
    {

        try{
            $setting = Setting::first();
            $setting->update([
                'value' => (int)$request->value,
                'key' => $request->key,
            ]);
        } catch (\Throwable $e) {
            return response()->json(['msg' => 'Data Setting Tidak Berhasil Diubah'], 500);
        }

        return response()->json([
            'msg' => 'Data Setting Berhasil Diubah',
            'data' => $setting,
        ], 200);
    }
}