<script src="./vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="./vendor/slick/slick.min.js"></script>
<script src="./js/slick.js"></script>

<script>
    /*==================================================================
    // [ Fixed Header ]*/
    // debugger;
    // var headerDesktop = $('.container-menu-desktop');
    // var wrapMenu = $('.wrap-menu-desktop');

    // if($('#header-container').length > 0) {
    //     var posWrapHeader = $('#header-container').height();
    // }
    // else {
    //     var posWrapHeader = 0;
    // }

    // $(headerDesktop).addClass('fix-menu-desktop');
    // $(wrapMenu).css('top',0); 

    // // if($(window).scrollTop() > posWrapHeader) {
    // // }  
    // // else {
    // //     $(headerDesktop).removeClass('fix-menu-desktop');
    // //     $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
    // // }

    // $(window).on('scroll',function(){
    //     if($(this).scrollTop() > posWrapHeader) {
    //         $(headerDesktop).addClass('fix-menu-desktop');
    //         $(wrapMenu).css('top',0); 
    //     }  
    //     else {
    //         $(headerDesktop).removeClass('fix-menu-desktop');
    //         $(wrapMenu).css('top',posWrapHeader - ); 
    //     } 
    // });

    $('.js-show-filter').on('click', function() {
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

        if ($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }
    });

    $('.js-show-search').on('click', function() {
        $(this).toggleClass('show-search');
        $('.panel-search').slideToggle(400);

        if ($('.js-show-filter').hasClass('show-filter')) {
            $('.js-show-filter').removeClass('show-filter');
            $('.panel-filter').slideUp(400);
        }
    });

    $('.delete_from_cart').click(function() {

        var d_id = $(this).attr('attr_id');

        $.ajax({

            type: "get",
            url: "cart.php",
            data: {
                'd_id': d_id
            },

            success: function() {
                window.location.reload();
            }
        });
    });

    $('.dec_number').click(function() {

        var id = $(this).attr('attr_id');
        var number = $(this).attr('attr_pro');

        // alert(id);
        // alert(number);
        $.ajax({

            type: "get",
            url: "cart.php",
            data: {
                'id': id,
                'add_pro': number
            },

            success: function(res) {
                window.location.reload();
            }
        });
    });

    $('.add_number').click(function() {

        var id = $(this).attr('attr_id');
        var number = $(this).attr('attr_pro');

        // alert(id);
        // alert(number);
        $.ajax({

            type: "get",
            url: "cart.php",
            data: {
                'id': id,
                'add_pro': number
            },

            success: function(res) {
                window.location.reload();
            }
        });

    });
</script>