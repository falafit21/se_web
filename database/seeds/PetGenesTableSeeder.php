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
        //dog
        $gene = new \App\PetGene;
        $gene->gene = "chihuhau";
        $gene->pet_type_id = 1;
        $gene->save();

        $gene1 = new \App\PetGene;
        $gene1->gene = "Boxer";
        $gene1->pet_type_id = 1;
        $gene1->save();

        $gene2 = new \App\PetGene;
        $gene2->gene = "Pug";
        $gene2->pet_type_id = 1;
        $gene2->save();

        $gene222 = new \App\PetGene;
        $gene222->gene = "English Bulldog";
        $gene222->pet_type_id = 1;
        $gene222->save();

        $gene3 = new \App\PetGene;
        $gene3->gene = "Pomeranain";
        $gene3->pet_type_id = 1;
        $gene3->save();

        $gene4 = new \App\PetGene;
        $gene4->gene = "Cocker Spaneil";
        $gene4->pet_type_id = 1;
        $gene4->save();

        $gene5 = new \App\PetGene;
        $gene5->gene = "shih Tzu";
        $gene5->pet_type_id = 1;
        $gene5->save();

        $gene6 = new \App\PetGene;
        $gene6->gene = "German Shepherd";
        $gene6->pet_type_id = 1;
        $gene6->save();

        $gene7 = new \App\PetGene;
        $gene7->gene = "Standard Poodle";
        $gene7->pet_type_id = 1;
        $gene7->save();

        $gene8 = new \App\PetGene;
        $gene8->gene = "Rottweiler";
        $gene8->pet_type_id = 1;
        $gene8->save();

        $gene9 = new \App\PetGene;
        $gene9->gene = "Dachshund";
        $gene9->pet_type_id = 1;
        $gene9->save();

        $gene10 = new \App\PetGene;
        $gene10->gene = "Yorkshire Terrier";
        $gene10->pet_type_id = 1;
        $gene10->save();

        $gene11 = new \App\PetGene;
        $gene11->gene = "Beagle";
        $gene11->pet_type_id = 1;
        $gene11->save();

        $gene12 = new \App\PetGene;
        $gene12->gene = "Golden Retriever";
        $gene12->pet_type_id = 1;
        $gene12->save();

        //cat
        $gene14 = new \App\PetGene;
        $gene14->gene = "Bengal";
        $gene14->pet_type_id = 2;
        $gene14->save();

        $gene15 = new \App\PetGene;
        $gene15->gene = "Bombay";
        $gene15->pet_type_id = 2;
        $gene15->save();

        $gene16 = new \App\PetGene;
        $gene16->gene = "British shorthair";
        $gene16->pet_type_id = 2;
        $gene16->save();

        $gene17 = new \App\PetGene;
        $gene17->gene = "chartreux";
        $gene17->pet_type_id = 2;
        $gene17->save();

        $gene18 = new \App\PetGene;
        $gene18->gene = "Exotic shorthair";
        $gene18->pet_type_id = 2;
        $gene18->save();

        $gene19 = new \App\PetGene;
        $gene19->gene = "Japanese bobtail";
        $gene19->pet_type_id = 2;
        $gene19->save();

        $gene20 = new \App\PetGene;
        $gene20->gene = "Maine coon";
        $gene20->pet_type_id = 2;
        $gene20->save();

        $gene21 = new \App\PetGene;
        $gene21->gene = "Norwegian forest cat";
        $gene21->pet_type_id = 2;
        $gene21->save();

        $gene22 = new \App\PetGene;
        $gene22->gene = "Scottish fold";
        $gene22->pet_type_id = 2;
        $gene22->save();

        $gene23 = new \App\PetGene;
        $gene23->gene = "siberian";
        $gene23->pet_type_id = 2;
        $gene23->save();

        //rabbit
        $gene24 = new \App\PetGene;
        $gene24->gene = "Eastern cottontail";
        $gene24->pet_type_id = 3;
        $gene24->save();

        $gene25 = new \App\PetGene;
        $gene25->gene = "Desert cottontail";
        $gene25->pet_type_id = 3;
        $gene25->save();

        $gene26 = new \App\PetGene;
        $gene26->gene = "Omilteme cottontail";
        $gene26->pet_type_id = 3;
        $gene26->save();

        $gene27 = new \App\PetGene;
        $gene27->gene = "Mexican cottontail";
        $gene27->pet_type_id = 3;
        $gene27->save();

        $gene28 = new \App\PetGene;
        $gene28->gene = "Brush rabbit";
        $gene28->pet_type_id = 3;
        $gene28->save();

        $gene29 = new \App\PetGene;
        $gene29->gene = "Robust cottontail";
        $gene29->pet_type_id = 3;
        $gene29->save();

        $gene30 = new \App\PetGene;
        $gene30->gene = "Tapeti";
        $gene30->pet_type_id = 3;
        $gene30->save();

        $gene31 = new \App\PetGene;
        $gene31->gene = "New England cottontail";
        $gene31->pet_type_id = 3;
        $gene31->save();

        $gene32 = new \App\PetGene;
        $gene32->gene = "Dice's cottontail";
        $gene32->pet_type_id = 3;
        $gene32->save();

        $gene33 = new \App\PetGene;
        $gene33->gene = "Swamp rabbit";
        $gene33->pet_type_id = 3;
        $gene33->save();

        $gene34 = new \App\PetGene;
        $gene34->gene = "San Jose brush rabbit";
        $gene34->pet_type_id = 3;
        $gene34->save();

        $gene35 = new \App\PetGene;
        $gene35->gene = "Tres Marias rabbit";
        $gene35->pet_type_id = 3;
        $gene35->save();
    }
}
