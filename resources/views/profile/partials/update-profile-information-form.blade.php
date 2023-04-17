<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informations sur le profil') }}
        </h2>


    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" name="name" type="text" class="form-control form-control-lg form-control-solid" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" name="prenom" type="text" class="form-control form-control-lg form-control-solid" :value="old('prenom', $user->prenom)" required autofocus autocomplete="prenom" />
            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
        </div>
        <div>
            <x-input-label for="date_naiss" :value="__('Date de Naissance')" />
            <x-text-input id="date_naiss" name="date_naiss" type="text" class="form-control form-control-lg form-control-solid" :value="old('date_naiss', $user->date_naiss)" required autofocus autocomplete="date_naiss" />
            <x-input-error class="mt-2" :messages="$errors->get('date_naiss')" />
        </div>
        <div>
            <x-input-label for="phone" :value="__('Numero de Telephone')" />
            <x-text-input id="phone" name="phone" type="text" class="form-control form-control-lg form-control-solid" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div>
            <x-input-label for="address" :value="__('Addresse')" />
            <x-text-input id="address" name="address" type="text" class="form-control form-control-lg form-control-solid" :value="old('address', $user->address)" required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <div>
            <x-input-label for="cin" :value="__('cin')" />
            <x-text-input id="cin" name="cin" type="text" class="form-control form-control-lg form-control-solid" :value="old('cin', $user->cin)" required autofocus autocomplete="cin" />
            <x-input-error class="mt-2" :messages="$errors->get('cin')" />
        </div>
        <div>
            <x-input-label for="num_emp" :value="__('Numero employe')" />
            <x-text-input id="num_emp" name="num_emp" type="text" class="form-control form-control-lg form-control-solid" :value="old('num_emp', $user->num_emp)" required autofocus autocomplete="num_emp" />
            <x-input-error class="mt-2" :messages="$errors->get('num_emp')" />
        </div>
        <div>
            <x-input-label for="ville" :value="__('ville')" />
            <x-text-input id="ville" name="ville" type="text" class="form-control form-control-lg form-control-solid" :value="old('ville', $user->ville)" required autofocus autocomplete="ville" />
            <x-input-error class="mt-2" :messages="$errors->get('ville')" />
        </div>
        <div>
            <x-input-label for="codepostal" :value="__('Code Postal')" />
            <x-text-input id="codepostal" name="codepostal" type="text" class="form-control form-control-lg form-control-solid" :value="old('codepostal', $user->codepostal)" required autofocus autocomplete="codepostal" />
            <x-input-error class="mt-2" :messages="$errors->get('codepostal')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="form-control form-control-lg form-control-solid" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <x-primary-button class="btn btn-primary">{{ __('
                Sauvegarder') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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
