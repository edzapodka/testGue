<?php namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Request;

class Article extends Model {

	protected $guarded = [];

	protected $softDelete = true;

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
	}

	public function setSeo_TitleAttribute()
	{
		$this->attributes['seo_title'] = Str::slug(Request::input('title'), '-');
	}
}
