<?php
require_once '../../controller/session.php';
openSession();
$dataSession = getSession('data-user');
?>

<header id="header-nav">
    <div class="container">
        <div class="box-profile">
            <div class="profile">
                <div class="name">Hi,
                    <?= (isset($dataSession['Name'])) ? $dataSession['Name'] : 'Developer'; ?>
                </div>
                <div class="thumb">
                    <img src="../../assets/admin.png" alt="" />
                </div>
            </div>
            <ul class="action">
                <li>
                    <a href="../app/thong-tin-chi-tiet.php">
                        <i class="fa-regular fa-user"></i>
                        <span class="text">Thông tin chi tiết</span>
                    </a>
                </li>
                <li>
                    <a href="../../controller/c_logout.php">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="text">Thoát</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>