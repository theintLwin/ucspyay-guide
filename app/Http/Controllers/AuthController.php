<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\User;
use App\Models\Hiring;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerPage(){
        return view('authen.registerPage');
    }
    public function loginPage(){
        return view('authen.loginPage');
    }
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect('admin/home');
        }
        return redirect('/');
    }
    public function admin_Profile(){

        return view('admin.profile');
    }
    public function user_profile(){
        $role = Auth::user()->role;
       $name = Auth::user()->name;
       $teacher = "";
       $hirings = [];
       if($role == 'teacher'){
       $teachers = Teacher::select('phno','position','subject','salary','hiring_status')->where('name',$name)->get();
        foreach($teachers as $teacher){
            if($teacher->hiring_status == 1){


                $hirings = Hiring::select('stuName','currentSchool','tr_position','subject')->where('teacherName',$name)->where('confirm',1)->get();



            }

        }
        //dd($teachers);
        return view('authen.userProfile',compact('teachers','hirings'));


            // return view('authen.userProfile',compact('teachers','hirings'));



        }

    return view('authen.userProfile');

        //dd($teacher->toArray(),$hiring->toArray());
    }





    public function teacherRegister(){
        Auth::logout();
        return view('admin.teacherReg');
    }
    public function profileEdit($id){
        //dd($id);
        $user = User::where('id',$id)->get()->first();
        //dd($user->role);

            return view('authen.profileEdit', compact('user'));
        }



    public function profile_update(Request $req){
        //dd($req->all());
        Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required'
        ])->validate();

        $updateData = [
            'name'=> $req->name,
            'email' => $req->email
        ];
        if($req->hasFile('pf_photo')){

            //delete
            $oldImageName = User::select('profile_photo_path')->where('id',$req->uid)->get()->first();
            $oldImageName = $oldImageName['profile_photo_path'];
            //dd($oldImageName);
            if($oldImageName != null){
                Storage::delete('public/'.$oldImageName);

            }

            $fileName = uniqid().'_'.$req->file('pf_photo')->getClientOriginalName();
            $req->file('pf_photo')->storeAs('public',$fileName);
            $updateData['profile_photo_path']= $fileName;
            //dd('hello');

        }
        User::where('id',$req->uid)->update($updateData);
        if($req->user_role == 'admin'){
            return redirect('admin/home');

        }else{
            return redirect('/');
        }
    }

    public function changePassword(){
        return view('changePw');
    }
    public function cgPassword(Request $req){
        //dd($req->all());
        $this->passwordValidationCheck($req);

        $user = User::select('password')->where('id',$req->userId)->first();
        $dbHashValue = $user->password; //hash value

        if(Hash::check($req->oldPassword, $dbHashValue)){
            $data = [
                'password' => Hash::make($req->newPassword)

            ];
            User::where('id',$req->userId)->update($data);
            if(Auth::user()->role == 'admin'){
                return redirect('admin/home');
            }else{
                return redirect('/');

            }
        }else{
            return back()->with(['notMatch' => 'The old Password not Match.Try Again!']);
        }

    }
    private function passwordValidationCheck($req){
        Validator::make($req->all(), [
            'oldPassword' => 'required|min:6|max:10',
            'newPassword' => 'required|min:6|max:10',
            'confirmPassword' => 'required|min:6|max:10|same:newPassword'
        ])->validate();
    }
}
