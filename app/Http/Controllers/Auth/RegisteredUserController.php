<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'companyname' => ['required', 'string', 'max:255'],
            'companyname_np' => ['required', 'string', 'max:255'],
             'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
            'type' => ['required', 'in:single,multiple'],
            'remarks' => ['nullable', 'string', 'max:255'],

        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'companyname' => $request->companyname,
            'companyname_np' => $request->companyname_np,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'category_id' => $request->category_id,
            'type' => $request->type,
            'remarks' => $request->remarks,

        ]);

        return redirect('/');
    }
}
