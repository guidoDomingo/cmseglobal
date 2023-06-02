<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table    = 'campaigns';
    public $timestamps  = false;
    protected $fillable = ['name', 'duration', 'flow', 'perpetuity','tipoCampaña'];
    protected $dates    = ['start_date', 'end_date'];

    public function scopeName($query, $name)
    {
        if (trim($name) != "") {
            $query->where('name', 'ILIKE', "%$name%");
        }
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

    public function campaignsDetails()
    {
        return $this->hasMany('App\Models\CampaignDetails', 'campaigns_id');
        //return $this->hasMany('App\Models\CampaignDetails');

    }

    public static function filterAndPaginate($name)
    {

        return Campaign::name($name)
            //->with('categorias')
            //->with('service_sources')
            ->orderBy('id', 'DESC')
            ->paginate();
    }
    
}
