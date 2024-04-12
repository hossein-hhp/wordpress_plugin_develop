<?php
// برای هر اجکس یک ادـاکشن باید باشه:
add_action("wp_ajax_actionURL", "funcMY");
add_action("wp_ajax_actionURL_ChangeStatus", "funcChangeStatus");
add_action("wp_ajax_actionURL_eCash", "funceCash");


function funcMY()
{
    $Uid = $_POST['Uid'];
    // echo $Uid; die();

    global $wpdb, $table_prefix;
    // $resulte = $wpdb->query("DELETE FROM {$table_prefix}a_table_template WHERE id={$Uid} LIMIT 1");
    $resulte = 1;
    if ($resulte) die("موفقیت امیز بود");
    else die("ریدی . . .");
}
function funcChangeStatus()
{
    $Uid = $_POST['Uid'];
    global $wpdb, $table_prefix;

    //                                                                  _____________________
    $resulte = $wpdb->query("UPDATE {$table_prefix}a_table_template SET `status`=NOT `status` WHERE id={$Uid} LIMIT 1");
    if ($resulte) die("موفقیت امیز بود");
    else die("ریدی . . .");
}
function funceCash()
{
    $Uid = $_POST['Uid'];
    $new = $_POST['newValue'];
    global $wpdb, $table_prefix;

    $resulte = $wpdb->query("UPDATE {$table_prefix}a_table_template SET `cash`={$new} WHERE id={$Uid} LIMIT 1");
    if ($resulte) die("موفقیت امیز بود");
    else die("ریدی . . .");
}
