<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/22/2016
 * Time: 7:42 PM
 */

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\contactForm;

class TestController extends Controller
{

    public function index()
    {
        $contacts = Test::all();
        return response()->json($contacts);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:60|bail ',
            'surname' => 'required|max:60|bail',
            'telephone' => 'required|max:20|unique:contacts,contact_telephone|bail',
            'birthday' => 'required',
        ]);

        $contact = new Test();
        /*$contact->create($request->all());*/
        $contact->contact_name = $request->input('name');
        $contact->contact_surname = $request->input('surname');
        $contact->contact_telephone = $request->input('telephone');
        $contact->contact_text = $request->input('text');
        $contact->contact_birthday = $request->input('birthday');

        $contact->save();

        return response()->json('done');

        /*Test::create(Request::all());
        return response()->json('Yep');*/
        //
    }

    public function show($contact)
    {
        $contact = Test::find($contact);
        if (!empty($contact)) {
            return response()->json($contact);
        }

        return response()->json(false);
    }

    public function teststore(Request $request)
    {
/*        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);*/
/*        $contact = Test::create(['contact_name' => 'John',
                              'contact_surname' => 'Brown',
                              'contact_telephone' => 497499,
                              'contact_text' => 'asdlaosdlao',
                              'contact_birthday' => date("Y-m-d"),
                             ]);*/

        return response()->json("I did it");
        $contact = new Test();
        $contact->contact_name = 'John';
        $contact->contact_surname = 'John';
        $contact->contact_telephone = 1111111;
        $contact->contact_text = 'asdlaosdlao';
        $contact->contact_birthday = date("Y-m-d");
        $contact->save();
    }

    public function update(Request $request, $id)
    {
        if(empty(Test::where('contact_telephone', '=', $request->input('contact_telephone'))->get()))
        {
            return false;
        }

        return false;
        $telephone = Test::where('contact_telephone', '=', '')->get();

        var_dump($telephone);
        echo '-----------------';
        $input = $request->input('contact_name');
        $all = $request->all();
        var_dump($input);
        var_dump($all);
    }

/*    public function save(Requests\ContactPost $request)
    {
        $contact = Test::create([
            'contact_name' => $request->input('name'),
            'contact_surname' => $request->input('surname'),
            'contact_telephone' => $request->input('telephone'),
            'contact_text' => $request->input('text'),
            'contact_birthday' => $request->input('birthday'),
        ]);

    }*/


}