jQuery(function ($) {
    // $(".btn--load").on("click", function () {
    //     const button = $(this);
    //     button.html("Loading...");

    //     const data = {
    //         "action": "load_more",
    //         "query": button.data("param-posts"),
    //         "page": current_page,
    //         "category": button.data("category")
    //     }

    //     $.ajax({
    //         url: "/wp-admin/admin-ajax.php",
    //         // url: "/wp-admin/admin-ajax.php",
    //         data: data,
    //         type: "POST",
    //         success: function (data) {
    //             if (data) {
    //                 button.html("More news");
    //                 button.prev().prev().append(data);
    //                 current_page++;
    //                 if (current_page == button.attr("data-max-pages")) {
    //                     button.remove();
    //                 }
    //             } else {
    //                 button.remove();
    //             }
    //         }
    //     });
    // });

    var button = $('.btn--load');
    console.log(button, "button");
    let current_page = 1;

    button.click(function (event) {
        event.preventDefault();
        const data = {
            "action": "loadmore",
            "page": current_page,
            "category": button.data("category"),
        }
        $.ajax({
            type: 'POST',
            url: "/wp-admin/admin-ajax.php",
            data: data,
            beforeSend: function (xhr) {
                button.text('Loading...');
            },
            success: function (data) {
                button.html("More news");
                button.prev().prev().append(data.data.html);
                current_page += 1;
                if (current_page == button.attr("data-max-pages")) {
                    button.remove();
                }
            }
        });

    });
});