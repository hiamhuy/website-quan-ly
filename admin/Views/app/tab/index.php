<?php
$tab = new TabController();
$arrTab = $tab->list();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $valTab = $tab->_get($id);
}
if (isset($_GET['action'])) {
    if (isset($_GET['id'])) {
        if ($_GET['id'] == 0) {
            if (!empty($_SERVER['REQUEST_METHOD'])) {
                if (($_SERVER['REQUEST_METHOD']) === 'POST') {
                    $info = array(
                        'name' => $_POST['c_name'],
                        'isActive' => 2
                    );
                    $info = array_filter($info);
                    $tab->_create($info);
                }
            }
        } else {
            if (!empty($_SERVER['REQUEST_METHOD'])) {
                if (($_SERVER['REQUEST_METHOD']) === 'POST') {
                    $id = $_GET['id'];
                    $info = array(
                        'name' => $_POST['e_name'],
                        'isActive' => $_POST['active']
                    );
                    $info = array_filter($info);
                    $tab->_edit($info, $id);
                }
            }
        }
        if ($_GET['action'] == 'delete') {
            $id = $_GET['id'];
            $tab->_delete($id);
        }
    }
}

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

    <link rel="stylesheet" href="<?= _WEB_ROOT ?>/admin/Views/shared/sidebar/sidebar.css" />
    <link rel="stylesheet" href="admin/Views/shared/css_custom.css" />
    <link rel="stylesheet" href="admin/Views/app/tab/tab.css" />
</head>

<body>
    <div id="Tab">
        <?php
        require_once "admin/Views/shared/sidebar/sidebar.php";
        require_once "admin/Views/shared/header/header.php";

        ?>
        <main id="main">
            <div class="container">
                <h1>Tab</h1>
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
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <script src="<?= _WEB_ROOT ?>/admin/Views/shared/sidebar/sidebar.js"></script>
</body>

</html>