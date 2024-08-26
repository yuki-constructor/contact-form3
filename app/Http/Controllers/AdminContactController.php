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
      $contacts = Contact::with('category')->GenderSearch($request->gender)->ContentSearch($request->content)
      ->DateSearch($request->created_at)
      ->KeywordSearch($request->keyword)
            ->paginate(7);

      $categories = Category::all();

    //   $contacts = $contacts->paginate(7);

      return view('admin', ['contacts'=>$contacts, 'categories'=>$categories]);
    }


}


