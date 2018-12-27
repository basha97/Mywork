<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Talentpool;

use App\Department;


class TalentpoolController extends Controller
{
    public function index(){

        $data = Talentpool::orderBy('id','ASC')->get();
    	return view ('talentpool.index',compact('data'));
    }

    public function addTalentpoolpage(){
        $new = Department::orderBy('id','ASC')->get();
    	return view ('talentpool.talentpool',compact('new'));
    }

    public function add(Request $request){
    	
        $new = Talentpool::create($request->all());
    	 return response()->json(['success'=>true,'data'=>$new]);
    }

    public function show($id){

        $new = Talentpool::with('department')->find($id);
        
        return view ('talentpool.edittalentpool',compact('new'));
    }

    public function duplicate($id){

        $dup = Talentpool::find($id);

         $new = $dup->replicate();

         $new->save();

        return response()->json(['success'=>true]);
    }

    public function destroy(Request $request){
         
        $deleteTalent = Talentpool::destroy($request['id']);
        return response()->json(['success'=>true]);

    }
}
