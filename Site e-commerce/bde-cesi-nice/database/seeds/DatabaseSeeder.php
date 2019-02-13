<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(UsersTableSeeder::class);
    	$this->call(EvenementsTableSeeder::class);
    	$this->call(CategoriesTableSeeder::class);
      $this->call(ProduitsTableSeeder::class);
    	$this->call(CommentairesTableSeeder::class);
    	$this->call(PhotosTableSeeder::class);
      $this->call(Vote_Evenement_UserTableSeeder::class);
      $this->call(Participation_Evenement_UserTableSeeder::class);
      $this->call(Achete_Produit_UserTableSeeder::class);
      $this->call(Like_Photo_UserTableSeeder::class);
    }
}
