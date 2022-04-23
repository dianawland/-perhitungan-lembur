<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageSettingsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    /** @test */
    public function user_can_update_a_setting()
    {
        $payload = [
            'key' => 'overtime_method',
            'value' => 1
        ];

        $this->json('PATCH', 'api/settings' , $payload, ['Accept' => 'application/json'])
            ->assertJson([
                'msg' => 'Data Setting Berhasil Diubah',
                'data' => [
                    'key' => 'overtime_method',
                    'value' => 1
                ],
        ]);

    }
}
