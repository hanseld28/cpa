<?php

use Illuminate\Database\Seeder;
use App\Entities\User;
use App\Entities\Person;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Person::create([
            'name'          => 'Leandro Luque', 
            'registry'      => '33923132932', 
            'rg'            => '513922949', 
            'cpf'           => '47920343241', 
            'birth'         => '1984-10-11', 
            'gender'        => 'M'
        ]);
    
        Person::create([
            'name'          => 'Bruno Panccioni', 
            'registry'      => '283824532932', 
            'rg'            => '513223821', 
            'cpf'           => '44248343321', 
            'birth'         => '1980-10-11', 
            'gender'        => 'M'
        ]);
        
        User::create([
            'email'         => 'leandro.luque@fatec.sp.gov.br', 
            'password'      => env('PASSWORD_HASH') ? bcrypt('luque123') : 'luque123', 
            'avatar'        => 'https://media.licdn.com/dms/image/C4E03AQEGAWFvjXOwMQ/profile-displayphoto-shrink_200_200/0?e=1579132800&v=beta&t=tRppKtudB0Jk0G61rzZkH7mY1NVrvAop6VMgzf47TyA', 
            'person_id'     => 1
        ]);
    
        User::create([
            'email'         => 'bruno.panccioni@fatec.sp.gov.br', 
            'password'      => env('PASSWORD_HASH') ? bcrypt('bruno123') : 'bruno123', 
            'avatar'        => 'https://media.licdn.com/dms/image/C4D03AQHRhUEX6aMdHA/profile-displayphoto-shrink_200_200/0?e=1580342400&v=beta&t=kTbXsw6_sAyM-bR1bdWY7l3OB9uuU_R_mf_u-bXWW-4', 
            'person_id'     => 2
        ]);
        
        // $this->call(UsersTableSeeder::class);
    }
}
