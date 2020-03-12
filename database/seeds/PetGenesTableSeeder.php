<?php

use Illuminate\Database\Seeder;

class PetGenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gene = new \App\PetGene;
        $gene->gene = "sulimov";
        $gene->save();

        $gene1 = new \App\PetGene;
        $gene1->gene = "borzoi";
        $gene1->save();

        $gene2 = new \App\PetGene;
        $gene2->gene = "borzoi";
        $gene2->save();
    }
}
