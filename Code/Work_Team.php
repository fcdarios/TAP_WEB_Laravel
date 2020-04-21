<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work_Team extends Model
{
    protected $table = 'work_team';
    protected $primaryKey = 'id_team';
    public $timestamps = false;

    public static function laratablesCustomAcciones($work_team)
    {
        return view('acciones', compact('work_team'))->render();
    }
}
