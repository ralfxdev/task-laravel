<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\Category;

class tasksController extends Controller
{
     public function store(Request $request){

        $request->validate([
            'title' => 'required|min:3'
        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->category_id = $request->category_id;
        $task->save();

        return redirect()->route('tasks')->with('success', 'Task create successfully');
     }

     public function index(){
        $tasks = Task::all();
        $categories = Category::all();

        return view('tasks.index',['tasks' => $tasks, 'categories' => $categories]);
     }

     public function show($id){
         $task = Task::find($id);

         return view('tasks.show',['task' => $task]);
      }

      public function update(Request $request, $id){
         $task = Task::find($id);
         $task->title = $request->title;
         $task->save();

         return redirect()->route('tasks')->with('success', 'Task updated');
      }

      public function destroy($id){
         $task =  Task::find($id);
         $task->delete();

         return redirect()->route('tasks')->with('success', 'Task deleted');
      }

}
