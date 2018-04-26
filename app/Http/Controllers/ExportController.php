<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;

class ExportController extends Controller
{

    public function __construct( ){

        $this -> middleware('auth');
    }

    public function excelListeCampaigns()
    {
        // Récupération des critères de filtre stockés en cookie
        $request = (object)Cookie::get('filter');

        // Chargement des campagnes
        $campaigns = Campaign::notdeleted()->savedOnly()->filter($request)->orderBy('campaigns.id' , 'DESC')->get();
        $campaigns->load('Channels');
        $campaigns->load('Markets');
        $campaigns->load('Services');

        // Préparation de l'export
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=campagnes.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        // Colonnes de l'export
        $columns = array('Marchés', 'Nom', 'Période', 'Canaux', 'Responsable de campagne', 'Résultats' , 'Publication' , 'Objectifs de la campagne' , 'Résultats de la campagne' , 'Contributeurs' , 'Validation Juridique' , 'Unica' , 'Ressources' , 'Validée en CMM' , 'Date de passage en CMM' , 'Commentaires du CMM' );

        // Insertion des données
        $callback = function() use ($campaigns, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($campaigns as $campaign) {

                // Transformation des marchés en string
                $markets = array();
                if (!empty($campaign->Markets)) {
                    foreach ($campaign->Markets as $market) {
                        $markets[] = $market->name;
                    }
                }

                // Transformation des canaux en string
                $channels = array();
                if (!empty($campaign->channelsDistinct)) {
                    foreach ($campaign->channelsDistinct as $channel) {
                        $channels[] = $channel->Channel->name;
                    }
                }

                // Transformation des contributeurs en string
                $services = array();
                if (!empty($campaign->Services)) {
                    foreach ($campaign->Services as $service) {
                        $services[] = $service->name;
                    }
                }

                $data = array(
                    implode(' | ',$markets),
                    $campaign->name,
                    $campaign->period,
                    implode(' | ',$channels),
                    $campaign->User->firstnameInitial,
                    $campaign->results_state,
                    $campaign->status == 0 ? "Brouillon" : "Publiée",
                    $campaign->description,
                    $campaign->results,
                    implode(' | ',$services),
                    $campaign->legal_validation,
                    $campaign->unica,
                    $campaign->resource_link,
                    $campaign->cmm == 0 ? "Non" : "Oui",
                    $campaign->cmm_display == "0000-00-00" ? "-" : $campaign->cmm_display,
                    $campaign->cmm_comments

                );
                fputcsv($file, $data);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);

    }


}
