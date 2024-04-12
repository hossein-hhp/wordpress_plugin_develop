<?php

add_action("init", "temp_function");

// NO write "public"
function temp_function()
{
?>
    <div id="myText" class="bg-dark">
        It's Working
        <?php
        global $wpdb, $table_prefix;
        $table_name = $table_prefix . "a_table_template";
        $plugin_data = $wpdb->get_results("SELECT * FROM $table_name"); // Show Data table

        foreach ($plugin_data as $key => $val) {
            echo "<br>" . ++$key . "- " . $val->FirstName. "|" . $val->LastName;
        }
        ?>
    </div>

    <style>
        #myText {
            direction: ltr;
            color: #29f;
            background-color: #000;
            position: fixed;
            left: 0;
            top: 50%;
            z-index: 1;
        }
    </style>
<?php
}
