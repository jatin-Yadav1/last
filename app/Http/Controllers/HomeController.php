<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $userId;

    public function __construct()
    {
        $this->userId = user_id();

        
    }

    public function index(Request $request)
    {
        $user = $this->getUserData($this->userId);
       
        return view('home.home.index');
    }

    public function about(Request $request)
    {
        return view('home.about.index');
    }

    public function blog(Request $request)
    {
        return view('home.blog.index');
    }

    public function contact(Request $request)
    {
        return view('home.contact.index');
    }

    public function project(Request $request)
    {
        return view('home.project.index');
    }

    public function service(Request $request)
    {
        // dd($this->getSkills());
        return view('home.service.index');
    }

    public function resume(Request $request)
    {
        return view('home.resume.index');
    }

    private function getUserData($userId)
    {
        return User::find($userId);
    }

    public function getSkills()
    {
         // Load JSON from config directory
        $json = file_get_contents(config_path('skills.json'));
        $skills = json_decode($json, true);
        return $skills;
    }
}
