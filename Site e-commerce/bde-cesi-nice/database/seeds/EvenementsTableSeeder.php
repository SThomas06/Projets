<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EvenementsTableSeeder extends Seeder {

	private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

    public function run()
	{
		DB::table('evenements')->delete();

		$y = 0;

		for($i = 0; $i < 10; ++$i)
		{
			$date = $this->randDate();
			DB::table('evenements')->insert([
				'nom_evenement' => 'Nom_evenement:' . $i,
				'auteur_evenement' => 'Auteur_evenement:' . $i,
				'date_debut_evenement' => $date,
				'date_fin_evenement' => $date,
				'lieu_evenement' => 'LIEU:' . $i,
				'duree_evenement' => (24 * 3600),
				'prix_evenement' => 9.99 + $i,
				'payant_evenement' => 1,
				'description_evenement' => 'Description_evenement:' . $i,
				'description_image_evenement' => 'Image_description_evenement:' . $i,
				'recurrence_evenement' => 1,
				'idee_evenement' => $y,
				'user_id' => $i
			]);
			if($y == 0) $y = 1;
			else $y = 0;
		}
	}
}