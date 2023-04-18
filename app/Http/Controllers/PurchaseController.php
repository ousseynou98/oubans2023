<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function post(Request $request){

        $transactionInfos = array();
        $transactionInfos['price'] = intval(100);
        
        //Cart::where('statut', 0)->where('user', Auth::user()->id)->update( array('session_id'=>Session::get('uniqIdSession')));
        // $transactionInfos['pack'] =  $request->get('pack');
        // $transactionInfos['id_pack'] =  $request->get('idPack');
        // $transactionInfos['nb_minute']  = $request->get('nb_minute');
        // $transactionInfos['client'] =DB::table('voice_uprofil')->selectRaw('user')->where('voice_uprofil.id','=',$_SESSION['profil']);
       // $transactionInfos['ref'] =  Session::get('refCommandeSessionJ');
            $postfields = array(
                "item_name"    =>   "Confirmation achat de Contenu",
                "item_price"   =>   /*Session::get('sessionTotal')*/100, 
                "currency"     =>  "xof",
                "ref_command"  =>  /*strval(Session::get('uniqIdSession'))*/"dfdfdfdfd",
                "command_name" =>  ".",
                "env"          =>  'prod',
                "success_url"  =>  "#",
                "ipn_url"	   =>  '#',
                "cancel_url"   =>  '#',
                "custom_field" =>   '',
        );

        $api_key="a96df3c9df3e76b06e4539184074493808ecd54bb3e7179af112428b1ac9435b";
        $api_secret="37209dfdfb1b8867a29e59a6b08ed4698c7b51c654eee8ab33fbc8fb98f4c9a6";

        $client = new \GuzzleHttp\Client();
        $csrfToken = $request->session()->get('csrf_token'); // Récupération du jeton CSRF depuis la session
        
        $response = $client->request('POST', 'https://paytech.sn/api/payment/request-payment', [
            'form_params' => $postfields,
            'headers' => [
                'API_KEY' => $api_key,
                'API_SECRET' => $api_secret,
                'X-CSRF-TOKEN' => $csrfToken // Ajout du jeton CSRF dans les en-têtes de la requête POST
            ]
        ]);
        
        $jsonResponse = $response->getBody();
        die($jsonResponse);

    }
}
