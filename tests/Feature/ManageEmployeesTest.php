<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class ManageEmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    /** @test */
    public function user_can_post_a_employee()
    {
        $payload = [
            'name' => 'Achmad',
            'status_id' => 3,
            'salary' => 2000000 
        ];

        $this->json('POST', 'api/employees' , $payload, ['Accept' => 'application/json'])
            ->assertJson([
                'msg' => 'Data Berhasil Ditambahkan',
                'data' => [
                    'name' => 'Achmad',
                    'status_id' => 3,
                    'salary' => 2000000
                ],
        ]);

    }
    /** @test */
    public function user_can_get_a_employee()
    {
        $this->json('GET', 'api/employees', [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }
}
