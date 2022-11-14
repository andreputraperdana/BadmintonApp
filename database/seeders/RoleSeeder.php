<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            [
                'nama' => 'Admin',
                'created_date' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama' => 'User',
                'created_date' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
