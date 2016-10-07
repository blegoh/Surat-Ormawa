<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        // Basic roles data
        App\Role::insert([
            ['name' => 'admin'],
            ['name' => 'user'],
        ]);

        // Basic permissions data
        App\Permission::insert([
            ['name' => 'access.admin'],
            ['name' => 'access.user'],
        ]);

        // Add a permission to a role
        $role = App\Role::where('name', 'admin')->first();
        $role->addPermission('access.admin');

        $role = App\Role::where('name', 'user')->first();
        $role->addPermission('access.user');

        // ... Add other role permission if necessary

        // Create a user, and give roles
        $admin = App\User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);

        $user = App\User::create([
            'email' => 'bempssi@example.com',
            'password' => bcrypt('bempssi'),
        ]);

        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}
