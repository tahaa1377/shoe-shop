$(function () {

    calcuteTotalPrice();

    $(document).on('click','.plus_m',function () {
        let control = $(this);
        let data=control.data('id');
        // alert(data);
        let parent = control.parentsUntil('.section-shadow-cart').parent();

        let price_i = parent.find(".pricec_i");
        let total_price=parent.find('.pricetotalc');
        let total_price_i=parent.find('.pricetotalc_i');

        let price_value_text=price_i.val();

        let current = parent.find('.value_m').text();

        current++;

        parent.find('.value_m').text(current);
        total_price.text(formatNumber(current*price_value_text));
        total_price_i.val(current*price_value_text);

        calcuteTotalPrice();

        $.ajax('/UpdatecartItem', {
                type: 'post',
                data:{
                    quantity:current,
                    idd:data
                }
            }
        );




    });

    $(document).on('click','.minus_m',function () {

        let control = $(this);
        let data=control.data('id');
        // alert(data);
        let parent = control.parentsUntil('.section-shadow-cart').parent();

        let price_i = parent.find(".pricec_i");
        let total_price=parent.find('.pricetotalc');
        let total_price_i=parent.find('.pricetotalc_i');

        let price_value_text=price_i.val();

        let current = parent.find('.value_m').text();

        if (current > 1){
            current--;
        }

            parent.find('.value_m').text(current);
            total_price.text(formatNumber(current*price_value_text));
            total_price_i.val(current*price_value_text);

            calcuteTotalPrice();

            $.ajax('/UpdatecartItem', {
                    type: 'post',
                    data:{
                        quantity:current,
                        idd:data
                    }
                }
            );


    });

    $(document).on('click','.trash_m',function () {

        let control = $(this);
        var result=control.data('idp');
        let parent = control.parentsUntil('.section-shadow-cart').parent();
        parent.remove();

        calcuteTotalPrice();

        $.ajax('/removecartItem', {
                type: 'post',
                data:{
                    idd:result
                }
            }
        );
    });

    $(document).on('click','#pay_error',function () {

        $('#aaleart').show('fade');

        setTimeout(function () {
            $('#aaleart').hide('fade');
        },6000);
    });

});

function calcuteTotalPrice() {
    var sum=0;
    $('.section-shadow-cart').each(function () {

        var s=$(this).find(".pricetotalc_i").val();
        //var s=$(this).find(".pricetotalc").text();
        sum+=parseInt(s);
    });


    $('#total').text('قیمت نهایی : '+ formatNumber(sum)+" تومان ");

    if (sum === 0){

        $('.updatePrice').html('<a href="/">\n' +
            '<button  type="button" class="btn btn-primary fonting">بازگشت به فروشگاه</button>\n' +
            '</a>');

        $('.updatePrice2').remove();

    }

    $.ajax('/set_price', {
            type: 'post',
            data:{
                price_s:sum
            }
        }
    );

}
function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}