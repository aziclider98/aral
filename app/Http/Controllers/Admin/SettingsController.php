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

        $messagealert = '';
        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            switch ($locale) {
            case 'en':
                $messagealert = 'Old Password Doesn\'t match!';
                break;
            case 'ru':
                $messagealert = 'Старый пароль не подходит!';
                break;
            case 'uz':
                $messagealert = 'Eski parol mos emas!';
                break;
            case 'qqr':
                $messagealert = 'Eski parol uyqas emes!';
                break;
        }
            alert()->error('Error',$messagealert)->persistent('Close')->autoclose(5500);
            return back();
        }

        switch ($locale) {
            case 'en':
                $messagealert = 'Password successfully changed';
                break;
            case 'ru':
                $messagealert = 'Пароль успешно изменен';
                break;
            case 'uz':
                $messagealert = 'Parol muvaffaqiyatli almashtirildi';
                break;
            case 'qqr':
                $messagealert = 'Parol tabıslı almastırildi';
                break;
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        alert()->success('Success',$messagealert)->persistent('Close')->autoclose(5500);
        return back();
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
        switch ($locale) {
            case 'en':
                $messagealert = 'Name Email successfully updated';
                break;
            case 'ru':
                $messagealert = 'Имя Электронная почта успешно обновлена';
                break;
            case 'uz':
                $messagealert = 'Ism Email manzili muvaffaqiyatli yangilandi';
                break;
            case 'qqr':
                $messagealert = 'Atıńız Email adresi tabıslı jańalandi';
                break;
        }
        alert()->success('Success',$messagealert)->persistent('Close')->autoclose(5500);
        return redirect()->route('editSettings', compact('locale'));
    }
}
