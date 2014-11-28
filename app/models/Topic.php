<?php

class Topic extends Eloquent {

	protected $table = 'topics';
	protected $fillable = array('tag');

	public function posts()
	{
		return $this->belongsToMany('Post');
	}
}