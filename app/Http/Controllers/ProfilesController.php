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
    public function create(Request $request)
    {
        // ✅ validación baja para crear (pero con lo importante)
        $data = $request->validate([
            'level' => 'nullable|integer|min:1|max:10',

            'create_name' => 'nullable|string|max:120',
            'create_ciudad' => 'nullable|string|max:120',
            'create_ciudad_imagenes' => 'nullable|string|max:120',
            'create_proveedor' => 'nullable|string|max:120',

            'create_email' => ['nullable', 'email', 'max:190', Rule::unique('profiles', 'email')],
            'create_password' => 'nullable|string|max:255',

            'create_email_recuperacion' => 'nullable|email|max:190',
            'create_password_recuperacion' => 'nullable|string|max:255',

            'create_clave_2fa' => 'nullable|string|max:255',

            // opcionales por si tu modal las tiene
            'create_estado' => 'nullable|string|max:50',
            'create_fecha_creacion' => 'nullable|date',
            'create_fecha_modificacion' => 'nullable|date',
            'create_fecha_adquisicion' => 'nullable|date',
            'create_software' => 'nullable|string|max:255',
        ]);

        $profile = new Profile();


        $last = Profile::latest('id')->value('profile_code'); // ej: "P-43"

        $lastNumber = (int) str_replace(['P-', 'p-'], '', $last); // 43
        $newCode = 'P-' . ($lastNumber + 1); // "P-44"

        $profile->profile_code = $newCode;

        // defaults
        $profile->level = $data['level'] ?? 1;
        $profile->estado = $data['create_estado'] ?? 'Activo';

        // mapeo form -> DB
        $profile->nombre = $data['create_name'];
        $profile->ciudad = $data['create_ciudad'] ?? null;
        $profile->lugar_imagen = $data['create_ciudad_imagenes'] ?? null;
        $profile->proveedor = $data['create_proveedor'] ?? null;

        $profile->email = $data['create_email'];
        $profile->password = $data['create_password'] ?? null;

        $profile->email_recuperacion = $data['create_email_recuperacion'] ?? null;
        $profile->password_recuperacion = $data['create_password_recuperacion'] ?? null;

        $profile->clave_2fa = $data['create_clave_2fa'] ?? null;
        $profile->software = $data['create_software'] ?? null;

        // fechas si existen
        if (!empty($data['create_fecha_creacion'])) $profile->fecha_creacion = $data['create_fecha_creacion'];
        if (!empty($data['create_fecha_modificacion'])) $profile->fecha_modificacion = $data['create_fecha_modificacion'];
        if (!empty($data['create_fecha_adquisicion'])) $profile->fecha_adquisicion = $data['create_fecha_adquisicion'];

        $profile->save();

        return back()->with('success', 'Perfil creado correctamente ✅');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // ✅ validación baja (sin exigir todos los campos)
        $data = $request->all();

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

        if (!empty($data['fecha_adquisicion'])) {
            $profile->fecha_adquisicion = $data['fecha_adquisicion'];
        }

        if (!empty($data['software'])) {
            $profile->software = $data['software'];
        }

        if (!empty($data['estado'])) {
            $profile->estado = $data['estado'];
        }

        $profile->save();

        return back()->with('success', 'Perfil actualizado ✅');
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
     * Remove the specified resource from storage.
     */
    public function destroy(ds $ds)
    {
        //
    }
}
