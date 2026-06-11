<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';
    public string $recaptcha_token = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        if (empty($this->recaptcha_token)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'recaptcha_token' => 'Silakan centang kotak reCAPTCHA untuk memverifikasi bahwa Anda bukan robot.',
            ]);
        }

        $secret = env('RECAPTCHA_SECRET_KEY', '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');
        $response = \Illuminate\Support\Facades\Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secret,
            'response' => $this->recaptcha_token,
            'remoteip' => request()->ip(),
        ]);

        if (! $response->json('success')) {
            $this->recaptcha_token = '';
            $this->dispatch('reset-recaptcha');
            throw \Illuminate\Validation\ValidationException::withMessages([
                'recaptcha_token' => 'Validasi reCAPTCHA gagal. Silakan coba lagi.',
            ]);
        }

        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Kirim Link Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</div>
