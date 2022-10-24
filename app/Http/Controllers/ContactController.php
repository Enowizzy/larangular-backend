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
    public function deleteContact($id)
    {
        $delete_contact = Contact::find($id);
        if ($delete_contact) {
            $delete_contact->delete();
            return response()->json([
                'success' => true,
                'code' => 1,
                'message' => 'contact deleted successful',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'code' => 2,
                'message' => 'contact not found',
            ], 500);
        }
    }
}
