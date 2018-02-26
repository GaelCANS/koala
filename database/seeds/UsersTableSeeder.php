<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = array(
            array(
                'name' => "De moura",
                'firstname' => "Lysiane",
                'email' => "lysiane.demoura@ca-normandie-seine.fr",
                'services_id' => 1
            ),
            array(
                'name' => "Calais",
                'firstname' => "Elise",
                'email' => "elise.calais@ca-normandie-seine.fr",
                'services_id' => 1
            ),
            array(
                'name' => "Garcia",
                'firstname' => "Annabelle",
                'email' => "annabelle.garcia@ca-normandie-seine.fr",
                'services_id' => 1
            ),
            array(
                'name' => "Gisselbrecht",
                'firstname' => "Maud",
                'email' => "maud.gisselbrect@ca-normandie-seine.fr",
                'services_id' => 1
            ),
            array(
                'name' => "Pariguet",
                'firstname' => "Claire",
                'email' => "claire.pariguet@ca-normandie-seine.fr",
                'services_id' => 1
            ),
            array(
                'name' => "Lacaille",
                'firstname' => "Nicolas",
                'email' => "nicolas.lacaille@ca-normandie-seine.fr",
                'services_id' => 1
            ),
            array(
                'name' => "De Nazelle",
                'firstname' => "Philippine",
                'email' => "philippine.denazelle@ca-normandie-seine.fr",
                'services_id' => 1
            ),
            array(
                'name' => "Gaultier",
                'firstname' => "Françoise",
                'email' => "francoise.gaultier@ca-normandie-seine.fr",
                'services_id' => 1
            ),
            array(
                'name' => "Lechalupé",
                'firstname' => "Julie",
                'email' => "julie.lechalupe@ca-normandie-seine.fr",
                'services_id' => 1
            ),
            array(
                'name' => "Quenneville",
                'firstname' => "Mathieu",
                'email' => "mathieu.quennelleville@ca-normandie-seine.fr",
                'services_id' => 1
            ),
        );

        foreach ($users as $user) {
            $service = \App\Service::all()->random(1);
            $user['services_id'] = $service->id;
            \Illuminate\Support\Facades\DB::table('users')->insert($user);
        }
    }
}
