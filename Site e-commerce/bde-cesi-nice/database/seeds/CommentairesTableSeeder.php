<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentairesTableSeeder extends Seeder {

	private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

    public function run()
	{
		DB::table('commentaires')->delete();

		for($i = 0; $i < 10; ++$i)
		{
			$date = $this->randDate();
			DB::table('commentaires')->insert([
				'description_commentaire' => 'Description_commentaire:' . $i,
				'date_commentaire' => $date,
				'auteur_commentaire' => 'Auteur_commentaire:' . $i,
				'photos_id' => $i
			]);
		}
	}
}