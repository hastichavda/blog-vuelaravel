<?php

use Illuminate\Database\Seeder;

use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'admin';
        $user->usertype = 'admin';
        $user->email =  'admin@gmail.com';
        $user->password = bcrypt('admin123');
        $user->save();

    }
}
