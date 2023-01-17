<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\User;
use App\Models\Lead;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $defaultPermission = ['lead-managment', 'create-admin', 'user-managment'];
        foreach( $defaultPermission as $permission) {
            Permission::create([ 'name' => $permission ]);
        }


        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.com' );
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.com' );
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.com' );
        $this->create_user_with_role('Leads', 'Leads', 'lead@lms.com' );


        // Create Leads
        Lead::factory()->count(100)->create();

        $course = Course::create([
            'name' => 'Laravel',
            'description' => 'Laravel is a web application framwork with expressive, elegent syntax. we',
            'image' => 'https://cdn.pixabay.com/photo/2015/03/30/14/07/coding-699318__340.jpg',
            'user_id' => $teacher->id,
            'price' => 500,

        ]);


        Curriculum::factory()->count(10)->create();


    }


    private function create_user_with_role($type, $name, $email) {
        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password')

        ]);

        if($type == 'Super Admin'){
            $role->givePermissionTo(Permission::all());
        } elseif($type == 'Leads'){
            $role->givePermissionTo('lead-managment');
        }


        $user->assignRole($role);

        return $user;

    }
}
