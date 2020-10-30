<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisController extends Controller
{
    public function getRegis(){
        return view('backend.register');
    }
    public function postRegis(Request $request){
        $name = $request ->input("name");
        $email = $request ->input("email");
        $password = $request ->input("password");
        $repassword = $request ->input("repassword");
        $user = User::where('email',$email)->first();

        if($user){
            return back()->withInput()->with('error','Email này đã tồn tại');
        }

        // if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        //     return back()->withInput()->with('error','Email không đúng định dạng');
        // }
        if($email =='' || $name =='' || $password==''|| $repassword==''){
            return back()->withInput()->with('error','Các trường không đươc để trống');
        }
        else if($password != $repassword){
            return back()->withInput()->with('error','Nhập lại mật khẩu không đúng');
        }
        else{
            $userr = new User;
            $userr ->name = $name;
            $userr ->email = $email;
            $userr ->password = Hash::make($password);
            $userr ->level = 1;
            $userr ->save();
            return redirect()->intended('login');
        }
    }
}
