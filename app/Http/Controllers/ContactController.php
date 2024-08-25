<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'category_id',
        'detail']);
        return view('contacts.confirm', ['contact' => $contact]);
    }

    public function store(ContactRequest $request)
   {
    $contact = $request->only([
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'category_id',
        'detail']);
     Contact::create($contact);
     return view('contacts.thanks');

    }

}
