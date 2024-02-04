<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Roles::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Admin'],
            ['name' => 'User'],

        ];
        foreach ($data as $value) {
            Roles::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
