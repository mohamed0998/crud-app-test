<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
            [
                'userId'=>'AO98696',
                'username' =>'randrino17',
                'fullname'=>'Randrin Nzeukang',
                'gender' =>'Male',
                'email'=>'nzeukangrandrin@gmail.com' ,
                'emailPec'=>'nzeukangrandrin@gmail.com',
                'dateOfBirth'=>'1962-10-10',
                'lastLogin' => '2022-11-11 22:58:34',
                
    
            ],
            [
                'userId'=>'YL74860',
                'username' =>'jojo2020',
                'fullname'=>'Nimpa Joana',
                'gender' =>'Male',
                'email'=>'randrin.nzeukang@enexse.com' ,
                'emailPec'=>'randrin.nzeukang@enexse.com',
                'dateOfBirth'=>'1962-10-10',
                'lastLogin' => '2022-11-11 22:58:34' 
            ],
    
    ];
                foreach ( $users as $key =>  $user) {
                    User::create( $user);
                }
    }
}
