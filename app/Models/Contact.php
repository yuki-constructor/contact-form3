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

   public function scopeCategorySearch($query,$gender)
{
  if (!empty($gender)) {
    $query->where('gender', $gender);
  }
}

public function scopeKeywordSearch($query, $keyword)
{
  if (!empty($keyword)) {
    $query->where('first_name', 'like', '%' . $keyword . '%')
    ->orWhere('last_name', 'like', '%' . $keyword . '%')
    ->orWhere('email', 'like', '%' . $keyword . '%');
  }
}

}
