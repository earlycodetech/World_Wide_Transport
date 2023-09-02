<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show_profile()
    {
        return view('profile');
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:18'],
            'address' => ['required', 'max:255'],
            'next_of_kin' => ['required', 'max:255'],
            'next_of_kin_phone_number' => ['required', 'max:18'],
            'picture' => "nullable|image|mimes:jpg,png,jpeg|max:2028"
        ]);



        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = "user_profile_" . Auth::user()->id . '.' . $file->extension();
            $file->move(public_path('passports'), $fileName);

            $path = "passports/" . $fileName;
            User::where('id', Auth::user()->id)->update([
                'name' => $request->input('name'),
                'phone_number' => $request->input('phone'),
                'nok' => $request->input('next_of_kin'),
                'nok_phone' => $request->input('next_of_kin_phone_number'),
                'address' => $request->input('address'),
                'picture' => $path
            ]);
        } else {
            User::where('id', Auth::user()->id)->update([
                'name' => $request->input('name'),
                'phone_number' => $request->input('phone'),
                'nok' => $request->input('next_of_kin'),
                'nok_phone' => $request->input('next_of_kin_phone_number'),
                'address' => $request->input('address'),
            ]);
        }

        return back()->with('success', "Profile Updated");
    }
}
