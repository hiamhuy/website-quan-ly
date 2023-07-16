<?php
$post = new PostsController();
$arrPost = $post->list();
include 'admin/Controllers/TabController.php';
$tab = new TabController();
$arrTab = $tab->list();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="<?= _WEB_ROOT ?>/admin/Views/shared/sidebar/sidebar.css" />
    <link rel="stylesheet" href="admin/Views/shared/css_custom.css" />
    <link rel="stylesheet" href="admin/Views/app/posts/posts.css" />

</head>

<body>
    <div id="post">
        <?php
        require_once "admin/Views/shared/sidebar/sidebar.php";
        require_once "admin/Views/shared/header/header.php";

        ?>
        <main id="main">
            <div class="container">
                <h1>Posts content</h1>
                <div class="view-wrapper">
                    <?php if (!isset($_GET['id']) || (isset($_GET['action']) && $_GET['action'] == 'delete')) { ?>
                    <div class="list-view">
                        <?php require_once 'list-view.php' ?>
                    </div>
                    <?php } ?>

                    <?php if ((isset($_GET['id']) && $_GET['id'] >= 0) && (isset($_GET['action']) && $_GET['action'] != 'delete')) { ?>
                    <div>
                        <?php require_once 'create-or-edit.php' ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="<?= _WEB_ROOT ?>/admin/Views/shared/sidebar/sidebar.js"></script>
    <script>
    CKEDITOR.replace('content');
    //file
    const label = document.querySelector("#thumb_label");
    const file = document.getElementById("thumb");
    const image_preview = document.querySelector("#thumbpreview");
    file.addEventListener("change", (e) => {
        label.innerHTML = `choose image`;
        if (e.target.files && e.target.files.length > 0) {
            const getSizeImage = e.target.files[0].size;
            if (getSizeImage > 1024 * 1024) {
                alert("Chỉ cho phép tải tệp tin nhỏ hơn 1MB");
            } else {
                var nameFile = e.target.files[0].name;
                label.innerHTML = `${nameFile}`;
                const reader = new FileReader();
                reader.addEventListener("load", (e) => {
                    image_preview.src = e.target.result;
                });
                reader.readAsDataURL(e.target.files[0]);
            }
        }
        //  else {
        //     getDataUser(function(data) {
        //         if (data[0]["avatar"] != null) {
        //             let avatarSession = data[0]["avatar"];
        //             image_preview.src = `./admin/assets/thumb-info/${avatarSession}`;
        //         } else {
        //             image_preview.src = "./admin/assets/thumb-info/admin.png";
        //         }
        //     });
        // }
    });
    </script>
</body>

</html>