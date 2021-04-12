<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\produit;
use App\Models\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { //creation d'un admin et d'un membre
        User::create([
            'prenom' => 'Jeremy',
            'nom' => 'Masse',
            'email' => 'jeremy.masse@ynov.com',
            'pays' => 'France',
            'ville' => 'fosses',
            'code_postal' => "95470",
            'adresse' => "18dzf",
            'password' => bcrypt("test1234"),
            "dtn" => Carbon::create('2000', '30', '05'),
            'admin' => true
        ]);

        User::create([
            'prenom' => 'Guillaume',
            'nom' => 'Dupuy',
            'email' => 'guillaume.dupuy@ynov.com',
            'ville' => 'Neuilly plaisance',
            'code_postal' => 93360,
            'adresse' => "1847dzgfg",
            'pays' => 'France',
            "dtn" => Carbon::create('2001', '20', '07'),
            'password' => bcrypt("test1234"),
            'admin' => false
        ]);
            //remplissage bdd avec 9 jeux
        produit::create([
            'nom' => 'Call of Duty: Modern Warfare 3',
            'prix' => 10,
            'description' => "Modern Warfare est de retour. La série de jeux d'action à la première personne la plus populaire de tous les temps revient avec la suite épique de Call of Duty®: Modern Warfare 2, récompensé de plusieurs titres de Jeu de l'Année.",
            'plateforme' => 'PlayStation 3',
            'code_activ' => 123456,
            'date_sortie' => Carbon::create('2011', '11', '08'),
            'quantite' => 20,
            'categorie' => "FPS",
            'note' => 3,
            'photo' => "produit_mw3.jfif"
            ]);

        produit::create([
            'nom' => 'Call of Duty: Modern Warfare 3',
            'prix' => 15,
            'description' => "Modern Warfare est de retour. La série de jeux d'action à la première personne la plus populaire de tous les temps revient avec la suite épique de Call of Duty®: Modern Warfare 2, récompensé de plusieurs titres de Jeu de l'Année.",
            'plateforme' => 'Xbox 360',
            'code_activ' => 234561,
            'date_sortie' => Carbon::create('2011', '11', '08'),
            'quantite' => 5,
            'categorie' => "FPS",
            'note' => 3,
            'photo' => "produit_mw3.jfif"
            ]);
        
        produit::create([
            'nom' => 'Hitman 3',
            'prix' => 60,
            'description' => "La mort attend. L'agent 47 revient dans HITMAN 3, marquant la conclusion dramatique de la trilogie du monde de l'assassinat.",
            'plateforme' => 'PC',
            'code_activ' => 345612,
            'date_sortie' => Carbon::create('2021', '01', '20'),
            'quantite' => 100,
            'categorie' => "Action",
            'note' => 4,
            'photo' => "produit_hitman3.jfif"
            ]);

        produit::create([
            'nom' => 'Mario Kart 8',
            'prix' => 44.99,
            'description' => "Que vous fassiez la course en famille, sur grand écran, dans votre salon, au parc ou en visite chez un ami, la Nintendo Switch vous permet de jouer à Mario Kart comme bon vous semble !",
            'plateforme' => 'Switch',
            'code_activ' => 456123,
            'date_sortie' => Carbon::create('2017', '04', '28'),
            'quantite' => 30,
            'categorie' => "famille",
            'note' => 5,
            'photo' => "produit_mario_kart8.jfif"
            ]);
        produit::create([
            'nom' => "Assassin's creed Valhalla",
            'prix' => 59.49,
            'description' => "Incarnez Eivor, Viking dont l'éducation a reposé sur le combat, et menez votre clan des terres désolées de Norvège à celles verdoyantes de l’Angleterre.Partez à la conquête de territoires hostiles afin de gagner votre place au Valhalla.",
            'plateforme' => 'PlayStation 5',
            'code_activ' => 561234,
            'date_sortie' => Carbon::create('2020', '11', '10'),
            'quantite' => 75,
            'categorie' => "Combat",
            'note' => 5,
            'photo' => "produit_assassinscreed.jfif"
            ]);
        produit::create([
            'nom' => 'Super Smash Bros. Ultimate',
            'prix' => 35.99,
            'description' => "Des mondes de jeux et des combattants légendaires se retrouvent pour l’affrontement ultime dans le nouvel opus de la série Super Smash Bros. sur Nintendo Switch !",
            'plateforme' => 'Switch',
            'code_activ' => 612345,
            'date_sortie' => Carbon::create('2018', '12', '07'),
            'quantite' => 15,
            'categorie' => "Combat",
            'note' => 3,
            'photo' => "produit_ssbu.jfif"
            ]);
        produit::create([
            'nom' => 'Cyberpunk 2077',
            'prix' => 80,
            'description' => "Cyberpunk 2077 est un jeu d’action-aventure en monde ouvert qui se déroule à Night City, une mégalopole obsédée par le pouvoir, la séduction et les modifications corporelles.",
            'plateforme' => 'PC',
            'code_activ' => 654321,
            'date_sortie' => Carbon::create('2020', '12', '10'),
            'quantite' => 27,
            'categorie' => "Action",
            'note' => 4,
            'photo' => "produit_cyberpunk.jfif"
            ]);
        produit::create([
            'nom' => 'Watch Dogs: Legion',
            'prix' => 45,
            'description' => "Projetez-vous dans un futur proche où Londres court à sa perte : la population est opprimée par un état de surveillance total, des milices privées prennent le contrôle des rues et les plus faibles deviennent la proie du crime organisé.",
            'plateforme' => 'PC',
            'code_activ' => 543216,
            'date_sortie' => Carbon::create('2020', '10', '29'),
            'quantite' => 7,
            'categorie' => "Action",
            'note' => 2,
            'photo' => "produit_watchdogs.jfif"
            ]);

        produit::create([
            'nom' => 'Cyberpunk 2077',
            'prix' => 80,
            'description' => "Cyberpunk 2077 est un jeu d’action-aventure en monde ouvert qui se déroule à Night City, une mégalopole obsédée par le pouvoir, la séduction et les modifications corporelles.",
            'plateforme' => 'PlayStation 5',
            'code_activ' => 654321,
            'date_sortie' => Carbon::create('2020', '12', '10'),
            'quantite' => 14,
            'categorie' => "Action",
            'note' => 4,
            'photo' => "produit_cyberpunk.jfif"
            ]);
    }
}
