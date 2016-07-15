<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use App\CV;

class Record extends Model
{
    protected $fillable = [
        'Content', 'Date', 'Type',
    ];
    protected $hidden = [
        'cv_id', 'remember_token',
    ];
    public function CV()
    {
        return $this->belongsTo('App\CV');
    }
    public function getJDateAttribute($value){
        $value = date_create($this->Date);
        return date_format($value, 'Y年m月');;
    }
    public function getRole(){
         if ($this->Type == 0)$Role = "School";
            elseif ($this->Type == 1) {
                $Role = "Work";
            }
            elseif ($this->Type == 2) {
                $Role = "Cert";
            }        
        return $Role;
    }          
}
