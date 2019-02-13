<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder {

    public function run()
	{
		DB::table('photos')->delete();

		for($i = 0; $i < 10; ++$i)
		{
			DB::table('photos')->insert([
				'nom_photo' => 'Nom_photo:' . $i,
				'url_photo' => 'Url_photo:' . $i,
				'evenements_id' => $i
			]);
		}
	}
}