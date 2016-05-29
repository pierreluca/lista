<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Illuminate\Support\Facades\Redirect;

class RelativeController extends Controller
{
    //
    public function addRelative(Request $request) {
        
        if($request->nome != "" && $request->cognome != ""):
			$invito=$request->invito || 0;
			$partecipazione=$request->partecipazione || 0;
			DB::table('relatives')->insertGetId(
			    ['nome' => $request->nome,
			    'cognome' => $request->cognome,
			    'fam' => $request->fam,
			    'eta' => $request->eta,
			    'invito' => $invito,
			    'partecipazione' => $partecipazione,
			    'citta' => $request->citta,
			    'indirizzo' => $request->indirizzo,
			    'cap' => $request->cap,
			    'mobile' => $request->mobile,
			    'note' => $request->note]
			);
		
		endif;
        $name="Antonio"; if($request->fam==2): $name="Daniela"; endif;
    	return Redirect::to('lista/'.$name);
    }

    public function updateRelative(Request $request) {
        
        $invito=$request->invito || 0;
		$partecipazione=$request->partecipazione || 0;
    	DB::table('relatives')
            ->where('id', $request->id)
            ->update(
			    ['nome' => $request->nome,
			    'cognome' => $request->cognome,
			    'fam' => $request->fam,
			    'eta' => $request->eta,
			    'invito' => $invito,
			    'partecipazione' => $partecipazione,
			    'citta' => $request->citta,
			    'indirizzo' => $request->indirizzo,
			    'cap' => $request->cap,
			    'mobile' => $request->mobile,
			    'note' => $request->note]
			);
		$name="Antonio"; if($request->fam==2): $name="Daniela"; endif;
    	return Redirect::to('lista/'.$name);
    }

    public function deleteRelative(Request $request) {
        
        DB::delete('delete from relatives where id = '.$request->id);
        $name="Antonio"; if($request->fam==2): $name="Daniela"; endif;
    	return Redirect::to('lista/'.$name);
    }

}