<?php
    // Simple page redirect
    // I use this to avoid redirecting pages every time manually
    // $page here means 'location'
    function redirect($page){
        header('location: ' . URLROOT . '/' . $page);
    }
