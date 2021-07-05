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
}
