<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
     use SoftDeletes;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

     public function sub_category() {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function parent_category() {
        return $this->hasMany(self::class, 'id', 'parent_id');
    }
}
