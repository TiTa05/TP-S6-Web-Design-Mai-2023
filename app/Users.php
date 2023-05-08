<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable ; //pour authentifier ma classe
use Illuminate\Auth\Authenticatable as Functable ;    //pour mettre les 6 fonctions abstraites
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
class Users extends Model
{
    public static function loggin($mail,$mdp)
    {
        $login = collect(\DB::select('select count(*) as isa from utilisateurs where mail = ? and mdp = ? ', [$mail,
        $mdp]))->first();
        return $login->isa;
    }

}
