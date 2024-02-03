<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }
// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];

Route::get('/', function()
{
    return redirect()->route('tasks.index');
});


Route::get('/task', function () {
    return view('index',[
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::view('/task/create','create')->name('tasks.create');


Route::get('/task/{task}', function (Task $task) {
    return view('show',[
        'tasks' => $task
    ]);
})->name('tasks.show');

Route::get('/task/{task}/edit', function (Task $task) {
    return view('edit',[
        'tasks' => $task
    ]);
})->name('tasks.edit');


Route::POST('/task', function (TaskRequest $request){
    $task = Task::create($request->validated());
    return  redirect()->route('tasks.show',['task' => $task])
    ->with('success','Task created successfully');
})->name('tasks.store');


Route::PUT('/task/{task}', function (Task $task,TaskRequest $request){
    $task->update($request->validated());
    return  redirect()->route('tasks.show',['task' => $task])
    ->with('success','Task updated successfully');
})->name('tasks.update');

Route::DELETE('/task/{task}/destroy', function (Task $task) {
    $task->delete();
    return  redirect()->route('tasks.index')
    ->with('success','Task deleted successfully');
})->name('tasks.destroy');


Route::PUT('/task/{task}/complete', function (Task $task){
    $task->taskComplete();
    return  redirect()->back() ->with('success','Task complete successfully');
})->name('tasks.complete');