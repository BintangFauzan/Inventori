<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index(){
        $todo = todo::query()->latest()->get();
        return view('ToDo.index', [
            'todo' => $todo
        ]);
    }
    public function create()
    {
        return view('ToDo.form');
    }

    public function store(Request $request ){
        $request->validate([
            'judul' => 'required|min:3|max:255',
            'isi' => 'required|min:3',
            'tanggal' => 'required',
            'status' => 'required',
        ],
        [
            'judul.required' => 'Judul harus diisi',
            'isi.required' => 'Isi harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
            'status.required' => 'Status harus diisi',
        ]
        );

        DB::table('todos')->insert([
            'judul'=>$request->judul,
            'isi' =>$request->isi,
            'tanggal'=>$request->tanggal,
            'status'=>$request->status
        ]);
        return redirect('/ToDo');
    }

    public function edit(Todo $todo)
    {
        return view('ToDo.form', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'judul' => 'required|min:3|max:255',
            'isi' => 'required|min:3',
            'tanggal' => 'required',
            'status' => 'required',
        ],
            [
                'judul.required' => 'Judul harus diisi',
                'isi.required' => 'Isi harus diisi',
                'tanggal.required' => 'Tanggal harus diisi',
                'status.required' => 'Status harus diisi',
            ]
        );
        $todo->update([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'tanggal'=>$request->tanggal,
            'status'=>$request->status
        ]);

        return redirect('/ToDo');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/ToDo');
    }
}
