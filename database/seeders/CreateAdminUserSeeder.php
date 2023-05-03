<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'nouhe',
            'prenom' => 'derwiche',
            'email' => 'nouhederwiche@gmail.com',
            'phone' => '20648417',
            'address' => 'nabeul',
            'cin' => '14405559',
            'num_emp' => '12',
            'ville' => 'MBZ',
            'solde' =>'2,5',
            'codepostal' => '8010',
            'date_naiss' => '12/02/2000',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
