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

Route::get('/', function () {
    return view('main');
});

Route::get('/quiz', 'QuizController@index')->name('quiz');
Route::post('/quiz-submit', 'QuizController@quizSubmit');

Route::get('/setting', 'SettingController@index')->name('setting');
Route::post('/setting-save', 'SettingController@saveSetting');

Route::get('/reward', 'RewardController@index')->name('reward');
Route::post('/file-upload', 'RewardController@upload')->name('file.upload');
Route::post('/claim-reward', 'RewardController@claim');
Route::post('/remove', 'RewardController@remove');


Route::get('/history', 'HistoryController@index')->name('history');
Route::get('/quizDetails/{id}', 'HistoryController@show');
