<?php
namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return view('tasks', ["tasks" => Tasks::all()]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        Tasks::create($data);
        return view('tasks', ["tasks" => Tasks::all()]);
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
}
