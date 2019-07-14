<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function view_login()
    {
        return view('authentication/login');
    }
    public function login(Request $request)
    {
        $rule = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $message = [
            'required' => 'Wajib diisi',
        ];
        $this->validate($request, $rule, $message);
        // $query = DB::table('users')->select('name')->where('email', '=', $request->email)->get();
        // $product = DB::table('product')->get();
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('product');
            // return view(
            //     'dashboard',
            //     [
            //         'nameUsers' => $query[0],
            //         'product' => $product
            //     ]
            // );
        }
        return redirect('/')->with('error', 'Invalid Email Address or Password');
    }
    public function logout(Request $request)
    {
        if (\Auth::check()) {
            \Auth::logout();
            $request->session()->invalidate();
        }
        return  redirect('/');
    }
    public function registrasiForm()
    {
        return view('authentication/registrasi');
    }
    public function registrasi(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ];
        $message = [
            'required' => 'Data ini wajib diisi!'
        ];
        $this->validate($request, $rules, $message);
        DB::table('users')->insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
                // 'password' => md5($request->password)
            ]
        );
        return redirect('/');
    }
}
