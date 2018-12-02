<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Faculty;
use App\Lecturer;
use App\Module;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::all();

        return view('lecturer_detail', ['lecturers' => $lecturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();

        return view('welcome', ['faculties' => $faculties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //data validation
        $request->validate([
            'lecturer_name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'nationality' => 'required',
            'dob' => 'required|date',
            'faculty' => 'required',
            'modules' => 'required'
        ]);

        $lecturer = new Lecturer();
        $lecturer->name = $request->input('lecturer_name');
        $lecturer->gender = $request->input('gender');
        $lecturer->phone = $request->input('phone');
        $lecturer->email = $request->input('email');
        $lecturer->address = $request->input('address');
        $lecturer->nationality = $request->input('nationality');
        $lecturer->dob = $request->input('dob');
        $lecturer->faculty = $request->input('faculty');
        if (!empty($request->input('modules')))
        {
            $modules = $request->input('modules');
            foreach($modules as $module)
            {
                $module_array[] = $module;
            }
            $lecturer->module = implode('|', $module_array);
        }

        $lecturer->save();
        return view('lecturer_detail')->with('success', 'Lecturer Information Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generateCsv()
    {
        $headers = [
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=data.csv',
            'Expires' => '0',
            'Pragma' => 'public'
        ];

        $list = Lecturer::all()->toArray();

        array_unshift($list, array_keys($list[0]));

        $callback = function () use ($list) {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row)
            {
                fputcsv($FH, $row);
            }

            fclose($FH);
        };

        return Response::download($callback, 200, $headers);
    }

    public function modules()
    {
        $facultyid = Input::get('id');

        $modules = Module::where('faculty_id', '=', $facultyid)->get();

        return response()->json($modules);
    }
}
