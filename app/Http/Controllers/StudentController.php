<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function home(){
        $students = Student::orderBy('id', 'desc')->get();
        return view('student.index', compact('students'));
    }
    public function create(){
        return view('student.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'numeric|min:11',
            'image' => 'required|image|mimes:jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->mobile = $request->phone;
        if ($image && !empty('image')){
            $image_name =Carbon::now()->toDateString()."-".uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/images/students/', $image_name);
            $student->image =$image_name;
        }
        $student->save();
        return redirect()->route('home')->with('message', 'Student Created Successfully');
    }
    public function edit($id){
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }
    public function update(Request $request, $id){
        $student = Student::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'numeric|min:11',
            'image' => 'image|mimes:jpg,bmp,png',
        ]);
        $image = $request->file('image');

        $student->name = $request->name;
        $student->email = $request->email;
        $student->mobile = $request->phone;
        if ($image && !empty('image')){
            $image_name =Carbon::now()->toDateString()."-".uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/images/students/', $image_name);
            if(file_exists('uploads/images/students/'.$student->image)){
                @unlink('uploads/images/students/'.$student->image);
            }

        }else{
            $image_name = $student->image;
        }
        $student->image =$image_name;
        $student->save();
        return redirect()->route('home')->with('message', 'Student Updated Successfully');
    }

    public function show($id){
        $student = Student::findOrFail($id);
        return view('student.show', compact('student'));
    }
    public function delete($id){
        $student = Student::findOrFail($id);
        if(file_exists('uploads/images/students/'.$student->image)){
            @unlink('uploads/images/students/'.$student->image);
        }
        $student->delete();
        return redirect()->back()->with('message', 'Student Deleted Successfully');
    }
}
