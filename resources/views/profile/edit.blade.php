@extends('test.index')
@section('content')

				<!--begin::Content-->
				<div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
											<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
			<!--begin::Title-->
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <h1 class="text-dark fw-bold my-1 fs-2">
               Votre Informations                      </h1>
			<!--end::Title--></div>

            				<!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-semibold fs-base my-1">


                                                                        <li class="breadcrumb-item text-muted">
                                                                        </li>


                                    </ul>
				<!--end::Breadcrumb-->
                    </div>
		<!--end::Info-->

		<!--begin::Actions-->

</div>
<!--end::Toolbar-->

					<!--begin::Post-->
                    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
						<!--begin::Container-->
<div class=" container-xxl ">
    <div class="d-flex flex-column flex-lg-row">
    <!--begin::Aside-->
    <div class="flex-column flex-md-row-auto w-100 w-lg-250px w-xxl-275px">
        <!--begin::Nav-->
        <div class="card mb-6 mb-xl-9" data-kt-sticky="true" data-kt-sticky-name="account-settings" data-kt-sticky-offset="{default: false, lg: 300}" data-kt-sticky-width="{lg: '250px', xxl: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-zindex="95">
            <!--begin::Card body-->
            <div class="card-body py-10 px-6">
                <!--begin::Menu-->
                <ul id="kt_account_settings" class="nav nav-flush menu menu-column menu-rounded menu-title-gray-600 menu-bullet-gray-300 menu-state-bg menu-state-bullet-primary fw-semibold fs-6 mb-2">
                    <li class="menu-item px-3 pt-0 pb-1">
                        <a href="#kt_account_settings_overview" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link active">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Profil</span>
                        </a>
                    </li>
                    <li class="menu-item px-3 pt-0 pb-1">
                        <a href="#kt_account_settings_signin_method" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Méthode de connexion.</span>
                        </a>
                    </li>
                    <li class="menu-item px-3 pt-0 pb-1">
                        <a href="#kt_account_settings_profile_details" data-kt-scroll-toggle="true" class="menu-link px-3 nav-link">
                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                            <span class="menu-title">Profile Details</span>
                        </a>
                    </li>

                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Aside-->

    <!--begin::Layout-->
    <div class="flex-md-row-fluid ms-lg-12">
        <!--begin::Overview-->
<div class="card  mb-5 mb-xl-10" id="kt_account_settings_overview" data-kt-scroll-offset="{default: 100, md: 125}">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_overview">
        <div class="card-title">
            <h3 class="fw-bold m-0">Profil</h3>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_overview" class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <div class="d-flex align-items-start flex-wrap">
                <div class="d-flex flex-wrap">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-125px mb-7 me-7 position-relative">
                        <img src="{{ asset('storage/assets/media/avatars/' . Auth::user()->avatar) }}" >
                    </div>
                    <!--end::Avatar-->

                    <!--begin::Profile-->
                    <div class="d-flex flex-column">
                        <div class="fs-2 fw-bold mb-1">{{ Auth::user()->name }}</div>
                        <a href="#" class="text-gray-400 text-hover-primary fs-6 fw-semibold mb-5">{{ Auth::user()->email }}</a>
                        <div class="badge badge-light-success text-primary fw-bold fs-7 me-auto mb-3 px-4 py-3"><?php
                            // Inclure le code pour récupérer le nom de rôle de l'utilisateur
                            // (remplacer le code par le code que je vous ai donné)
                            $user = auth()->user();
                            $roles = $user->roles;
                            foreach ($roles as $role) {
                                $roleName = $role->name;
                                echo "" . $roleName;
                            }
                        ?></div>
                    </div>
                    <!--end::Profile-->
                </div>

            </div>





        </div>
        <!--end::Card body-->
    </div>
    <!--end::Content-->
</div>
<!--end::Overview-->
        <!--begin::Sign-in Method-->
