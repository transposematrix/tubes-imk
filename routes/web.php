<?php

use Illuminate\Support\Facades\Route;

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



use App\Http\Controllers\indexController;
route::get('/', [indexController::class, 'index'])->name('/');


use App\Http\Controllers\registrationController;
route::get('/registration', [registrationController::class, 'index'])->name('registration');


Auth::routes();
Route::get('logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\HomeController;
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/halamanuser',[HomeController::class, 'index'])->name('halamanuser');

Route::group(['middleware'=>['auth', 'levelAdmin:ketua']],function(){
    Route::get('halaman1',[HomeController::class, 'halamanketua'])->name('ketua-dashboard');
});
Route::group(['middleware'=>['auth', 'levelAdmin:sekretaris']],function(){
    Route::get('halaman2', [HomeController::class, 'halamansekretaris'])->name('sekretaris-dashboard');
});
Route::group(['middleware'=>['auth', 'levelAdmin:bendahara']],function(){
    Route::get('halaman3', [HomeController::class, 'halamanbendahara'])->name('bendahara-dashboard');
});
Route::group(['middleware'=>['auth', 'levelAdmin:master']],function(){
    Route::get('halaman4', [HomeController::class, 'halamanmaster'])->name('master-dashboard');
});

Route::get('/article', function () {
    return view('admin.article');
});

Route::get('/active_member', function () {
    return view('admin.active-member');
});
Route::get('/schedule', function(){
    return view('admin.schedule');
});

use App\Http\Controllers\ArticleController;
Route::get('all_article', [ArticleController::class, 'list'])->name('all_article');
Route::get('tambah_article', [ArticleController::class, 'create'])->name('tambah_article');
Route::post('tambah', [ArticleController::class, 'store'])->name('tambah');
Route::get('/article/hapus/{id}', [ArticleController::class, 'destroy']);
Route::get('/article/edit/{id}', [ArticleController::class, 'edit']);
Route::put('/article/update/{id}', [ArticleController::class, 'update']);

route::get('/article', [ArticleController::class, 'index'])->name('article');
route::get('/articleDetails/{id}', [ArticleController::class, 'articles'])->name('articlePost');
Route::get('/search', [ArticleController::class, 'search'])->name('search');
Route::post('/article/{article}/comment', [commentController::class, 'store'])->name('article.comment.store');

use App\Http\Controllers\MatterController;
Route::get('addmatter', [MatterController::class, 'create'])->name('addmatter');
Route::post('tambah-matter', [MatterController::class, 'store'])->name('tambah-matter');
Route::get('all_matter', [MatterController::class, 'list']);
Route::get('/download/{file}',[MatterController::class,'download']);
Route::get('/matters/hapus/{id}', [MatterController::class, 'destroy']);
Route::get('/matters/edit/{id}', [MatterController::class, 'edit']);
Route::put('/matters/update/{id}', [MatterController::class, 'update']);
route::get('/matters', [MatterController::class, 'default'])->name('matters');
route::get('/filesView', [MatterController::class, 'index'])->name('filesView');
route::get('/files/{id}', [MatterController::class, 'show'])->name('filesNumber');

use App\Http\Controllers\AnnouncementController;
Route::get('tambah_pengumuman', [AnnouncementController::class, 'create']);
Route::post('addpengumuman', [AnnouncementController::class, 'store'])->name('addpengumuman');
Route::get('announcement', [AnnouncementController::class, 'index']);
Route::get('/announcement/edit/{id}', [AnnouncementController::class, 'edit']);
Route::put('/announcement/update/{id}', [AnnouncementController::class, 'update']);
Route::get('/announcement/hapus/{id}', [AnnouncementController::class, 'destroy']);
use App\Http\Controllers\EventController;
Route::get('tambah-event', [EventController::class, 'create']);
Route::post('addevent', [EventController::class, 'store'])->name('addevent');
Route::get('event', [EventController::class, 'index']);
Route::get('/event/edit/{id}', [EventController::class, 'edit']);
Route::put('/event/update/{id}', [EventController::class, 'update']);
Route::get('/event/hapus/{id}', [EventController::class, 'destroy']);
route::get('/eventDetail', [eventDetailController::class, 'list'])->name('eventDetail');
use App\Http\Controllers\LetterController;
Route::get('new-letter', [LetterController::class, 'create']);
Route::post('addletter', [LetterController::class, 'store'])->name('addletter');
Route::get('letter_in', [LetterController::class, 'index']);
Route::get('/letter/download/{file}',[LetterController::class,'download']);
Route::get('/letter/edit/{id}', [LetterController::class, 'edit']);
Route::put('/letter/update/{id}', [LetterController::class, 'update']);
Route::get('/letter/hapus/{id}', [LetterController::class, 'destroy']);
//Letter-out
use App\Http\Controllers\LetteroutController;
Route::get('new-letter-out', [LetteroutController::class, 'create']);
Route::post('add_surat', [LetteroutController::class, 'store'])->name('add_surat');
Route::get('letter_out', [LetteroutController::class, 'index']);
Route::get('/letter_out/download/{file}',[LetteroutController::class,'download']);
Route::get('/letter_out/edit/{id}', [LetteroutController::class, 'edit']);
Route::put('/letter_out/update/{id}', [LetteroutController::class, 'update']);
Route::get('/letter_out/hapus/{id}', [LetteroutController::class, 'destroy']);
use App\Http\Controllers\ReportController;
Route::get('new-report', [ReportController::class, 'create']);
Route::post('add_report', [ReportController::class, 'store'])->name('add_report');
Route::get('reports', [ReportController::class, 'index']);
Route::get('/report/download/{file}',[ReportController::class,'download']);
Route::get('/report/edit/{id}', [ReportController::class, 'edit']);
Route::put('/report/update/{id}', [ReportController::class, 'update']);
Route::get('/report/hapus/{id}', [ReportController::class, 'destroy']);
use App\Http\Controllers\UserController;
Route::post('add_member', [UserController::class, 'store'])->name('add_member');
Route::get('active_member', [UserController::class, 'list']);
Route::get('alumnee', [UserController::class, 'alumnee']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/hapus/{id}', [UserController::class, 'destroy']);
Route::get('users', [UserController::class, 'create']);
Route::put('/admin/update/{id}', [UserController::class, 'updateAdmin']);
Route::post('add_admin', [UserController::class, 'storeAdmin'])->name('add_admin');

use App\Http\Controllers\GalleryController;
Route::get('regulartraining', [GalleryController::class, 'list']);
Route::post('add_rg', [GalleryController::class, 'store'])->name('add_rg');
Route::put('/rg/update/{id}', [GalleryController::class, 'update']);
Route::get('/rg/hapus/{id}', [GalleryController::class, 'destroy']);
route::get('/regularTraining&Gathering', [GalleryController::class, 'index'])->name('regularTraining&Gathering');

use App\Http\Controllers\qnaController;
Route::get('qna', [qnaController::class, 'list']);
Route::post('add_qna', [qnaController::class, 'store'])->name('add_qna');
Route::get('/qna/edit/{id}', [qnaController::class, 'edit']);
Route::put('/qna/update/{id}', [qnaController::class, 'update']);
Route::get('/qna/hapus/{id}', [qnaController::class, 'destroy']);
route::get('/FAQ', [qnaController::class, 'index'])->name('FAQ');
use App\Http\Controllers\absensiController;
Route::get('absensi', [absensiController::class, 'index']);
Route::post('add_absen', [absensiController::class, 'store'])->name('add_absen');
Route::put('/absensi/update/{id}', [absensiController::class, 'update']);
Route::get('/absensi-user', [absensiController::class, 'list']);
Route::put('/user/absensi/update/{id}', [absensiController::class, 'userUpdate']);
Route::get('/absensi/show/{id}', [absensiController::class, 'show']);
use App\Http\Controllers\taskController;
Route::get('task_admin', [taskController::class, 'index']);
Route::post('add_task', [taskController::class, 'store'])->name('add_task');
Route::get('/task/show/{id}', [taskController::class, 'show']);
Route::get('/task/download/{file}',[taskController::class,'download']);
Route::get('/task-user', [taskController::class, 'list']);
Route::get('/task_user/edit/{id}', [taskController::class, 'edit']);
Route::put('/task_user/update/{id}', [taskController::class, 'update'])->name('submit-task');
use App\Http\Controllers\OrganizerController;
Route::get('/structure', [OrganizerController::class, 'list']);
Route::post('add_organizer', [OrganizerController::class, 'store'])->name('add_organizer');
route::get('/organizationStructure', [OrganizerController::class, 'index'])->name('organizationStructure');
use App\Http\Controllers\achievementController;
route::get('/achievement', [achievementController::class, 'index'])->name('achievement');
use App\Http\Controllers\afterGlowController;
route::get('/afterGlow', [afterGlowController::class, 'index'])->name('afterGlow');
use App\Http\Controllers\commentController;
Route::get('/comment', [commentController::class, 'index']);
