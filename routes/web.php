<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllres\GoogleController;
use App\Http\Controllers\ChangePasswordController;


use App\Http\Controllers\BatchController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\SkillCourseController;
use App\Http\Controllers\SkillFacultyController;
use App\Http\Controllers\SkillStudentController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\SkillFeedbackController;




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


Route::group(['middleware' => 'auth'], function () {

    // Route::get('/', [HomeController::class, 'home']);
	// Route::get('dashboard', function () {
	// 	return view('dashboard');
	// })->name('dashboard');

    Route::get('/',[HomeController::class, 'index']);
    Route::get('home', function () {
        	return view('home.home');
         })->name('home');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');



    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');



# <---------------------------- Master Reords --------------------------------------------->
Route::resource('academic_years', AcademicYearController::class)->middleware(['auth']);
Route::get('academic_year_edit/{id}', [AcademicYearController::class , 'edit'])->middleware('auth');
Route::resource('batches', BatchController::class)->middleware(['auth']);
Route::get('batch_edit/{id}', [BatchController::class , 'edit'])->middleware('auth');
Route::resource('semesters', SemesterController::class)->middleware(['auth']);
Route::get('semester_edit/{id}', [SemesterController::class , 'edit'])->middleware('auth');
Route::resource('departments', DepartmentController::class)->middleware(['auth']);
Route::get('department_edit/{id}', [DepartmentController::class , 'edit'])->middleware('auth');
Route::get('/department/export' ,[DepartmentController::class , 'export'])->name('department_export');
Route::resource('designations', DesignationController::class)->middleware(['auth']);
Route::get('designation_edit/{id}', [DesignationController::class , 'edit'])->middleware('auth');
Route::resource('faculties', FacultyController::class)->middleware(['auth']);
Route::get('faculty_edit/{id}', [FacultyController::class , 'edit'])->middleware('auth');
Route::get('/faculty/export' ,[FacultyController::class , 'export'])->name('faculty_export');
Route::resource('students', StudentController::class)->middleware(['auth']);
Route::get('student_edit/{id}', [StudentController::class , 'edit'])->middleware('auth');
Route::get('/student/export' ,[StudentController::class , 'export'])->name('student_export');

# <--------------------------- Mentor Feedback -------------------------------------------->
Route::resource('mentors', MentorController::class)->middleware(['auth']);
Route::get('mentor_edit/{id}', [MentorController::class , 'edit'])->middleware('auth');
Route::get('/mentor/export' ,[MentorController::class , 'export'])->name('mentor_export');
Route::resource('feedback', FeedbackController::class)->middleware(['auth']);
Route::get('feedback/create', [FeedbackController::class , 'create'])->middleware('auth');
Route::get('feedback_rateview', [FeedbackController::class, 'index'])->middleware(['auth']);

# <--------------------------- Skill Feedback ---------------------------------------------->
Route::resource('skills', SkillController::class)->middleware(['auth']);
Route::get('skill_edit/{id}', [SkillController::class , 'edit'])->middleware('auth');
Route::resource('skill_courses', SkillCourseController::class)->middleware(['auth']);
Route::get('skill_course_edit/{id}', [SkillCourseController::class , 'edit'])->middleware('auth');
Route::get('/skill_course/export' ,[SkillCourseController::class , 'export'])->name('skill_course_export');
Route::resource('skill_faculties', SkillFacultyController::class)->middleware(['auth']);
Route::get('skill_faculty_edit/{id}', [SkillFacultyController::class , 'edit'])->middleware('auth');
Route::get('/skill_faculty/export' ,[SkillFacultyController::class , 'export'])->name('skill_faculty_export');
Route::resource('skill_students', SkillStudentController::class)->middleware(['auth']);
Route::get('skill_student_edit/{id}', [SkillStudentController::class , 'edit'])->middleware('auth');
Route::get('/skill_student/export' ,[SkillStudentController::class , 'export'])->name('skill_student_export');
Route::resource('skill_feedback', SkillFeedbackController::class)->middleware(['auth']);
Route::get('skill_feedback.create', [SkillFeedbackController::class , 'create'])->middleware('auth');
Route::get('skill_feedback_rateview', [SkillFeedbackController::class , 'index'])->middleware('auth');
Route::get('student/register', [SkillFeedbackController::class , 'register'])->name('studentregister');

# <--------------------------- Role Management ---------------------------------------------->
Route::resource('roles', RoleController::class)->middleware('auth');
Route::get('roles_edit/{id}', [RoleController::class , 'edit'])->middleware('auth');

# <--------------------------- User Mangement ---------------------------------------------->
Route::resource('users', UserController::class)->middleware('auth');
Route::get('user_edit/{id}', [UserController::class , 'edit'])->middleware('auth');

 Route::get('auth/google', 'App\Http\Controllers\Auth\GoogleController@redirectToGoogle');
 Route::get('auth/google/callback', 'App\Http\Controllers\Auth\GoogleController@handleGoogleCallback');


// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('google')->user();

//     // $user->token
// });

// Route::get('/auth/redirect', function () {
//     return Socialite::driver('google')->redirect();
// });

