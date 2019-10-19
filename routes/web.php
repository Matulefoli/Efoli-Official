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

Route::any('logout','HomeController@logout');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('janpran','Admin\DashboardController@login');
Route::post('janpran','Admin\DashboardController@loginpost')->name('admin.login.post');
Route::group(['prefix'=>'admin','middleware'=>['AdminCheck']], function () {
   Route::get('dashboard','Admin\DashboardController@dashboard')->name('admin.dashboard');
   Route::get('add_product','Admin\ProductController@store')->name('admin.addproduct');
   Route::post('add_product','Admin\ProductController@saveproduct')->name('admin.storeproduct');
   Route::get('product_list','Admin\ProductController@view')->name('admin.productlist');
   Route::get('edit_product/{id}','Admin\ProductController@edit')->name('edit_product');
   Route::post('delete_product','Admin\ProductController@delete')->name('delete_product');
   Route::any('prduct_image_delete/{id}','Admin\ProductController@prduct_image_delete');
   Route::get('setting','Admin\SettingController@setting')->name('admin.setting');
   Route::post('change_settings','Admin\SettingController@change_save')->name('change_settings');
   Route::post('store_meta','Admin\SettingController@store_meta')->name('store_meta');
   Route::get('gallery_dialouge','Admin\SettingController@gal')->name('gallery_dialouge');
   Route::post('gallery_dialouge','Admin\SettingController@gal_dal_save')->name('admin.store_gal_dal');
   Route::get('gal_dal_list','Admin\SettingController@gal_dal_list')->name('gal_dal_list');
   Route::get('dialouge_del/{id}','Admin\SettingController@dia_del');
   Route::get('gellary_del/{id}','Admin\SettingController@gal_del');
   Route::get('metas','Admin\SettingController@metas')->name('config');
   Route::get('AddJob','Admin\JobController@add')->name('addjob');
   Route::get('JobList','Admin\JobController@list')->name('joblist');
   Route::post('storejob','Admin\JobController@store')->name('admin.storejob');
   Route::post('deljob','Admin\JobController@delete')->name('delete_job');
   Route::get('editjob\{id}','Admin\JobController@edit')->name('edit_job');
   Route::any('job_image_delete/{id}','Admin\JobController@job_image_delete');
   Route::get('add_exam','Admin\ExamController@add')->name('addexam');
   Route::get('exams','Admin\ExamController@view')->name('exams');
   Route::post('select_question','Admin\ExamController@select_question')->name('select_question');
   Route::get('contest_setup/{id}','Admin\ExamController@contest_setup');
   Route::get('single_setup/{id}','Admin\ExamController@single_setup');
   Route::get('multipe_setup/{id}','Admin\ExamController@multipe_setup');
   Route::post('save_paper','Admin\ExamController@paper_save')->name('paper_save');
   Route::post('delques','Admin\ExamController@delete')->name('delete_ques');
   Route::get('comments','Admin\CommentController@comment')->name('comments');
   Route::post('save_comment','Admin\CommentController@comment_save')->name('save_comment');
   Route::get('comment_del/{id}','Admin\CommentController@comment_del');
   Route::get('admin_message','Admin\AdminMessageController@show')->name('admin.message');
   Route::post('send_group_email','Admin\AdminMessageController@send_group');
   Route::get('del_messagebyadmin/{id}','Admin\AdminMessageController@del_message')->name('del_messagebyadmin');
   Route::get('/mark_imp/{id}','Admin\AdminMessageController@mark_imp')->name('mark_imp');
   Route::get('/mark_ing/{id}','Admin\AdminMessageController@mark_ing')->name('mark_ing');
   Route::get('/add_team','Admin\TeamController@add_team')->name('add_team');
   Route::post('post_team','Admin\TeamController@post')->name('post.team');
   Route::get('add_team_member','Admin\TeamController@add_member')->name('add_team_member');
   Route::post('teammember','Admin\TeamController@save_member')->name('post.teammember');
   Route::get('manage_team','Admin\TeamController@manage_team')->name('manage_team');
   Route::get('current_team_view','Admin\TeamController@current_team_view')->name('current_team_view');
   Route::post('make_connection_team','Admin\TeamController@make_connection_team')->name('make_connection_team');
   Route::get('team_join_del/{id}','Admin\TeamController@team_join_del')->name('team_join_del');
   Route::get('team_admin_delete/{id}','Admin\TeamController@delete');
   

});
Route::get('contactus','ContactController@index')->name('contact_us');
Route::get('about_us','ContactController@about');
Route::post('contact_message','ContactUsController@save_message')->name('contact_message');
Route::get('thankyou','ContactUsController@thankyou');
Route::get('EfoliTeam','HomeController@team')->name('front.team');
Route::get('Efoli_career','CareerController@index')->name('efoli_career');
Route::get('SingleJobDescription/{id}','CareerController@single')->name('single_job_description');