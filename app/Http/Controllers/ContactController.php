<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/22/2016
 * Time: 7:42 PM
 */

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactForm;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return response()->json($contacts);
    }

    public function store(ContactForm $request)
    {
        $contact = new Contact();
        $contact->create($request->all());

        return response()->json('done');
    }

    public function show($contact)
    {
        $contact = Contact::find($contact);
        if (!empty($contact)) {
            return response()->json($contact);
        }

        return response()->json(false);
    }

    public function update(ContactForm $request, $contact)
    {
        $contact = Contact::find($contact);
        $contact->update($request->all());

        return response()->json($request->all());
    }

}