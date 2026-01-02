<x-layouts.auth>
    <div class="flex flex-col gap-6">

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')"/>

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('auth.email_label')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
                class="border border-foreground text-foreground"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('auth.password_label')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Password')"
                    viewable
                    class="border border-foreground text-foreground"
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-foreground text-sm end-0" :href="route('password.request')" wire:navigate>
                        {{ __('auth.forgot_password') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox class="text-foreground" name="remember" :label="__('auth.remember_password')" :checked="old('remember')"/>

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="transition-all duration-300 w-full outline-0 bg-fourth text-foreground text-bright hover:text-foreground font-sans font-medium" data-test="login-button">
                    {{ __('auth.connexion_title') }}
                </flux:button>
            </div>
        </form>
    </div>
</x-layouts.auth>
