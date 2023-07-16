<?php
class TabController extends BaseController
{
    public function index()
    {
        return $this->view("app.tab.index");
    }
    public function list()
    {
        $db = new Database();
        return $db->View('tab');
    }
    public function _get($id)
    {
        $db = new Database();
        $where = array(
            'Id' => $id
        );
        return $db->Get('tab', $where);
    }
    public function _create($arr = [])
    {
        $db = new Database();
        $insert = $db->Insert('tab', $arr);
        if ($insert == true) {
            header('location:/quan-ly/tab');
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
        $update = $db->Update('tab', $arr, $where);
        if ($update == true) {
            header('location:/quan-ly/tab');
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
        $delete = $db->Delete('tab', $where);
        if ($delete == true) {
            header('location:/quan-ly/tab');
        } else {
            echo 'Error !';
        }
    }
}