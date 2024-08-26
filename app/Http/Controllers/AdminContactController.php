<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminContactController extends Controller
{
    public function admin()
    {
       $contacts=Contact::all();
       $categories=Category::all();

      return view('admin',["contacts"=>$contacts,"categories"=>$categories]);
    }

    public function search(Request $request)
    {
      $contacts = Contact::with('category')->CategorySearch($request->gender)->KeywordSearch($request->keyword)->get();
      $categories = Category::all();

      return view('admin', ['contacts'=>$contacts, 'categories'=>$categories]);
    }


}
