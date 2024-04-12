<div class="wrap">
    <h1>نمایش محتوا دیتابیس: </h1>
    <?php if (current_user_can("level_1")) :
        global $wpdb, $table_prefix;

        // for action group
        $selector = $_POST['selected'];
        if (isset($_POST) && !empty($_POST) && isset($selector) && !empty($selector)) {
            print_r($_REQUEST);

            if ($_POST['actionForAll'] == 'changeCash') {
                $newCash = $_POST['cashForAll'];
                if (!intval($newCash));
                else
                    foreach ($selector as $item) {
                        $wpdb->query("UPDATE {$table_prefix}a_table_template SET `cash`={$newCash} WHERE id={$item} LIMIT 1");
                    }
            }

            if ($_POST['actionForAll'] == 'delete') {
                foreach ($selector as $item) {
                    $wpdb->query("DELETE FROM {$table_prefix}a_table_template WHERE id={$item} LIMIT 1");
                }
            }

            if ($_POST['actionForAll'] == 'changeStatus') {
                $newStatus = $_POST['changeStatusAll'];
                if (($newStatus == 0 || $newStatus == 1))
                    foreach ($selector as $item) {
                        $wpdb->query("UPDATE {$table_prefix}a_table_template SET `status`={$newStatus} WHERE id={$item} LIMIT 1");
                    }
            }
        }

        // for show
        $rows_DB = $wpdb->get_results("SELECT * FROM {$table_prefix}a_table_template");
        if (count($rows_DB)) {
    ?>
            <div id="wait">در حال پردازش . . .</div>
            <form action="" method="post">
                <div class="d-flex my-2">
                    <label class="d-flex align-items-center">کار های دسته جمعی:</label>
                    <select name="actionForAll" id="actSelect">
                        <option value="noAct" disabled selected="selected">فعالیت خود را انتخاب کنید</option>
                        <option value="delete">حذف</option>
                        <option value="changeCash">ویرایش دارایی</option>
                        <option value="changeStatus">تغییر وضعیت</option>
                    </select>
                    <input type="number" name="cashForAll" class="mx-1" min=0 placeholder="دارایی را وارد کنید.">
                    <select name="changeStatusAll" class="mx-1">
                        <option value="noCnage" disabled selected="selected">وضعیت را تایین کنید</option>
                        <option value="0">غیر فعال</option>
                        <option value="1">فعال</option>
                    </select>
                    <input type="submit" class="button button-primary p-1 mx-1" value="اعمال نمودن">
                </div>

                <table class="widefat table table-striped table-hover">
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>دارایی</th>
                        <th>وضعیت حساب</th>
                        <th>ابزار‌ها</th>
                    </tr>
                    <?php foreach ($rows_DB as $row) : ?>
                        <tr>
                            <td><input type="checkbox" name="selected[]" value="<?php echo $row->id; ?>"></td>
                            <td><?php echo $row->FirstName; ?></td>
                            <td><?php echo $row->LastName; ?></td>
                            <td><?php echo number_format($row->cash) . " تومان"; ?></td>
                            <td><?php echo statusName($row->status); ?></td>
                            <td>
                                <a href="#" title="حذف حساب" class="deleteRow" data-id="<?php echo $row->id; ?>">
                                    <i class="fa fa-trash-o"></i>
                                </a> |
                                <a href="#" title="تغییر وضعیت حساب" class="ChangeStatusRow" data-id="<?php echo $row->id; ?>">
                                    <i class="fa fa-refresh"></i>
                                </a> |
                                <a href="#" title="ویرایش دارایی" class="editCash" data-id="<?php echo $row->id; ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </form>
    <?php
        } else {
            echo "is Empty . . .";
        }
    endif;
    ?>
</div>