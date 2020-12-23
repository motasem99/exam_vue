<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{

        // use HasFactory;
        protected $table = 'Human';
        protected $fillable = ['name','num','section','salary','discounts','net_salary'];

}
