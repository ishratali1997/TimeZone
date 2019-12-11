<?php

namespace App;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Teacher extends Model
{
    protected $guarded = [];
    public function combine($day, $time)
    {
        // $sunday =  date('Y-m-d', strtotime("last $day", strtotime(Carbon::parse($time))));
        // $combinedDT = date('Y-m-d H:i:s', strtotime("$sunday.' '. $time"));
        // return $combinedDT;
        $sunday =  date('Y-m-d', strtotime("last $day", strtotime($time)));
        // $combinedDT = $sunday . ' ' . $time;
        $gm =  gmdate('Y-m-d H:i:s', strtotime($sunday . ' ' . $time));
        return $gm;
    }

    public function combineDate($date)
    {

        $dt = now()->format('Y-m-d');
        $sunday =  date('Y-m-d', strtotime('last Sunday', strtotime($dt)));

        $combinedDT = date('Y-m-d H:i:s', strtotime("$sunday $date"));
        return $combinedDT;
    }

    //Accessors
    public function getSundayAttribute($date)
    {
        return $this->attributes['sunday'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->tz);
    }

    public function getMondayAttribute($date)
    {
        return $this->attributes['monday'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->tz);
    }
    public function getTuesdayAttribute($date)
    {
        return $this->attributes['tuesday'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->tz);
    }
    public function getWednesdayAttribute($date)
    {
        return $this->attributes['wednesday'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->tz);
    }
    public function getThursdayAttribute($date)
    {
        return $this->attributes['thursday'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->tz);
    }
    public function getFridayAttribute($date)
    {
        return $this->attributes['friday'] = Carbon::parse($date, 'UTC')->setTimezone(Auth::user()->tz);
    }


    //Mutators
    public function setSundayAttribute($date)
    {
        $this->attributes['sunday'] = Carbon::parse($date)->setTimezone('UTC');
    }
    public function setMondayAttribute($date)
    {

        $this->attributes['monday'] = Carbon::parse($date)->setTimezone('UTC');
    }
    public function setTuesdayAttribute($date)
    {

        $this->attributes['tuesday'] = Carbon::parse($date)->setTimezone('UTC');
    }
    public function setWednesdayAttribute($date)
    {
        $this->attributes['wednesday'] = Carbon::parse($date)->setTimezone('UTC');
    }

    public function setFridayAttribute($date)
    {
        $this->attributes['friday'] = Carbon::parse($date)->setTimezone('UTC');
    }

    public function setThursdayAttribute($date)
    {
        $this->attributes['thursday'] = Carbon::parse($date)->setTimezone('UTC');
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}