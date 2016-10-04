<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

use App\Movies;

class movieInsertController extends Controller
{
    public function addMovie()
    {
        DB::table('movies')->insert(
            ['name' => 'john@example.com']
            ['description' => 'john@example.com']
        ['director' => 'john@example.com']
        ['image' => 'john@example.com']
        );
    }
}
