<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
           [ 'name'=>'admin','display_name'=>'Quan tri'],
           [ 'name'=>'nd1','display_name'=>'khach hang'],
           [ 'name'=>'nd2','display_name'=>'phats tien'],
           [ 'name'=>'nd3','display_name'=>'chinh sua'],
        ]);
    }
}
