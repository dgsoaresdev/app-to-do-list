<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    public function store($type = null, $value = 0 )
    {
        if ( $type === 'id') {
            $store = Tarefa::where('id', '=', $value)->orderBy('id', 'DESC')->get();
        } 
        else {
            $store = Tarefa::orderBy('id', 'DESC')->get();
        }
        return $store;
    }

}
