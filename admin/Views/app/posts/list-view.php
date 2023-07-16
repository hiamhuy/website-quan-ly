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
                    <th scope="col" style="width:200px">Nội dung chi tiết</th>
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
                        <?= $value['image'] ?>
                    </td>
                    <td style="width:200px"></td><span class="res-head">Tiêu đề:</span>
                    <?= $value['title'] ?>
                    </td>
                    <td style="width:200px"><span class="res-head">Nội dung chi tiết:</span>
                        <?= $value['content'] ?>
                    </td>
                    <td style="width:100px"><span class="res-head">Loại bài đăng:</span>
                        <?= $value['type'] ?>
                    </td>
                    <td style="width:70px"><span class="res-head">Ngày đăng:</span>
                        <?= $value['postdate'] ?>
                    </td>

                    <td class="action">
                        <a href="?action=edit&id=<?= $value['Id'] ?>">Edit</a>
                        <a href="?action=delete&id=<?= $value['Id'] ?>">Delete</a>
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