<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
    	User::create([
    		'name' => 'Juan Ramos',
	        'email' => 'hola@programacionymas.com',
	        'password' => bcrypt('123123'),
	        'role' => 'admin'
    	]);

        // 2
        User::create([
            'name' => 'Paciente Test',
            'email' => 'patient@programacionymas.com',
            'password' => bcrypt('123123'),
            'role' => 'patient'
        ]);

        // 3
        User::create([
            'name' => 'Médico Test',
            'email' => 'doctor@programacionymas.com',
            'password' => bcrypt('123123'),
            'role' => 'doctor'
        ]);

        factory(User::class, 50)->states('patient')->create();
    }
}
