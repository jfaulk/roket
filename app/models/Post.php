<?php

class Post extends Eloquent {

    protected $table = 'posts';
    protected $fillable = array('user_id', 'post_title', 'post_contents', 'created_at', 'updated_at');
    protected $guarded = array('id');

    public function users()
    {
        return $this->belongsTo('User');
    }
}