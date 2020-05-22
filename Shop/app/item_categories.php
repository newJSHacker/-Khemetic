<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_categories extends Model
{
    protected $fillable=[
        'category_name',
        'category_description',
        'category_parent_category'
    ];
    public function childs(){
    return $this->hasMany('App\item_categories','category_parent_category');
}

}
