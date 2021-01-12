<?php

namespace app\support;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Pagination\Paginator;


class Members extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_users';
    public $timestamps = false;

     public function scopeCreateValidator($query, array $data)
     {
         return Validator::make($data, [
         'mem_name' => 'required|max:150',
         'password' => 'required|max:30',
         'email' => 'required|unique:tbl_users|email|max:150',
         'contact' => 'required|numeric|unique:tbl_users',
         //'dob' => 'required|date_format:d/m/Y|max:12',
         
        ]);
     }


     public function Tickets()
    {
        return $this->hasMany('App\support\Tickets', 'user_id');
    }

   

}
