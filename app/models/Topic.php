<?php

class Topic extends Eloquent {

	protected $table = 'topics';
	protected $fillable = array('topic');


    public static $rules = array(
        'name'         => 'required|unique:topics',
    );

	public function posts()
	{
		return $this->belongsToMany('Post');
	}

    public function topics()
    {
        return $this->hasMany('Post');
    }

    public function contents()
    {
        return $this->hasMany('Content');
    }
}