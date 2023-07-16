<div class="tab-wrapper">
    <?php if ($_GET['id'] == 0) { ?>
    <div class="create">
        <form action="" id="form-add-tab" method="post" enctype="multipart/form-data">
            <div class="form-info">
                <div class="form-control">
                    <label for="c_name">Name</label>
                    <input type="text" name="c_name" id="c_name" />
                </div>
                <div class="btn-action">
                    <button type="submit" class="btn-edit">Lưu</button>
                    <a href="/quan-ly/tab" class="btn-back">Trở về</a>
                </div>
            </div>
        </form>
    </div>
    <?php } ?>

    <?php if ($_GET['id'] > 0) { ?>
    <div class="edit">
        <form action="" id="form-edit-tab" method="post" enctype="multipart/form-data">
            <div class="form-info">
                <div class="form-control">
                    <label for="e_name">Name</label>
                    <input type="text" name="e_name" id="e_name" value="<?= $valTab[0]['name'] ?>" />
                </div>
                <div class="form-control">
                    <label for="active">Active</label>
                    <select class="form-control" name="active" id="active" required>
                        <?php if ($valTab[0]['isActive'] == 1) { ?>
                        <option value="1" selected>Hiển thị</option>
                        <option value="2">Ẩn</option>
                        <?php } else { ?>
                        <option value="2" selected>Ẩn</option>
                        <option value="1">Hiển thị</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="btn-action">
                    <button type="submit" class="btn-edit">Lưu</button>
                    <a href="/quan-ly/tab" class="btn-back">Trở về</a>
                </div>
            </div>

        </form>
    </div>
    <?php } ?>
</div>