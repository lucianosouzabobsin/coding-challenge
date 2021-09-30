<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use App\Models\Movement;
use App\Models\PersonalRecord;
use Tests\TestCase;

class PersonalReportTest extends TestCase
{
    private function setUpFactory()
    {
        factory(Client::class)->create([
            'name' => 'testee',
            'email' => 'teste@test.com',
            'password' => '1234',
            'api_token' => '0syHnl0Y9jOIfszq11EC2CBQwCfObmvscrZYo5o2ilZPnohvndH797nDNyAT',
        ]);

        factory(User::class)->create([
            'name' => 'Teste'
        ]);

        factory(Movement::class)->create([
            'name'  => 'Movement Test'
        ]);

        factory(PersonalRecord::class)->create([
            'user_id' => '1',
            'movement_id' =>  '1',
            'value' => 120.0,
            'date' => '2021-01-01 00:00:00.0'
        ]);
    }

    /**
     * Test return success.
     *
     * @return void
     */
    public function testReturnSuccess()
    {
        $this->setUpFactory();

        $token = '0syHnl0Y9jOIfszq11EC2CBQwCfObmvscrZYo5o2ilZPnohvndH797nDNyAT';
        $headers = ['Authorization' => "Bearer $token"];

        $payload = [
            'movement'  => '1'
        ];

        $response = $this->json('GET', '/api/list.records', $payload, $headers)
        ->assertStatus(200);
    }

    /**
     * Test Records resource not found.
     *
     * @return void
     */
    public function testReturnResourceNotFound()
    {
        $this->setUpFactory();

        $token = '0syHnl0Y9jOIfszq11EC2CBQwCfObmvscrZYo5o2ilZPnohvndH797nDNyAT';
        $headers = ['Authorization' => "Bearer $token"];

        $payload = [
            'movement'  => '1001'
        ];

        $response = $this->json('GET', '/api/list.records', $payload, $headers)
        ->assertStatus(404);
    }

    /**
     * Test Records resource not found.
     *
     * @return void
     */
    public function testReturnUnauthenticated()
    {
        $this->setUpFactory();

        $token = '12222111';
        $headers = ['Authorization' => "Bearer $token"];

        $payload = [
            'movement'  => '1'
        ];

        $response = $this->json('GET', '/api/list.records', $payload, $headers)
        ->assertStatus(401);
    }
}
