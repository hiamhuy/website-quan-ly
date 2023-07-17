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
        $arrCreate = array(
            'image' => isset($arr['image']) ? $arr['image'] : '',
            'title' => isset($arr['title']) ? $arr['title'] : '',
            'titlecontent' => isset($arr['titlesmall']) ? $arr['titlesmall'] : '',
            'content' => isset($arr['content']) ? $arr['content'] : '',
            'type' => isset($arr['type']) ? $arr['type'] : '',
            'postdate' => date('y-m-d H:i:s')
        );

        $arrCreate = array_filter($arrCreate);
        $_insert = $db->Insert('post', $arrCreate);
        if ($_insert == true) {
            if (isset($array['image'])) {
                $image = $arr['image'];
                $imagetmp = $arr['imagetmp'];
                move_uploaded_file($imagetmp, './admin/assets/post/' . $image);
            }
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

        $arrGet = $this->_get($id);
        $imageNew = "";
        if (isset($arr['image'])) {
            if (empty($arr['image'])) {
                $imageNew = $arrGet[0]['image'];
            } else {
                $imageNew = $arr['image'];
            }
        }
        $arrUpdate = array(
            'image' => $imageNew,
            'title' => isset($arr['title']) ? $arr['title'] : '',
            'titlecontent' => isset($arr['titlesmall']) ? $arr['titlesmall'] : '',
            'content' => isset($arr['content']) ? $arr['content'] : '',
            'type' => isset($arr['type']) ? $arr['type'] : ''

        );

        $update = $db->Update('post', $arrUpdate, $where);
        if ($update == true) {
            $imagetmp = $arr['imagetmp'];
            move_uploaded_file($imagetmp, './admin/assets/post/' . $imageNew);
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