<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
{
    $permissions = [
        'Manage Role', 'Create Role', 'Edit Role', 'Delete Role',
        'Manage Staff', 'Create Staff', 'Edit Staff', 'Delete Staff',
        'Manage product', 'Create product', 'Edit product', 'Delete product',
        'Manage category', 'Create category', 'Edit category', 'Delete category',
        'Manage units', 'Create units', 'Edit units', 'Delete units',
        'Manage brand', 'Create brand', 'Edit brand', 'Delete brand',
        'Manage customer', 'Create customer', 'Edit customer', 'Delete customer',
        'Manage supplier', 'Create supplier', 'Edit supplier', 'Delete supplier',
        // Add more here
    ];

    foreach ($permissions as $name) {
        \Spatie\Permission\Models\Permission::create([
            'name' => $name,
            'guard_name' => 'web', // Make sure this matches your guard
        ]);
    }
}

}
