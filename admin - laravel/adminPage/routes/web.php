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

use App\HTTP\Controllers\School\Setup\StudentSubjectController;
use App\HTTP\Controllers\School\Setup\StudentDayController;
use App\HTTP\Controllers\School\Setup\StudentClassController;
use App\HTTP\Controllers\School\Setup\StudentYearController;
use App\HTTP\Controllers\School\Setup\StudentGroupController;
use App\HTTP\Controllers\School\Setup\StudentShiftController;
use App\Http\Controllers\School\Setup\CouponController;
use App\Http\Controllers\School\Setup\ExamTypeController;
use App\Http\Controllers\School\Setup\JobTitleController;
use App\Http\Controllers\School\Student\StudentRegController;
use App\Http\Controllers\School\Student\StudentManagementController;
use App\Http\Controllers\School\Setup\LevelTeacherController;
use App\Http\Controllers\School\Employee\EmployeeAttendanceController;
use App\Http\Controllers\School\Employee\EmployeeSalaryController;
use App\Http\Controllers\School\Employee\EmployeeRegController;
use App\Http\Controllers\School\Employee\MonthlySalaryController;
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


// Chart
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

    Route::get('/add/generation', [StudentClassController::class, 'ClassGeneration'])->name('generate.class');

});

// Subject
Route::prefix('school/setup/subject')->group(function(){
    Route::get('/all',[StudentSubjectController::class, 'AllStudentSubject'])->name('all.subject');
    Route::get('/add',[StudentSubjectController::class, 'AddStudentSubject'])->name('add.subject');
    Route::post('/store',[StudentSubjectController::class, 'StoreStudentSubject'])->name('store.subject');
    Route::get('/edit/{id}',[StudentSubjectController::class, 'EditStudentSubject'])->name('edit.subject');
    Route::post('/update/{id}',[StudentSubjectController::class, 'UpdateStudentSubject'])->name('update.subject');
    Route::get('/delete/{id}',[StudentSubjectController::class, 'DeleteStudentSubject'])->name('delete.subject');
    Route::get('/feelogs/{id}',[StudentSubjectController::class, 'FeeDetails'])->name('all.subject_fee');
    Route::get('/addfee/{id}',[StudentSubjectController::class, 'AddFee'])->name('add.subject_fee');
    Route::post('/storefee',[StudentSubjectController::class, 'StoreFee'])->name('store.subject_fee');
    Route::get('/editfee/{id}',[StudentSubjectController::class, 'EditFee'])->name('edit.subject_fee');
    Route::get('/deletefee/{id}',[StudentSubjectController::class, 'DeleteFee'])->name('delete.subject_fee');
});


