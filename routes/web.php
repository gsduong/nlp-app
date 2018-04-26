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
Route::auth();
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/stopwords', 'StopWordController@index')->name('stopword.index');
Route::post('stopwords/upload', 'StopWordController@handleUpload')->name('stopword.upload');
Route::get('/uploads/files/stopwords.txt', 'StopWordController@download')->name('stopword.download');
Route::get('/stopwords/show', 'StopWordController@show')->name('stopword.show');
Route::get('/intents', 'IntentController@index')->name('intent.index');
Route::get('/intent/{id}', 'IntentController@show')->name('intent.show');
Route::get('/intent/{id}/add/', 'IntentController@showFormAddDocument')->name('intent.add.document');
Route::post('/intent/{id}/create', 'IntentController@addDocument')->name('intent.create.document');
Route::get('/intent/{intent_id}/delete/{doc_id}', 'IntentController@deleteDocument')->name('intent.delete.document');
Route::get('/intent/{intent_id}/edit/{doc_id}', 'IntentController@showFormEditDocument')->name('intent.edit.document');
Route::post('/intent/{intent_id}/update/{doc_id}', 'IntentController@updateDocument')->name('intent.update.document');
Route::get('/test', 'IntentController@test');
Route::get('/vocabs', 'VocabController@index')->name('vocab.index');

Route::get('/prob', 'TermIntentController@index')->name('term_intent.index');
Route::get('/console', 'TestingController@index')->name('console.index');
Route::post('/console', 'TestingController@test')->name('console.test');