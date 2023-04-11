<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use GuzzleHttp\Client;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pokemon::orderBy('id', 'ASC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPokemon = new Pokemon;
        $newPokemon->name = $request->item["name"];
        $newPokemon->save();
        
        return $newPokemon;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $existingPokemon = Pokemon::find( $id );
        
        if ( $existingPokemon ) {
           return $existingPokemon;
        }
        
        $client = new Client();
        $res = $client->request('GET','https://pokeapi.co/api/v2/pokemon/'.$id);
        
        $poke = json_decode($res->getBody(),false);
        
        $newPokemon = new Pokemon;
        $newPokemon->id = $id;
        $newPokemon->name = $poke->name;
        $newPokemon->type_1 = $poke->types[0]->type->name;
        $newPokemon->type_2 = isset($poke->types[1]->type->name)?$poke->types[1]->type->name:'';
        $newPokemon->info = json_encode($poke);
        $newPokemon->save();
        
        return $newPokemon;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingPokemon = Pokemon::find( $id );
        
        if ( $existingPokemon ) {
           $existingPokemon->have_it = $existingPokemon->have_it ? false : true;
           $existingPokemon->have_it_at = $existingPokemon->have_it ? Carbon::now() : null;
           $existingPokemon->save();
           return $existingPokemon;
        }
        
        return "Pokemon not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //
    }
}
