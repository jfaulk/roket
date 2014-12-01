<?php

class Content extends Eloquent {

	protected $table = 'content';
	protected $fillable = array('tag');

	public function posts()
	{
		return $this->belongsToMany('Post');
	}
}