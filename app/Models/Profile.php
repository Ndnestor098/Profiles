<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_code',
        'level',
        'nombre',
        'ciudad',
        'email',
        'email_recuperacion',
        'password',
        'password_recuperacion',
        'clave_2fa',
        'fecha_creacion',
        'fecha_modificacion',
        'fecha_adquisicion',
        'estado',
        'proveedor',
        'lugar_imagen',
        'primer_inicio_sesion',
        'bind_email',
    ];
}
