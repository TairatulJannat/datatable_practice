<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $departments = Employee::select('department')->distinct('department')->get();

        return view('employee',['departments'=>$departments]);
    }
    public function employee_dept($dept)
    {
        


        
        $employees = Employee::select(['id' , 'name', 'department'])->where('department',$dept)->get();
        // dd($employees);

        return DataTables::of($employees->get())

                ->addColumn('custom_name', function($row) {

                    $custom_name = $row->name . "---Test";

                    return '<span>' . $custom_name . '</span>';

                })

                ->addColumn('action', '<button class="btn btn-danger">Yes</button> &nbsp <button class="btn btn-primary">Edit</button>')


                ->addColumn('action2', function ($row) {
                    return '           
               
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">JavaScript</a></li>
                            <li class="divider"></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                    
                    
                    ';
                })

                ->rawColumns(['action' , 'action2', 'custom_name'])

                ->make(true);

    }

    public function load()
    
    {

        $employees = Employee::select(['id' , 'name', 'department']);

        return DataTables::of($employees->get())

                ->addColumn('custom_name', function($row) {

                    $custom_name = $row->name . "---Test";

                    return '<span>' . $custom_name . '</span>';

                })

                ->addColumn('action', '<button class="btn btn-danger">Yes</button> &nbsp <button class="btn btn-primary">Edit</button>')


                ->addColumn('action2', function ($row) {
                    return '           
               
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">JavaScript</a></li>
                            <li class="divider"></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>
                    
                    
                    ';
                })

                ->rawColumns(['action' , 'action2', 'custom_name'])

                ->make(true);
    }



}
