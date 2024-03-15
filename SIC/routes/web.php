<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/student',[ StudentController::class, "index" ])->name('student.index');
    // returns the form for adding a post
    Route::get('/student/create', StudentController::class . '@create')->name('student.create');
    // adds a post to the database
    Route::post('/student/create', StudentController::class .'@store')->name('student.store');
    // returns a page that shows a full post
    Route::get('/student/{students}', StudentController::class .'@show')->name('student.show');
    // returns the form for editing a students
    Route::get('/student/{students}/edit', StudentController::class .'@edit')->name('student.edit');
    // updates a students
    Route::put('/student/{students}', StudentController::class .'@update')->name('student.update');
    // deletes a students
    Route::delete('/student/{students}', StudentController::class .'@destroy')->name('student.destroy');

    Route::resource('subject', SubjectController::class);

    Route::resource('activities', ActivitiesController::class);

});

require __DIR__.'/auth.php';

