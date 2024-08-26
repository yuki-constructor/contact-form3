<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;


class ContactController extends Controller
{

    public function index()
    {
        $categories=Category::all();
        return view('contacts.index' ,['categories' => $categories]);

    }


       // public function confirm(ContactRequest $request)
    public function confirm(Request $request)
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

    // public function store(ContactRequest $request)
    public function store(Request $request)
   {

    if ($request->has('back')) {
        return redirect('/')->withInput($request->all());
        // return back();
    }

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
