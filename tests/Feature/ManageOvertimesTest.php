<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageOvertimesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    /** @test */
    public function user_can_post_a_overtime(){
        $payload = [
            'employee_id' => 1,
            'date' => '2022-03-03',
            'time_started' => '15:00', 
            'time_ended' => '18:00', 
        ];

        $this->json('POST', 'api/overtimes' , $payload, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJson([
                'msg' => 'Data Berhasil Ditambahkan',
                'data' => [
                    'date' => '2022-03-03',
                    'time_started' => '15:00',
                    'time_ended' => '18:00'
                ],
        ]);
    }
    /** @test */
    public function user_can_get_a_overtime(){
        $payload = [
            'date_started' => '2020-03-01',
            'date_ended' => '2020-04-01',
        ];

        $this->json('GET', 'api/overtimes', $payload, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
/** @test */
    public function user_can_get_a_overtime_calculate()
    {
        $month = [
            'month' => '2022-05'
        ];
        $this->json('GET', 'api/overtime-pays/calculate', $month, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

}

