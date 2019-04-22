<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organize extends Model
{
    //
    protected $table = 'organize';
    protected $fillable = ['name','phone','fax','office_hours','email','group_id','address','district','province','postcode'];
}
