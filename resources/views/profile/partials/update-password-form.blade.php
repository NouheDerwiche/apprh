<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Mettre à jour le mot de passe') }}
        </h2>


    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Mot de passe actuel')" />
            <x-text-input id="current_password" name="current_password" type="password" class="form-control form-control-lg form-control-solid" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('
            nouveau mot de passe')" />
            <x-text-input id="password" name="password" type="password" class="form-control form-control-lg form-control-solid" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('
            Confirmez le mot de passe')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control form-control-lg form-control-solid" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <x-primary-button class="btn btn-primary">{{ __('
                Sauvegarder') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('enregistré avec succès.') }}</p>
            @endif
        </div>
    </form>
</section>
