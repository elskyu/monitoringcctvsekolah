<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("1"), //aku ubah nya biasanya di phpmyadmin bukan disini sih
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
        

        /*
    public function run()
    {
    $user = User::updateOrCreate(
        ['email' => 'admin@gmail.com'],
        [
            'name' => 'admin',
            'password' => Hash::make('1'),
        ]
    );

    // Tambahkan ini hanya saat testing
    session()->put('login_user_id', $user->id);
    }
    */
}
