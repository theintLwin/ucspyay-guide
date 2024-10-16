<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HiringController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\VacancyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [VacancyController::class, 'viewVacancy']);


Route::get('VacancyForm/{vid}', [TeacherController::class, 'vacancyForm'])->name('vacancyForm');

Route::post('insertTeacher', [TeacherController::class, 'insertTeacher'])->name('teacher#add');
Route::get('ViewTeacher/{courseName}',[TeacherController::class, 'viewTeacher'])->name('teacher#view');
Route::get('viewSubjectTr/{courseName}/{subjectName}',[TeacherController::class, 'viewSubjectTr'])->name('viewSubjectTr');
Route::get('detailTeacher/{techId}' , [TeacherController::class, 'detailTeacher'])->name('teacher#detail');
Route::get('HiringTeacher/{teacherId}', [TeacherController::class, 'hireTeacher'])->name('teacher#hire');
Route::post('insertParent', [HiringController::class, 'insertParent'])->name('parent#insert');

Route::get('teacherProfile', function(){
    return view('teacherProfile');
});
Route::get('teacher/waiting',[HiringController::class, 'ans'] );



Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::post('review/write', [ReviewController::class, 'writeReview']);
    Route::group(['middleware' => 'admin_auth'], function(){
         //Admin Part
// CRUD Course & Subject
Route::get('admin/home',[CourseController::class, 'dashboard']);
Route::get('admin/courses', [CourseController::class, 'viewCourse']);

Route::get('admin/subjects/{courseName}', [CourseController::class, 'viewSubject'])->name('admin#subject');

Route::post('admin/courseAdd',[CourseController::class, 'insertCourse'])->name('admin#insertCourse');

Route::post('admin/subjectAdd',[CourseController::class, 'insertSubject'])->name('admin#insertSubject');
Route::get('admin/subjectEdit',[CourseController::class, 'editSubject'])->name('edit#subject');
Route::get('admin/editCourse/{courseId}', [CourseController::class, 'editCourse'])->name('admin#editCourse');

Route::post('admin/updateCourse', [CourseController::class, 'courseUpdate'])->name('admin#updateCourse');

Route::get('admin/deleteCourse/{courseId}', [CourseController::class, 'deleteCourse'])->name('admin#deleteCourse');

Route::get('admin/deleteSubject/{subjectId}', [CourseController::class, 'deleteSubject'])->name('admin#deleteSubject');


//Admin Teacher CRUD

Route::get('admin/addTeacherForm', [TeacherController::class, 'addTeacherForm'])->name('admin#addTeacherForm');

Route::post('admin/addTeacher', [TeacherController::class, 'addTeacher'])->name('admin#teacher#add');

Route::get('admin/viewTeacher', [TeacherController::class, 'viewCurrentTeacher'])->name('admin#viewCurrentTeacher');

Route::get('admin/waitingTeacher', [TeacherController::class, 'viewWaitingTeacher'])->name('admin#viewWaitingTeacher');

Route::get('admin/confirmTeacher/{teacherId}', [TeacherController::class, 'confirmTeacher'])->name('admin#confirmTr');

Route::get('admin/editTeacher/{teacherId}', [TeacherController::class, 'editTeacherForm'])->name('admin#editTrForm');

Route::post('admin/updateTeacher', [TeacherController::class, 'teacherUpdate'])->name('admin#updateTeacher');
Route::post('admin/updateTeacher1', [TeacherController::class, 'teacherUpdate1'])->name('admin#waitUpdateTrForm');

Route::get('admin/deleteTeacher/{teacherId}', [TeacherController::class, 'deleteTeacher'])->name('admin#deleteTeacher');

Route::get('viewHistory/{teacherName}',[TeacherController::class, 'viewHistory'])->name('viewHistory');

Route::get('admin/teacherAvailable/{trId}',[TeacherController::class, 'availableTr'])->name('availableTr');

//Admin Parent part

Route::get('admin/viewHiringRequests', [HiringController::class, 'viewHiringRqs'])->name('admin#viewRequests');

Route::get('admin/requestConfirm/{orderId}',[HiringController::class, 'requestConfirm'])->name('admin#requestConfirm');

Route::get('admin/editHiring/{orderId}', [HiringController::class, 'editHiring'])->name('admin#editHiring');

Route::post('admin/updateHiring', [HiringController::class, 'updateHiring'])->name('parent#update');

Route::get('admin/deleteHiring/{orderId}', [HiringController::class, 'deleteHiring'])->name('parent#delete');

Route::get('admin/profile', [AuthController::class, 'admin_Profile'])->name('admin#profile');


//Vacancy Admin Part

Route::get('admin/vacancyView', [VacancyController::class, 'vacancyView'])->name('admin#vacancyView');

Route::post('admin/insertVacancy', [VacancyController::class, 'insertVacancy'])->name('admin#insertVacancy');

Route::get('admin/deleteVacancy/{id}', [VacancyController::class, 'deleteVacancy'])->name('admin#deleteVacancy');

Route::get('admin/editVacancy/{id}', [VacancyController::class, 'editVacancy'])->name('admin#editVacancy');

Route::post('admin/updateVacancy',[VacancyController::class, 'updateVacancy'])->name('admin#updateVacancy');
//Admin Review Management

Route::get('admin/showReview', [ReviewController::class, 'showReview'])->name('show#review');
Route::get('admin/showAdminReview', [ReviewController::class, 'showAdminReview'])->name('show#adminreview');
Route::get('admin/deleteReview/{id}',[ReviewController::class, 'deleteReview'])->name('delete#review');
Route::get('admin/showTrReview/{receiver}',[ReviewController::class, 'showTrReview'])->name('show#TrReview');

//Admin Teacher Register
Route::get('admin/teacher/register', [AuthController::class, 'teacherRegister']);

});

 // User Part

 Route::group(['middleware' => 'user_auth'], function(){

    Route::get('user/profile', [AuthController::class, 'user_profile'])->name('user#profile');


});
    Route::get('changePassword', [AuthController::class, 'changePassword'])->name('change#Pw');
    Route::post('change/Password', [AuthController::class, 'cgPassword'])->name('cgPassword');

    });



//login register Part

//Route::redirect('/loginPage', 'URI', 301);
Route::get('/registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
Route::get('/loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('auth#dashboard');
Route::get('user/profile/edit/{id}', [AuthController::class, 'profileEdit'])->name('profile#edit');
Route::post('profile/update', [AuthController::class, 'profile_update'])->name('profile#update');
Route::get('reviewEg', function(){
    return view('reviewEg');
});
 Route::post('review/go',[ReviewController::class, 'review'])->name('review');
// Route::post('review/go', function(){
//     return "hello";
// });
Route::get('give/review', [ReviewController::class, 'give_review'])->name('giveReview');
