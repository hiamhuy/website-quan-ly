<?php
class AccountController extends BaseController
{
    public function index()
    {
        return $this->view("app.thong-tin-tai-khoan.index");
    }
    public function editInfo($array = [])
    {
        $arrUpdate = array();
        if (!empty($array)) {
            $db = new Database();
            $dataSession = getSession("data-user");
            $id = $dataSession[0]['id'];
            $imageOld = $dataSession[0]['avatar'];
            $imageNew = '';
            if (!empty($array['avatar'])) {
                $imageNew = $array['avatar'];
                $imagetmp = $array['avatar_tmp'];

            } else {
                $imageNew = $imageOld;
            }
            $arrUpdate['avatar'] = $imageNew;
            $arrUpdate['name'] = $array['name'] ?? '';
            $arrUpdate['password'] = $array['password'] ?? '';

            $arrUpdate = array_filter($arrUpdate);

            $where = array(
                "id" => $id
            );

            $update = $db->Update('account', $arrUpdate, $where);
            if ($update == true) {
                if (isset($array['avatar'])) {
                    move_uploaded_file($imagetmp, './admin/assets/thumb-info/' . $imageNew);
                }
                $dataGet = $db->Get('account', $where);
                createSession("data-user", $dataGet);
                createSession("title", "Update successful!!");
                die();
            } else {
                createSession("title", "Error when update!!");
            }
        }

    }
}

?>