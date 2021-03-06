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
        DB::table('users')->delete();
        $json = File::get("database/data/users.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          User::create(array(
            'id' => $obj->id,
            'email' => $obj->email,
            'username' => $obj->username,
            'password' => $obj->password,
            'role' => $obj->role,
            'remember_token' => $obj->remember_token,
            'created_at' => $obj->created_at,
            'updated_at' => $obj->updated_at
          ));
        }
    }
}
