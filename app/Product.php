<?php namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    protected $guarded = [];
    public function jenis()
    {
        return $this->belongsToMany('App\Jenis');
    }

    public function subimage()
    {
        return $this->hasMany('App\SubImage');
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function getTagListsAttribute()
    {
        return $this->jenis->lists('id');
    }
}
