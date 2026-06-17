<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
                    [
                        'username'=>'admin',
                        'name'=>'Administrator',
                        'email'=>'admin@gmail.com',
                        'level'=>'admin',
                        'password'=>Hash::make('123456')
                    ],
                    [
                        'username'=>'kasir1',
                        'name'=>'Akun Kasir1',
                        'email'=>'kasir1@gmail.com',
                        'level'=>'kasir',
                        'password'=>Hash::make('123456')
                    ],
                    [
                        'username'=>'user1',
                        'name'=>'Akun User1',
                        'email'=>'user1@gmail.com',
                        'level'=>'user',
                        'password'=>Hash::make('123456')
                    ],
                    ];

                    foreach ($users as $key => $value) {
                        User::updateOrCreate(
                            ['username' => $value['username']], 
                            $value
                        );
                    }
    }
}