// Day
Route::prefix('school/setup/day')->group(function(){
    Route::get('/all',[StudentDayController::class, 'AllStudentDay'])->name('all.day');
    Route::get('/add',[StudentDayController::class, 'AddStudentDay'])->name('add.day');
    Route::post('/store',[StudentDayController::class, 'StoreStudentDay'])->name('store.day');
    Route::get('/edit/{id}',[StudentDayController::class, 'EditStudentDay'])->name('edit.day');
    Route::post('/update/{id}',[StudentDayController::class, 'UpdateStudentDay'])->name('update.day');
    Route::get('/delete/{id}',[StudentDayController::class, 'DeleteStudentDay'])->name('delete.day');
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



// Job Title
Route::prefix('school/setup/job_title')->group(function(){
    Route::get('/all',[JobTitleController::class, 'AllJobTitle'])->name('all.job_title');
    Route::get('/add',[JobTitleController::class, 'AddJobTitle'])->name('add.job_title');
    Route::post('/store',[JobTitleController::class, 'StoreJobTitle'])->name('store.job_title');
    Route::get('/edit/{id}',[JobTitleController::class, 'EditJobTitle'])->name('edit.job_title');
    Route::post('/update/{id}',[JobTitleController::class, 'UpdateJobTitle'])->name('update.job_title');
    Route::get('/delete/{id}',[JobTitleController::class, 'DeleteJobTitle'])->name('delete.job_title');
});

// Teacher Level
Route::prefix('school/setup/teacher_level')->group(function(){
    Route::get('/all',[LevelTeacherController::class, 'AllLevelTeacher'])->name('all.teacher_level');
    Route::get('/add',[LevelTeacherController::class, 'AddLevelTeacher'])->name('add.teacher_level');
    Route::post('/store',[LevelTeacherController::class, 'StoreLevelTeacher'])->name('store.teacher_level');
    Route::get('/edit/{id}',[LevelTeacherController::class, 'EditLevelTeacher'])->name('edit.teacher_level');
    Route::post('/update/{id}',[LevelTeacherController::class, 'UpdateLevelTeacher'])->name('update.teacher_level');
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

// Coupon
Route::prefix('school/setup/coupon')->group(function(){
    Route::get('/all',[CouponController::class, 'AllCoupon'])->name('all.coupon');
    Route::post('/store',[CouponController::class, 'StoreCoupon'])->name('store.coupon');
    Route::get('/edit/{id}',[CouponController::class, 'EditCoupon'])->name('edit.coupon');
    Route::post('/update/{id}',[CouponController::class, 'UpdateCoupon'])->name('update.coupon');
    Route::get('/delete/{id}',[CouponController::class, 'DeleteCoupon'])->name('delete.coupon');
});



/// Student Registration Routes  
Route::prefix('students')->group(function(){
    Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('all.student_reg');
    Route::get('/reg/delete/{id}',[StudentRegController::class, 'StudentRegDelete'])->name('delete.student_reg');
    Route::get('/reg/add', [StudentRegController::class, 'StudentRegAdd'])->name('add.student_reg');
    Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student_reg');
    Route::get('/reg/edit/{id}', [StudentRegController::class, 'StudentRegEdit'])->name('edit.student_reg');
    Route::post('/reg/update/{id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student_reg');
    Route::get('/reg/student/{id}', [StudentRegController::class, 'StudentClassRegAdd'])->name('add.student_class_reg');
    Route::get('/reg/student/subject/{subject_id}', [StudentRegController::class, 'GetClassReg'])->name('add.student_class_reg.get_class');
    Route::get('/reg/student/subject/class/{class_id}', [StudentRegController::class, 'GetTransaction'])->name('add.student_class_reg.get_transaction');
    Route::get('/reg/student/subject/class/voucher/{voucher_id}', [StudentRegController::class, 'GetVoucher']);
    Route::post('/reg/all/store}', [StudentRegController::class, 'AllRegStore'])->name('store.all.reg');
    Route::get('/reg/all/student/view', [StudentRegController::class, 'AllRegView'])->name('view.student_reg');
    Route::get('/reg/student/class/{student_id}', [StudentRegController::class, 'ViewStudentClassList'])->name('view.student_class_list');
    Route::get('/reg/invoice/{reg_id}', [StudentRegController::class, 'InvoiceReg'])->name('invoice.student_reg');
    Route::get('/reg/all/student/export', [StudentRegController::class, 'exportStudent'])->name('export.student_reg');
    Route::get('/reg/transaction/delete/{id}', [StudentRegController::class, 'TransactionDelete'])->name('delete.transaction');
    Route::get('/reg/all/transaction/export', [StudentRegController::class, 'exportTransaction'])->name('export.transaction');
});


// Student Management

Route::prefix('students/management')->group(function(){
    Route::get('/all/class', [StudentManagementController::class, 'AllClastList'])->name('all.class_list');
    Route::get('/studentlist/class/{class_id}', [StudentManagementController::class, 'DetailClastList'])->name('detail.class_list');
    Route::get('/studentlist/mark/add/{class_id}', [StudentManagementController::class, 'AddMark'])->name('add.mark');
    Route::post('/studentlist/mark/store/{class_id}', [StudentManagementController::class, 'StoreMark'])->name('store.mark');
    Route::get('/student/class', [StudentManagementController::class, 'StudentClastList'])->name('student.class_list');
    Route::get('/reg/class/student/export/{class_id}', [StudentManagementController::class, 'exportClassStudent'])->name('export.class_student');
    Route::get('/reg/class/all/export/', [StudentManagementController::class, 'ClassExport'])->name('export.all_class');

});

/// Employee Registration
Route::prefix('employees')->group(function(){
    Route::get('/reg/all', [EmployeeRegController::class, 'EmployeeRegAll'])->name('all.employee_reg');
    Route::get('/reg/delete/{id}',[EmployeeRegController::class, 'EmployeeRegDelete'])->name('delete.employee_reg');
    Route::get('/reg/add', [EmployeeRegController::class, 'EmployeeRegAdd'])->name('add.employee_reg');
    Route::post('/reg/store', [EmployeeRegController::class, 'EmployeeRegStore'])->name('store.employee_reg');
    Route::get('/reg/edit/{id}', [EmployeeRegController::class, 'EmployeeRegEdit'])->name('edit.employee_reg');
    Route::post('/reg/update/{id}', [EmployeeRegController::class, 'EmployeeRegUpdate'])->name('update.employee_reg');
});

/// Employee Salary
Route::prefix('employees')->group(function(){
    Route::get('/salary/all', [EmployeeSalaryController::class, 'EmployeeSalaryAll'])->name('all.employee_salary');
    Route::get('/salary/add/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryIncrement'])->name('add.employee_salary');
    Route::post('/salary/store/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryStore'])->name('store.employee_salary');
    Route::get('/salary/details/{id}', [EmployeeSalaryController::class, 'EmployeeSalaryDetails'])->name('details.employee_salary');
});

/// Employee Attendance
Route::prefix('employees')->group(function(){
    Route::get('/attendance/all', [EmployeeAttendanceController::class, 'EmployeeAttendanceAll'])->name('all.employee_attendance');
    Route::get('/attendance/add', [EmployeeAttendanceController::class, 'EmployeeAttendanceAdd'])->name('add.employee_attendance');
    Route::post('/attendance/store', [EmployeeAttendanceController::class, 'EmployeeAttendanceStore'])->name('store.employee_attendance');
    Route::get('/attendance/edit/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceEdit'])->name('edit.employee_attendance');
    Route::post('/attendance/update/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceUpdate'])->name('update.employee_attendance');
    Route::get('/attendance/details/{date}', [EmployeeAttendanceController::class, 'EmployeeAttendanceDetails'])->name('details.employee_attendance');
});

/// Employee Monthly Salary1
Route::prefix('employees')->group(function(){
    Route::get('/monthly_salary/get', [MonthlySalaryController::class, 'GetMonthlySalary'])->name('get.monthly_salary');
    Route::get('/monthly_salary/details', [MonthlySalaryController::class, 'DetailsMonthlySalary'])->name('details.monthly_salary');
});