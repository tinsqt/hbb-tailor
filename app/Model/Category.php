<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = [
        'avatar','status'
    ];

    public function get_language($lang=1)
    {
        return $this->hasMany(CategoryLanguage::class,'category_id')
            ->where('language_id',$lang)->first();
    }

}
