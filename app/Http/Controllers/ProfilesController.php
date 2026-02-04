<?php

namespace App\Http\Controllers;

use App\Imports\ProfilesImport;
use App\Models\ds;
use App\Models\Profile;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::paginate(10);

        return view('profiles.index', compact('profiles'));
    }

    public function upload()
    {
        return view('profiles.upload');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:xlsx,xls'],
        ]);

        Excel::import(new ProfilesImport, $request->file('file'));

        return redirect()->back()->with('success', 'Excel importado correctamente ✅');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // ✅ validación baja (sin exigir todos los campos)
        $data = $request->validate([
            'user_id' => 'required|integer|exists:profiles,id',

            'level' => 'nullable|integer|min:1|max:10',

            'name' => 'nullable|string|max:120',
            'ciudad' => 'nullable|string|max:120',
            'ciudad_imagenes' => 'nullable|string|max:120',
            'proveedor' => 'nullable|string|max:120',

            'email' => 'nullable|email|max:190',
            'password' => 'nullable|string|max:255',

            'email_recuperacion' => 'nullable|email|max:190',
            'password_recuperacion' => 'nullable|string|max:255',

            'clave_2fa' => 'nullable|string|max:255',
        ]);

        $profile = Profile::findOrFail($data['user_id']);

        if (!empty($data['level'])) {
            $profile->level = $data['level'];
        }

        if (!empty($data['name'])) {
            $profile->nombre = $data['name'];
        }

        if (!empty($data['ciudad'])) {
            $profile->ciudad = $data['ciudad'];
        }

        if (!empty($data['ciudad_imagenes'])) {
            $profile->lugar_imagen = $data['ciudad_imagenes'];
        }

        if (!empty($data['proveedor'])) {
            $profile->proveedor = $data['proveedor'];
        }

        if (!empty($data['email'])) {
            $profile->email = $data['email'];
        }

        if (!empty($data['password'])) {
            $profile->password = $data['password'];
        }

        if (!empty($data['email_recuperacion'])) {
            $profile->email_recuperacion = $data['email_recuperacion'];
        }

        if (!empty($data['password_recuperacion'])) {
            $profile->password_recuperacion = $data['password_recuperacion'];
        }

        if (!empty($data['clave_2fa'])) {
            $profile->clave_2fa = $data['clave_2fa'];
        }

        $profile->save();

        return back()->with('success', 'Perfil actualizado ✅');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ds $ds)
    {
        //
    }
}
