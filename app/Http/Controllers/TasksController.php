<?php
namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index()
    {
        return view('tasks', ["tasks" => Tasks::paginate(15)]);
    }

    public function daily()
    {
        $tasks = Tasks::whereDate('milestone', '=', date("Y-m-d"))->get();
        $lateTasks = Tasks::whereDate('milestone', '<', date("Y-m-d"))->where('finished', '=', 0)->get();
        return view('daily', [
            "tasks" => $tasks,
            "lateTasks" => $lateTasks
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Tasks::create($data);
        return back()->with('tasks', ["tasks" => Tasks::all()]);
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        Tasks::destroy($data);
        return view('tasks', ["tasks" => Tasks::all()]);
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method', 'id_tasks');
        Tasks::where($request->id)->update($data);;
        return view('tasks', ["tasks" => Tasks::all()]);
    }

    public function toggle(Request $request)
    {
        $task = Tasks::where('id_tasks', $request->id)->first();
        $task->finished = !$task->finished;
        $task->finish_in = $task->finish_in ? null : date("Y-m-d H:i:s");
        $task->save();
        return redirect('/');
    }
}
