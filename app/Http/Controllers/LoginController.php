<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $response = Http::post('https://apiv2.entegrabilisim.com/api/user/token/obtain/', [
            'email' => $email,
            'password' => $password
        ]);

        $response = json_decode($response->body(), true);

        if (isset($response['Error'])) {
            return back()->with('toast_error', 'Opps! Something went wrong.');
        }

        session(['access_token' => $response['access']]);

        return redirect()->route('product')->with('toast_success', 'Successfully, started session.');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('product')->with('toast_success', 'Successfully, terminated the session.');
    }
}
