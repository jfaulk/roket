<?php

class PostController extends BaseController {

    public function showEditPost()
    {
        return View::make('editpost')
            ->with('post', $post);
    }

}