<?php
$dataSession = getSession('data-user');

if (!empty($_SERVER['REQUEST_METHOD'])) {
    if (($_SERVER['REQUEST_METHOD']) === 'POST') {
        $account = new AccountController();
        $info = array(
            'name' => $_POST['name'],
            'avatar' => $_FILES['avatar']['name'],
            'avatar_tmp' => $_FILES['avatar']['tmp_name'],
            'new_password' => $_POST['passwordnew']
        );
        $info = array_filter($info);
        $account->editInfo($info);

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thong-tin-nguoi-dung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin/Views/shared/sidebar/sidebar.css" />
    <link rel="stylesheet" href="admin/Views/shared/css_custom.css" />
</head>

<body>
    <div id="thong-tin-nguoi-dung">
        <?php
        require_once "admin/Views/shared/sidebar/sidebar.php";
        require_once "admin/Views/shared/header/header.php";

        ?>
        <main id="main">
            <div class="container">
                <h1>Thông tin người dùng</h1>
                <div class="view-wrapper">
                    <?php if ($dataSession) { ?>
                    <form action="" id="form-thong-tin" method="post" enctype="multipart/form-data">
                        <div class="form-avatar">
                            <div class="avatar">
                                <img id="imgpreview"
                                    src="admin/assets/thumb-info/<?= (isset($dataSession[0]['avatar'])) ? $dataSession[0]['avatar'] : 'admin.png' ?>"
                                    alt="">
                            </div>
                            <div class="form-control">
                                <input type="file" name="avatar" id="avatar" accept="image/*,.pdf" disabled>
                                <label class="label-avatar" for="avatar"><i class="fa-solid fa-upload"></i>
                                    Choose a
                                    file</label>
                            </div>
                        </div>
                        <div class="form-info">
                            <div class="form-control">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" disabled
                                    value="<?= (isset($dataSession[0]['name'])) ? $dataSession[0]['name'] : "NULL" ?>">
                            </div>
                            <div class="form-control">
                                <label for="username">Username</label>
                                <input type="text" name="username" disabled id="username"
                                    value="<?= (isset($dataSession[0]['username'])) ? $dataSession[0]['username'] : "NULL" ?>">
                            </div>
                            <div class="form-control">
                                <label for="password">Password</label>
                                <div class="form-password">
                                    <div class="fPass">
                                        <input type="password" name="password" disabled id="password"
                                            value="<?= (isset($dataSession[0]['password'])) ? $dataSession[0]['password'] : "NULL" ?>">

                                        <i class="fa-regular fa-eye-slash" id="show_psw"></i>

                                    </div>
                                    <div class="change_pass">
                                        <button disabled type="button" class="btn-changepass">Đổi mật khẩu</button>
                                    </div>
                                </div>


                            </div>
                            <div class="form-control pwd-new hidden">
                                <label for="passwordnew">Password new</label>
                                <input type="text" name="passwordnew" id="username">
                            </div>
                            <!-- <div class="form-control pwd-new hidden">
                                <label for="repassword">Repassword</label>
                                <input type="text" name="repassword" id="repassword">
                            </div> -->

                            <div class="btn-action">
                                <button type="button" class="btn-edit">Chỉnh sửa</button>
                                <button type="submit" name="btn-save" class="btn-save">Lưu</button>
                                <button type="button" class="btn-close">Hủy bỏ</button>
                            </div>
                        </div>

                    </form>
                    <?php } ?>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="admin/Views/shared/sidebar/sidebar.js"></script>
    <script src="admin/Views/shared/js_custom.js"></script>
</body>

</html>