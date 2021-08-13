<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as IlluminateHash;
use Paynow\Util\Hash;

class adminAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->insert([
            'name' =>'admin',
            'surname'=>'admin',
            'email' => 'admin@tendernoticeboard.co.zw',
            'password' => IlluminateHash::make('password'),
        ]);
    }
}
