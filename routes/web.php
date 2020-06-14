<?php

use App\Course;
use Illuminate\Support\Facades\Input;

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

Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    $course = Course::where ( 'title', 'LIKE', '%' . $q . '%' )->get();
    if (count ( $course ) > 0)
        return view ( 'search' )->withDetails ( $course )->withQuery ( $q );
    else
        return view ( 'search' )->withMessage ( 'No Details found. Try to search again !' );
} );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/all-subjects', 'SubjectsController@showAll')->name('all-subjects');
Route::get('/all-courses', 'CoursesController@showAll')->name('all-courses');

Route::resources([
    'users' => 'UsersController',
    'courses' => 'CoursesController',
    'subjects' => 'SubjectsController',
    'lessons' => 'LessonsController',
    'enrollments' => 'EnrollmentsController',

]);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::post('users/{user}/make-teacher', 'UsersController@makeTeacher')->name('users.make-teacher');
});
