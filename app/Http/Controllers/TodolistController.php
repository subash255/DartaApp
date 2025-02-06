<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index($id)
    {
        $company = Company::where('user_id', $id)->first();
        $todolist = Todolist::where('user_id', $id)->get();
        return view('admin.company.todo',compact('todolist','company'),['title' => 'Todo Lists']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
        ]);
        $user_id = Company::get(user_id);

        Todolist::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,]);

        return back()->with('success', 'Todolist created successfully');
    }


    public function delete($id)
    {
        Todolist::find($id)->delete();
        return back()->with('success', 'Todolist deleted successfully');
    }



}
