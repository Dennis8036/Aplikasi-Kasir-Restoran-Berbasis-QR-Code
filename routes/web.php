<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Home/dashboard/', [Controller::class, 'dashboard']);
Route::get('/Home/login/', [Controller::class, 'login']);
Route::get('/Home/setting/', [Controller::class, 'setting']);
Route::get('/Home/activity/', [Controller::class, 'activity']);
Route::get('/Home/hapus_activity/{id}', [Controller::class, 'hapus_activity']);
Route::get('/Home/clear_all_activities/', [Controller::class, 'clear_all_activities']);
Route::post('/Home/aksilogin', [Controller::class, 'aksilogin']);
Route::get('/Home/logout/', [Controller::class, 'logout']);
Route::post('/Home/aksi_e_setting', [Controller::class, 'aksi_e_setting']);

Route::get('/Home/user/', [Controller::class, 'user']);
Route::get('/Home/t_user/', [Controller::class, 't_user']);
Route::post('/Home/aksi_t_user', [Controller::class, 'aksi_t_user']);
Route::get('/Home/hapus_user/{id}', [Controller::class, 'hapus_user']);
Route::post('/Home/aksi_e_user', [Controller::class, 'aksi_e_user']);

Route::get('/Home/kategori/', [Controller::class, 'kategori']);
Route::get('/Home/t_kategori/', [Controller::class, 't_kategori']);
Route::post('/Home/aksi_t_kategori', [Controller::class, 'aksi_t_kategori']);
Route::get('/Home/hapus_kategori/{id}', [Controller::class, 'hapus_kategori']);
Route::post('/Home/aksi_e_kategori', [Controller::class, 'aksi_e_kategori']);

Route::get('/Home/pesanan/', [Controller::class, 'pesanan']);
Route::get('/Home/t_pesanan/', [Controller::class, 't_pesanan']);
Route::post('/Home/aksi_t_pesanan', [Controller::class, 'aksi_t_pesanan']);
Route::get('/Home/hapus_pesanan/{id}', [Controller::class, 'hapus_pesanan']);
Route::post('/Home/aksi_e_pesanan', [Controller::class, 'aksi_e_pesanan']);

Route::get('/Home/meja/', [Controller::class, 'meja']);
Route::get('/Home/t_meja/', [Controller::class, 't_meja']);
Route::post('/Home/aksi_t_meja', [Controller::class, 'aksi_t_meja']);
Route::get('/Home/hapus_meja/{id}', [Controller::class, 'hapus_meja']);
Route::post('/Home/aksi_e_meja', [Controller::class, 'aksi_e_meja']);

Route::get('/Home/menumakan/', [Controller::class, 'menumakan']);
Route::get('/Home/t_menu/', [Controller::class, 't_menu']);
Route::post('/Home/aksi_t_menu', [Controller::class, 'aksi_t_menu']);
Route::get('/Home/hapus_menu/{id}', [Controller::class, 'hapus_menu']);
Route::post('/Home/aksi_e_menu', [Controller::class, 'aksi_e_menu']);

Route::post('/Home/resetpassword/{id}', [Controller::class, 'resetpassword']);

Route::get('/Home/profile/', [Controller::class, 'profile']);
Route::post('/Home/aksi_e_profile', [Controller::class, 'aksi_e_profile']);
Route::post('/Home/editfoto/', [Controller::class, 'editfoto']);
Route::post('/Home/deletefoto/', [Controller::class, 'deletefoto']);

Route::get('/Home/register/', [Controller::class, 'register']);
Route::post('/Home/aksi_register', [Controller::class, 'aksi_register']);

Route::get('/Home/changepassword/', [Controller::class, 'changepassword']);
Route::post('/Home/aksi_changepass', [Controller::class, 'aksi_changepass']);

Route::get('/Home/lockscreen/', [Controller::class, 'lockscreen']);
Route::post('/Home/validatePassword/', [Controller::class, 'validatePassword']);

Route::get('/Home/kamar/', [Controller::class, 'kamar']);
Route::get('/Home/t_kamar/', [Controller::class, 't_kamar']);
Route::post('/Home/aksi_t_kamar', [Controller::class, 'aksi_t_kamar']);
Route::get('/Home/hapus_kamar/{id}', [Controller::class, 'hapus_kamar']);
Route::post('/Home/aksi_e_kamar', [Controller::class, 'aksi_e_kamar']);