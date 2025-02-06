<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index($id)
    {
        $company = Company::find($id);
        $todolist = Todolist::where('user_id', $company->user->id)->get();
        return view('admin.company.todo',compact('todolist','company'),['title' => 'Todo Lists']);
    }

    public function store(Request $request ,$id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            
        ]);
        $company = Company::find($id);

        Todolist::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' =>$company->user->id,
        ]);

        return back()->with('success', 'Todolist created successfully');
    }


    public function delete($id)
    {
        Todolist::find($id)->delete();
        return back()->with('success', 'Todolist deleted successfully');
    }



}
