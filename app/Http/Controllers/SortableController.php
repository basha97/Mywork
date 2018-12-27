<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Candidate;
use App\CandidatePipe;
use App\Pipeline;
use App\Job;

class SortableController extends Controller
{
   public function index($id){

   	return view('sortable.index',compact('id'));
   }

   public function getpipelinelistprocess(Request $req){
   		$input = $req->all();
   		$job_id = $input['jobid'];
   		$oldlist = DB::table('job_pipe')->where('job_id',$job_id)->pluck('sorting_order')->toArray();
        $newlist = Pipeline::pluck('id')->toArray();
        $result=array_diff($newlist,$oldlist);
        array_push($oldlist, $result);
   		$arr = []; $i = 0;
   		foreach($oldlist as $old){
   				$in = DB::table('pipelines')->where('id',$old)->first();
	   			$arr[$i]['name'] = $in->pipe_name;
	   			$arr[$i]['id'] = $in->id;

	   			 $getlist = DB::table('candidate_pipe')->where('pipe_id',$in->id)->where('job_id',$job_id)->get();
	   			$list = []; $l = 0;
	   			foreach($getlist as $li){
	   				$list[$l]['id'] = $li->id;
	   				$list[$l]['can_id'] = $li->can_id;
	   				$list[$l]['can_name'] = Candidate::getname($li->can_id);
	   				$list[$l]['can_profile'] = Candidate::getprofile($li->can_id);
	   				$list[$l]['job_name'] = Job::getjobname($li->job_id);
	   				$list[$l]['pipe_id'] = $li->pipe_id;
	   				$list[$l]['jobapplication_id'] = $li->jobapplication_id;
	   				$list[$l]['disqualified'] = $li->disqualified;
	   				$list[$l]['created_at'] = $li->created_at;
	   				$list[$l]['updated_at'] = $li->updated_at;
	   				$l++;
	   			}
	   			$arr[$i]['list'] = $list;
	   			$i++;
   		}

   		return response()->json(['status'=>'success','master'=>$arr]);
   }

    public function updatepipelinelistprocess(Request $req){
   		$input = $req->all();
   		$jobid = $input['jobid'];
   		$newlist = $input['list'];
   		$oldlist = DB::table('candidate_pipe')->where('job_id',$jobid)->pluck('id');
   		foreach($newlist as $li){
   			$id = $li['id'];
   			foreach($li['list'] as $lis){
	   			$insert = new CandidatePipe();
	   			$insert->job_id = $jobid;
	   			$insert->can_id = $lis['can_id'];
	   			$insert->pipe_id = $id;
	   			$insert->jobapplication_id = $lis['jobapplication_id'];
	   			$insert->disqualified = $lis['disqualified'];
	   			$insert->created_at = $lis['created_at'];
	   			$insert->updated_at = date('Y-m-d H:m:s');
	   			$insert->save();
   			}
   		}
   		$delete = CandidatePipe::whereIn('id',$oldlist)->delete();
   		return response()->json(['status'=>'success']);
   }


}
