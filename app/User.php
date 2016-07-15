<?php

namespace app;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\CV;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Nicolaslopezj\Searchable\SearchableTrait;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use SearchableTrait;
    protected $fillable = [
    'name', 'email', 'password', 'image',
    ];
    protected $hidden = [
    'password', 'remember_token',
    ];

    public function CV()
    {
        return $this->hasOne('App\CV');
    }
    
    public function Groups()
    {
        return $this->belongsToMany(
            'App\Groups', 'pivot_users_groups', 'user_id', 'group_id');
    }
    
    //Delete all relation before datele
    public static function boot()
    {
        parent::boot();

        static::deleted(function($user) {
            $user->groups()->detach();
        });
    }
    
    
    public function getRole()
    {
        if ($this->role == 0)$Role = "Applicant";
        elseif ($this->role == 1) {
            $Role = "Visitor";
        }
        elseif ($this->role == 2) {
            $Role = "Admin";
        }
        return  $Role;
    }
    /*******scope*********/
    public function scopeVisitor($query)
    {
        //in test
        return $query->where('role', '=', 1);
    }
    public function scopeApplicant($query)
    {
        //in test
        return $query->where('role', '=', 0);
    }
    /*******rules ********/
    public static $rules = array(
        //Auth Controller
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:4',
    );
    public static $login_rules = array(
        //Auth Controller
        'email' => 'required|email|max:255',
        'password' => 'required|min:4',
    );
   /*----------search rules ------------*/
    protected $searchable = [
        'columns' => [
            'users.id' => 5,
            'users.name' => 10,
            'users.email' => 10,
        ],

    ];

}
