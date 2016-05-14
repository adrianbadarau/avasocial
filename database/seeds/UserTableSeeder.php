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
            'firstname' => 'admin',
            'lastname' => 'babanu',
            'email' => 'admin@avasoci.al',
            'password' => bcrypt('secret'),
            'code' => 'AVGHACK2',
            'key' => '9!R@4cU6|(R5?h69+5(2'
        ]);
    }
}
