<?php

namespace app\support;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Pagination\Paginator;


class Settings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_settings';
    public $timestamps = false;

    //protected $fillable = ['title', 'description', 'prod', 'date'];

   
    

   

}
