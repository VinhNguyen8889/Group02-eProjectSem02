<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AdminUserController;
use App\HTTP\Controllers\FEAdmin\InformationController;
use App\HTTP\Controllers\FEAdmin\ServiceController;
use App\HTTP\Controllers\FEAdmin\ProjectController;
use App\HTTP\Controllers\FEAdmin\CourseController;
use App\HTTP\Controllers\FEAdmin\HomePageController;
use App\HTTP\Controllers\FEAdmin\CLientReviewController;
use App\HTTP\Controllers\FEAdmin\FooterController;
use App\HTTP\Controllers\FEAdmin\ChartController;

use App\HTTP\Controllers\School\Setup\StudentClassController;
use App\HTTP\Controllers\School\Setup\StudentYearController;
use App\HTTP\Controllers\School\Setup\StudentGroupController;
use App\HTTP\Controllers\School\Setup\StudentShiftController;
use App\HTTP\Controllers\School\Setup\FeeCategoryController;
use App\HTTP\Controllers\School\Setup\FeeAmountController;
use App\Http\Controllers\School\Setup\AssignSubjectController;
use App\Http\Controllers\School\Setup\ExamTypeController;
use App\Http\Controllers\School\Setup\JobTitleController;
use App\Http\Controllers\School\Setup\SchoolSubjectController;
use App\Http\Controllers\School\Student\StudentRegController;


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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Logout
Route::get('/logout',[AdminUserController::class, 'logout'])->name('admin.logout');

