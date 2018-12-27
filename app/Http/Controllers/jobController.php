<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\Job;
use App\JobForm;
use App\Pipeline;
use DB;
use Validator;
use App\Department;

class jobController extends Controller
{
    public function index(){
        $data = Department::get();
      $Jobdata = Job::orderBy('created_at', 'desc')->first();
        return view('jobs.add',compact('data','Jobdata'));
    }

    public function show(){
        $records = Job::orderby('id','desc')->get();
        $countryList = Country::countrySelect();
        $country = Country::with('state')->get();
        $stateList = state::stateSelect();
        return view('jobs.index', compact('records', 'countryList', 'stateList'));
    }

    public function Joblist(){
        $records = Job::orderby('id','desc')->get();
        $countryList = Country::countrySelect();
        $stateList = state::stateSelect();
        $depart = Department::pluck('name','id');

        foreach ($records as $record) {
           $jobDate[$record->id]['created'] = $record->created_at->diffForHumans();
           $jobDate[$record->id]['country'] = $countryList[$record->country];
           $jobDate[$record->id]['state'] = $stateList[$record->state];
           $jobDate[$record->id]['job_title'] = $record->job_title;
           $jobDate[$record->id]['job_department'] =  $depart[$record->job_department];
           $jobDate[$record->id]['city'] = $record->city;
           $jobDate[$record->id]['task'] = $record->task;
           $jobDate[$record->id]['id'] = $record->id;
        }
        
         $jobDate;
        
       
        return response()->json(['success'=>true, 'data'=>$records ,'JobDate' =>$jobDate]);
    }

    public function getdetails(Request $req){
        $input = $req->input('params');
        $country_id = $input['country_id'];
        $records = state::where('country_id', '=', $country_id )->select('name','id')->get();

        if($records){
        return response()->json(['success'=>true, 'data'=>$records]);
        }
    return response()->json(['success'=>false]);


    }


    public function JobStore(Request $request) {
        $input = $request->all();
        $input= $request['params'];
        $rules = ['job_title'=>'required', 'job_department'=>'required'];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return response()->json(['status'=>'validation', 'messages'=>$validation->messages()]);
        }

        $input= $request['params'];
        $jobId = $input['jobId'];
        if($jobId == ''){
            $new = new Job;
            $new->job_title = $input['job_title'];
            $new->job_department = $input['job_department'];
            $new->country = $input['country'];
            $new->state = $input['state'];
            $new->city = $input['city'];
            $new->code = $input['code'];
            $new->description = $input['description'];
            $new->requirement = $input['requirement'];
            $new->employement_type = $input['employement_type'];
            $new->category = $input['category'];
            $new->hr_week = $input['hr_week'];
            $new->education = $input['education'];
            $new->experiences = $input['experiences'];
            $new->task = $input['task'];
            $new->save();
        }else{
            $new = Job::find($jobId);
            $new->job_title = $input['job_title'];
            $new->job_department = $input['job_department'];
            $new->country = $input['country'];
            $new->state = $input['state'];
            $new->city = $input['city'];
            $new->code = $input['code'];
            $new->description = $input['description'];
            $new->requirement = $input['requirement'];
            $new->employement_type = $input['employement_type'];
            $new->category = $input['category'];
            $new->hr_week = $input['hr_week'];
            $new->education = $input['education'];
            $new->experiences = $input['experiences'];
            $new->task = $input['task'];
            $new->save();
        }
        
        try{
        $new->save();
        return response()->json(['status'=>'success', 'data'=>$new, 'jobId'=>$new->id]);
        } catch(\Exception $e){
        return response()->json(['status'=>'failed', 'message'=>$e->getMessage().' at line #'.$e->getLine()]);
        }



    }
     public function editJobs($id){

        $department = Department::get();
        $dataform =  Job::with('pipeline','req')->find($id);
        $pipelines = collect($dataform->pipeline)->map(function($m) {
            return $m->sorting_order;
        });

        $oldlist = DB::table('job_pipe')->where('job_id',$id)->pluck('sorting_order')->toArray();
        $newlist = Pipeline::pluck('id')->toArray();
        $result=array_diff($newlist,$oldlist);
        $first = implode(',', $oldlist);
        $second = implode(',', $result);
        if(count($oldlist) == 0){
            $final = $result;
        }else{
            $final = $first.','.$second;
            $final = explode(',', $final);
        }
        $pipelineMaster = []; $i = 0;
        foreach($final as $f){
            $info = Pipeline::where('id',$f)->first();
            $pipelineMaster[$i]['pipe_name'] = $info->pipe_name;
            $pipelineMaster[$i]['id'] = $info->id;
            $i++;
        }
       // $pipelineMaster = Pipeline::whereIn('id', $final)->pluck('pipe_name','id');
        $pipelineMaster = json_encode($pipelineMaster);
        $pipelines = json_encode($oldlist);
        return view('jobs.edit',compact( 'department', 'dataform',  'pipelines', 'pipelineMaster'));

       

    }

// $departments = Department::get();
//         $jobInfo = Job::with('pipeline','req')->find($id);
//         $pipelines = collect($jobInfo->pipeline)->map(function($m) {
//             return $m->sorting_order;
//         });

//        $pipelineMaster = Pipeline::whereIn('id', $pipelines)->pluck('pipe_name');

//         return view('jobs.edit',compact('departments','jobInfo','pipelineMaster'));
       

//     }


    public function jobForm(Request $request) {
        $input = $request->all();
        $jobId = $input['job_id'];
        $record = JobForm::where('job_id', $jobId)->first();
        if($record){
            $input = JobForm::where('id',$record['id'])->update(['phone'=>$request['phone'],'photo'=>$request['photo'],'cv'=>$request['cv'],'cover_letter'=>$request['cover_letter'],'job_id'=>$request['job_id']]);
        }else{
            $input = JobForm::create($request->all());
        }
        return response()->json(['status'=>'success']);

    }
     

}
