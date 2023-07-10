<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../admin/view/shared/sidebar/sidebar.css" />
</head>

<body>
    <div id="dashboard-admin">
        <?php require_once "../admin/view/shared/sidebar/sidebar.php" ?>
        <?php require_once "../admin/view/shared/header/header.php" ?>
        <?php require_once "../admin/view/app/home.php" ?>
    </div>

    <script src="../admin/view/shared/sidebar/sidebar.js"></script>
</body>

</html>