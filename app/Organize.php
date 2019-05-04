<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organize extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'organize';
    protected $fillable = ['name','phone','fax','office_hours','email','group_id','address','district','province','postcode'];

    public function getTable()
    {
        return $this->table;
    }

    public function getAreas()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
