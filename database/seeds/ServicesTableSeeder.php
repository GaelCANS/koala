<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = array(
            array(
                'name' => 'Canaux Digitaux',
                'delete' => 0,
                'disabled' => 0
            ),
            array(
                'name' => 'CRM',
                'delete' => 0,
                'disabled' => 0
            ),
            array(
                'name' => 'Marketing',
                'delete' => 0,
                'disabled' => 0
            ),
            array(
                'name' => 'Communication',
                'delete' => 0,
                'disabled' => 0
            ),
            array(
                'name' => 'Ressources humaines',
                'delete' => 0,
                'disabled' => 0
            )
        );

        foreach ($services as $service) {
            \Illuminate\Support\Facades\DB::table('services')->insert($service);
        }
    }
}
