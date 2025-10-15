<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function contact(array $contacts = ["email" => "vtubercommunitynl@gmail.com", "phone" => "+31 6 12345678", "tag" => "@vtubercommunitynl"]) {
        return view('contact', [
            'contacts' => $contacts,
        ]);
    }

    public function aboutUs(string $id = null) {
        return view('about-us', [
            'id' => $id ?? 'default'
        ]);
    }
}
