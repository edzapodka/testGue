<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {

    protected $guarded = [];
    protected $table ='gallery';

	public function users()
    {
        return $this->belongsTo('App\User');
    }

}
