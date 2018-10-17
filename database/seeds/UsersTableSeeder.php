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
    	User::create([
    		'name' => 'Juan Ramos',
	        'email' => 'hola@programacionymas.com',
	        'password' => bcrypt('123123'),
	        'dni' => '76474871',
	        'address' => '',
	        'phone' => '',
	        'role' => 'admin'
    	]);
        factory(User::class, 50)->create();
    }
}
