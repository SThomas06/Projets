<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
	{
		DB::table('users')->delete();

		for($i = 0; $i < 10; ++$i)
		{
			DB::table('users')->insert([
				'name' => 'Nom_utilisateur:' . $i,
				'firstname' => '¨Prenom_utilisateur:' . $i,
				'email' => 'email' . $i . '@gmail.com',
				'password' => $i . $i+1 . $i+2 . $i+3 . $i+4 . $i+5 . $i+6 . $i+7 
			]);
		}
	}
}