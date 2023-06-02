<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GastoAdministrativo extends Model
{
    use SoftDeletes;

    protected $table     = 'grupos_gasto_administrativo';

    protected $fillable  = [
                            'group_id',
                            'numero', 
                            'proveedor',
                            'fecha',
                            'interno', 
                            'monto',
                            'comentario',
                            'created_at',
                            'created_by',
                            'updated_at',
                            'updated_by',
                            'deleted_at'];
  
}
