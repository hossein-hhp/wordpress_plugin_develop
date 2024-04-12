<?php
add_action("admin_menu", "add_menu_functiond");

function add_menu_functiond()
{
    // Menu Items:
    add_menu_page(
        null,   // title
        "تنظیمات افزونه من",    // item in list menu
        "read",   // دسترسی
        "PluginHHP",    // URL
        "showFrom_DB",    // function
        "dashicons-money-alt",  // Icon
        1
    );
    $indexItem = add_submenu_page(
        "PluginHHP",
        "اولین افزونه حسین حسین پور",
        "مدیریت",
        "read",
        "PluginHHP" //  URL parent: first sub menu->parent menu
        // No function
    );
    $FirstItem = add_submenu_page(
        "PluginHHP",
        "عنوان صفحه زیر منو",
        "افزودن",
        "read",
        "subMenu_1", // self URL
        "func_show" //  Has function
    );
    $secondItem = add_submenu_page(
        "PluginHHP",
        "عنوان صفحه زیر منو",
        "عنوان زیر منو ۲",
        "read",
        "subMenu_2", // self URL
        "subMenuFunc_2" //  Has function
    );

    // Functions:
    function showFrom_DB()    // function show in menu admin
    {
        require_once HHP_VEIW_DIR . "showUser.php";
        // require_once "view/showUser.php";
    }

    function func_show()    // function show in menu admin
    {
        require_once HHP_VEIW_DIR."addAccant.php";
    }

    function subMenuFunc_2()
    { ?>
        <div class="wrap">
            <h3>زیر منو شماره دو</h3>
        </div>
<?php }

    // Css Links:
    add_action("load-{$indexItem}", "addLinks"); // Insert Css Link - فقط زمانی که اون صفحه لود شد
    add_action("load-{$secondItem}", "addLinks"); // Insert Css Link - فقط زمانی که اون صفحه لود شد

} // End Plugin Menu


// CSS:
function addLinks()
{
    // bootstrap:
    wp_register_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"); // آمادش می کنه
    wp_enqueue_style("bootstrap"); // اجراش می کنه
    
    // css:
    wp_register_style("ID_Style", HHP_CSS_URL . "pluginStyle.css"); // آمادش می کنه
    wp_enqueue_style("ID_Style"); // اجراش می کنه

    // fa icon:
    // wp_register_script( "fa_icons_HHP", "https://kit.fontawesome.com/922a19171a.js" , array() );
    wp_register_script("fa_icons_HHP", "https://kit.fontawesome.com/922a19171a.js");
    wp_enqueue_script("fa_icons_HHP"); // اجراش می کنه

    // js & jquery
    wp_register_script("ajax_HHP", HHP_JS_URL . "frontEnd.js", array("jquery"));
    wp_localize_script("ajax_HHP", "objTemp", array('ajaxurl' => admin_url("admin-ajax.php"))); //For Ajax
    wp_enqueue_script("ajax_HHP"); // اجراش می کنه
}
