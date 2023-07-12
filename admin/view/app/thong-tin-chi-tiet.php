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
    <link rel="stylesheet" href="../shared/sidebar/sidebar.css" />
    <link rel="stylesheet" href="../shared/css_custom.css" />
</head>

<body>
    <?php
    include '../../controller/session.php';
    openSession();
    $dataSession = getSession('data-user');
    ?>

    <div id="thong-tin-nguoi-dung">
        <?php require_once "../shared/sidebar/sidebar.php" ?>
        <?php require_once "../shared/header/header.php" ?>
        <main id="main">
            <div class="container">
                <h1>Thông tin người dùng</h1>
                <div class="view-wrapper">
                    <?php if ($dataSession) { ?>
                    <form action="../../controller/edit-info.php" id="form-thong-tin" method="post"
                        enctype="multipart/form-data">
                        <div class="form-avatar">
                            <div class="avatar">
                                <img id="imgpreview" src="../../assets/thumb-info/admin.png" alt="">
                            </div>
                            <div class="form-control">
                                <input type="file" name="avatar" id="avatar" accept="image/*,.pdf" disabled>
                                <label class="label-avatar" for="avatar"><i class="fa-solid fa-upload"></i>
                                    Choose a
                                    file</label>
                                <!-- <i class="delete-avatar fa-solid fa-xmark"></i> -->
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
    <script src="../shared/sidebar/sidebar.js"></script>
    <script src="../shared/js_custom.js"></script>
</body>

</html>