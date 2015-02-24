<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SubImage extends Model {

	protected $fillable = ['name', 'set_image'];
    protected $table = 'subimages';
    public function product()
    {
        return $this->belongsTo('App\Product');
    }



}
