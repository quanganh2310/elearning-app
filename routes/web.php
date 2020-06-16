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

Route::get('/about', function () {
    return view('about');
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
Route::get('/community', 'PostsController@index')->name('community');
Route::get('/contact', 'ContactsController@index')->name('contact');
Route::post('/add-lesson', 'CoursesController@addLesson')->name('courses.add-lesson');

Route::resources([
    'subjects' => 'SubjectsController',
    'courses' => 'CoursesController',
    'lessons' => 'LessonsController',
    'users' => 'UsersController',
    'enrollments' => 'EnrollmentsController',
    'posts' => 'PostsController',
    'contacts' => 'ContactsController',
    'votes' => 'VotesController',
    'wallets' => 'WalletController'

]);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::post('users/{user}/make-teacher', 'UsersController@makeTeacher')->name('users.make-teacher');
});
