<?php

class Content extends Eloquent {

	protected $table = 'content';
	protected $fillable = array('tag');

    public static $rules = array(
        'name'         => 'required|unique:contents',
    );

	public function posts()
	{
		return $this->belongsToMany('Post');
	}

    public function topics()
    {
        return $this->hasMany('Topic');
    }

    public function contents()
    {
        return $this->hasMany('Post');
    }
}