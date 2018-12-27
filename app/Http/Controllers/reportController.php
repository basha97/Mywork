<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use URL;

use App\JobApplication;

use App\Candidate;

use App\Job;

use App\Department;

class reportController extends Controller
{
    public function index(){
    	return view('pages.reports');
    }

    public function candidateProgress(){

        $job_application = JobApplication::with('job','candidate')->get();

        // $count = JobApplication::select('job_id',DB::raw('count(*) as count'))->with('job')->groupBy('job_id')->get();
        $overallCount = DB::table('job_application as ja')
                 ->join('job', 'job.id', '=', 'ja.job_id')
                 ->select('ja.job_id',DB::raw('count(*) as count'), 'job.job_title')
                 ->groupBy('ja.job_id')->get();

        $departmentCount = DB::table('job_application as ja')
                 ->join('department', 'department.id', '=', 'ja.department_id')
                 ->select('ja.department_id',DB::raw('count(*) as count'), 'department.name')
                 ->groupBy('ja.department_id')->get();         

 
        $department =  Department::get();
        
        return view ('reports.candidateprogress',compact('job_application','overallCount','department','departmentCount'));
    }

    public function timeToHire(){
        $job_application = JobApplication::with('job','candidate')->get();

        $timetohire = DB::table('job_application as ja')
                ->join('job', 'job.id', '=', 'ja.job_id')
                ->select('ja.job_id', DB::raw('count(*) as count'), 'job.job_title')
                ->groupBy('ja.job_id')->get();

        $departmentCount = DB::table('job_application as ja')
                 ->join('department', 'department.id', '=', 'ja.department_id')
                 ->select('ja.department_id',DB::raw('count(*) as count'), 'department.name')
                 ->groupBy('ja.department_id')->get(); 

    	return view ('reports.timetohire',compact('timetohire','job_application','departmentCount'));
    }

    public function timeToDisqualify(){
        $job_application = JobApplication::with('job','candidate')->get();

        $timedis = DB::table('job_application as ja')
                    ->join('job', 'job.id', '=', 'ja.job_id')
                    ->select('ja.job_id', DB::raw('count(*) as count'), 'job.job_title')
                    ->groupBy('ja.job_id')->get();

        $departmentCount = DB::table('job_application as ja')
                 ->join('department', 'department.id', '=', 'ja.department_id')
                 ->select('ja.department_id',DB::raw('count(*) as count'), 'department.name')
                 ->groupBy('ja.department_id')->get();            

    	return view ('reports.timetodisqualify',compact('timedis','job_application','departmentCount'));
    }

    public function applicantConversation(){
    	return view ('reports.applicantconversation');
    }

    public function pipelineDetails(){
        $job_application = JobApplication::with('job','candidate')->get();

        $pipelinedetails = DB::table('job_application as ja')
                    ->join('job', 'job.id', '=', 'ja.job_id')
                    ->select('ja.job_id', DB::raw('count(*) as count'), 'job.job_title')
                    ->groupBy('ja.job_id')->get();

        $departmentCount = DB::table('job_application as ja')
                 ->join('department', 'department.id', '=', 'ja.department_id')
                 ->select('ja.department_id',DB::raw('count(*) as count'), 'department.name')
                 ->groupBy('ja.department_id')->get();            

        return view ('reports.pipelinedetails',compact('pipelinedetails','job_application','departmentCount'));
    }

    public function proceedDetails(){
        $job_application = JobApplication::with('job','candidate')->get();

        $proceeddetails = DB::table('job_application as ja')
                    ->join('job', 'job.id', '=', 'ja.job_id')
                    ->select('ja.job_id', DB::raw('count(*) as count'), 'job.job_title')
                    ->groupBy('ja.job_id')->get();

        $departmentCount = DB::table('job_application as ja')
                 ->join('department', 'department.id', '=', 'ja.department_id')
                 ->select('ja.department_id',DB::raw('count(*) as count'), 'department.name')
                 ->groupBy('ja.department_id')->get();            

        return view ('reports.proceeddetails',compact('proceeddetails','job_application','departmentCount'));
    }

    public function dropoffDetails(){
        $job_application = JobApplication::with('job','candidate')->get();

        $dropoffdetails = DB::table('job_application as ja')
                    ->join('job', 'job.id', '=', 'ja.job_id')
                    ->select('ja.job_id', DB::raw('count(*) as count'), 'job.job_title')
                    ->groupBy('ja.job_id')->get();

        $departmentCount = DB::table('job_application as ja')
                 ->join('department', 'department.id', '=', 'ja.department_id')
                 ->select('ja.department_id',DB::raw('count(*) as count'), 'department.name')
                 ->groupBy('ja.department_id')->get();            

        return view ('reports.dropoffdetails',compact('dropoffdetails','job_application','departmentCount'));
    }

    public function candidateOrigin(){
        $job_application = JobApplication::with('job','candidate')->get();

        $candidateorigin = DB::table('job_application as ja')
                           ->join('job', 'job.id', '=', 'ja.job_id')
                           ->select('ja.job_id', DB::raw('count(*) as count'), 'job.job_title')
                           ->groupBy('ja.job_id')->get();

        $departmentCount = DB::table('job_application as ja')
                           ->join('department', 'department.id', '=', 'ja.department_id')
                           ->select('ja.department_id',DB::raw('count(*) as count'), 'department.name')
                           ->groupBy('ja.department_id')->get(); 

        return view ('reports.candidateorigin',compact('candidateorigin','job_application','departmentCount'));
    }

    public function slippingAway(){
        $job_application = JobApplication::with('job','candidate')->get();

        $slippingaway = DB::table('job_application as ja')
                    ->join('job', 'job.id', '=', 'ja.job_id')
                    ->select('ja.job_id', DB::raw('count(*) as count'), 'job.job_title')
                    ->groupBy('ja.job_id')->get();

        $departmentCount = DB::table('job_application as ja')
                 ->join('department', 'department.id', '=', 'ja.department_id')
                 ->select('ja.department_id',DB::raw('count(*) as count'), 'department.name')
                 ->groupBy('ja.department_id')->get();            

        return view ('reports.slippingaway',compact('slippingaway','job_application','departmentCount'));
    }

    

    public function overView(){

        $count = DB::table('candidate')->count();
    	return view ('reports.overview')->with('count',$count);
    }
}
