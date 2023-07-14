<?php
class LoginController extends BaseController
{

    public function index()
    {
        $this->view('Login.index');
    }
    public function login($username, $pass)
    {
        $db = new Database();
        if ((isset($username)) && (isset($pass))) {
            $where = array(
                "username" => $username,
                "password" => $pass
            );
            $dataGet = $db->Get('account', $where);
            if (isset($dataGet) && !empty($dataGet)) {
                if ($dataGet[0]['username'] == $username) {
                    if ($dataGet[0]['password'] == $pass) {
                        createSession("data-user", $dataGet);
                        $this->view("app.home.index");
                        die();
                    } else {
                        echo 'Sai tài khoản hoặc mật khẩu';
                    }
                } else {
                    echo 'Tài khoản không tồn tại';
                }
            } else {
                echo 'Tài khoản không tồn tại';
            }

        }

    }
    public function logout()
    {
        deleteSession("data-user");
        $this->index();
    }
}

?>