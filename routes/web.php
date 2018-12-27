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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('fileupload', 'candidateController@fileupload');
Route::post('fileupload_ajax', 'candidateController@fileupload_ajax');
Route::post('fileupload', 'candidateController@fileupload_resume');

Route::get('/', 'dashboardController@index');
Route::get('test','TestController@index');

//job candidates Modules Routes
Route::get('jobAdd', 'jobController@index');
Route::get('jobs', 'jobController@show');
Route::get('Joblist', 'jobController@Joblist');
Route::post('jobState', 'jobController@getdetails');
Route::post('jobForm','jobController@jobForm');
Route::post('JobStore', 'jobController@JobStore');
Route::post('pipeStore','CountryController@savePipeline');
Route::get('getPipeData','CountryController@getPipeData');
Route::post('updateworkflowpositionprocess', 'CountryController@updateworkflowpositionprocess');
Route::post('updateworkprocess','CountryController@updateworkprocess');
Route::post('pipeUpdate','CountryController@pipeUpdate');
Route::post('workfloworder', 'CountryController@workfloworder');
Route::get('pipeline','CountryController@pipeline');
Route::get('editJobs/{id}','jobController@editJobs');
//Route::get('CountryEdit/{id}','jobController@edit');


//country state route
Route::get('country', 'CountryController@index');
Route::post('countryAdd', 'CountryController@store');
Route::post('countryupdate', 'CountryController@update');
Route::get('CountryEdit/{id}','CountryController@edit');
Route::get('country/detail/get', 'CountryController@getdetails');
Route::get('state', 'CountryController@stateindex');
Route::Post('stateAdd', 'CountryController@stateAdd');
Route::get('state/detail/get', 'CountryController@getStateDetails');

Route::post('stateupdate', 'CountryController@stateupdate');


// Candidates Modules Route

Route::get('candidate', 'candidateController@index');
Route::post('addCandidate', 'candidateController@add');
Route::get('candidateTest', 'candidateController@show');
Route::post('updateCan', 'candidateController@update');
Route::delete('destroyCan','candidateController@destroy');

// Reports Module Route

Route::get('reports', 'reportController@index');
Route::get('timetohire', 'reportController@timeToHire');
Route::get('timetodisqualify', 'reportController@timeToDisqualify');
Route::get('applicantconversation', 'reportController@applicantConversation');
Route::get('pipelinedetails', 'reportController@pipelineDetails');
Route::get('proceeddetails', 'reportController@proceedDetails');
Route::get('dropoffdetails', 'reportController@dropoffDetails');
Route::get('candidateorigin', 'reportController@candidateOrigin');
Route::get('slippingaway', 'reportController@slippingAway');
Route::get('candidateprogress', 'reportController@candidateProgress');
Route::get('overview', 'reportController@overView');

// setting Controller //

Route::get('setting','SettingController@index');
Route::get('getinform','SettingController@getinform');
Route::post('saveinform','SettingController@saveinform');
Route::get('settingDepartment','SettingController@departmentIndex');
Route::post('settingDepartmentsave','SettingController@departmentsave');
Route::post('settingDepartmentUpdate','SettingController@departmentUpdate');


// Talent Pool

Route::get('talentpoolindex','TalentpoolController@index');
Route::get('talentpool','TalentpoolController@addTalentpoolpage');
Route::post('addTalent','TalentpoolController@add');
Route::get('showTalent/{id}','TalentpoolController@show');
Route::get('duplicate/{id}','TalentpoolController@duplicate');
Route::delete('deleteTalentpool','TalentpoolController@destroy');

//Apply Job
Route::get('applyjob','ApplyController@index');
Route::get('applyjobs','ApplyController@show');
Route::get('applicationform/{id}','ApplyController@app_form');
Route::get('applyJobSecond/{id}','ApplyController@applyJobSecond');
Route::post('addApplication', 'ApplyController@addData');


// sortable   ///

Route::get('sortable/{id}','SortableController@index');
Route::post('getpipelinelistprocess','SortableController@getpipelinelistprocess');
Route::post('updatepipelinelistprocess','SortableController@updatepipelinelistprocess');



