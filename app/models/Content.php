<?php

class Content extends Eloquent {

	protected $table = 'content';
	protected $fillable = array('tag');

	public function posts()
	{
		return $this->belongsToMany('Post');
	}

    public function topics()
    {
        return $this->belongsToMany('Topic');
    }

    public function contents()
    {
        return $this->hasMany('Post');
    }
}