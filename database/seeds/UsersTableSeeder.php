<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user -> tckn = '12345678912';
        $user -> first_name = 'Zehra';
        $user -> last_name = 'Yavuz';
        $user -> birth_year = date("Y", strtotime('1996'));
        $user -> phone_number = '+905551234567';
        $user -> password = Hash::make('123456');
        $user -> save();
    }
}