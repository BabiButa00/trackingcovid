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
        $user-> name = "Dzikri";
        $user-> email = "Dzikri076@gmail.com";
        $user-> password = bcrypt("1234567890");
        $user-> save();
    }
}
