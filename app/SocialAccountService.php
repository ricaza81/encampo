<?php


namespace App;
use App\UsuariosEmpresas;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
      
          


        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();
            $idEmpresa=22;

            if (!$user) {

                $empresa = new UsuariosEmpresas;
                $empresa->nombreempresa='Empresa Temporal.(login facebook)'." ".$providerUser->getName();
                $empresa->save();
                $empresa->id;    
                
                $user = User::create([
                	
                    'email' => $providerUser->getEmail(),
                    'nombres' => $providerUser->getName(),
                    
                    'idZona'=>'Z0',
                    'idEmpresa'=> $empresa->id,
                    'idSuscriptor' => 18,
                    'tipoUsuario' => 1,
                    'pais' => 1,
    


                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}