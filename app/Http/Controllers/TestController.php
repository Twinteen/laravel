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

class TestController extends Controller
{

    public function index()
    {
        $contacts = Test::all();
        return response()->json($contacts);
    }

    public function indexNew()
    {
        $contacts = Test::all();
        return $contacts;
    }

    public function select($id)
    {
        $contact = Test::find($id);
        if (!empty($contact)) {
            $data = [
                'contact' => $contact
            ];
            return view('contact', $data);
        }

        return redirect('/');
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