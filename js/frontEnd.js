// upperCase Q in "jQuery"
jQuery(document).ready(function () {

    // show user:
    // Delete:
    jQuery(".deleteRow").on("click", function () {
        // console.log("hi");
        // alert("hi");

        if (!confirm("آیا مایل به حذف این حساب بانکی می باشید.")) return false;

        var loader = jQuery("#wait");  // load 1
        var element = jQuery(this);

        //                data-id=""
        //               ___________
        var uID = element.data("id");
        // var uID = element.attr("data-id");

        loader.fadeIn(100); //load 2
        jQuery.ajax({
            url: objTemp.ajaxurl, // core file plugin -> wp_localize_script
            type: "POST",
            data: {
                action: 'actionURL',
                Uid: uID
            },
            success: function (response) {
                loader.fadeOut(100); //load end
                // alert(response);
                window.location.reload();
            },
            error: function () {
                alert("خطایی رخ داده است.");
            }
        });

        return false; // جایی هدایت نشه توسط تگ ا
    });

    // Change Status:
    jQuery(".ChangeStatusRow").on("click", function () {

        var loader = jQuery("#wait");  // load 1
        var element = jQuery(this);
        var uID = element.data("id");


        loader.fadeIn(100); //load 2
        jQuery.ajax({
            url: objTemp.ajaxurl, // core file plugin -> wp_localize_script
            type: "POST",
            data: {
                action: 'actionURL_ChangeStatus',
                Uid: uID
            },
            success: function (response) {
                loader.fadeOut(100); //load end
                // alert(response);
                window.location.reload();
            },
            error: function () {
                alert("خطایی رخ داده است.");
            }
        });

        return false; // جایی هدایت نشه توسط تگ ا
    });

    // Edit Cash:
    jQuery(".editCash").on("click", function () {
        var newVal = prompt("مقدار دارایی را وارد کنید.");
        if (newVal == null || isNaN(newVal) || newVal == '' || newVal < 0) return false;

        var loader = jQuery("#wait");  // load 1
        var element = jQuery(this);
        var uID = element.data("id");


        loader.fadeIn(100); //load 2
        jQuery.ajax({
            url: objTemp.ajaxurl, // core file plugin -> wp_localize_script
            type: "POST",
            data: {
                action: 'actionURL_eCash',
                Uid: uID,
                newValue: newVal
            },
            success: function (response) {
                loader.fadeOut(100); //load end
                // alert(response);
                window.location.reload();
            },
            error: function () {
                alert("خطایی رخ داده است.");
            }
        });

        return false; // جایی هدایت نشه توسط تگ ا
    });

    // Select All
    jQuery(":checkbox#selectAll").on("change", function () {
        jQuery(":checkbox").not(this).prop("checked", this.checked);
    });

    // Show input & select after selectd
    jQuery("#actSelect").on("change", function () {
        if (jQuery(this).val() == 'changeCash') {
            jQuery("input[name=\"cashForAll\"]").fadeIn(300);
        } else
            jQuery("input[name=\"cashForAll\"]").fadeOut(300);


        if (jQuery(this).val() == 'changeStatus') {
            jQuery("select[name=\"changeStatusAll\"]").fadeIn(300);
        } else
            jQuery("select[name=\"changeStatusAll\"]").fadeOut(300);
    });
});