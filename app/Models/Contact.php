<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
       'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'category_id',
        'detail',
    ];

    public function category()
   {
      return $this->belongsTo(Category::class);
   }

}
