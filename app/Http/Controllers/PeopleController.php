<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function view(Request $request)
    {
        $people = People::all();
        return view('dashboard')->with('people', $people);
    }

    public function create(Request $request)
    {

    	$request->validate([
            'name' => 'required|string',
            'surname' => 'required',
            'email' => 'required',
            'id_num' => 'required',
            'phone_num' => 'required',
            'language' => 'required',
            'interest' => 'required'
        ]);

        
        $person = new People;
        $person->name = $request->input('name');
        $person->surname = $request->input('surname');
        $person->email = $request->input('email');
        $person->id_num = $request->input('id_num');
        $person->phone_num = $request->input('phone_num');
        $person->language = $request->input('language');
        $person->interests = json_encode($request->interest);
        $person->save();

        return Redirect::back()->withErrors(['Person Added']);
        
    }

    public function edit($id)
    {
    	$person = People::find($id);

        if (!empty($person)) {
            return view('edit')->with('person', $person);
        }
    }

    public function update(Request $request)
    {
        //This Code Could Be Better It Looks Duplicated From The create() Method. But It Works!
        $person = People::find($request->id);

        $request->validate([
            'name' => 'required|string',
            'surname' => 'required',
            'email' => 'required',
            'id_num' => 'required',
            'phone_num' => 'required',
            'language' => 'required',
            'interest' => 'required'
        ]);

        
        $person->name = $request->input('name');
        $person->surname = $request->input('surname');
        $person->email = $request->input('email');
        $person->id_num = $request->input('id_num');
        $person->phone_num = $request->input('phone_num');
        $person->language = $request->input('language');
        $person->interests = json_encode($request->interest);
        $person->save();

        return Redirect::back()->withErrors(['Person Updated']);

        
    }

    public function delete(Request $request)
    {
    	$person = People::find($request->id)->delete();
        return Redirect::back()->withErrors(['Person Delete']);
    }
}
