<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create Roles
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $cashier = Role::create(['name' => 'Cashier']);

        // Create Permissions
        $permissions = [
            'product.create',
            'product.view',
            'sale.create',
            'report.view',
            'user.manage'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Admin gets all permissions
        $admin->givePermissionTo(Permission::all());

        // Manager permissions
        $manager->givePermissionTo([
            'product.view',
            'sale.create',
            'report.view'
        ]);

        // Cashier permissions
        $cashier->givePermissionTo([
            'sale.create'
        ]);
    }
}
