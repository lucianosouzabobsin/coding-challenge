<?php

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientTableSeeder extends Seeder
{
    public function run()
    {
        Client::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => Hash::make('toptal'),
            'api_token' => env('API_TOKEN')
        ]);
    }
}
