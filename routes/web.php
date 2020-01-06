<?php



Route::get('/','UserController@viewcategories');
Route::get('/view-product/{id}','UserController@viewproduct');
//Route::get('/search','UserController@search');
//Route::match(['get','post'],'/view-product/{id}','UserController@viewproduct');



Auth::routes();

Route::group(['middleware'=>['auth']],function()
{
Route::get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('/admin/settings','AdminController@settings');
Route::get('/admin/check-pwd','AdminController@chkpassword');
Route::match(['get','post'],'/admin/update-pwd','AdminController@updatepassword');
Route::get('/admin/add-product','admin\ProductController@chks')->name('category-tree-view');

Route::get('/admin/add-category','admin\CategoryController@chks')->name('category-tree-view');

Route::get('/admin/add-category','admin\CategoryController@manageCategory')->name('category-tree-view');
Route::post('/admin/add-category','admin\CategoryController@addCategory')->name('add.category');
ROute::match(['get','post'],'/admin/edit-category/{id}','admin\CategoryController@editcategory');
Route::match(['get','post'],'/admin/delete-category/{id}','admin\CategoryController@deleteCategory');
Route::get('/admin/view-category','admin\CategoryController@viewCategory');
//Route::match(['get','post'],'/admin/add-category','admin\CategoryController@addCategory');

Route::match(['get','post'],'/admin/add-product','admin\ProductController@addproduct');
ROute::match(['get','post'],'/admin/edit-product/{id}','admin\ProductController@editproduct');

Route::get('/admin/view-product','admin\ProductController@viewproduct');
Route::match(['get','post'],'/admin/delete-product/{id}','admin\ProductController@deleteproduct');

Route::match(['get','post'],'/admin/add-user','AdminController@create');
Route::get('/logout','AdminController@logout');

});
Route::get('/home', 'HomeController@index')->name('home');
