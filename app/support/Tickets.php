<?php

namespace app\support;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Pagination\Paginator;
use App\User;


class Tickets extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_tickets';
    public $timestamps = false;

    protected $fillable = ['user_id', 'title', 'status'];

   public function Member()
    {
        return $this->belongsTo('App\support\Members', 'user_id');
    }

    public function Product()
    {
        return $this->belongsTo('App\support\Products', 'prod');
    }

       public function delusuario()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

             public function usuario()

      {

        return $this->hasMany('App\User', 'id', 'user_id');

      }

}
