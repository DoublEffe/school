<?php

namespace App\Http\Requests\Auth;

use App\Models\TeacherUser;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

use App\Models\User;
use App\Models\StudentUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'type' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $credentials = $this->only('email', 'password', 'type');
        if($credentials['type'] === 'Studente') {
          $guard = 'student';
          $user = StudentUser::where('email', $credentials['email'])->first();

        }
        else if  ($credentials['type'] === 'Insegnante')  {
          $guard = 'teacher';
          $user = TeacherUser::where('email', $credentials['email'])->first();
        }
        Log::info('User found: ' . $user->email);
        Log::info('db Password: ' . $user->password);
        Log::info('Password form: ' . Hash::make($credentials['password']));
        Log::info('Password Matches: ' . (Hash::check($credentials['password'], $user->password) ? 'true' : 'false'));
        Log::info(' ');
        //guard($guard)->
        $this->ensureIsNotRateLimited();
        $credentials = $this->only('email', 'password');
        if (! Auth::guard('student')->attempt($credentials, $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
