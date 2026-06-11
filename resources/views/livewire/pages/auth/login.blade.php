<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    public string $recaptcha_token = '';

    public function login(): void
    {
        if (empty($this->recaptcha_token)) {
            throw ValidationException::withMessages([
                'recaptcha_token' => 'Silakan centang kotak reCAPTCHA untuk memverifikasi bahwa Anda bukan robot.',
            ]);
        }

        // Verify token with Google's API (Using fallback Test Keys if not defined in .env)
        $secret = env('RECAPTCHA_SECRET_KEY', '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');
        
        try {
            $response = \Illuminate\Support\Facades\Http::timeout(10)
                ->withOptions([
                    'verify' => app()->environment('local') ? false : true,
                    'curl' => [
                        CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
                    ],
                ])
                ->asForm()
                ->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => $secret,
                    'response' => $this->recaptcha_token,
                    'remoteip' => request()->ip(),
                ]);

            if (! $response->json('success')) {
                $this->recaptcha_token = '';
                $this->dispatch('reset-recaptcha');
                throw ValidationException::withMessages([
                    'recaptcha_token' => 'Validasi reCAPTCHA gagal. Silakan coba lagi.',
                ]);
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Bypass error jika di local environment supaya tetap bisa login,
            // tapi jika di production, tampilkan pesan error yang ramah (tidak layar 500)
            if (!app()->environment('local')) {
                $this->recaptcha_token = '';
                $this->dispatch('reset-recaptcha');
                throw ValidationException::withMessages([
                    'recaptcha_token' => 'Koneksi ke server reCAPTCHA timeout. Pastikan koneksi internet stabil.',
                ]);
            }
        } catch (\Exception $e) {
            if (!app()->environment('local')) {
                $this->recaptcha_token = '';
                $this->dispatch('reset-recaptcha');
                throw ValidationException::withMessages([
                    'recaptcha_token' => 'Terjadi kesalahan sistem saat memverifikasi reCAPTCHA.',
                ]);
            }
        }

        try {
            $this->validate();
            $this->form->authenticate();
        } catch (ValidationException $e) {
            $this->recaptcha_token = '';
            $this->dispatch('reset-recaptcha');
            throw $e;
        }

        session()->regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <h2 class="text-lg font-semibold text-slate-800 mb-1">Masuk Admin</h2>
    <p class="text-sm text-slate-500 mb-6">Gunakan akun admin internal DLH</p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-4">
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" value="Password" />
            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Google reCAPTCHA v2 -->
        <div class="mt-4 mb-4">
            <div wire:ignore class="flex justify-center">
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <div class="g-recaptcha" 
                     data-sitekey="{{ env('RECAPTCHA_SITE_KEY', '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI') }}" 
                     data-callback="onRecaptchaSuccess"
                     data-expired-callback="onRecaptchaExpired">
                </div>
                <script>
                    function onRecaptchaSuccess(token) {
                        @this.set('recaptcha_token', token);
                    }
                    function onRecaptchaExpired() {
                        @this.set('recaptcha_token', '');
                    }
                    document.addEventListener('livewire:init', () => {
                        Livewire.on('reset-recaptcha', () => {
                            if (typeof grecaptcha !== 'undefined') {
                                grecaptcha.reset();
                            }
                        });
                    });
                </script>
            </div>
            <x-input-error :messages="$errors->get('recaptcha_token')" class="mt-2 text-center" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember" class="inline-flex items-center text-sm text-slate-600">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                <span class="ms-2">Ingat saya</span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-sm text-emerald-600 hover:text-emerald-700" href="{{ route('password.request') }}" wire:navigate>Lupa password?</a>
            @endif
        </div>

        <button type="submit" class="w-full py-2.5 px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg text-sm transition">
            <span wire:loading.remove wire:target="login">Masuk</span>
            <span wire:loading wire:target="login">Memproses...</span>
        </button>
    </form>
</div>
