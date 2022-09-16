<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
class SettingsController extends Controller
{
    public function edit($locale)
    {
        $admin = User::findOrFail(1);
        return view('admin.index.settings', compact('admin', 'locale'));
    }
    public function update(Request $request, $locale)
    {
        # Validation
        $request->validate([
            // 'name' => 'required',
            // 'email' => 'required|unique',
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        alert()->success('Success','Password successfully changed')->persistent('Close')->autoclose(5500);
        return back(compact('locale'));
    }
    public function nameEmailUpdate(Request $request, $locale, $id)
    {
        $admin = User::findOrFail($id);
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:255'
        ]);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $admin['password'];
        $user->save();
        alert()->success('Success','Info successfully updated')->persistent('Close')->autoclose(5500);
        return redirect()->route('editSettings', compact('locale'));
    }
}
