<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {   
        $path = $request->file('avatar')->store('avatars');
        auth()->user()->update(['avatar' => storage_path('app')."/$path"]);
        //auth()->user()->update(['avatar' => 'test']);
        
        return redirect()->route('profile.edit')->with('message','Avatar is updated');
        
    }
}
