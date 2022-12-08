<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =[
            [
                'name' =>'ROLE_USER',
                'user_id'=>'1'
            ],
            [
                'name' =>'ROLE_MODERATOR' ,
                'user_id'=>'1'
            ],
            [
                'name' =>'ROLE_ADMIN',
                'user_id'=>'1' 
            ],
            [
                'name' =>'ROLE_MODERATOR',
                'user_id'=>'2' 
            ],
    
    ];
                foreach ( $roles as $key =>  $role) {
                    Role::create( $role);
                }
    }
}
