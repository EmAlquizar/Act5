<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index()
    {
    	$sections = DB::table('sections')->get();
    	return view('section.index', compact('sections'));
    }

    public function filter()
    {
    	$students = DB::table('students')
    	->rightjoin('payments', 'student.id', '=', 'payments.student_id')
    	->where('section_id', request()->section_id)
    	->get();
    	return$students;
    }
}
