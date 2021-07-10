<?php

Route::get('/','HomeController@main_page');

Route::get('/man','HomeController@main');
Route::get('/woman','HomeController@main');
Route::get('/baby','HomeController@main');
Route::get('/sport','HomeController@main');

Route::post('/search_main_page','HomeController@search_main_page');

Route::get('/account','UserController@account');
Route::get('/cart','PaymentController@cart');
Route::post('/UpdatecartItem','PaymentController@UpdatecartItem');
Route::post('/removecartItem','PaymentController@removecartItem');
Route::post('/login','UserController@login');
Route::get('/logout','UserController@logout');
Route::post('/sign_up','UserController@sign');
Route::post('/search','HomeController@search');
Route::post('/pageination','HomeController@pageination');
Route::post('/addToCart','HomeController@addToCart');
Route::post('/loadcart','HomeController@cart');
Route::post('/deleteCart','HomeController@deleteCart');
Route::post('/select','HomeController@select');
Route::post('/like','HomeController@like');
Route::post('/taha','HomeController@taha');
Route::post('/message','MessageController@safheasli');
Route::post('/getMessages','MessageController@getMessages');
Route::post('/sendmessge','MessageController@sendmessge');
Route::post('/chat','MessageController@chat');
Route::post('/msgCount','MessageController@msgCount');
Route::post('/show_count','HomeController@show_count');
Route::post('/add_comments','CommentController@add_comment');
Route::get('/comments/{id}', 'CommentController@show_comment_and_product');

Route::get('/product/{name}', 'HomeController@product_feature');

Route::get('/resetpass', 'UserController@resetpass');

Route::post('/ajax_rest_password', 'UserController@ajax_rest_password');
Route::post('/send_forget_email', 'UserController@send_forget_email');

Route::post('/cheack_reset_pass', 'UserController@cheack_reset_pass');

Route::get('/bank', [
    'uses' => 'BankController@bank',
    'as' => 'bank'
]);
Route::post('/set_price','BankController@set_prices');

Route::get('/takmil_kharid', [
    'uses' => 'BankController@takmil_kharid',
    'as' => 'takmil_kharid'
]);

Route::get('/changepass/{code?}', 'UserController@changepass');


Route::get('/admmiin_pages_G', [
    'uses' => 'AdminController@admmiin_pages_G',
    'as' => 'admin.page'
]);


Route::get('/admmiin_pages_G/add-new-product', [
    'uses' => 'AdminController@add_new_product',
    'as' => 'add.new.product'
]);

Route::post('/admmiin_pages_G/add_new_product_form', [
    'uses' => 'AdminController@add_new_product_form',
    'as' => 'add.new.product.form'
]);

Route::get('/admmiin_pages_G/update-product/{id?}', [
    'uses' => 'AdminController@update_product',
    'as' => 'update.product'
]);

Route::get('/admmiin_pages_G/delete-product/{id?}', [
    'uses' => 'AdminController@delete_product',
    'as' => 'delete.product'
]);

Route::get('/admmiin_pages_G/comments-list', [
    'uses' => 'AdminController@comments_list'
]);

Route::get('/admmiin_pages_G/upload-image', [
    'uses' => 'AdminController@upload_image'
]);

Route::get('/admmiin_pages_G/users-list', [
    'uses' => 'AdminController@users_list'
]);

Route::post('/admmiin_pages_G/upload_image_form', [
    'uses' => 'AdminController@upload_image_form',
    'as' => 'upload.image.form'
]);

Route::post('/update-product-res', 'AdminController@update_product_res');
Route::post('/del-product-res', 'AdminController@del_product_res');


Route::post('/admmiin_pages_G/update-product-form', [
    'uses' => 'AdminController@update_product_form',
    'as' => 'update.product.form'
]);


Route::post('/comment-lunch', 'AdminController@comment_lunch');
Route::post('/comment-remove', 'AdminController@comment_remove');



Route::post('/carting', 'HomeController@carting');

Route::post('/count_cart_basket', 'HomeController@count_cart_basket');

Route::post('/loadcart_main','HomeController@cart_main');

Route::get('/edit-product/{num}','HomeController@edit_product_cart');
