$(function () {

    $(document).on('keyup','#search_del_pro',function () {

        var update_word=$(this).val();

        if (update_word.length>0) {


            $.ajax('/del-product-res', {
                    type: 'post',
                    data: {
                        update_word: update_word
                    },
                    success: function (data) {

                        $('#res_del_pro').html(data);
                    }
                }
            );

        }

    });

    $(document).on('click','.updata-ajax-pro',function () {

        var u_id=$(this).data('updatid');

        location.href='/admmiin_pages_G/delete-product/'+u_id;


    });



});