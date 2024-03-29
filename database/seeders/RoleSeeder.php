<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com' ,
            'password' => '123123123',
            'role_id' => 1
        ]);

        User::create([
            'name' => 'karyawan',
            'email' => 'karyawan@email.com' ,
            'password' => '123123123',
            'role_id' => 2
        ]);

        User::create([
            'name' => 'customer',
            'email' => 'customer@email.com' ,
            'password' => '123123123',
            'role_id' => 3
        ]);

        Role::create([
            'nama' => 'admin'
        ]);

        Role::create([
            'nama' => 'karyawan'
        ]);

        Role::create([
            'nama' => 'kostumer'
        ]);
    }
}
