<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

use Session;
use App\User;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function settings()
    {
        return view('admin.settings');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully');
    }
    public function chkpassword(Request $request)
    {
        $data=$request->all();
        $current_password=$data['current_pwd'];
        $check_password=User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,$check_password->password))
        {
            echo "true";die;
        }
        else{
            echo "false";die;
        }
    }
    public function updatepassword(Request $request)
    {
          if($request->isMethod('post'))
          {
              $data=$request->all();
             
              $check_password=User::where(['email'=>Auth::user()->email ])->first();
              $current_password=$data['current_pwd'];

              if(Hash::check($current_password,$check_password->password))
              {
                $id = Auth::id();
                 $password=bcrypt($data['new_pwd']);
                 User::where('id',$id)->update(['password'=>$password]);
                 return redirect('/admin/settings')->with('flash_message_success','password updated successfully');
              }
              else{
                  
                return redirect('/admin/settings')->with('flash_message_error','Incorrect current password');
              }
          }
    }
    public function create(Request $request)
    {


       if($request->isMethod('post'))
       {
           
           $this->validate($request, [
               'name'=>'required',
               'email'=>'required|email|unique:users',
               'password'=>'required'
           ]);
   
           $data=$request->all();
           //echo "<pre>";print_r($data);die;
            
          $user=new User();
          $user->name=$data['name'];
          $user->email=$data['email'];
         $user->password= bcrypt($data['password']);
          $user->save();
          return redirect('/admin/add-user')->with('flash_message_success','New User Added successfully ');

          //return back()->with('flash_message_success', 'New User Has Been Added Successfully');

       }
   
       return view('admin.users.add_user');
    }
    
}
