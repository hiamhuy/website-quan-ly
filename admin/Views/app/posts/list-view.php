<div class="post-wrapper flexcolumn">
    <div class="action">
        <a href="?action=create&id=0" class="btn-add"><i class="fa-solid fa-plus"></i> Thêm</a>
    </div>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width:50px">#</th>
                    <th scope="col" style="width:100px">Ảnh bìa</th>
                    <th scope="col" style="width:200px">Tiêu đề</th>
                    <th scope="col">Nội dung chi tiết</th>
                    <th scope="col" style="width:100px">Loại bài đăng</th>
                    <th scope="col" style="width:70px">Ngày đăng</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;
                if (!empty($arrPost)) {
                    foreach ($arrPost as $value) { ?>
                <tr>
                    <td><span class="res-head">#</span>
                        <?= $stt++ ?>
                    </td>
                    <td style="width:100px"><span class="res-head">Ảnh bìa:</span>
                        <img src="admin/assets/post/<?= $value['image'] ?>" alt="">
                    </td>
                    <td style="width:200px"><span class="res-head">Tiêu đề:</span>
                        <?= $value['title'] ?>
                    </td>
                    <td><span class="res-head">Nội dung chi tiết:</span>
                        <?= substr($value['content'], 0, 100) . "..." ?>
                    </td>
                    <td style="width:100px"><span class="res-head">Loại bài đăng:</span>
                        <?php foreach ($arrTab as $tab) {
                                    if ($value['type'] == $tab['Id']) {
                                        echo $tab['name'];

                                    }
                                }
                                ?>
                    </td>
                    <td style="width:70px"><span class="res-head">Ngày đăng:</span>
                        <?= $value['postdate'] ?>
                    </td>

                    <td class="action">
                        <a href="?action=edit&id=<?= $value['id'] ?>">Edit</a>
                        <a href="?action=delete&id=<?= $value['id'] ?>">Delete</a>
                    </td>
                </tr>

                <?php }
                } else { ?>
                Không có dữ liệu
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>