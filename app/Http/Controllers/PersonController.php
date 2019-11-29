<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    //

    public function show(Person $person):PersonResource{
        return (new PersonResource( $person));
    }
    public function index(): PersonResourceCollection{
        return new PersonResourceCollection(Person::paginate());
    }
    public function store(Request $request){

    $request->validate([
       "name" => 'required',
       "phone" => 'required',
       "email" => 'required',
       "city" => 'required',
        

    ]);
    $person  = Person::create($request->all());
        return new PersonResource($person) ;
    }


    public function update(Person $person, Request $request):PersonResource{
        $person->update($request->all());
        return new PersonResource($person);
    }

    public function destroy(Person $person){
  $person->delete();
  return response()->json;

    }
 

}
