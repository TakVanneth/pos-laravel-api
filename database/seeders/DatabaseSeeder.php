<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\EmployeeDetail;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        Role::create([
            'position' => 'admin',
        ]);

        Role::create([
            'position' => 'user',
        ]);

        // Create an Admin User
        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1, // Assuming 'admin' role ID is 1
        ]);

        // Create Categories
        Category::create([
            'name' => 'Electronics',
            'description' => 'Devices and gadgets',
        ]);

        Category::create([
            'name' => 'Groceries',
            'description' => 'Daily household items',
        ]);

        Category::create([
            'name' => 'Clothing',
            'description' => 'Apparel and accessories',
        ]);

        // Create Employee Details for the Admin User
        EmployeeDetail::create([
            'user_id' => $adminUser->id,
            'phone' => '0123456789',
            'address' => '123 Street, City, Country',
            'city' => 'Phnom Penh',
            'state' => 'Phnom Penh',
            'hire_date' => Carbon::now()->subYears(rand(1, 5))->format('Y-m-d'),
        ]);
    }
}
