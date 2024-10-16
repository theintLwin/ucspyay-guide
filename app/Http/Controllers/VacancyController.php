<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Hiring;
use App\Models\Teacher;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VacancyController extends Controller
{

    //user view
    public function viewVacancy(){
        $datas = Vacancy::get();
        $courses = Course::get();
        $student = Hiring::select('id')->where('confirm','1')->get();
        $hiringTr = Teacher::select('id')->where('confirm','2')->where('hiring_status','1')->get();
        $freeTr = Teacher::select('id')->where('confirm','2')->where('hiring_status','0')->get();

        //dd($courses);
        return view('index' , compact('datas', 'courses','student','hiringTr','freeTr'));
    }

    //admin view
    public function vacancyView(){
        $vacancies = Vacancy::get();
        //dd($vacancies->toArray());
        return view('admin.vacancy', compact('vacancies'));
    }
    public function insertVacancy(Request $req){
        //dd($req->all());
        $this->vacancyValidationCheck($req);
        $data = [
            'courseName' => $req->courseName,
            'subjectName' => $req->subjectName,
            'salary' => $req->salary,
            'description' => $req->description

        ];
        Vacancy::create($data);
        return redirect()->route('admin#vacancyView');
    }
    public function deleteVacancy($id){
        //dd($id);
        Vacancy::where('id',$id)->delete();
        return redirect()->route('admin#vacancyView');
    }
    public function editVacancy($id){
        $vacancy = Vacancy::where('id',$id)->get()->first();
        //dd($vacancy->toArray());
        return view('admin.editVacancy',compact('vacancy'));

    }
    public function updateVacancy(Request $req){
        //dd($req->all());
        $validationRules = [
            'name' => 'required',
            'sname'=> 'required' ,
            'salary' => 'required',
            'description' => 'required'

         ];

       Validator::make($req->all(), $validationRules)->validate();
       $updateData = [
        'courseName' => $req->name,
        'subjectName' => $req->sname,
        'salary' => $req->salary,
        'description' => $req->description
       ];
       Vacancy::where('id',$req->courseId)->update($updateData);
        return redirect('admin/vacancyView');
    }

    private function vacancyValidationCheck($req){
        $validationRules = [
            'courseName' => 'required',
            'subjectName' => 'required',
            'salary' => 'required',
            'description' => 'required'
         ];

       Validator::make($req->all(), $validationRules)->validate();
    }
}
