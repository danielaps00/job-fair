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

// Route::get('/', function () {
//     return view('welcome');
// });

//visitor
Route::get('/', 'VisitorController@Index');
Route::get('/apply/{id}', 'VisitorController@Apply');
Route::get('/detail/{id}', 'VisitorController@Detail'); 
 
//login dan register admin 
Route::get('/home_admin', 'AdminController@index');
Route::get('/login', 'AdminController@login');
Route::post('/loginPost', 'AdminController@loginPost');
Route::get('/register', 'AdminController@register');
Route::post('/registerPost', 'AdminController@registerPost');
Route::get('/logout', 'AdminController@logout');

//crud companies
Route::get('/companies', 'DashboardController@Companies');
Route::post('/add/companies', 'DashboardController@CompaniesAdd');
Route::get('/delete/companies/{id}', 'DashboardController@CompaniesDelete');
Route::get('/edit/companies/{id}', 'DashboardController@CompaniesEdit');
Route::post('/update/companies/{id}', 'DashboardController@CompaniesUpdate');

//crud vacancies
Route::get('/vacancies', 'DashboardController@Vacancies');
Route::post('/add/vacancies', 'DashboardController@VacanciesAdd');
Route::get('/delete/vacancies/{id}', 'DashboardController@VacanciesDelete');
Route::get('/edit/vacancies/{id}', 'DashboardController@VacanciesEdit');
Route::post('/update/vacancies/{id}', 'DashboardController@VacanciesUpdate'); 

//crud applicant 
Route::get('/applicant', 'DashboardController@Applicant');
Route::post('/add/applicant', 'DashboardController@ApplicantAdd');
Route::get('/delete/applicant/{id}', 'DashboardController@ApplicantDelete');
Route::get('/edit/applicant/{id}', 'DashboardController@ApplicantEdit');
Route::post('/update/applicant/{id}', 'DashboardController@ApplicantUpdate');

//crud banner
Route::get('/banner', 'DashboardController@Banner');
Route::post('/add/banner', 'DashboardController@BannerAdd');
Route::get('/delete/banner/{id}', 'DashboardController@BannerDelete');
Route::get('/edit/banner/{id}', 'DashboardController@BannerEdit');
Route::post('/update/banner/{id}', 'DashboardController@BannerUpdate');

//cari data table 
Route::get('/cari/data', 'DashboardController@cari');
