<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::where('status',1)->whereNotIn('name', ['admin', 'demo_admin'])->get();
        return view('auth.register',compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'username' => strtolower($request->first_name).strtolower($request->last_name),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->role
        ]));

        $user->assignRole($request->role);

        //event(new Registered($user));

        //return redirect(RouteServiceProvider::HOME);

        $userType = auth()->user()->user_type;

        switch ($userType) {
            case 'admin':
                return redirect('/admin/dashboard');
                break;
    
            case 'producteur':
                return redirect('/producteur/dashboard');
                break;
    
            case 'spectateur':
                return redirect('/');
                break;
    
            default:
                return redirect('/');
        }

    }
}
