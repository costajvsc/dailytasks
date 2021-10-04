<?php
namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index()
    {
        return view('tasks', ["tasks" => Tasks::paginate(15)]);
    }

    public function daily()
    {
        $tasks = Tasks::whereDate('milestone', '=', date("Y-m-d"))->orderBy('milestone', 'asc')->get();
        $lateTasks = Tasks::whereDate('milestone', '<', date("Y-m-d"))->where('finished', '=', 0)->orderBy('milestone', 'asc')->get();
        return view('daily', [
            "tasks" => $tasks,
            "lateTasks" => $lateTasks
        ]);
    }

    public function tomorrow()
    {
        $tasks = Tasks::whereDate('milestone', '=', date("Y-m-d", strtotime("+1 day")))->orderBy('milestone', 'asc')->get();

        return view('tomorrow',[
            "tasks" => $tasks
        ]);
    }

    public function create(TaskRequest $request)
    {
        $data = $request->all();

        if(!Tasks::create($data))
            return back()->withErrors('An error ocurred while created a new task.');

        return back()->with('success', 'Your task '.$data['title'].' was created with success.');
    }

    public function delete(Request $request)
    {
        $data = $request->all();

        if(!Tasks::destroy($data))
            return back()->withErrors('An error ocurred while deleted your task.');

        return back()->with('warning', 'Your task was deleted with success.');
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method', 'id_tasks');

        if(!Tasks::where('id_tasks', $request->id_tasks)->update($data))
            return back()->withErrors('An error ocurred while updated your task'.$data['title'].'.');

        return back()->with('warning', 'Your task '.$data['title'].' was updated with success.');
    }

    public function toggle(Request $request)
    {
        $task = Tasks::where('id_tasks', $request->id)->first();
        $task->finished = !$task->finished;
        $task->finish_in = $task->finish_in ? null : date("Y-m-d H:i:s");

        if(!$task->save())
            return back()->withErrors('An error ocurred while updated your task'.$task['title'].'.');

        return back()->with('warning', 'Your task '.$task['title'].' was updated with success.');
    }
}
