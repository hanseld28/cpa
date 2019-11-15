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
            'gender'        => 'F'
        ]);

        User::create([
            'email'         => 'leandro.luque@fatec.sp.gov.br', 
            'password'      => env('PASSWORD_HASH') ? bcrypt('luque123') : 'luque123', 
            'avatar'        => 'https://media.licdn.com/dms/image/C4E03AQEGAWFvjXOwMQ/profile-displayphoto-shrink_200_200/0?e=1579132800&v=beta&t=tRppKtudB0Jk0G61rzZkH7mY1NVrvAop6VMgzf47TyA', 
            'person_id'     => 2
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
