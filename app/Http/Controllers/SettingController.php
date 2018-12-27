<?php

namespace App\Http\Controllers;

use\URL;
use Illuminate\Http\Request;
use App\Setting;
use App\Department;
use App\Libraries\UploadHandler;

class SettingController extends Controller
{
    public function index(){

    	return view('setting.index');
    }

    public function fileupload_ajax(Request $req){

      $options = array('accept_file_types' => '/\.(gif|jpe?g|png)$/i',
        'upload_dir' => 'uploads/',
        'upload_url' => 'uploads/',
        'image_versions' => array(),
      );
      $upload_handler = new UploadHandler($options);
    }

    public function getinform(){

        return Setting::orderBy('id','ASC')->find(6);
    }

    public function saveinform(request $request){
         $request->all();

      $profile = Setting::where('id',$request['id'])->update(['f_name'=>$request['f_name'],'l_name'=>$request['l_name'],'email'=>$request['email'],'phone'=>$request['phone'],'u_img'=>$request['u_img']]);
      return response()->json(['success'=>true,'data'=>$profile]);
	}

	public function departmentIndex(){
		$data = Department::get();
		return view('setting.department', compact('data'));
	}


	public function departmentsave(request $request){

		$input = $request->all();
		$new = new Department;
        $new->name = $input['name'];
        try{
        $new->save();
        return response()->json(['success'=>true, 'data'=>$new,]);
        } catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage().' at line #'.$e->getLine()]);
        }
		
	}

    public function departmentUpdate(Request $request){
      $input = $request->all();
        $new = Department::find($input{"id"});
        $new->name = $request['name'];
        
        try {   
            $new->save();
            return response()->json(['success'=>'true', 'data'=>$new]);
        } catch(\Exception $e){
            return response()->json(['success'=>'false', 'message'=>$e->getMessage().' at line #'.$e->getLine()]);
        }
    }

    public function sample(Request $request){

        $new = Setting::create($request->all());

        return response()->json(['success'=>true,'data'=>$new]);
    }

}
