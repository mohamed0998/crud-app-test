<?php


namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\userAddress;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses =[
            [
                'country'=>'Italy',
                'state' =>'Province of Pavia',
                'addressline'=>'Via Santa Maria 31/7',
                'zipCode' =>'27029',
                'user_id'=>'1' 
                
    
            ],
            [
                'country'=>'Italy',
                'user_id'=>'2' 
    
            ],
    
    ];
                foreach ( $addresses as $key =>  $address) {
                    userAddress::create( $address);
                }
    }
}
