<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

    public function run()
	{
		DB::table('categories')->delete();

		for($i = 0; $i < 10; ++$i)
		{
			DB::table('categories')->insert([
				'nom_categorie' => 'Nom_categorie:' . $i
			]);
		}
	}
}