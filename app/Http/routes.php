<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('lista/{name}', function ($name) {
    if($name == "Antonio"):
    	$color = "#0C7187";
		$id_fam = 1;
    elseif($name == "Daniela"):
    	$color = "#F09";
		$id_fam = 2;
    endif;
	$relatives = App\Relative::where('fam', $id_fam)
	   ->orderBy('id', 'desc')
	   ->get();

	$data = array(
		'id' => 0,
		'fam_name' => $name,
		'id_fam' => $id_fam,
		'color' => $color,
		'relatives' => $relatives);
	
	/*echo "<pre>";
	print_r($data);
	echo "</pre>";*/
	return view('lista', $data);
});

Route::get('lista/{name}/{id}', function ($name,$id) {
    if($name == "Antonio"):
    	$color = "#0C7187";
		$id_fam = 1;
    elseif($name == "Daniela"):
    	$color = "#F09";
		$id_fam = 2;
    endif;
	$relatives = App\Relative::where('id', $id)
	   ->get();

	$data = array(
		'id' => $id,
		'fam_name' => $name,
		'id_fam' => $id_fam,
		'color' => $color,
		'relatives' => $relatives);
	
	/*echo "<pre>";
	print_r($data);
	echo "</pre>";*/
	return view('lista', $data);
});

Route::post('lista/{name}', 'RelativeController@addRelative');

Route::post('lista/{name}/{id}', 'RelativeController@updateRelative');

Route::get('lista/{name}/{id}/delete', 'RelativeController@deleteRelative');

/*
Route::post('lista/{name}', function ($name) {
	
	$dd = $request->all();


	echo "<pre>";
	print_r($dd);
	echo "</pre>";
    // redirect
    //return Redirect::to('lista/$name');

	
	$input = $request->all();

	if($input->nome != "" && $input->cognome != ""):
		$invito=Input::post('invito', 0);
		$partecipazione=Input::post('partecipazione', 0);
		DB::table('relatives')->insertGetId(
		    ['nome' => Input::post('nome'),
		    'cognome' => Input::post('cognome'),
		    'eta' => Input::post('eta'),
		    'invito' => $invito,
		    'partecipazione' => $partecipazione,
		    'citta' => Input::post('citta'),
		    'indirizzo' => Input::post('indirizzo'),
		    'cap' => Input::post('cap'),
		    'mobile' => Input::post('mobile')]
		);
	
	endif;

	/*if($name=="Antonio"):
    	$relative = App\Relative::where('fam', 1)
	       ->orderBy('id', 'desc')
	       ->get();
    	//$relative = App\Relative::find(1);
    	$relative = array_add($relative, 'fam', 1);
    elseif($name=="Daniela"):
    	$relative = App\Relative::where('fam', 2)
	       ->orderBy('id', 'desc')
	       ->get();
    	//$relative = App\Relative::find(1);
    	$relative = array_add($relative, 'fam', 2);
    endif;
	$relative = array_add($relative, 'fam_name', $name);
	return view('lista', $relative);

});*/

/*
Route::get('daniela', function () {
    $relative = App\Relative::find(2);
    //echo $relative -> nome;
    $relative = array_add($relative, 'fam', 2);
    $relative = array_add($relative, 'fam_name', 'Daniela');

    return view('lista', $relative);
});
*/