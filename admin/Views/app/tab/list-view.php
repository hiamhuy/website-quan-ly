<div class="tab-wrapper flexcolumn">
    <div class="action">
        <a href="?action=create&id=0" class="btn-add"><i class="fa-solid fa-plus"></i> Thêm</a>
    </div>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Active</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 1;
                if (!empty($arrTab)) {
                    foreach ($arrTab as $value) { ?>
                <tr>
                    <td><span class="res-head">#</span>
                        <?= $stt++ ?>
                    </td>
                    <td><span class="res-head">Name:</span>
                        <?= $value['name'] ?>
                    </td>
                    <td><span class="res-head">Active:</span>
                        <?= ($value['isActive'] == 1) ? 'Hiển thị' : 'Ẩn' ?>
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