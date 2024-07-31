<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentUser;
use App\Models\TeacherUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\Log;


class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
      Log::info($request);
      if($request['type'] === 'Studente') {
          $request->validate([
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'. StudentUser::class],
              'password' => ['required', 'confirmed', Rules\Password::defaults()],
          ]);
          $user = StudentUser::create([
              'name' => $request->name,
              'email' => $request->email,
              'password' => Hash::make($request->string('password')),
          ]);
        } else {
          $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'. TeacherUser::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
          $user = TeacherUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
