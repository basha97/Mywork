<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\Pipeline;
use App\Job;
use App\JobPipe;

class CountryController extends Controller
{
    public function index(){
        $new = Country::orderBy('name','asc')->get();
        return view('country.index')->with('new',$new);
        }

    public function store(request $request){
        try {
        $input = $request->all();
        $news = new Country;
        $news->name = $input['name'];

        $news->save();
        return response()->json(['success'=>true, 'data'=>$news,]);
        } catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage().' at line #'.$e->getLine()]);
        }

    }

    public function edit($id){
        $post = country::find($id);
        return view('country.edit')->with('post',$post);
    }
    public function update(Request $req){
        try{
        $input = $req->all();
        $new = Country::find($input['id']);
        $new->name = $input['name'];
        $new->save();
        return response()->json(['success'=>true, 'data'=>$new,]);
        } catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage().' at line #'.$e->getLine()]);
        }
    }

    

    public function stateupdate(Request $req){
        try{
        $input = $req->all();
        $new = State::find($input['id']);
        $new->name = $input['name'];
        $new->country_id = $input['country_id'];
        $new->save();
        return response()->json(['success'=>true, 'data'=>$new,]);
        } catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage().' at line #'.$e->getLine()]);
        }
    }

    public function getdetails(Request $req){
        $input = $req->all();
        $id = $input['id'];
         $record = Country::find($id);
        if($record){
        return response()->json(['success'=>true, 'id'=>$record->id, 'name'=>$record->name]);
        }
        return response()->json(['success'=>false]);
    }

    public function getStateDetails(Request $req){
        $input = $req->all();
        $id = $input['id'];
        $record = state::find($id);
        if($record){
        return response()->json(['success'=>true, 'id'=>$record->id, 'name'=>$record->name, 'country_id'=>$record->country_id]);
        }
        return response()->json(['success'=>false]);
    }



    public function stateindex(){
        $state = State::orderby('countryName','Asc');
        $state = $state->join('country as CN', 'CN.id', '=', 'state.country_id');
        $state = $state->select('state.id', 'state.name as stateName', 'CN.name as countryName');
        $state = $state->get();
        //return $state;
        return view('country.state')->with('state',$state);
    }

    public function stateAdd(request $request){
        try {
        $input = $request->all();
        $news = new State;
        $news->country_id = $input['country_id'];
        $news->name = $input['name'];

        $news->save();
        return response()->json(['success'=>true, 'data'=>$news,]);
        } catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage().' at line #'.$e->getLine()]);
        }

    }
    public function savePipeline(request $request){
        $input = $request->all();
        $new = new Pipeline();
        $new->pipe_name = $input['name'];
        $new->pipe_type = $input['type'];
        try{
        $new->save();
        return response()->json(['success'=>true, 'data'=>$new,]);
        } catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage().' at line #'.$e->getLine()]);
        }

    }

    public function getPipeData(){
        return Pipeline::orderBy('sorting_order','ASC')->get();
    }

    public function pipeUpdate(request $request){
    $input = $request->all();
    $new = Pipeline::find($input['id']);
    $new->pipe_name = $request['pipename'];
    $new->save();
    return 'success';
    }

    public function workfloworder(Request $req){
        return $input = $req->all();

    }

    public function updateworkflowpositionprocess(request $request){
         $input = $request->all();
          $inputid = $request['id'];
          $datas = $input['params'];
          $s = 1;
          foreach($datas as $d){
            $p = Pipeline::find($d['id']);
            $p->sorting_order = $s;
            $p->save();
            $s++;
          }
          return response()->json(['status'=>'success']);

    }



      public function updateworkprocess(request $request){
        $input = $request->all();
        $inputid = $request['id'];
        $datas = $input['params'];
         
        $records = JobPipe::where('job_id', $inputid)->orderBy('sorting_order', 'ASC')->get();
        if(count($records) == 0){
            $s = 1;
            foreach($datas as $d){
                $p = new JobPipe;
                $p->sorting_order = $d['id'];
                $p->job_id =  $inputid;
                $p->save();
                $s++;
            }
        }else{
            JobPipe::where('job_id', $inputid)->delete();
            foreach($datas as $d){
                $s = 1;
                $p = new JobPipe;
                $p->sorting_order = $d['id'];
                $p->job_id =  $inputid;
                $p->save();
                $s++;
            }
        }
        return response()->json(['status'=>'success']);

    }
    public function pipeline(){
        
        return view('pipeline');
    }

   
        
   
  
}
