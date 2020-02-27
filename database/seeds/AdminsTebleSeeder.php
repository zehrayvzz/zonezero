<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin -> email = 'admin@mail.com';
        $admin -> password = Hash::make('123456');
        $admin -> save();
    }
}