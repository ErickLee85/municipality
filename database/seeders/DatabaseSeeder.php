<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //  DB::table('departments')->insert([
        //     'department' => "water",
        // ]);
        // DB::table('departments')->insert([
        //     'department' => "sewer",
        // ]);
        // DB::table('departments')->insert([
        //     'department' => "gas",
        // ]);
        // DB::table('departments')->insert([
        //     'department' => "street",
        // ]);

        DB::table('users')->insert([
            'name' => "Austin",
            'email' => 'austin@aol.com',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'name' => "Josh",
            'email' => "josh@aol.com",
            'password' => Hash::make('1234578')
        ]);
    }
}