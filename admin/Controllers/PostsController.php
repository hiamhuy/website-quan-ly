<?php
class PostsController extends BaseController
{
    public function index()
    {
        return $this->view("app.posts.index");
    }
}