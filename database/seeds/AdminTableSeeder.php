<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'         => 1,
            'name'       => 'Admin',
            'username'   => 'admin',
            'email'      => 'admin@admin',
            'avatar'     => 'avatar.jpg',
            'banned'     => 0,
            'info'       => 'Informacia im masin',
            'role'       => 1,
            'password'   =>  bcrypt('admin'),
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'id'         => 2,
            'name'       => 'Test',
            'username'   => 'test',
            'email'      => 'test@admin',
            'avatar'     => 'avatar.jpg',
            'banned'     => 0,
            'info'       => 'Informacia im masin',
            'role'       => 1,
            'password'   =>  bcrypt('test'),
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s'),
        ]);
    }
}