<div class="card  mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Méthode de connexion.</h3>
        </div>
    </div>
    <!--end::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_signin_method" class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <!--begin::Email Address-->
            <div class="d-flex flex-wrap align-items-center">
                <!--begin::Label-->
                <div id="kt_signin_email">
                    <div class="fs-6 fw-bold mb-1">Adresse mail</div>

                    <!--begin::Form-->
                    <form id="kt_signin_change_email" method="post" action="{{ route('profile.update') }}" class="form" novalidate="novalidate">
                        @csrf
                        @method('patch')


                                <div class="fv-row mb-0">

                                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>
                                <div class="separator separator-dashed my-6"></div>


                        <div class="d-flex">
                                <x-primary-button class="btn btn-light-primary">{{ __('Modifier') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Votre mail a ete modifier.') }}</p>
            @endif
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->


            </div>
            <!--end::Email Address-->

            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->

            <!--begin::Password-->
            <div class="d-flex flex-wrap align-items-center mb-10">
                <!--begin::Label-->
                <div id="kt_signin_password">
                    <div class="fs-6 fw-bold mb-1">Mot de passe</div>

                    <!--begin::Form-->
                    <form id="kt_signin_change_password"method="post" action="{{ route('password.update') }}" class="form" novalidate="novalidate">
                        @csrf
                        @method('put')
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <x-input-label for="current_password" :value="__('Mot de passe actuel')" class="form-label fs-6 fw-bold mb-3"/>
                                    <x-text-input id="current_password" name="current_password" type="password" class="form-control form-control-lg form-control-solid " autocomplete="current-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <x-input-label for="password" :value="__('nouveau mot de passe')" class="form-label fs-6 fw-bold mb-3" />
                                    <x-text-input id="password" name="password" type="password"  class="form-control form-control-lg form-control-solid "  autocomplete="new-password" />

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                     <x-input-label for="password_confirmation" :value="__('Confirmez le mot de passe')" class="form-label fs-6 fw-bold mb-3"/>
                                     <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control form-control-lg form-control-solid " autocomplete="new-password" />
                                     <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="form-text mb-5">Le mot de passe doit comporter au moins 8 caractères et contenir des symboles.</div>

                        <div class="d-flex">
                             <x-primary-button class="btn btn-light-primary">{{ __('Modifier') }}</x-primary-button>
                            @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >{{ __('Saved.') }}</p>
                            @endif

                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->

                <!--begin::Action-->

                <!--end::Action-->
            </div>
            <!--end::Password-->



        </div>
        <!--end::Card body-->
    </div>
    <!--end::Content-->
</div>
<!--end::Sign-in Method-->

        <!--begin::Basic info-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Détails du profil</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->

    <!--begin::Content-->
    <div id="kt_account_settings_profile_details" class="collapse show">
        <!--begin::Form-->
        <form method="post" action="{{ route('profile.update') }}"  enctype="multipart/form-data"class="mt-6 space-y-6">
            @csrf
            @method('patch')
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar"     style="color: rgb(29, 115, 244)" class=" form-control-lg form-control-solid @error('avatar') is-invalid @enderror"/>
                    @error('avatar')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!--begin::Input group-->
                <div class="row mb-6">

                    <!--begin::Label-->


                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nom & Prenom</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row">
                                <x-text-input id="name" name="name" type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                           </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row">
                                <x-text-input id="prenom" name="prenom" type="text" class="form-control form-control-lg form-control-solid" :value="old('prenom', $user->prenom)" required autofocus autocomplete="prenom" />
                                    <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Telephone </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <x-text-input id="phone" name="phone" type="text" class="form-control form-control-lg form-control-solid" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
                        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->


                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Cin</span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <x-text-input id="cin" name="cin" type="text" class="form-control form-control-lg form-control-solid" :value="old('cin', $user->cin)" required autofocus autocomplete="cin" />
                        <x-input-error class="mt-2" :messages="$errors->get('cin')" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                 <!--begin::Input group-->
                 <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Ville </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <x-text-input id="ville" name="ville" type="text" class="form-control form-control-lg form-control-solid" :value="old('ville', $user->ville)" required autofocus autocomplete="ville" />
                            <x-input-error class="mt-2" :messages="$errors->get('ville')" />                    </div>
                    <!--end::Col-->
                </div>



 <!--begin::Input group-->
 <div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-4 col-form-label fw-semibold fs-6">Code postal</label>
    <!--end::Label-->

    <!--begin::Col-->
    <div class="col-lg-8 fv-row">
        <x-text-input id="codepostal" name="codepostal" type="text" class="form-control form-control-lg form-control-solid" :value="old('codepostal', $user->codepostal)" required autofocus autocomplete="codepostal" />
            <x-input-error class="mt-2" :messages="$errors->get('codepostal')" />                    </div>
    <!--end::Col-->
</div>




                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Adresse</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <x-text-input id="address" name="address" type="text" class="form-control form-control-lg form-control-solid" :value="old('address', $user->address)" required autofocus autocomplete="address" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->

                <!--end::Input group-->


                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Salaire</label>
                    <!--end::Label-->


                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <div id="salaire" name="salaire" type="text" class="form-control form-control-lg form-control-solid" > {{ $user->salaire }}
                                  </div>
                    <!--end::Col-->
                </div>

                </div>
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Solde</label>
                    <!--end::Label-->

                    <!--begin::Col-->

                        <div class="col-lg-8 fv-row">
                            <div id="solde" name="solde" type="text" class="form-control form-control-lg form-control-solid" > {{ $user->solde }}
                                      </div>
                        <!--end::Col-->
                </div>

                </div>

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Matricule</label>
                        <!--end::Label-->


                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <div id="num_emp" name="num_emp" type="text" class="form-control form-control-lg form-control-solid" > {{ $user->num_emp }}
                                      </div>
                        <!--end::Col-->
                    </div>

                    </div>
                <!--end::Input group-->
            </div>
            <!--end::Card body-->

            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">

                <x-primary-button class="btn btn-light-primary">{{ __('Modifier ') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
                    >{{ __('modifier.') }}</p>
                @endif
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Basic info-->




        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Deactivate Account-->    </div>
    <!--end::Layout-->
</div></div>
<!--end::Container-->                	</div>
                    <!--end::Post-->
				</div>
				<!--end::Content-->
@endsection
