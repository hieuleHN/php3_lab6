<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view("login");
    }
    public function postLogin(Request $request){
        $data=$request->only("email","password","active");
        //kiểm tra tài khoản có trong csdl không
        if(Auth::attempt($data)){//kiểm tra trong $data có không db không
            return redirect()->route("listAccount");
        }else{
            return redirect()->back()->with("errorLogin","Email hoặc password không chính xác");
        }
    }
    public function listAccount(){
        $list=User::all();
        return view("listAccount", compact("list"));
    }

    public function register(){
        return view("register");
    }
    public function postRegister(Request $request){
        $data = $request->except("image");// except("image") dùng để loại bỏ hình ảnh
        $data["avatar"]="";
        if($request->hasFile("image")){
            $path_image = $request->file("image")->store("avatar");
            $data["avatar"]=$path_image;
        }
        User::query()->create($data);
        return redirect()->route("login")->with("message","đăng ký thành công");
    }

    public function update(User $user){
        return view("update",compact("user"));
    }
    public function postUpdate(Request $request,User $user){
        $data = $request->except("image");// except("image") dùng để loại bỏ hình ảnh
        $old_image=$user->avatar;
        $data["avatar"]=$old_image;
        if($request->hasFile("image")){
            $path_image = $request->file("image")->store("avatar");
            $data["avatar"]=$path_image;
        }
        $user->update($data);
        //xoá ảnh cũ
        if($request->hasFile("image")){
            if(file_exists("storage/".$old_image)){
                unlink("storage/".$old_image);
            }
        }
        return redirect()->back()->with("message","cập nhật liệu thành công");
    }

    //user
    public function user_list(){
        $user = Auth::user();
        return view("user.list",compact("user"));
    }
    public function user_update(){
        $user = Auth::user();
        return view("user.update",compact("user"));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("login")->with("message","đăng xuất thành công");
    }

}