//User Profile
Route::prefix('admin')->group(function(){
    Route::get('/user/profile',[AdminUserController::class, 'UserProfile'])->name('user.profile');
    Route::get('/user/profile/edit',[AdminUserController::class, 'UserProfileEdit'])->name('user.profile.edit');
    Route::post('/user/profile/store',[AdminUserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/password/edit',[AdminUserController::class, 'PasswordEdit'])->name('password.edit');
    Route::post('/user/password/update',[AdminUserController::class, 'PasswordUpdate'])->name('password.update');

    Route::get('/all',[AdminUserController::class, 'AllUser'])->name('all.user');
    Route::get('/add',[AdminUserController::class, 'AddUser'])->name('add.user');
    Route::post('/store',[AdminUserController::class, 'StoreUser'])->name('store.user');
    Route::get('/edit/{id}',[AdminUserController::class, 'EditUser'])->name('edit.user');
    Route::post('/update/{id}',[AdminUserController::class, 'UpdateUser'])->name('update.user');
    Route::get('/delete/{id}',[AdminUserController::class, 'DeleteUser'])->name('delete.user');

    
});

//Information
Route::prefix('information')->group(function(){
    Route::get('/all',[InformationController::class, 'AllInformation'])->name('all.information');
    Route::get('/add',[InformationController::class, 'AddInformation'])->name('add.information');
    Route::post('/store',[InformationController::class, 'StoreInformation'])->name('store.information');
    Route::get('/edit/{id}',[InformationController::class, 'EditInformation'])->name('edit.information');
    Route::post('/update/{id}',[InformationController::class, 'UpdateInformation'])->name('update.information');
    Route::get('/delete/{id}',[InformationController::class, 'DeleteInformation'])->name('delete.information');
});

//Service
Route::prefix('service')->group(function(){
    Route::get('/all',[ServiceController::class, 'AllService'])->name('all.service');
    Route::get('/add',[ServiceController::class, 'AddService'])->name('add.service');
    Route::post('/store',[ServiceController::class, 'StoreService'])->name('store.service');
    Route::get('/edit/{id}',[ServiceController::class, 'EditService'])->name('edit.service');
    Route::post('/update/{id}',[ServiceController::class, 'UpdateService'])->name('update.service');
    Route::get('/delete/{id}',[ServiceController::class, 'DeleteService'])->name('delete.service');
});

//Project
Route::prefix('project')->group(function(){
    Route::get('/all',[ProjectController::class, 'AllProject'])->name('all.project');
    Route::get('/add',[ProjectController::class, 'AddProject'])->name('add.project');
    Route::post('/store',[ProjectController::class, 'StoreProject'])->name('store.project');
    Route::get('/edit/{id}',[ProjectController::class, 'EditProject'])->name('edit.project');
    Route::post('/update/{id}',[ProjectController::class, 'UpdateProject'])->name('update.project');
    Route::get('/delete/{id}',[ProjectController::class, 'DeleteProject'])->name('delete.project');
});

//Course
Route::prefix('course')->group(function(){
    Route::get('/all',[CourseController::class, 'AllCourse'])->name('all.course');
    Route::get('/add',[CourseController::class, 'AddCourse'])->name('add.course');
    Route::post('/store',[CourseController::class, 'StoreCourse'])->name('store.course');
    Route::get('/edit/{id}',[CourseController::class, 'EditCourse'])->name('edit.course');
    Route::post('/update/{id}',[CourseController::class, 'UpdateCourse'])->name('update.course');
    Route::get('/delete/{id}',[CourseController::class, 'DeleteCourse'])->name('delete.course');
});

//Home
Route::prefix('home')->group(function(){
    Route::get('/all',[HomePageController::class, 'AllHome'])->name('all.home');
    Route::get('/add',[HomePageController::class, 'AddHome'])->name('add.home');
    Route::post('/store',[HomePageController::class, 'StoreHome'])->name('store.home');
    Route::get('/edit/{id}',[HomePageController::class, 'EditHome'])->name('edit.home');
    Route::post('/update/{id}',[HomePageController::class, 'UpdateHome'])->name('update.home');
    Route::get('/delete/{id}',[HomePageController::class, 'DeleteHome'])->name('delete.home');
});

//Client Review
Route::prefix('review')->group(function(){
    Route::get('/all',[ClientReviewController::class, 'AllReview'])->name('all.review');
    Route::get('/add',[ClientReviewController::class, 'AddReview'])->name('add.review');
    Route::post('/store',[ClientReviewController::class, 'StoreReview'])->name('store.review');
    Route::get('/edit/{id}',[ClientReviewController::class, 'EditReview'])->name('edit.review');
    Route::post('/update/{id}',[ClientReviewController::class, 'UpdateReview'])->name('update.review');
    Route::get('/delete/{id}',[ClientReviewController::class, 'DeleteReview'])->name('delete.review');
});

// Footer
Route::prefix('footer')->group(function(){
    Route::get('/all',[FooterController::class, 'AllFooter'])->name('all.footer');
    Route::get('/add',[FooterController::class, 'AddFooter'])->name('add.footer');
    Route::post('/store',[FooterController::class, 'StoreFooter'])->name('store.footer');
    Route::get('/edit/{id}',[FooterController::class, 'EditFooter'])->name('edit.footer');
    Route::post('/update/{id}',[FooterController::class, 'UpdateFooter'])->name('update.footer');
    Route::get('/delete/{id}',[FooterController::class, 'DeleteFooter'])->name('delete.footer');
});


// Footer
Route::prefix('chart')->group(function(){
    Route::get('/all',[ChartController::class, 'AllChart'])->name('all.chart');
    Route::get('/add',[ChartController::class, 'AddChart'])->name('add.chart');
    Route::post('/store',[ChartController::class, 'StoreChart'])->name('store.chart');
    Route::get('/edit/{id}',[ChartController::class, 'EditChart'])->name('edit.chart');
    Route::post('/update/{id}',[ChartController::class, 'UpdateChart'])->name('update.chart');
    Route::get('/delete/{id}',[ChartController::class, 'DeleteChart'])->name('delete.chart');
});


// Class
Route::prefix('school/setup/class')->group(function(){
    Route::get('/all',[StudentClassController::class, 'AllStudentClass'])->name('all.class');
    Route::get('/add',[StudentClassController::class, 'AddStudentClass'])->name('add.class');
    Route::post('/store',[StudentClassController::class, 'StoreStudentClass'])->name('store.class');
    Route::get('/edit/{id}',[StudentClassController::class, 'EditStudentClass'])->name('edit.class');
    Route::post('/update/{id}',[StudentClassController::class, 'UpdateStudentClass'])->name('update.class');
    Route::get('/delete/{id}',[StudentClassController::class, 'DeleteStudentClass'])->name('delete.class');
});

// Year
Route::prefix('school/setup/year')->group(function(){
    Route::get('/all',[StudentYearController::class, 'AllStudentYear'])->name('all.year');
    Route::get('/add',[StudentYearController::class, 'AddStudentYear'])->name('add.year');
    Route::post('/store',[StudentYearController::class, 'StoreStudentYear'])->name('store.year');
    Route::get('/edit/{id}',[StudentYearController::class, 'EditStudentYear'])->name('edit.year');
    Route::post('/update/{id}',[StudentYearController::class, 'UpdateStudentYear'])->name('update.year');
    Route::get('/delete/{id}',[StudentYearController::class, 'DeleteStudentYear'])->name('delete.year');
});

// Group
Route::prefix('school/setup/group')->group(function(){
    Route::get('/all',[StudentGroupController::class, 'AllStudentGroup'])->name('all.group');
    Route::get('/add',[StudentGroupController::class, 'AddStudentGroup'])->name('add.group');
    Route::post('/store',[StudentGroupController::class, 'StoreStudentGroup'])->name('store.group');
    Route::get('/edit/{id}',[StudentGroupController::class, 'EditStudentGroup'])->name('edit.group');
    Route::post('/update/{id}',[StudentGroupController::class, 'UpdateStudentGroup'])->name('update.group');
    Route::get('/delete/{id}',[StudentGroupController::class, 'DeleteStudentGroup'])->name('delete.group');
});


//Shift
Route::prefix('school/setup/shift')->group(function(){
    Route::get('/all',[StudentShiftController::class, 'AllStudentShift'])->name('all.shift');
    Route::get('/add',[StudentShiftController::class, 'AddStudentShift'])->name('add.shift');
    Route::post('/store',[StudentShiftController::class, 'StoreStudentShift'])->name('store.shift');
    Route::get('/edit/{id}',[StudentShiftController::class, 'EditStudentShift'])->name('edit.shift');
    Route::post('/update/{id}',[StudentShiftController::class, 'UpdateStudentShift'])->name('update.shift');
    Route::get('/delete/{id}',[StudentShiftController::class, 'DeleteStudentShift'])->name('delete.shift');
});

//FeeCategory
Route::prefix('school/setup/fee/category')->group(function(){
    Route::get('/all',[FeeCategoryController::class, 'AllFeeCategory'])->name('all.fee_category');
    Route::get('/add',[FeeCategoryController::class, 'AddFeeCategory'])->name('add.fee_category');
    Route::post('/store',[FeeCategoryController::class, 'StoreFeeCategory'])->name('store.fee_category');
    Route::get('/edit/{id}',[FeeCategoryController::class, 'EditFeeCategory'])->name('edit.fee_category');
    Route::post('/update/{id}',[FeeCategoryController::class, 'UpdateFeeCategory'])->name('update.fee_category');
    Route::get('/delete/{id}',[FeeCategoryController::class, 'DeleteFeeCategory'])->name('delete.fee_category');
});

//FeeAmount
Route::prefix('school/setup/fee/amount')->group(function(){
    Route::get('/all',[FeeAmountController::class, 'AllFeeAmount'])->name('all.fee_amount');
    Route::get('/add',[FeeAmountController::class, 'AddFeeAmount'])->name('add.fee_amount');
    Route::post('/store',[FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee_amount');
    Route::get('/edit/{id}',[FeeAmountController::class, 'EditFeeAmount'])->name('edit.fee_amount');
    Route::post('/update/{id}',[FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee_amount');
    Route::get('/delete/{id}',[FeeAmountController::class, 'DeleteFeeAmount'])->name('delete.fee_amount');
    Route::get('/detail/{id}',[FeeAmountController::class, 'DeleteFeeAmount'])->name('delete.fee_amount');
});

// Job Title
Route::prefix('school/setup/job_title')->group(function(){
    Route::get('/all',[JobTitleController::class, 'AllJobTitle'])->name('all.job_title');
    Route::get('/add',[JobTitleController::class, 'AddJobTitle'])->name('add.job_title');
    Route::post('/store',[JobTitleController::class, 'StoreJobTitle'])->name('store.job_title');
    Route::get('/edit/{id}',[JobTitleController::class, 'EditJobTitle'])->name('edit.job_title');
    Route::post('/update/{id}',[JobTitleController::class, 'UpdateJobTitle'])->name('update.job_title');
    Route::get('/delete/{id}',[JobTitleController::class, 'DeleteJobTitle'])->name('delete.job_title');
});

// Exam Type
Route::prefix('school/setup/exam_type')->group(function(){
    Route::get('/all',[ExamTypeController::class, 'AllExamType'])->name('all.exam_type');
    Route::get('/add',[ExamTypeController::class, 'AddExamType'])->name('add.exam_type');
    Route::post('/store',[ExamTypeController::class, 'StoreExamType'])->name('store.exam_type');
    Route::get('/edit/{id}',[ExamTypeController::class, 'EditExamType'])->name('edit.exam_type');
    Route::post('/update/{id}',[ExamTypeController::class, 'UpdateExamType'])->name('update.exam_type');
    Route::get('/delete/{id}',[ExamTypeController::class, 'DeleteExamType'])->name('delete.exam_type');
});

// School Subject
Route::prefix('school/setup/school_subject')->group(function(){
    Route::get('/all',[SchoolSubjectController::class, 'AllSchoolSubject'])->name('all.school_subject');
    Route::get('/add',[SchoolSubjectController::class, 'AddSchoolSubject'])->name('add.school_subject');
    Route::post('/store',[SchoolSubjectController::class, 'StoreSchoolSubject'])->name('store.school_subject');
    Route::get('/edit/{id}',[SchoolSubjectController::class, 'EditSchoolSubject'])->name('edit.school_subject');
    Route::post('/update/{id}',[SchoolSubjectController::class, 'UpdateSchoolSubject'])->name('update.school_subject');
    Route::get('/delete/{id}',[SchoolSubjectController::class, 'DeleteSchoolSubject'])->name('delete.school_subject');
});

// Assign Subject
Route::prefix('school/setup/assign_subject')->group(function(){
    Route::get('/all',[AssignSubjectController::class, 'AllAssignSubject'])->name('all.assign_subject');
    Route::get('/add',[AssignSubjectController::class, 'AddAssignSubject'])->name('add.assign_subject');
    Route::post('/store',[AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign_subject');
    Route::get('/edit/{id}',[AssignSubjectController::class, 'EditAssignSubject'])->name('edit.assign_subject');
    Route::post('/update/{id}',[AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign_subject');
    Route::get('/delete/{id}',[AssignSubjectController::class, 'DeleteAssignSubject'])->name('delete.assign_subject');
    Route::get('/detail/{id}',[AssignSubjectController::class, 'DetailsAssignSubject'])->name('detail.assign_subject');
});

/// Student Registration Routes  
Route::prefix('students')->group(function(){
    Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('all.student_reg');
    Route::get('/reg/add', [StudentRegController::class, 'StudentRegAdd'])->name('add.student_reg');
    // Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');
    // Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');
    // Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
    // Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');
    // Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');
    // Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');
    // Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');
});

