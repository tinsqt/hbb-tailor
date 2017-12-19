<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function getLogin()
    {
        if (Auth::check())
            return redirect('home');
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if ($request->has('remember'))
            session(['nhoemail' => $request->username, 'nhopass' => $request->password]);
        else
            session()->forget('nhoemail');

        //$user = User::find(1);
        // $user->password = bcrypt("tin@123");
        // $user->save();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
            if (!Auth::user()->status) {

                Auth::logout();
                return redirect()->back()->withInput()->with('error', 'Tài khoản này đã bị khoá hoặc chưa được kích hoạt, vui lòng liên hệ quản trị viên để biết thêm chi tiết!');
            }
            if ($request->has('remember'))
                session(['nhoemail' => $request->email]);
            else
                session()->forget('nhoemail');

            return redirect('home');
        }
        return redirect()->back()->withInput()->with('error', 'Bạn đã  nhập sai thông tin đăng nhập, vui lòng thử lại');
    }

    public function getLogout()
    {
        if (session()->has('nhoemail')) {
            $e = session('nhoemail');
            $p = session('nhopass');
            session()->flash('nhoemail', $e);
            session()->flash('nhopass', $p);
        }
        if (Auth::check())
            Auth::logout();
        return redirect('login');
    }

    public function getProfile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function getHome()
    {
        return view('home');
    }
}
