<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Candidate;

use App\Department;

use App\job;

use App\Email;

use App\Phone;

use App\JobPipe;

use App\JobApplication;

use App\CandidatePipe;

use URL;

use App\Libraries\UploadHandler;

class ApplyController extends Controller
{
    public function index(){

    	$new = Job::orderBy('id','ASC')->get();
    	return view ('applyjob.index')->with('new',$new);
    }

    public function fileupload_ajax(Request $req){

      $options = array('accept_file_types' => '/\.(gif|jpe?g|png)$/i',
        'upload_dir' => 'uploads/',
        'upload_url' => 'uploads/',
        'image_versions' => array(),
      );
      $upload_handler = new UploadHandler($options);
    }


    public function show(){

    	return view ('applyjob.jobs');
    }

    public function app_form($id){
        $job_records = Job::find($id);
        $can_records = Candidate::find($id);
    	return view ('applyjob.app_form',compact('job_records','can_records'));
    }

    public function applyJobSecond($id){
    	$records = Job::find($id);
    	return view('applyjob.second',compact('records'));
    }

     public function addData(Request $request){

       // $new = Job::find($request['job_id']);
       // return $new['job_department'];

        $user = Candidate::where('email',$request['email'])->orWhere('number',$request['number'])->first(); 

        if(!$user){
            $user = Candidate::create($request->all());
        }

        $new = Job::find($request['job_id']);
        // $new['job_department'];

        return $job_application = JobApplication::create(['can_id'=>$user->id,'job_id'=>$request['job_id'],'department_id'=>$new['job_department']]);

         $getpipes = JobPipe::where('job_id', '=', $request['job_id']  )->select('sorting_order')->get();
        
         
        $candidate_pipe = CandidatePipe::create(['can_id'=>$user->id,'job_id'=>$request['job_id'],'jobapplication_id'=>$job_application['id'], 'pipe_id'=> $getpipes[0]['sorting_order']]);

        
        
       

        return response()->json(['message'=>'success', 'data'=>$user ]);

  //    $can = Candidate::create($request->all());

        // $job = Job::orderBy('id','ASC')->get();

  //       $job_application = JobApplication::create(['can_id'=>$can->id,'job_id'=>$job->id]);

  //     return response()->json(['message'=>'success','data'=>$can ]);
    }
    
}

