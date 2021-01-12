<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\MailChimp\MailChimp;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
public function boot()
    {
        User::creating(function ($user) {
            if ( $user->email) {
                //print_r($user);
                $list_id = '1104def7c0';
                $MailChimp = new MailChimp();
                $add = $MailChimp->post("lists/$list_id/members", [
                        'email_address' => $user->email,
                        'status'        => 'subscribed',
                        'merge_fields' => ['FNAME'=>$user->nombres]//, 'LNAME'=>$user->apellidos]
                    ]);
                //print_r($add);require('0');
            }
        }); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
