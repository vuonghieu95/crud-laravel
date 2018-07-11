<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Author extends Model
{
        public $table = 'authors';
        protected $fillable = ['first_name', 'last_name','email','phone'];

}
