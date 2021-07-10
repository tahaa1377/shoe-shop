<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'stripe/*',
        '/search',
        '/select',
        '/like',
        '/taha',
        '/loadcart',
        '/addToCart',
        '/deleteCart',
        '/UpdatecartItem',
        '/removecartItem',
        '/pageination',
        '/message',
        '/getMessages',
        '/sendmessge',
        '/chat',
        '/msgCount',
        '/add_comments',
        '/set_price',
        '/show_count',
        '/ajax_rest_password',
        '/send_forget_email',
        '/update-product-res',
        '/comment-lunch',
        '/comment-remove',
        '/search_main_page',
        '/count_cart_basket',
        '/loadcart_main',
        '/del-product-res',
    ];
}
