<?php
$dataSession = getSession('data-user');
if (isset($_GET['action']) && ($_GET['action'] === 'logout' || $_GET['action'] === 'Logout')) {
    $loginController = new LoginController();
    $loginController->logout();
}
?>

<header id="header-nav">
    <div class="container">
        <div class="box-profile">
            <div class="profile">
                <div class="name">Hi,
                    <?= (isset($dataSession[0]['name'])) ? $dataSession[0]['name'] : 'Developer'; ?>
                </div>
                <div class="thumb">
                    <img src="admin/assets/thumb-info/<?= (isset($dataSession[0]['avatar'])) ? $dataSession[0]['avatar'] : 'admin.png' ?>"
                        alt="" />
                </div>
            </div>
            <ul class="action">
                <li>
                    <a href="account">
                        <i class="fa-regular fa-user"></i>
                        <span class="text">Thông tin chi tiết</span>
                    </a>
                </li>
                <li>
                    <a href="?action=logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="text">Thoát</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>