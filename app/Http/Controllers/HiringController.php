<?php

namespace App\Http\Controllers;

use App\Models\Hiring;
use App\Models\Teacher;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HiringController extends Controller
{
    public function insertParent(Request $req){
        //dd($req->all());
        $validationRules = [

            'teacherName' => 'required' ,
            'salary'=> 'required',
            'position' => 'required',
            'subject' => 'required',
            'studentName' => 'required',
            'schoolName' => 'required',
            'gender' => ['required', 'in:Male,Female'],
            'parentName' => 'required',
            'userPh' => 'required|min:9|max:11',
            'address' => 'required',
            'kpayss' =>'required'


        ];
        $validationMessage = [
            'studentName.required' => 'Student Name ဖြည့်ရန်လိုအပ်ပါသည်။',
            'schoolName.required' => ' အခုလက်ရှိ တက်ရောက်နေသော ကျောင်းအမည်အားဖြည့်ရန်လိုအပ်ပါသည်။',
            'gender.required' => 'Gender ဖြည့်ရန်လိုအပ်ပါသည်။',
            'parentName.required' => 'မိဘအမည်ဖြည့်ရန်လိုအပ်ပါသည်။',
            'userPh.required' => 'ဖုန်းနံပါတ်ဖြည့်ရန်လိုအပ်ပါသည်။',
            'address.required' => 'အခုလက်ရှိ တက်ရောက်နေသော ကျောင်းအမည်အားဖြည့်ရန်လိုအပ်ပါသည်။',
            'kpayss.required' =>  'ငွှေလွှဲပြေစာ ထည့်ပေးရန်လိုအပ်သည်။'

        ];
        Validator::make($req->all(), $validationRules, $validationMessage)->validate();
        $teacher = Teacher::where('id',$req->guideId)->get()->first();

        $data = [
            'teacherId'=> $req->guideId,
            'stuName' => $req->studentName,
            'currentSchool' => $req->schoolName,
            'gender' => $req->gender,
            'parentName' => $req->parentName,
            'customerPhone' => $req->userPh,
            'customerAddress' =>$req->address,
            'fee' => $teacher->salary,
            'teacherName' => $teacher->name,
            'tr_position' => $teacher->position,
            'subject' => $teacher->subject

        ];
        if($req->hasFile('kpayss')){
            $fileName = uniqid().$req->file('kpayss')->getClientOriginalName();
            $req->file('kpayss')->storeAs('public',$fileName);
            $data['moneyPhoto'] = $fileName;

        }
        Hiring::create($data);
        $upData = [
            'hiring_status' => 1
        ];
        Teacher::where('id',$req->guideId)->update($upData);
        return redirect('detailTeacher/'.$req->guideId)->with(['hireSuccess'=> 'Your request has been received.We will contact via your phone number.']);
        //dd('create success');
    }

    public function viewHiringRqs(){
       $hirings = Hiring::get();
       //dd($hirings->toArray());
        return view('admin.viewHiring', compact('hirings'));
    }

    public function requestConfirm($orderId){
        // dd($orderId);
        $upData = [
            'confirm'=>1
        ];
        Hiring::where('id',$orderId)->update($upData);
        return back()->with(['confirmSuccess' => 'This request has been confirmed.']);
    }

    public function editHiring($orderId){
        //dd($orderId);

       $hiring = Hiring::where('id',$orderId)->get()->first();
        //dd($hiring->toArray());
        return view('admin.editHiring', compact('hiring'));
    }
    public function updateHiring(Request $req){
        $validationRules = [


            'studentName' => 'required',
            'schoolName' => 'required',
            'parentName' => 'required',
            'userPh' => 'required',
            'address' => 'required',



        ];
        $validationMessage = [
            'studentName.required' => 'Student Name ဖြည့်ရန်လိုအပ်ပါသည်။',
            'schoolName.required' => ' အခုလက်ရှိ တက်ရောက်နေသော ကျောင်းအမည်အားဖြည့်ရန်လိုအပ်ပါသည်။',
            'gender.required' => 'Gender ဖြည့်ရန်လိုအပ်ပါသည်။',
            'parentName.required' => 'မိဘအမည်ဖြည့်ရန်လိုအပ်ပါသည်။',
            'userPh.required' => 'ဖုန်းနံပါတ်ဖြည့်ရန်လိုအပ်ပါသည်။',
            'address.required' => 'အခုလက်ရှိ တက်ရောက်နေသော ကျောင်းအမည်အားဖြည့်ရန်လိုအပ်ပါသည်။',

        ];
        Validator::make($req->all(), $validationRules, $validationMessage)->validate();
        $data = [

            'stuName' => $req->studentName,
            'currentSchool' => $req->schoolName,
            'parentName' => $req->parentName,
            'customerPhone' => $req->userPh,
            'customerAddress' =>$req->address,
];
if($req->hasFile('kpayss')){

    $oldImageName = Hiring::select('moneyPhoto')->where('id',$req->hid)->get()->first();
            $oldImageName = $oldImageName['moneyPhoto'];

            Storage::delete('public/'.$oldImageName);
    $fileName = uniqid().$req->file('kpayss')->getClientOriginalName();
    $req->file('kpayss')->storeAs('public',$fileName);
    $data['moneyPhoto'] = $fileName;

}
        Hiring::where('id',$req->hid)->update($data);
        return redirect('admin/viewHiringRequests')->with(['updateHiring' => 'This hiring request has been updated.']);
        //dd($req->all());

    }

    public function deleteHiring($orderId){
        Hiring::where('id',$orderId)->delete();
        return redirect('admin/viewHiringRequests');

    }
}
