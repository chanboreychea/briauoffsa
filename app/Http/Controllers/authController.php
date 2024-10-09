<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required'
    //     ], [
    //         'username.required' => 'Please input the username',
    //         'password.required' => 'Please input the password'
    //     ]);

    //     $username = $request->input('username');
    //     $password = $request->input('password');

    //     if ($username == 'admin.iauoffsa.gov.kh' && $password == "123") {
    //         $request->session()->pull('is_admin_logged_in');
    //         $request->session()->pull('admin_id');
    //         session(['is_admin_logged_in' => true, 'admin_id' => "B0r3y!19"]);
    //         return redirect('/booking');
    //     }

    //     return Redirect::route('admin-login');
    // }

    // public function logout(Request $request)
    // {

    //     if ($request->session()->has('is_admin_logged_in')) {
    //         $request->session()->pull('is_admin_logged_in');
    //         $request->session()->pull('admin_id');
    //     }

    //     return Redirect::route('homepage');
    // }

    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Please input the username',
            'password.required' => 'Please input the password'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $response = Http::withOptions([
            'verify' => false,
        ])->post('https://hrms.iauoffsa.us/api/login', [
            'email' => $username,
            'password' => $password,
        ]);

        if ($response->successful()) {

            $data = $response->json();
            $user = $data['user'];
            $token = $data['token'];

            $admin = $this->fetchPermissionWithAuth('https://hrms.iauoffsa.us/api/v1/permissions', $token);

            $isAdmin = explode(', ', $user['isAdmin']);

            if (in_array($admin['ADMIN_MEETING_ROOM'], $isAdmin)) {
                $request->session()->pull('is_admin_logged_in');
                $request->session()->pull('admin_id');
                $request->session()->pull('token');
                session([
                    'is_admin_logged_in' => true,
                    'admin_id' => $user['id'],
                    'token' => $token,
                ]);

                return redirect('/booking');
            } else {
                $this->logout($request);
                return Redirect::route('admin-login');
            }
        } else {
            return Redirect::route('admin-login');
        }
    }


    public function logout(Request $request)
    {

        $token = session('token');

        $response = Http::withToken($token)
            ->withOptions([
                'verify' => false,
            ])
            ->post('https://hrms.iauoffsa.us/api/v1/logut');

        // Check if the request was successful
        if ($response->successful()) {
            if ($request->session()->has('is_admin_logged_in')) {
                $request->session()->pull('is_admin_logged_in');
                $request->session()->pull('admin_id');
            }

            return Redirect::route('homepage');
        } else {

            $request->session()->pull('is_admin_logged_in');
            $request->session()->pull('admin_id');
            return Redirect::route('homepage');
        }
    }
}
