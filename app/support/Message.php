<?php

namespace app\support;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Pagination\Paginator;


class Message extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_msg';
    public $timestamps = false;

    protected $fillable = ['user_id', 'ticket_id', 'msg', 'dt_time', 'type'];

   public function Member()
    {
        return $this->belongsTo('App\support\Members', 'user_id');
    }

    public function Ticket()
    {
        return $this->belongsTo('App\support\Tickets', 'ticket_id');
    }

          public function delusuario()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
