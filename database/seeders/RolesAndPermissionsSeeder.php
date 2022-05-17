<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view-permissions','guard_name' => 'web']);
        Permission::create(['name' => 'viewAny-permissions','guard_name' => 'web']);
        Permission::create(['name' => 'create-permissions','guard_name' => 'web']);
        Permission::create(['name' => 'edit-permissions','guard_name' => 'web']);
        Permission::create(['name' => 'delete-permissions','guard_name' => 'web']);

        Permission::create(['name' => 'view-roles',       'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny-roles',    'guard_name'=> 'web']);
        Permission::create(['name' => 'create-roles',     'guard_name'=> 'web']);
        Permission::create(['name' => 'edit-roles',       'guard_name'=> 'web']);
        Permission::create(['name' => 'delete-roles',     'guard_name'=> 'web']);

        Permission::create(['name' => 'view students',      'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny students',   'guard_name'=> 'web']);
        Permission::create(['name' => 'create students',    'guard_name'=> 'web']);
        Permission::create(['name' => 'edit students',      'guard_name'=> 'web']);
        Permission::create(['name' => 'delete students',    'guard_name'=> 'web']);

        Permission::create(['name' => 'view departments',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny departments',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create departments',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit departments',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete departments',   'guard_name'=> 'web']);

        Permission::create(['name' => 'view users',       'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny users',    'guard_name'=> 'web']);
        Permission::create(['name' => 'create users',     'guard_name'=> 'web']);
        Permission::create(['name' => 'edit users',       'guard_name'=> 'web']);
        Permission::create(['name' => 'delete users',     'guard_name'=> 'web']);

        Permission::create(['name' => 'view faculties',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny faculties',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create faculties',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit faculties',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete faculties',   'guard_name'=> 'web']);

        Permission::create(['name' => 'view academic_years',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny academic_years',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create academic_years',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit academic_years',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete academic_years',   'guard_name'=> 'web']);

        Permission::create(['name' => 'view batches',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny batches',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create batches',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit batches',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete batches',   'guard_name'=> 'web']);

        Permission::create(['name' => 'view semesters',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny semesters',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create semesters',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit semesters',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete semesters',   'guard_name'=> 'web']);

        Permission::create(['name' => 'view designations',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny designations',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create designations',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit designations',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete designations',   'guard_name'=> 'web']);

        Permission::create(['name' => 'view mentors',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny mentors',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create mentors',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit mentors',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete mentors',   'guard_name'=> 'web']);

        Permission::create(['name' => 'viewAny feedback',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create feedback',   'guard_name'=> 'web']);

        Permission::create(['name' => 'view skills',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny skills',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create skills',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit skills',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete skills',   'guard_name'=> 'web']);

        Permission::create(['name' => 'view skill_courses',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny skill_courses',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create skill_courses',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit skill_courses',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete skill_courses',   'guard_name'=> 'web']);

        Permission::create(['name' => 'view skill_faculties',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny skill_faculties',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create skill_faculties',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit skill_faculties',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete skill_faculties',   'guard_name'=> 'web']);

        Permission::create(['name' => 'view skill_students',     'guard_name'=> 'web']);
        Permission::create(['name' => 'viewAny skill_students',  'guard_name'=> 'web']);
        Permission::create(['name' => 'create skill_students',   'guard_name'=> 'web']);
        Permission::create(['name' => 'edit skill_students',     'guard_name'=> 'web']);
        Permission::create(['name' => 'delete skill_students',   'guard_name'=> 'web']);

        Permission::create(['name' => 'viewAny skill_feedback',     'guard_name'=> 'web']);
        Permission::create(['name' => 'create skill_feedback',  'guard_name'=> 'web']);
        Permission::create(['name' => 'register skill_feedback',  'guard_name'=> 'web']);

        Permission::create(['name' => 'viewAny user_activity_logs','guard_name' => 'web']);
        Permission::create(['name' => 'viewAny activity_logs','guard_name' => 'web']);


        // create User role with default permissions
        // $user = Role::create(['name' => 'User']);

        // $user->givePermissionTo(['create feedback-']);

        // $this->command->info('Permissions granted User');

        // create Admin role with default permissions
        $role = Role::create(['name' => 'Admin']);

        $role->givePermissionTo(['view-roles',
                                 'viewAny-roles',
                                 'create-roles',
                                 'edit-roles',
                                 'delete-roles',
                                 'view-permissions',
                                 'viewAny-permissions',
                                 'create-permissions',
                                 'edit-permissions',
                                 'delete-permissions',
                                 'view students',
                                 'viewAny students',
                                 'create students',
                                 'edit students',
                                 'delete students',
                                 'view departments',
                                 'viewAny departments',
                                 'create departments',
                                 'edit departments',
                                 'delete departments',
                                 'view users',
                                 'viewAny users',
                                 'create users',
                                 'edit users',
                                 'delete users',
                                 'viewAny user_activity_logs',
                                 'viewAny activity_logs',
                                 'view academic_years',
                                 'viewAny academic_years',
                                 'create academic_years',
                                 'edit academic_years',
                                 'delete academic_years',
                                 'view batches',
                                 'viewAny batches',
                                 'create batches',
                                 'edit batches',
                                 'delete batches',
                                 'view semesters',
                                 'viewAny semesters',
                                 'create semesters',
                                 'edit semesters',
                                 'delete semesters',
                                 'view faculties',
                                 'viewAny faculties',
                                 'create faculties',
                                 'edit faculties',
                                 'delete faculties',
                                 'view designations',
                                 'viewAny designations',
                                 'create designations',
                                 'edit designations',
                                 'delete designations',
                                 'view mentors',
                                 'viewAny mentors',
                                 'create mentors',
                                 'edit mentors',
                                 'delete mentors',
                                 'viewAny feedback',
                                 'create feedback',
                                 'view skills',
                                 'viewAny skills',
                                 'create skills',
                                 'edit skills',
                                 'delete skills',
                                 'view skill_courses',
                                 'viewAny skill_courses',
                                 'create skill_courses',
                                 'edit skill_courses',
                                 'delete skill_courses',
                                 'view skill_faculties',
                                 'viewAny skill_faculties',
                                 'create skill_faculties',
                                 'edit skill_faculties',
                                 'delete skill_faculties',
                                 'view skill_students',
                                 'viewAny skill_students',
                                 'create skill_students',
                                 'edit skill_students',
                                 'delete skill_students',
                                 'viewAny skill_feedback',
                                 'create skill_feedback',
                                 'register skill_feedback']);

        $this->command->info('Permissions granted Admin');

        $user = User::create([
            'name'      => env('SUPER_ADMIN_NAME'),
            'email'     => env('SUPER_ADMIN_EMAIL'),
            'password'  => Hash::make(env('SUPER_ADMIN_PASSWORD'))
        ]);

        // Grant Super Admin rights to SUPER_ADMIN_EMAIL
        $adminEmail = env('SUPER_ADMIN_EMAIL', null);
        if (is_null($adminEmail)) {
            throw new \InvalidArgumentException('SUPER_ADMIN_EMAIL cannot be empty!');
        }

        $user = User::whereEmail($adminEmail)->first();
        if (is_null($user)) {
            throw new \InvalidArgumentException('User cannot be empty!');
        }

        $role = Role::create(['name' => 'Super Admin']);
        $user->assignRole('Super Admin');
        $this->command->info('Super Admin Role created successfully.');
    }
}



