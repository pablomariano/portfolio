<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {   
        $path = Storage::disk('public')->put('avatars',$request->file('avatar'));

        if($oldAvatar = $request->user()->avatar) {  
            Storage::disk('public')->delete($oldAvatar);
        }
        
        // $path = $request->file('avatar')->store('avatars','public');
        auth()->user()->update(['avatar' => $path]);
        //auth()->user()->update(['avatar' => 'test']);
        
        return redirect()->route('profile.edit')->with('message','Avatar is updated');
        
    }
}
