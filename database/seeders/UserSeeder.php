<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Bety";
        $user->email = "fricogarcia@hotmail.com";
        $user->password = "$2y$10"."$"."LD6UAqY9LWCjxQuDuNicju0g9fyQKRskuZSBYKL756ANURo0UBvPi";
        $user->type = 2;
        $user->save();
    }
}
