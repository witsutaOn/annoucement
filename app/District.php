<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = 'districts';
    protected $fillable = ['province', 'amphoe','district'];

    public function getAmphoe()
    {
        return $this->hasMany(District::class,'province','province')->groupBy('amphoe')->select('amphoe');
    }

    public function getDistrict(){
        return $this->hasMany(District::class,'amphoe','amphoe')->groupBy('district');
    }

}
