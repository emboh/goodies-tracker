<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
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
        User::truncate();
        
        User::firstOrCreate([
            'name' => 'Admin Distributor',
            'email' => 'admin@distributor.com',
            'password' => 'password',
        ])->assignRole(
            Role::findByName(User::ROLE_DISTRIBUTOR)
        );

        User::firstOrCreate([
            'name' => 'Admin Supplier',
            'email' => 'admin@supplier.com',
            'password' => 'password',
        ])->assignRole(
            Role::findByName(User::ROLE_SUPPLIER)
        );
    }
}
