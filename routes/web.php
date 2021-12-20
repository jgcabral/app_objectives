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
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/goal', 'HomeController@goal')->name('goal');


//Route::get('/mygoals/{id_objective}', 'HomeController@myGoals')->name('mygoals');

Route::get('/mygoals/{id_objective}', 'GoalController@myGoals')->name('mygoals');

Route::get('/mygoalswithprogress/{id_objective}', 'GoalController@myGoalsWithProgress');

Route::post('/closegoal/{id_goal}', 'GoalController@closeGoal');

Route::get('/myactionsbygoal/{id_goal}', 'ActionController@myActionsByGoal');
Route::get('/actionsbyactivity/{id_activity}', 'ActionController@ActionsByActivity');

Route::get('/progressbyobjective/{id_objective}', 'ProgressController@progressByObjective')->name('progressbyobjective');
//
Route::get('/actionsbygoal/{id_goal}', 'ActionController@actionsByGoal')->name('actionsbygoal');

Route::get('/viewobjectives', 'HomeController@viewObjectives')->name('viewobjectives');

Route::get('myobjectiveswithprogress', 'ObjectiveController@myObjectivesWithProgress');

Route::get('/progressbyobjective', 'HomeController@progressByObjective')->name('progressByObjective');

Route::get('/progressbyaction/{id_action}', 'ProgressController@progressByAction')->name('progressbyaction');

Route::get('/progressbygoal/{id_goal}', 'ProgressController@progressByGoal')->name('progressbygoal');

Route::get('/activitiesbygoal/{id_goal}', 'ActivityController@activitiesByGoal');

Route::get('/goalsbyobjective/{id_objective}', 'GoalController@goalsByObjective')->name('goalsbyobjective');
//Route::get('/progressbyobjective', HomeController::class);

Route::apiResource('objectives', 'ObjectiveController');

Route::apiResource('goals', 'GoalController');

Route::apiResource('actions', 'ActionController');

Route::apiResource('progress', 'ProgressController');

Route::apiResource('activities', 'ActivityController');






