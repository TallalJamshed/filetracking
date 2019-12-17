<?php

namespace App\Http\Controllers;

use App\FilesData;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Faculty;
use App\Position;
use App\User;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $filedata = FilesData::getFiles();

        return view('homepage')->with('filedata',$filedata);
    }

    public function create(){
        $faculties = Faculty::getFaculties();
        $positions = Position::getPosts();
        $roles = Role::get();
        return view('add_user')->with('faculties',$faculties)->with('positions',$positions)->with('roles',$roles);
    }
}
