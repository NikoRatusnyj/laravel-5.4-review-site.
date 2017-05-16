<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;


class Company extends Authenticatable
{
    use Notifiable;
    use Searchable;

    protected  $guard = 'company';

    protected $redirectPath = '/company/login';


    static function getCompany($id)
    {

        return Company::find($id);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    protected $fillable = [
        'companyname','kvk','adres','telnr', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

}
