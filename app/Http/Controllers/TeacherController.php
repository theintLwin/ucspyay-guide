<?php

namespace App\Http\Controllers;
use Storage;
use App\Models\Course;
use App\Models\Review;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function insertTeacher(Request $req){
        //dd($req->all());

        $validationRules = [
            'position'=> 'required' ,
            'subject'=> 'required' ,
            'photo' => 'required' ,
            'salary'=> 'required',
            'userName' => 'required',
            'userEmail' => 'required',
            'userPh' => 'required',
            'gender' => 'required',
            'academicYear' => 'required',
            'major' => 'required',
            'address' => 'required',
            'schedule' => 'required|min:2|max:4',
            'gender' => ['required', 'in:Male,Female'],


        ];
        $validationMessage = [
            'position.required' => 'Position ဖြည့်ရန်လိုအပ်ပါသည်။',
            'subject.required' => 'Subject ဖြည့်ရန်လိုအပ်ပါသည်။',
            'photo.required' => 'Photo ဖြည့်ရန်လိုအပ်ပါသည်။',
            'salary.required' => 'Salary ဖြည့်ရန်လိုအပ်ပါသည်။',
            'userName.required' => 'Name ဖြည့်ရန်လိုအပ်ပါသည်။',
            'userEmail.required' => 'Email ဖြည့်ရန်လိုအပ်ပါသည်။',
            'userPh.required' => 'Phone ဖြည့်ရန်လိုအပ်ပါသည်။',
            'schedule.required' => 'Schedule ဖြည့်ရန်လိုအပ်ပါသည်။',
            'gender.required' => 'Gender ဖြည့်ရန်လိုအပ်ပါသည်။',
            'address.required' => 'Address ဖြည့်ရန်လိုအပ်ပါသည်။',
            'schedule.min' => 'Course တစ်ခုအတွက်အချိန်2ချိန်ရွေးရန် လိုအပ်ပါသည်။',
            'schedule.mx' => 'it needs 4 times to select at most'



        ];
        Validator::make($req->all(), $validationRules, $validationMessage)->validate();
        $t = Teacher::where('email',$req->userEmail)->get();
        if($t){
                    //$cnames = Course::select('CourseName')->get();
                   $ss = Teacher::where('email',$req->userEmail)->get()->toArray();
                    //dd($s);
                    $timetables = $req->schedule;
                    foreach($ss as $s){
                        for($i= 0; $i < count($timetables) ; $i++ ){
                       if( $s['section'.$i+1] == $timetables[$i]){
                        return back()->with(['error'=>'You have already chosen these times.']);
                       }

                        //if($timetables[$i] == )
                    }
                    }

        }
        //dd($req->vid);
        $data = [
            'position'=> $req->position,
            'subject' => $req->subject,
            'salary'=> $req->salary,
            'name' => $req->userName,
            'email' => $req->userEmail,
            'phno' => $req->userPh,
            'gender' => $req->gender,
            'academicYear' => $req->academicYear,
            'major' => $req->major,
            'address' => $req->address,
            'experience' => $req->exp,

        ];
        //data['photo']=
        //dd($req->file('photo'));

        $timetables = $req->schedule;

        for($i= 0; $i < count($timetables) ; $i++ ){
            $data['section'.$i+1] = $timetables[$i];
        }

        if($req->hasFile('photo')){
            $fileName = uniqid().$req->file('photo')->getClientOriginalName();
            $req->file('photo')->storeAs('public',$fileName);
            $data['photo'] = $fileName;

        }

        if($req->hasFile('stuIDphoto')){
            $fileName1 = uniqid()."_".$req->file('stuIDphoto')->getClientOriginalName();
            $req->file('stuIDphoto')->storeAs('public',$fileName1);
            $data['stuIDcard'] = $fileName1;
        }
        $data['confirm'] = 0;
        $data['vacancyNo'] = $req->vid;
        Teacher::create($data);
       //dd('create success');
       $teacher = $req->all();

      // dd($teacher);
       return view('ans', compact('teacher'))->with(['createSuccess' => 'Your application form has been received successfully. We will contact you via email and phone']);
    }

    public function viewTeacher($courseName){
       $teachers = Teacher::where('position',$courseName)->where('confirm',2)->paginate(4);
      // dd($teachers->toArray());
      $subjects = Subject::where('CourseName',$courseName)->get();

      return view('teacherView', compact('teachers','courseName','subjects'));
    }
    public function viewSubjectTr($position,$subjectName){
        //dd($position,$subjectName);
        $teachers = Teacher::where('position',$position)->where('subject',$subjectName)->where('confirm',2)->get();
        // dd($teachers->toArray());
        $subjects = Subject::where('CourseName',$position)->get();
       //hj dd($subjects->toArray());
       return view('teacherView', compact('teachers','subjects'));
    }

    public function detailTeacher($techId){
        //dd($techId);
       $teacher = Teacher::where('id',$techId)->first();
      $teacherName = $teacher['name'];
      $reviews =  Review::where('receiver', $teacherName)->get();
        //dd($review);
       return view('detailTeacher', compact('teacher','reviews'));
    }

    public function vacancyForm($vid){
       $job = Vacancy::where('id',$vid)->get()->first();

        return view('jobApp',compact('job','vid'));
    }

    public function hireTeacher($teacherId){
        //dd($teacherId);
       $guide = Teacher::where('id',$teacherId)->get()->first();
        return view('parentapplication', compact('guide') );
    }
    public function addTeacherForm(){
        //Validator::make($req->all(), $validationRules, $validationMessage)->validate();

        $cnames = Course::select('CourseName')->get();
        $snames = Subject::select('subjectName')->get();

        //dd($names);
        return view('admin.teacherInsert', compact('cnames','snames'));
    }
    public function addTeacher(Request $req){

        $validationRules = [

            'photo' => 'required' ,
            'salary'=> 'required',
            'userName' => 'required',
            'userEmail' => 'required',
            'userPh' => 'required|min:9|max:11',

            'academicYear' => 'required',
            'major' => 'required',
            'address' => 'required',
            'schedule' => 'required|min:2|max:4',
            'gender' => ['required', 'in:Male,Female'],


        ];
        $validationMessage = [

            'photo.required' => 'Photo ဖြည့်ရန်လိုအပ်ပါသည်။',
            'salary.required' => 'Salary ဖြည့်ရန်လိုအပ်ပါသည်။',
            'userName.required' => 'Name ဖြည့်ရန်လိုအပ်ပါသည်။',
            'userEmail.required' => 'Email ဖြည့်ရန်လိုအပ်ပါသည်။',
            'userPh.required' => 'Phone ဖြည့်ရန်လိုအပ်ပါသည်။',
            'schedule.required' => 'Schedule ဖြည့်ရန်လိုအပ်ပါသည်။',
            'gender.required' => 'Gender ဖြည့်ရန်လိုအပ်ပါသည်။',
            'address.required' => 'Address ဖြည့်ရန်လိုအပ်ပါသည်။',
            'schedule.min' => 'Course တစ်ခုအတွက်အချိန်သုံးချိန်ရွေးရန် လိုအပ်ပါသည်။'


        ];
        Validator::make($req->all(), $validationRules, $validationMessage)->validate();

        $data = [
            'position'=> $req->courseName,
            'subject' => $req->subjectName,
            'salary'=> $req->salary,
            'name' => $req->userName,
            'email' => $req->userEmail,
            'phno' => $req->userPh,
            'gender' => $req->gender,
            'academicYear' => $req->academicYear,
            'major' => $req->major,
            'address' => $req->address,
            'experience' => $req->exp,


        ];
        //dd($req->schedule);
        $timetables = $req->schedule;

        for($i= 0; $i < count($timetables) ; $i++ ){
            $data['section'.$i+1] = $timetables[$i];
        }
        //data['photo']=
        //dd($req->file('photo'));
        if($req->hasFile('photo')){
            $fileName = uniqid().$req->file('photo')->getClientOriginalName();
            $req->file('photo')->storeAs('public',$fileName);
            $data['photo'] = $fileName;

        }
        Teacher::create($data);
        //dd('insert success');
        return redirect('admin/viewTeacher');
    }
    public function availableTr($trId){
        //dd($trName,$trPosition,$subject);
        //dd($trId);
        $updata = [
            'hiring_status' => 0
        ];
        Teacher::where('id',$trId)->update($updata);
        return back()->with(['updateSuccess' => 'This person has been available again!']);

    }
    public function viewCurrentTeacher(Request $req){
        //dd($req->all());
        $teachers = Teacher::when(request('trName'), function($t){
            $searchKey = request('trName');
            $t->where('name', 'like', '%'.$searchKey.'%');

        })->where('confirm',2)->get();

        //dd($teachers);
        return view('admin.viewCurrentTr', compact('teachers'));
    }
    public function viewWaitingTeacher(){
        $teachers = Teacher::where('confirm',0)->get();

        return view('admin.waitingTr', compact('teachers'));
        //return redirect('detailTeacher/'.$req->guideId)->with(['hireSuccess'=> 'Your request has been received.We will contact via your phone number.']);

    }
    public function viewHistory($teacherName){
        //dd($teacherName);

        $scheduleLists = Teacher::where('name',$teacherName)->where('confirm',2)->get();
        if($scheduleLists){
            return view('admin.viewHistory', compact('scheduleLists','teacherName'));

        }else{
            return redirect('admin.waitingTr')->with(['doNotHave'=>'This person schedule is free']);
        }
    }

    public function confirmTeacher($teacherId){
        //dd($teacherId);
        $data = [
            'confirm' => 2
        ];
        Teacher::where('id',$teacherId)->update($data);

         $vid = Teacher::select('vacancyNo')->where('id',$teacherId)->get()->first();
          $vid =$vid['vacancyNo'];
       $count =  Vacancy::select('count')->where('id', $vid)->get()->first();
        $count = $count['count'];
        $updata = [
            'count' => $count+1
        ];
        Vacancy::where('id', $vid)->update($updata);
        return back()->with(['confirmSuccess'=> 'This person has been confirmed as a teacher.']);
    }

    public function editTeacherForm($teacherId){
        $cnames = Course::select('CourseName')->get();
        $snames = Subject::select('subjectName')->get();
        $teacher = Teacher::where('id',$teacherId)->get()->first();
        //dd($teacher);
        return view('admin.teacherEdit', compact('cnames', 'snames','teacher'));
    }



    public function teacherUpdate(Request $req){
       //dd($req->all());
       $validationRules = [


        'salary'=> 'required',
        'userName' => 'required',
        'userEmail' => 'required',
        'userPh' => 'required',
        'address' => 'required',
        'schedule' => 'required|min:2|max:4'
 ];
    $validationMessage = [

        'salary.required' => ' လစာဖြည့်ရန်လိုအပ်ပါသည်။',
        'userName.required' => 'ဆရာနာမည်ဖြည့်ရန်လိုအပ်ပါသည်။',
        'userEmail.required' => 'ဆရာ့Emailဖြည့်ရန်လိုအပ်ပါသည်။',
        'userPh.required' => 'ဖုန်းနံပါတ်ဖြည့်ရန်လိုအပ်ပါသည်။',
        'schedule.required' => 'အချိန်ဇယားဖြည့်ရန်လိုအပ်ပါသည်။',

        'address.required' => 'နေရပ်လိပ်စာဖြည့်ရန်လိုအပ်ပါသည်။',
        'schedule.required' => 'Courseအတွက်အချိန်ရွေးရန် လိုအပ်ပါသည်။',
        'schedule.min' => 'Course တစ်ခုအတွက်အချိန်2ချိန်ရွေးရန် လိုအပ်ပါသည်။',
        'schedule.mx' => 'Course တစ်ခုအတွက် အများဆုံး၄ကြိမ်ထိသာ ရွေးနိုင်ပါသည်။'



    ];
    Validator::make($req->all(), $validationRules, $validationMessage)->validate();
    $data = [
        'position'=> $req->courseName,
        'subject' => $req->subjectName,
        'salary'=> $req->salary,
        'name' => $req->userName,
        'email' => $req->userEmail,
        'phno' => $req->userPh,

        'academicYear' => $req->academicYear,
        'major' => $req->major,
        'address' => $req->address,
        'experience' => $req->exp,


    ];
    //dd($req->schedule);
    $timetables = $req->schedule;

    for($i= 0; $i < count($timetables) ; $i++ ){
        $data['section'.$i+1] = $timetables[$i];
    }
    //data['photo']=
    //dd($req->file('photo'));
    if($req->hasFile('photo')){
         //delete
         $oldImageName = Teacher::select('photo')->where('id',$req->tid)->get()->first();
         $oldImageName = $oldImageName['photo'];

         Storage::delete('public/'.$oldImageName);

        $fileName = uniqid().$req->file('photo')->getClientOriginalName();
        $req->file('photo')->storeAs('public',$fileName);
        $data['photo'] = $fileName;

    }
    Teacher::where('id',$req->tid)->update($data);
    //dd('insert success');
    $t= Teacher::select('confirm')->where('id',$req->tid)->get()->first()->toArray();
    //dd($t);
    if($t['confirm'] == 0){
        return redirect('admin/waitingTeacher');
    }else{
        return redirect('admin/viewTeacher');

    }
    }
    public function deleteTeacher($teacherId){
        //dd($teacherId);
        Teacher::where('id', $teacherId)->delete();
        return back();
    }


}
