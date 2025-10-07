<?php

namespace App\Http\Controllers\Subscriber;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Article;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Mostrar el perfil con los artículos públicos del autor
    public function show(Profile $profile)
    {
        $articles = Article::where([
            ['user_id', $profile->user_id],
            ['status', '1']
        ])->simplePaginate(8);

        return view('subscriber.profiles.show', compact('profile', 'articles'));
    }

    // Retornar la vista para editar el perfil
    public function edit(Profile $profile)
    {
        return view('subscriber.profiles.edit', compact('profile'));
    }

    // Actualizar los datos del perfil
    public function update(ProfileRequest $request, Profile $profile)
    {
        $user = Auth::user();

        // Si se sube una nueva foto, guardarla
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('profiles', 'public');
        } else {
            $photo = $user->profile->photo;
        }

        // Asignar nombre y correo
        $user->full_name = $request->full_name;
        $user->email = $request->email;

        // Asignar campos adicionales del perfil
        $user->profile->profession = $request->profession;
        $user->profile->about = $request->about;
        $user->profile->photo = $photo;
        $user->profile->twitter = $request->twitter;
        $user->profile->linkedin = $request->linkedin;
        $user->profile->facebook = $request->facebook;

        // Guardar datos de usuario y perfil
        $user->save();
        $user->profile->save();

        return redirect()->route('subscriber.profiles.show', $profile)
                         ->with('success', 'Perfil actualizado correctamente.');
    }
}
