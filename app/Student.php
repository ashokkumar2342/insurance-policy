<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
       public function classes(){
        return $this->hasOne('App\Model\ClassType','id','class_id');
    }
    public function classFee(){
        return $this->hasOne('App\Model\ClassFee','class_id','class_id')->where('session_id',$this->session_id);
    }    
     
    public function sessions(){
        return $this->hasOne('App\Model\SessionDate','id','session_id');
    }
    public function sectionTypes(){
        return $this->hasOne('App\Model\SectionType','id','section_id');
    }
    
    
}
