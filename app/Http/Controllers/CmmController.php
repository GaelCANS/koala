<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Parameter;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class CmmController extends Controller
{

    public function __construct( ){

        $this -> middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Loading parameters of CMM
        $cmm_params = Parameter::objectCmm();
        $cmm_date = Parameter::getDateCmm();

        // Loading campaigns of CMM
        $campaigns  = Campaign::Notdeleted()
            ->savedOnly()
            ->published()
            ->where('cmm' , '0')
            ->where('cmm_display' , '<=' , $cmm_date)
            ->where('cmm_display' , '!=' , '0000-00-00')
            ->get();
        $campaigns->load('User');

        // Loading unvalidate campaigns
        $waitings = Campaign::Notdeleted()
            ->savedOnly()
            ->published()
            ->where('cmm' , '0')
            ->where(function ($query) use ($cmm_date) {
                $query->where('cmm_display' , '=' , '0000-00-00')
                    ->orWhere('cmm_display' , '<=' , $cmm_date);
            })
            ->get();
        $waitings->load('User');

        // Loading ended campaigns
        $lastCmm = Parameter::lastDateCmm();
        $endeds = Campaign::Notdeleted()
            ->savedOnly()
            ->published()
            ->CmmValidation()
            ->where('cmm_display' , $lastCmm)
            ->get();

        //$printable_lastCmm = Carbon::createFromFormat('Y-m-d', $lastCmm)->format('d/m/Y');
        $printable_lastCmm = null;

        return view('cmms.index' , compact('cmm_params' , 'campaigns' , 'waitings' , 'endeds' , 'printable_lastCmm'));
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function params(Request $request)
    {
        // Mise à jour DATE
        $cmm_date  = Parameter::where('category' , 'cmm')->where('name' , 'date')->first();
        if ($cmm_date->value != $request->date) {
            $cmm_date->value = $request->date;
            $cmm_date->save();
        }

        // Mise à jour TIME
        $cmm_time  = Parameter::where('category' , 'cmm')->where('name' , 'time')->first();
        if ($cmm_time->value != $request->time) {
            $cmm_time->value = $request->time;
            $cmm_time->save();
        }

        // Mise à jour WHERE
        $cmm_where = Parameter::where('category' , 'cmm')->where('name' , 'where')->first();
        if ($cmm_where->value != $request->where) {
            $cmm_where->value = $request->where;
            $cmm_where->save();
        }

        return response()->json([
            'retour' => '1'
        ]);
    }


    /**
     * @return mixed
     */
    public function close()
    {

        // Set the new next date for cmm
        $next_cmm = Carbon::parse('next monday')->format('d/m/Y');
        $cmm_date  = Parameter::where('category' , 'cmm')->where('name' , 'date')->first();
        $cmm_date->value = $next_cmm;
        $cmm_date->save();

        return response()->json([
            'retour' => '1'
        ]);

    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function addCampaign(Request $request)
    {
        // Get date of CMM and set campaign with
        $cmm_display = $request->state == '0' ? '0000-00-00' : Parameter::getDateCmm();
        $campaign = Campaign::findOrFail($request->id);
        $campaign->update( array('cmm_display' => $cmm_display) );

        // Get HTML of campaign
        $html = $request->state == '0' ? '' : view('cmms.next-row' , compact('campaign'))->render() ;

        return response()->json([
            'retour' => '1',
            'state' => $request->state == '0' ? 'remove' : 'add',
            'cmm_display' => $cmm_display,
            'id' => $request->id,
            'html' => $html
        ]);

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function previous(Request $request)
    {
        // Change format of cmm date
        $date_format = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');

        // Search campaigns with this date
        $endeds = Campaign::Notdeleted()
            ->savedOnly()
            ->published()
            ->CmmValidation()
            ->where('cmm_display' , $date_format)
            ->get();

        $render = view('cmms.recap-rows' , compact('endeds'))->render() ;

        return response()->json([
            'html' => $render,
            'date' => $request->date
        ]);

    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function send(Request $request)
    {
        // Construction d'un tableau avec les emails des destinataires principaux
        $emails = explode(';' , $request->recipients);
        // Construction d'un tableau avec les emails des destinataires occasionnels
        $emails_cc = trim($request->guests) != "" ? explode(';' , $request->guests) : array();

        // Récupération des paramètres CMM
        $cmm_params = Parameter::objectCmm();
        $cmm_date = Parameter::getDateCmm();

        // Récupération des campagnes du prochain CMM et construction du HTML
        $campaigns  = Campaign::Notdeleted()
            ->savedOnly()
            ->published()
            ->where('cmm' , '0')
            ->where('cmm_display' , '=' , $cmm_date)
            ->get();
        $html_campaigns = view('emails.list-campaigns' , compact('campaigns'))->render() ;

        // On met à jour le message du mail avec les données dynamiques
        $content = str_replace(
            array('%%--campaigns--%%' , '%--users--%' , '%--salle--%' , '%--date--%' , '%--time--%'),
            array($html_campaigns , User::UsersCmm() , $cmm_params->where , $cmm_params->date, $cmm_params->time ),
            $request->contents
        );

        // Envoi de l'email
        Mail::send('emails.cmm-odj', array('content' => $content), function ($m) use ($request, $emails , $emails_cc) {
            $m->from(Parameter::getParameter('expeditor','common'), Parameter::getParameter('expeditor_name','common'));
            $m->to($emails)->subject( $request->subject );
            if (count($emails_cc) > 0)
                $m->cc($emails_cc);
        });

        return response()->json([
            'state' => '1'
        ]);

    }

}
