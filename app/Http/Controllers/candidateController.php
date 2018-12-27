<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use URL;
use App\Candidate;
use App\Department;
use App\Talentpool;
use App\Pipeline;
use App\Email;
use App\Phone;
use App\Test;
use App\Job;
use App\JobApplication;
use App\Libraries\UploadHandler;

class candidateController extends Controller
{
    // Index Page Of Candidate
    public function index(){

        $userData = JobApplication::with('candidate','job')->get();
        foreach($userData as $user){
           $user->ago = $user->created_at->diffForHumans();
        }

        $departmentData = Department::get();

        $talentpoolData = Talentpool::get();

        $pipeLine = Pipeline::get();

        //$userData->ago = $userData[0]['created_at']->diffForHumans();

     // return $userData->ago;


        // $cand->ago = $cand->created_at->diffForHumans();




         // ($userData[0]['candidate']['name']);
         // ($userData->candidate['name']);

        //    $data = Candidate::orderBy('id','ASC')->get();

        // $jobData = job::get();
        
        // // create collection of retrieved data
        // $userData = collect($data)->map(function($m) {
        //     $data = [
        //         'id' => $m->id,
        //         'name' => $m->name,
        //         'email' => $m->email,
        //         'number' => $m->number,
        //         'profile_path' => $m->profile_path
        //     ];

        //     return $data;

        // });
         
        return view('pages.candidate', compact('userData','departmentData','talentpoolData','pipeLine'));

    }

    // Fileupload Function
    public function fileupload_ajax(Request $req){

      $options = array('accept_file_types' => '/\.(gif|jpe?g|png)$/i',
        'upload_dir' => 'uploads/',
        'upload_url' => 'uploads/',
        'image_versions' => array(),
      );
      $upload_handler = new UploadHandler($options);
    }

    // Adding The Candidate
    public function add(Request $request){

        // $new = Candidate::create($request->all());

        $user = Candidate::where('email',$request['email'])->orWhere('number',$request['number'])->first(); 

        if(!$user){
            $user = Candidate::create($request->all());
        }
       
        // $email = Email::create(['can_id'=>$new->id,'email'=>$request['email']]);

        // $email = Phone::create(['can_id'=>$new->id,'number'=>$request['number']]);
        // $email = $request['email'];
        // $email_id = $new->id;
        // for ($i=0; $i < count($email) ; $i++) { 
        //     Email::create(['can_id'=>$email_id,'email'=>$email[$i]['email']]);
        // }

        // $number = $request['number'];
        // for ($i=0; $i < count($number) ; $i++){
        //     Phone::create(['can_id'=>$new->id,'number'=>$number[$i]['number']]);
        // }

    	return response()->json(['message'=>'success','data'=>$user ]);
    }

    // Showing The Candidate Data
    public function show(Request $req ){

        $cand = JobApplication::with('candidate','job')->find($req['id']);
        $cand->ago =  $cand->created_at->diffForHumans();

        // foreach ($cand as $time) {
        //              $time->ago = $time->created_at->diffForHumans();
        //          }         


         // $cand = JobApplication::find($req->id);
        // $cand->ago = $cand->created_at->diffForHumans();
        // $cand->email;
        // $cand->number;
        // return $cand;
         return response()->json(['message'=>'success','data'=>$cand ,'Time Created'=>$cand->ago ]);
     }

    public function update(Request $request){

        

        // return $request->data['candidate']['id'];

         $candidate = Candidate::where('id', $request->data['candidate']['id'])->update(['email' => $request->data['candidate']['email'] ,'number' => $request->data['candidate']['number'] ]);
        
        // $email =  $request['data.email'];
        // $number = $request['data.number'];

        // foreach ($email as $e) {
        //     Email::where('id',$e['id'])->update(['email' => $e['email']]);
        // }

        // foreach ($number as $num) {
        //     Phone::where('id',$num['id'])->update(['number' => $num['number']]);
        // }

        return response()->json(['message' => 'success' , 'data' => $candidate]);

    }

    public function destroy(Request $request){
        

        $delete = $request->all();
        $cand = JobApplication::destroy($delete);
        return response()->json(['success'=>true]);
    }

    public function index1(){
        return view ('pages.candidatetest');
    }
}
