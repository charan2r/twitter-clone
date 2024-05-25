<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function dashboard(){
        $users = [
            [
                'name' => 'Charan',
                'age' => 24
            ],
            [
                'name' => 'John',
                'age' => 30
            ]
        ];

        return view('dashboard',['users'=>$users]);
    }

    public function homepage(){

        return view('homepage',['ideas'=>Idea::orderBy('created_at','DESC')->paginate(5)]);
    }
}
