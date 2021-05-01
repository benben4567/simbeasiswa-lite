<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'Super Admin',
          'email' => 'super.admin@gmail.com',
          'password' => '123456',
          'role' => 'super-admin'
      ]);
    }
}
