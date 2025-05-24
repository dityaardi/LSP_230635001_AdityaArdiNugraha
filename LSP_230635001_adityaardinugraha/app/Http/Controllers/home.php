<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use Illuminate\Http\Request;

class home extends Controller
{
    public function index()
    {
        $tasks = TaskModel::all();

        return view ('index', ['tasks' => $tasks]);
    }

    public function create(Request $request)
    {
        $create = new TaskModel();
        $create->nama = $request->nama;
        $create->status = "Belum";
        $create->save();

        return redirect ('/index');
    }

    public function update($id)
    {
        $tasks = TaskModel::all()->where("id", $id);
        $task = $tasks->first();
        $task->status = "Selesai";
        $task->save();

        return redirect ('/index');
    }

    public function destroy($id)
    {
        $task = TaskModel::find($id);
        $task->delete();

        return redirect ('/index');
    }
}
