<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function confirm(Request $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        return view('contacts.confirm', ['contact' => $contact]);
    }

    public function store(Request $request)
   {
    $contact = $request->only(['name', 'email', 'tel', 'content']);
   }

}
