<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryLanguage extends Model
{
    protected $table = 'category_language';
    protected $fillable = [
      'category_id','name','language_id'
    ];
}
