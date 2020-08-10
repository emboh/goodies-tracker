<?php

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate([
            'name' => 'distributor',
        ]);

        Role::firstOrCreate([
            'name' => 'supplier',
        ]);
    }
}
