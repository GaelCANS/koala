<?php

use Illuminate\Database\Seeder;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $campagnes = array(
            'La semaine de la conquête',
            'EKO',
            'Prévoyance assurance vie',
            'Campagne épargne',
            'Les directs',
            'Le studio by CA',
            'Le local by CA',
            'Campagne épargne',
            'Wizbii',
            'Good Start',
            'Les cafés de l emploi',
            'E-immo',
            'Les assemblées générales',
            'Cash in time',
            'Crédit Express pro',
            'Conquête parrainage',
            'Tarification',
            'Les voeux',
            'Eagence',
            'Bonus diversification',
            'Campagne Transfert Fourgous',
            'Compte de noël',
            'Wifi en agence',
            'Fermeture du bureau de ND de bondeville',
            'EER Pro',
            'Conso Noël Amortissable',
            'Conso Noël Renouvelable',
            'Access Banking',
            'Campagne de recrutement',
            'Notre modèle mutualiste',
            'Black Friday',
            'Assurances climatiques',
            'Campagne Nationale Pac Auto'
        );
        $comment = "Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.";

        for ($i = 1;$i<=12;$i++) {

            $rand = rand(0,10);
            for ($j = 0;$j<=$rand; $j++) {

                $user = \App\User::all()->random(1);
                $name = $campagnes[ rand(0, count($campagnes)-1) ];
                $status = rand(0,1);
                $saved = 1;
                $month = str_pad($i, 2, "0", STR_PAD_LEFT);
                $begin = '2018/'.$month."/01";
                $end = '2018/'.$month."/".rand(20,30);

                DB::table('campaigns')->insert([
                    'name' => $name,
                    'user_id' => $user->id,
                    'description' => $comment,
                    'begin' => $begin,
                    'end' => $end,
                    'status' => $status,
                    'saved' => $saved
                ]);
            }

        }


        for ($i=0; $i<50; $i++) {

            $debut = rand(1,9);
            $fin = rand($debut+1,12);

            $user = \App\User::all()->random(1);
            $name = $campagnes[ rand(0, count($campagnes)-1) ];
            $status = rand(0,1);
            $saved = 1;
            $monthD = str_pad($debut, 2, "0", STR_PAD_LEFT);
            $monthE = str_pad($fin, 2, "0", STR_PAD_LEFT);
            $begin = '2018/'.$monthD."/01";
            $end = '2018/'.$monthE."/".rand(20,30);

            DB::table('campaigns')->insert([
                'name' => $name,
                'user_id' => $user->id,
                'description' => $comment,
                'begin' => $begin,
                'end' => $end,
                'status' => $status,
                'saved' => $saved
            ]);

        }

    }
}
