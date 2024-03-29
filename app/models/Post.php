<?php

class Post extends Eloquent {

    protected $table = 'posts';
    protected $fillable = array('user_id', 'post_title', 'post_contents', 'created_at', 'updated_at');
    protected $guarded = array('id');

    public static $rules = array(
        'title'         => 'required',
        'content'      => 'required',
    );

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function topics()
    {
        return $this->belongsToMany('Topic');
    }
	
	public function contents()
	{
		return $this->belongsToMany('Content');
	}
}