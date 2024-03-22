<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $users = [
            [
                'name' => 'Mario',
                'surname' => 'Bianchi',
                'date_of_birth' => 1975-02-15,
                'email' => 'mario.bianchi@gmail.com',
                'password' => 'mariobianchi'
            ],
            [
                'name' => 'Anna',
                'surname' => 'Lombardi',
                'date_of_birth' => 1984-08-22,
                'email' => 'annalomb@gmail.com',
                'password' => 'annalombardi'
            ],
            [
                'name' => 'Simone',
                'surname' => 'Maccarini',
                'date_of_birth' => 1994-10-14,
                'email' => 'simomacca@gmail.com',
                'password' => 'simonemaccarini'
            ],
        ];

        foreach ($users as $user){
            $New_user = new User();

            $new_user->name = $user['name'];
            $new_user->surname = $user['surname'];
            $new_user->date_of_birth = $user['date_of_birth'];
            $new_user->email = $user['email'];
            $new_user->password = $user['password'];

            $new_user->save();
        }
    }
}
