<?php

use Illuminate\Database\Seeder;

class Vote_Evenement_UserTableSeeder extends Seeder {

    public function run()
    {
		for($i = 1; $i <= 20; ++$i)
		{
			$numbers = range(1, 10);
			shuffle($numbers);
			$n = rand(3, 6);
			for($j = 1; $j < $n; ++$j)
			{
				DB::table('vote_evenement_user')->insert(array(
					'evenements_id' => $i,
					'user_id' => $numbers[$j]
				));
			}
		}
	}
}