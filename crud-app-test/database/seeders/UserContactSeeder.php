<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\userContact;

class UserContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts =[
            [
                'phonePrefix'=>'+39',
                'phoneNumber' =>'3296187465',
                'landlinePrefix'=>'+33',
                'landlineNumber' =>'0745441813',
                'user_id'=>'1' 
                
    
            ],
            [
                'phonePrefix'=>'+39',
                'phoneNumber' =>'3296187465',
                'user_id'=>'2' 
    
            ],
    
    ];
                foreach ( $contacts as $key =>  $contact) {
                    userContact::create( $contact);
                }
    }
}
