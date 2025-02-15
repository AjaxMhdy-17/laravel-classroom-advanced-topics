<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScheduledClass extends Model
{
    use HasFactory;


    // protected $guarded = null ; 

    protected $fillable = [
        'teacher_id',
        'class_type_id',
        'date_time'
    ];


    protected $casts = [
        'date_time' => 'datetime'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function student(){
        return $this->belongsToMany(User::class , 'bookings') ; 
    }

    public function scopeUpcoming(Builder $query){
        return $query->where('date_time', '>', now());
    }


    public function scopeNotBooked(Builder $query){
        return $query->whereDoesntHave('student',function($query){ 
            $query->where('user_id' , auth()->user()->id);
        });
    }

}
