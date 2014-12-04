<?php

class Topic extends Eloquent {

	protected $table = 'topics';
	protected $fillable = array('topic');

	public function posts()
	{
		return $this->belongsToMany('Post');
	}
}