<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'FrontendController@index',
    'as' => 'index'
]);

Route::get('/post/{slug}',[
    'uses' => 'FrontendController@singlePost',
    'as' => 'post.single'
]);

Route::get('/results',[
    'uses' => 'FrontendController@search',
    'as' => 'search.results'
]);

Route::get('/category/{category_id}',[
    'uses' => 'FrontendController@categoryShow',
    'as' => 'showCategory.result'
]);


Route::post('/subscribe',[
    'uses' => 'FrontendController@subscribe',
    'as' => 'subscribe'
]);

Auth::routes();
 
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/restore',[
//     'uses' => 'PostController@restore',
//     'as' => 'posts.restore'
// ]);

Route::get('/posts/trashed',[
    'uses' => 'PostController@trashed',
    'as' => 'posts.trashed'
]);

Route::get('/restore-post/{id}',[
    'uses' => 'PostController@restore',
    'as' => 'post.restore'
]);

Route::get('/post/kill/{id}',[
    'uses' => 'PostController@kill',
    'as' => 'post.kill'
]);

Route::get('/categories',[
    'uses' => 'CategoriesController@index',
    'as' => 'category.index'
]);

Route::get('/edit-category/{category}',[
    'uses' => 'CategoriesController@edit',
    'as' => 'category.edit'
]);

Route::put('/category/update/{category}',[
    'uses' => 'CategoriesController@update',
    'as' => 'category.update'
]);

Route::delete('/category/delete/{category}',[
    'uses' => 'CategoriesController@destroy',
    'as' => 'category.destroy'
]);

Route::get('/new-create-category',[
    'uses' => 'CategoriesController@create',
    'as' => 'category.create'
]);

Route::post('/store-category',[
    'uses' => 'CategoriesController@store',
    'as' => 'category.store'
]);




Route::resource('posts','PostController');

Route::group(['middleware'=>'admin'],function(){
    Route::get('/new-user',[
        'uses' => 'UsersController@create',
        'as' => 'users.create'
        ]);

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);
    
    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);


    Route::post('/store-user',[
        'uses' => 'UsersController@store',
        'as' => 'users.store'
    ]);

    Route::get('/users/profile',[
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);
    
    Route::put('/user/profile/update',[
        'uses' => 'ProfilesController@update',
        'as' => 'profile.update'
    ]);


});

Route::get('/users',[
    'uses' => 'UsersController@index',
    'as' => 'users'
]);

Route::get('/user/admin/{id}',[
    'uses' => 'UsersController@make_admin',
    'as' => 'user.admin'
    ]);

Route::get('/user/not_admin/{id}',[
    'uses' => 'UsersController@remove_permission',
    'as' => 'user.not_admin'
    ]);



Route::get('/edit-user/{user}',[
    'uses' => 'UsersController@edit',
    'as' => 'users.edit'
]);

Route::post('/update-user',[
    'uses' => 'UsersController@update',
    'as' => 'users.update'
]);

Route::get('/user/delete/{id}',[
    'uses' => 'UsersController@destroy',
    'as' => 'user.delete'
]);




Route::get('/tags',[
    'uses' => 'TagsController@index',
    'as' => 'tag.index'
]);

Route::get('/edit-tag/{tag}',[
    'uses' => 'TagsController@edit',
    'as' => 'tag.edit'
]);

Route::put('/tag/update/{tag}',[
    'uses' => 'TagsController@update',
    'as' => 'tag.update'
]);


Route::get('/new-tag',[
    'uses' => 'TagsController@create',
    'as' => 'tag.create'
]);

Route::post('/store-tag',[
    'uses' => 'TagsController@store',
    'as' => 'tag.store'
]);

Route::delete('/tag/delete/{tag}',[
    'uses' => 'TagsController@destroy',
    'as' => 'tag.destroy'
]);



