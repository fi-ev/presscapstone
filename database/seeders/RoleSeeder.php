<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role_hr = Role::create(['name' => 'hr']);
        $role_applicant = Role::create(['name' => 'applicant']);
        $role_admin = Role::create(['name' => 'admin']);

        $dashboard = Permission::create(['name' => 'dashboard']);
        $users = Permission::create(['name' => 'users']);
        $requirements = Permission::create(['name' => 'requirements']);
        $applications = Permission::create(['name' => 'applications']);
        $applications_view = Permission::create(['name' => 'view-applications']);
        $applications_manage = Permission::create(['name' => 'manage-applications']);
        $vacancies = Permission::create(['name' => 'vacancies']);
        $vacancies_view = Permission::create(['name' => 'view-vacancies']);
        $vacancies_manage = Permission::create(['name' => 'manage-vacancies']);
        $positions_manage = Permission::create(['name' => 'manage-positions']);
        $types = Permission::create(['name' => 'types']);

        $role_hr->givePermissionTo($dashboard);
        $role_hr->givePermissionTo($applications);
        $role_hr->givePermissionTo($applications_view);
        $role_hr->givePermissionTo($vacancies);
        $role_hr->givePermissionTo($vacancies_manage);
        $role_hr->givePermissionTo($positions_manage);
        $role_hr->givePermissionTo($types);

        $role_applicant->givePermissionTo($dashboard);
        $role_applicant->givePermissionTo($requirements);
        $role_applicant->givePermissionTo($applications);
        $role_applicant->givePermissionTo($applications_manage);
        $role_applicant->givePermissionTo($vacancies);
        $role_applicant->givePermissionTo($vacancies_view);

        $role_admin->givePermissionTo($dashboard);
        $role_admin->givePermissionTo($users);


        $test_admin = User::where('email','admin@press')->first();
        $test_admin->assignRole('admin');      

        $test_hr = User::where('email','hr@press')->first();
        $test_hr->assignRole('hr');

        $test_applicant = User::where('email','press-user1@protonmail.com')->first();
        $test_applicant->assignRole('applicant');

        $test_applicant = User::where('email','press-user2@proton.me')->first();
        $test_applicant->assignRole('applicant');  
    }
}
