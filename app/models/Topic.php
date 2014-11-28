<?php

class Topic extends Eloquent {

	protected $table = 'topics';
	protected $fillable = array('content');

	public function posts()
	{
		return $this->belongsToMany('Post');
	}
}