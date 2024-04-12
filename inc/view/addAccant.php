<div class="wrap">
    <h1>مدیریت افزونه حسین حسین پور</h1>
    <p>این اولین افزونه نوشته شده توسط حسین حسین پور می باشد.</p>

    <?php   // die();
    if (isset($_REQUEST['submitName'])) {
        // print_r($_REQUEST);
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : null;
        $cash = isset($_POST['cash']) ? $_POST['cash'] : null;
        $status = isset($_POST['status']) ? $_POST['status'] : null;
        if (empty($name) || empty($lastName) || empty($cash) || $cash < 0) { ?>
            <div id="setting-error-settings_updated" class="notice notice-error settings-error is-dismissible">
                <p><strong>اطلاعات وارد شده صحیح نمی باشد!</strong></p>
            </div>
        <?php

        } else {
            global $wpdb, $table_prefix;
            $table_name = $table_prefix . "a_table_template";

            $wpdb->insert($table_name, array("FirstName" => $_REQUEST['name'], "LastName" => $_REQUEST['lastName'])); // default data in DataBase
        ?>

            <div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible">
                <p><strong>افزودن مشتری موفقيت آميز بود.</strong></p>
            </div>

    <?php } //end else 
    }
    ?>

    <hr>

    <fieldset>
        <legend>فرم افزودن مشتری</legend>

        <form action="" method="post">
            <table>
                <tr>
                    <td>نام:</td>
                    <td>
                        <input name="name" type="text" required />
                    </td>
                </tr>
                <tr>
                    <td>نام خانوادگی:</td>
                    <td>
                        <input name="lastName" type="text" required />
                    </td>
                </tr>
                <tr>
                    <td>دارایی:</td>
                    <td>
                        <input name="cash" type="number" min=0 required />
                    </td>
                </tr>
                <tr>
                    <td>وضعیت حساب:</td>
                    <td>
                        <select name="status" type="text" required>
                            <option value="noSelect" disabled selected="selected">وضعیت را تایین کنید</option>
                            <option value="0">غیر فعال</option>
                            <option value="1">فعال</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submitName" class="button button-primary" value="ارسال">
                    </td>
                </tr>
            </table>
        </form>

    </fieldset>
</div>

<hr>

<?php if (current_user_can("level_1")) {
    echo "<pre>" . "سطوح دسترسی: <hr/>";
    print_r(wp_get_current_user());
    echo "</pre>";
} ?>