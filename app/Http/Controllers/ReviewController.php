<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    //review add
    public function review(Request $req){
        //dd($req->all());
        Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ])->validate();

        $data = [
            'receiver' => $req->receiver,
            'name' => $req->name,
            'email' => $req->email,
            'message' => $req->message
        ];
        if(Auth::check()){
            $data['photo'] = Auth::user()->profile_photo_path;
        }
        Review::create($data);
        return redirect('/#reviews')->with(['reviewCorrect'=> 'Your review has been sent to admin']);
    }

    public function give_review(){
        if(Auth::check()){
            //dd('yes');

            return back();
        }else{
            //dd('no');
            return redirect('/loginPage')->with(['loginAlert'=> 'Please Login to write review.']);
        }
    }
    public function writeReview(Request $req){
       //dd($req->all());
       $data = [
        'photo' => Auth::user()->profile_photo_path,
        'receiver' => $req->receiver,
        'name' => Auth::user()->name,
        'email' => Auth::user()->email,
        'message' => $req->message

       ];
       Review::create($data);
       return back();

    }
    public function showReview(){
       $reviews = Review::select('receiver')->where('receiver','!=','admin')->groupBy('receiver')->get();
        //dd($reviews);
        return view('admin.reviews', compact('reviews'));

    }
    public function showTrReview($receiver){
        //dd($receiver);
        $reviews = Review::where('receiver',$receiver)->get();
        //dd($reviews->toArray());
        return view('admin.teacherReview',compact('reviews','receiver'));

    }
    public function showAdminReview(){
        $reviews = Review::where('receiver','=','admin')->get();
         //dd($reviews->toArray());
         return view('admin.adminReview', compact('reviews'));

     }
     public function deleteReview($id){
        Review::where('id',$id)->delete();
        return redirect('admin/showAdminReview');
     }
}
