<?php
class PostsController extends BaseController
{
    public function index()
    {
        return $this->view("app.posts.index");
    }
    public function list()
    {
        $db = new Database();
        return $db->View('post');
    }
    public function _get($id)
    {
        $db = new Database();
        $where = array(
            'Id' => $id
        );
        return $db->Get('post', $where);
    }
    public function _create($arr = [])
    {
        $db = new Database();
        $insert = $db->Insert('post', $arr);
        if ($insert == true) {
            header('location:/quan-ly/posts');
        } else {
            echo 'Error !';
        }
    }
    public function _edit($arr = [], $id)
    {
        $db = new Database();
        $where = array(
            'Id' => $id
        );
        $update = $db->Update('post', $arr, $where);
        if ($update == true) {
            header('location:/quan-ly/posts');
        } else {
            echo 'Error !';
        }
    }
    public function _delete($id)
    {
        $db = new Database();
        $where = array(
            'Id' => $id
        );
        $delete = $db->Delete('post', $where);
        if ($delete == true) {
            header('location:/quan-ly/posts');
        } else {
            echo 'Error !';
        }
    }
}