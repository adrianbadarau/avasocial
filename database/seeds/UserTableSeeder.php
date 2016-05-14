<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname'=>'admin',
            'lastname'=>'babanu',
            'email'=>'admin@site.com',
            'password'=>bcrypt('secret'),
            'code'=>'AVANTMD3',
            'key'=>'7[42k6CMm*F3|8~1^l6]'
        ]);
        User::create([
            'firstname'=>'root',
            'lastname'=>'babanu',
            'email'=>'root@site.com',
            'password'=>bcrypt('secret'),
            'code'=>'AVANTEST',
            'key'=>'5&rl6N3%eT1O5(oW9~^I'
        ]);
    }
}
