<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:20', 'unique:users,no_tlp', 'unique:data_pasiens,nomor_hp'],
            'jenis_kelamin' => ['required', 'in:Laki-Laki,Perempuan'],
            ],
            [
            'email.unique' => 'Email ini sudah terdaftar di JGlow Clinic. Gunakan email lain.',
            'no_tlp.unique' => 'Nomor HP ini sudah digunakan. Mohon gunakan nomor yang aktif.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
            'required' => 'Kolom :attribute ini gak boleh kosong ya Bang.',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'pasien',
                'address' => $request->address,
                'no_tlp' => $request->no_tlp,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);

            $user->assignRole('Pasien');

            $user->dataPasien()->create([
                'nama_pasien' => $request->name,
                'alamat' => $request->address,
                'nomor_hp' => $request->no_tlp,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);

            event(new Registered($user));
            Auth::login($user);

            return redirect('/')->with('success', 'Akun berhasil dibuat! Selamat datang di JGlow Clinic.');
    }
}
