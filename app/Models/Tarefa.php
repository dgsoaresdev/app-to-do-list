<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarefa extends Model
{
    use HasFactory;

    public function store( $type = "", $value = 0, $status="" )
    {
        //$type = 'tasks_by_id';

        if ( $type == 'tasks_by_id' ) {
            $store = Tarefa::where('id', '=', $value)->orderBy('id', 'DESC')->get();
        }
        elseif ( $type == 'tasks_by_status' ) {
            $store = Tarefa::where('status', '=', $status)->orderBy('id', 'DESC')->get();
        } 
        else {
            $store = Tarefa::orderBy('id', 'DESC')->get();
        }
        
        return $store;
    }

    public function users( $id=0 )
    {
        if($id > 0) {
            $user = DB::table('users')->where( 'id', '=', $id )->get();
            return  $user;
        } else {
            $users = DB::table('users')->get();
            return  $users;
        }
    }

}
