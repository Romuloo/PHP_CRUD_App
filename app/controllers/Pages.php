<?php

class Pages extends Controller {

    public function __construct(){

    }

    public function index(){

        $data = [
            'title' => 'SharePosts',
            'description' => 'Social network - I am learning how to use PHP'
        ];

        $this -> view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];
        $this -> view('pages/about', $data);
    }

}