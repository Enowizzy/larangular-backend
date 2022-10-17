<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\ContactService;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function storeContact(StoreContactRequest $request)
    {
        $contact = Contact::create($request->validated());
        return  $message = (new ContactService())->message($contact);
    }

    public function getContact()
    {
        $getContact = Contact::all();
        return response()->json($getContact);
    }
}
