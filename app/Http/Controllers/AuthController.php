<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        if ($request->passphrase === 'admin') {
            $request->session()->put('admin_logged_in', true);
            return redirect()->route('company.index');
        }

        return back()->withErrors(['passphrase' => 'Invalid passphrase']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');
        return redirect()->route('login');
    }
}
