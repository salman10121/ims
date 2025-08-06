<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\WelcomeUserMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function home()
    {
        return view('home');
    }




    public function show()
    {
        $user = [
            'name' => 'Salman',
            'email' => 'salmanjatt1012@gmail.com',
            'phone' => '0307-0035335',
            'avatar' => asset('assets/img/salman.jpeg'),
        ];

        return view('profile.profile', compact('user'));
    }

    public function loginpage()
    {
        return view('auth.login');
    }
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (Auth::attempt($credentials)) {
        // Get the latest activity log description
        $latestLog = DB::table('activity_history_logs')
            ->where('user_id', Auth::id()) // if you store user_id in logs
            ->latest()
            ->first();

        $message = $latestLog ? $latestLog->description : 'Login successful!';

        return redirect()->route('dashboard.index')->with('success', $message);
    } else {
        return back()->withErrors(['email' => 'Invalid email or password.']);
    }
}


   // app/Http/Middleware/Authenticate.php

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('users.loginpage');
        }
    }

}
