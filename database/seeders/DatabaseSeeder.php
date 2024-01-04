<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\DeliveryTeam;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory()->count(10)->create();
        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@admin.com',
            'address' => 'asdfadfad',
            'contact' => '1234567890',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'nid' => '1234567890',
        ]);
        User::create([
            'firstname' => 'Employee',
            'lastname' => 'Employee',
            'email' => 'employee@employee.com',
            'address' => 'fsfwgadf',
            'contact' => '1234567890',
            'password' => bcrypt('12345678'),
            'role' => 'employee',
            'nid' => '1234567891',
        ]);
        User::create([
            'firstname' => 'Customer',
            'lastname' => 'Customer',
            'email' => 'customer@customer.com',
            'address' => 'kdfjklf',
            'contact' => '1234567890',
            'password' => bcrypt('12345678'),
            'role' => 'customer',
            'nid' => '1234567892',
        ]);
        Admin::create([
            'aid' => '3',
        ]);

        Employee::create([
            'eid' => '4',
        ]);

        Customer::create([
            'cid' => '5',
        ]);

        DeliveryTeam::create([
            'name' => 'Delivery Team 1',
            'contact' => '1234567890',
            'address' => 'asdfasdf',
            'nid' => '1234567890',
        ]);
    }
}
