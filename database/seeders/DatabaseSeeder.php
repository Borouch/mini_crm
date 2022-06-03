<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Database\Factories\CompanyFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(15)->create();
        Employee::factory(55)->create();
        Role::create(['name' => 'admin']);
        $admin = User::create(
            [
                'email' => config('app.admin_email_address'),
                'email_verified_at' => now(),
                'password' => bcrypt(config('app.admin_password'))
            ]
        );
        $admin->setRole('admin');
        User::create(
            ['email' => 'demo@demo.com', 'email_verified_at' => now(), 'password' => bcrypt('demo')]);
    }
}
