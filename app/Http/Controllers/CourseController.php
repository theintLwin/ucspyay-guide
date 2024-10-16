<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Course;
use App\Models\Hiring;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function dashboard(){
        $student = Hiring::select('id')->where('confirm','1')->get();
        $hiringTr = Teacher::select('id')->where('confirm','2')->where('hiring_status','1')->get();
        $freeTr = Teacher::select('id')->where('confirm','2')->where('hiring_status','0')->get();
        return view('admin.dashboard',compact('student','hiringTr','freeTr'));
    }
    public function viewCourse(){
       $courses = Course::paginate(5);
       return view('admin.courses', compact('courses'));
    }
    public function viewSubject($courseName){

        $subjects = Subject::where('courseName',$courseName)->get();
        return view('admin.subjects', compact('subjects','courseName'));
    }
    public function insertCourse(Request $req){
        //dd($req->all());

        $this->courseValidationCheck($req);

        $data = $this->getCourseData($req);

        if($req->hasFile('photo')){
            $fileName = uniqid().$req->file('photo')->getClientOriginalName();
            $req->file('photo')->storeAs('public',$fileName);
            $data['Photo'] = $fileName;

        }
        Course::create($data);
        return redirect('admin/courses');
    }

    public function insertSubject(Request $req){
        //dd($req->all());

        $data = [
            'courseName' => $req->cname,
            'subjectName' => $req->sname

        ];

        Subject::create($data);
        return back();
    }

    public function editCourse($courseId){
       $course = Course::where('id', $courseId)->get()->first();
       //dd($course->toArray());
       return view('admin.editCourse', compact('course'));

    }

    // public function editSubject(){
    //     Subject::where('id')
    //     return view('admin.')
    // }

    public function courseUpdate(Request $req){
        //dd($req->all());
        $validationRules = [
            'name' => 'required|unique:courses,CourseName,'.$req->courseId,

         ];
         $validationMessage = [
            'name.required' => 'Course Name is required',

         ];
       Validator::make($req->all(), $validationRules,$validationMessage)->validate();
        $updateData = $this->getCourseData($req);
        $id = $req->courseId;
        if($req->hasFile('photo')){

            //delete
            $oldImageName = Course::select('Photo')->where('id',$id)->get()->first();
            $oldImageName = $oldImageName['Photo'];

            Storage::delete('public/'.$oldImageName);

            $fileName = uniqid().'_'.$req->file('photo')->getClientOriginalName();
            $req->file('photo')->storeAs('public',$fileName);
            $updateData['Photo']= $fileName;

        }
        Course::where('id',$id)->update($updateData);
        return redirect('admin/courses');

    }

    public function deleteCourse($courseId){
        Course::where('id', $courseId)->delete();
        return redirect('admin/courses');
    }

    public function deleteSubject($subjectId){
        Subject::where('id', $subjectId)->delete();
        return back();
    }

    private function courseValidationCheck($req){
        $validationRules = [
            'name' => 'required|unique:courses,CourseName'.$req->courseId,
            'photo' => 'required'
         ];
         $validationMessage = [
            'name.required' => 'Course Name is required',
            'photo.required' => 'Course photo is required'
         ];
       Validator::make($req->all(), $validationRules,$validationMessage)->validate();
    }
    private function getCourseData($req){
        return [
            'CourseName' => $req->name,

        ];
    }



}
