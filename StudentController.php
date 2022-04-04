<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

//use Illuminate\Foundation\Validation\ValidatesRequests;
/**
 * Store a new blog post.
 * @return \Illuminate\Http\Response
 */

class StudentController extends Controller
{
    public function CreateData(Request $request){
        $student = new Student;
        $student->name = $request->name;
        $student->password = $request->password;
        $student->email = $request->email;
        $student->address = $request->address;
       // echo $student->address;
        //$student->logo = $request->images;
        //echo $student->name;
        $student->save();
         return redirect('Reg__Stu');

    }
   
}
