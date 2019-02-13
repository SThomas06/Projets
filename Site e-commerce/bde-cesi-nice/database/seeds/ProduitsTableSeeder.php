<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProduitsTableSeeder extends Seeder {

	private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

    public function run()
	{
		DB::table('produits')->delete();

		for($i = 0; $i < 10; ++$i)
		{
			$date = $this->randDate();
			DB::table('produits')->insert([
				'nom_produit' => 'Nom_produit:' . $i,
				'description_produit' => 'Description_produit:' . $i,
				'date_produit' => $date,
				'quantite_produit' => $i,
				'prix_produit' => $i + 9.99,
				'categories_id' => $i,
				'compteur_produit' => $i + 5
			]);
		}
	}
}