<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{

 
    protected $table = 'contract';

    protected $fillable = ['id','busines_group_id','contract_type', 'credit_limit', 'number', 'status', 'observation','created_by','image'];

    protected $dates = ['date_init', 'date_end', 'created_at', 'updated_at','reception_date','signature_date'];


    public function group()
    {
        return $this->belongsTo('App\Models\Group', 'group_id');
    }


    public function scopeDescription($query, $description)
    {
        if (trim($description) != "") {
            $query->where('business_groups.description', 'ILIKE', "%$description%");
        }
    }

    // public function scopeNumber($query, $number)
    // {
    //     if (trim($number) != "") {
    //         $query->where('contract.number', 'ILIKE', "%$number%");
    //     }
    // }

    
}
