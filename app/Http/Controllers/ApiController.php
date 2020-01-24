<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Books\Author;

class ApiController extends Controller
{
    public function create(Request $request)
    {
        $students = new Student();

        $students->firstname = $request->input('firstname');
        $students->lastname = $request->input('lastname');
        $students->email = $request->input('email');
        $students->password = $request->input('password');

        $students->save();
        return response()->json(['status' => 'success','data'=>$students]);
    }

    public function getall()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function getAuthors()
    {
        $auth = Author::getFirstName();
        return $auth->toJSON();
    }

    public function getById($id)
    {
        $students = Student::find($id);
        return response()->json($students);
    }

    public function edit(Request $request, $id)
    {
        $students = Student::find($id);
        $students->firstname = $request->get('firstname');
        $students->lastname = $request->get('lastname');
        $students->email = $request->get('email');
        $students->password = $request->get('password');
        $students->save();
        return response()->json($students);
    }

    public function delete($id)
    {
        $students = Student::find($id);
        $students->delete();
        return response()->json($students);
    }
}
