<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        \Log::info('Register request received:', $request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'img_url' => 'nullable|file|image|max:2048',
        ]);

        if ($validator->fails()) {
            \Log::info('Validation failed:', $validator->errors()->all());
            return back()->withErrors($validator)->withInput();
        }

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'role' => 'user', // default role user
        ]);

        if ($request->hasFile('img_url')) {
            $path = $request->file('img_url')->store('public/images');
            $user->img_url = Storage::url($path);
        }

        try {
            $user->save();
            \Log::info('User saved successfully:', ['user' => $user]);
        } catch (\Exception $e) {
            \Log::error('Error saving user:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Error saving user'])->withInput();
        }

        Auth::login($user);

        return $this->redirectBasedOnRole();
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return $this->redirectBasedOnRole();
        } else {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    private function redirectBasedOnRole()
    {
        if (Auth::check()) {
            \Log::info('User logged in:', ['user' => Auth::user()]);
    
            $role = Auth::user()->role;
            if ($role == 'admin') {
                \Log::info('Redirecting to admin dashboard');
                return redirect()->route('admin.dashboard');
            } elseif ($role == 'user') {
                \Log::info('Redirecting to user dashboard');
                return redirect()->route('users.dashboard');
            }
        }
    
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }
}
