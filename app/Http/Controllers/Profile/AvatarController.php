<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(Request $request)
    {   
        $request->validate([
            'avatar'=> "required|image",
            // 'avatar' => ['required|image'],
            ]); 
        
        dd($request->all());

        return back()->with('message', 'Avatar is changed');
    }
}
