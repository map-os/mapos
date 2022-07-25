<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        return view('admin.profile.edit', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.profile.edit')
            ->with(['alert-success' => 'Perfil editado com sucesso!']);
    }
}
