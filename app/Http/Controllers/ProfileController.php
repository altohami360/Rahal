<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        // dd($request->validated());
        $user = User::findOrFail(Auth::id());

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $exe = $image->getClientOriginalExtension();
            $image_name = time() . '.' . $exe;

            $image->move(public_path('uploads/images/users') , $image_name);

        } else {
            $image_name = 'default.png';
        }

        $data = $request->validated();
        
        $data['image'] = $image_name;


        
        $user->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('user.profile');

    }
}
