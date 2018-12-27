<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Candidate;

use App\Job;

use App\Talentpool;

class dashboardController extends Controller
{
   public function index(){

   	$data1 = Candidate::get();

   	$data2 = Job::get();

   	$data3 = Talentpool::get();

   	$data1->count = $data1->count();

   	$data2->count = $data2->count();

   	$data3->count = $data3->count();
   	
   	return view('pages.blank',compact('data1','data2','data3'));
   }
}
