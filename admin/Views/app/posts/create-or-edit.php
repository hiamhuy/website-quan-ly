<div class="post-wrapper">
    <?php if ($_GET['id'] == 0) { ?>
    <div class="create">
        <form action="" id="form-add-post" method="post" enctype="multipart/form-data">

            <div class="form-info">

                <div class="form-control">
                    <input type="file" name="c_thumb" id="thumb" accept="image/*,.pdf" />
                    <label id="thumb_label" for="c_thumb">choose image</label>

                    <div class="thumb"><img id="thumbpreview" src="admin/assets/post/no-image.jpg" alt=""></div>
                </div>

                <div class="form-control">
                    <label for="c_title">Tiêu đề</label>
                    <input type="text" name="c_title" id="c_title" />
                </div>

                <div class="form-control">
                    <label for="c_titlesmall">Tiêu đề nhỏ</label>
                    <input type="text" name="c_titlesmall" id="c_titlesmall" />
                </div>

                <div class="form-control">
                    <label for="c_content">Nội dung</label>
                    <textarea name="c_content" id="content"></textarea>
                </div>

                <div class="form-control">
                    <label for="type">Loại bài đăng</label>
                    <select class="form-control" name="type" id="type" required>
                        <option value="0" selected>Chọn loại bài đăng</option>
                        <?php
                            if (!empty($arrTab)) {
                                foreach ($arrTab as $arr) { ?>
                        <option value="<?= $arr['Id'] ?>"><?= $arr['name'] ?></option>
                        <?php }
                            } ?>
                    </select>
                </div>
                <div class="btn-action">
                    <button type="submit" class="btn-edit">Lưu</button>
                    <a href="/quan-ly/posts" class="btn-back">Trở về</a>
                </div>
            </div>

        </form>

    </div>
    <?php } ?>

    <?php if ($_GET['id'] > 0) { ?>
    <div class="edit">
        <form action="" id="form-edit-post" method="post" enctype="multipart/form-data">

            <div class="form-info">

                <div class="form-control">
                    <input type="file" name="e_image" id="thumb" />
                    <label id="thumb_label" for="e_image">choose image</label>
                    <div class="thumb"><img id="thumbpreview" src="admin/assets/post/<?= $valPost[0]['image'] ?>"
                            alt=""></div>
                </div>
                <div class="form-control">
                    <label for="e_title">Tiêu đề</label>
                    <input type="text" name="e_title" id="e_title" value="<?= $valPost[0]['title'] ?>" />
                </div>
                <div class="form-control">
                    <label for="e_titlesmall">Tiêu đề nhỏ</label>
                    <input type="text" name="e_titlesmall" id="e_titlesmall"
                        value="<?= $valPost[0]['titlecontent'] ?>" />
                </div>
                <div class="form-control">
                    <label for="e_content">Nội dung</label>
                    <textarea name="e_content" id="content"><?= $valPost[0]['content'] ?>"</textarea>
                </div>
                <div class="form-control">
                    <label for="e_type">Loại bài đăng</label>
                    <select class="form-control" name="e_type" id="type" required>
                        <?php
                            if (!empty($arrTab)) {
                                foreach ($arrTab as $arr) {

                                    if ($valPost[0]['type'] == $arr['Id']) { ?>
                        <option value="<?= $valPost[0]['type'] ?>" selected><?= $arr['name'] ?></option>
                        <?php } else { ?>
                        <option value="<?= $arr['Id'] ?>"><?= $arr['name'] ?></option>
                        <?php }
                                }
                            } ?>
                    </select>
                </div>
                <div class="btn-action">
                    <button type="submit" class="btn-edit">Lưu</button>
                    <a href="/quan-ly/posts" class="btn-back">Trở về</a>
                </div>

            </div>

        </form>
    </div>
    <?php } ?>
</div>