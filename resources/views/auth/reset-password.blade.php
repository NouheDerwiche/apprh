
<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Craft
Product Version: 1.1.2
Purchase: https://themes.getbootstrap.com/product/craft-bootstrap-5-admin-dashboard-theme
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
    <!--begin::Head-->
    <head>
        <title>Platforme de gestion de ressource humaine </title>
        <meta charset="utf-8">
        <meta name="description" content="Craft admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets.">
        <meta name="keywords" content="Craft, bootstrap, bootstrap 5, admin themes, dark mode, free admin themes, bootstrap admin, bootstrap dashboard">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="article">
        <meta property="og:title" content="Craft - Bootstrap 5 HTML Admin Dashboard Theme">
        <meta property="og:url" content="https://themes.getbootstrap.com/product/craft-bootstrap-5-admin-dashboard-theme">
        <meta property="og:site_name" content="Keenthemes | Craft">
        <link rel="canonical" href="../../index.htm">
        <link rel="shortcut icon" href="../../assets/media/logos/favicon.ico">

        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="../../../css?family=Inter:300,400,500,600,700">        <!--end::Fonts-->




                    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
                    <link href="{{asset('../../assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css">
                    <link href="{{asset('../../assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css">
                <!--end::Global Stylesheets Bundle-->


                    <!--Begin::Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
<!--End::Google Tag Manager -->
            </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body id="kt_body" class="auth-bg">
        <!--begin::Theme mode setup on page load-->
<script>
	var defaultThemeMode = "light";
	var themeMode;

	if ( document.documentElement ) {
		if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
			themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
		} else {
			if ( localStorage.getItem("data-bs-theme") !== null ) {
				themeMode = localStorage.getItem("data-bs-theme");
			} else {
				themeMode = defaultThemeMode;
			}
		}

		if (themeMode === "system") {
			themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
		}

		document.documentElement.setAttribute("data-bs-theme", themeMode);
	}
</script>
<!--end::Theme mode setup on page load-->
                    <!--Begin::Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!--End::Google Tag Manager (noscript) -->

        <!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - New password -->
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column position-xl-fixed top-33 bottom-0 w-xl-600px ">
            <!--begin::Header-->
            <div class="d-flex flex-row-fluid flex-column text-center p-5 p-lg-10 pt-lg-20">
                <a  class="py-2 py-lg-20">
                    <img alt="Logo" src="../../assets/media/logos/rr.png" class="max-h-50px logo-default theme-light-show" style="margin-left: -50px;">
                    <img alt="Logo" src="../../assets/media/logos/rr.png" class="max-h-50px logo-default theme-dark-show" style="margin-left: -50px;">
                    <h1 class="d-none d-lg-block fw-bold text-white fs-2qx pb-5 pb-md-10">
                        RH.TUNISIE
                       </h1>

                       <div class="d-none d-lg-block d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url({{asset('../../assets/media/illustrations/sigma-1/17.png)')}}">
                       </div>

                </a>
                <!--end::Title-->


                <!--end::Description-->
            </div>
            <!--end::Header-->


            <!--end::Illustration-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--begin::Aside-->

    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid py-10">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-550px p-10 p-lg-15 mx-auto">
<!--begin::Heading-->
<div class="text-center mb-10">
    <!--begin::Title-->
    <h1 class="text-dark mb-3">
        Configurer un nouveau mot de passe
    </h1>
    <!--end::Title-->

    <!--begin::Link-->
    <div class="text-gray-400 fw-semibold fs-4">
        Vous avez déjà réinitialisé votre mot de passe ?

        <a href="{{ route('login') }}" class="link-primary fw-bold">
            Se connecter
        </a>
    </div>
    <!--end::Link-->
</div>
<!--begin::Form-->
<form method="POST" action="{{ route('password.store') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">




    <!-- Email Address -->
    <div>
        <x-input-label class="form-label fw-bold text-dark fs-6" for="email" :value="__('Email')" />
        <x-text-input id="email" class="form-control form-control-lg form-control-solid" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>



 <!--begin::Input group-->
 <div class="mb-10 fv-row" data-kt-password-meter="true">
    <!--begin::Wrapper-->

<!--begin::Wrapper-->


    <div class="mb-1">
         <!-- Password -->
        <x-input-label class="form-label fw-bold text-dark fs-6" for="password" :value="__('Password')" />
        <div class="position-relative mb-3">
        <x-text-input id="password" class="form-control form-control-lg form-control-solid" type="password" name="password" required autocomplete="new-password" />
        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
            <i class="bi bi-eye-slash fs-2"></i>

            <i class="bi bi-eye fs-2 d-none"></i>
        </span>

    </div>
<!--begin::Meter-->
<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
</div>
<!--end::Meter-->
</div>
<!--end::Wrapper-->
 <!--begin::Hint-->
 <div class="text-muted">
    Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de symboles.
</div>
<x-input-error :messages="$errors->get('password')" class="mt-2" />
<!--end::Hint-->
</div>
<!--end::Input group--->









    <!-- Confirm Password -->
    <div class="fv-row mb-10">
        <x-input-label class="form-label fw-bold text-dark fs-6" for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" class="form-control form-control-lg form-control-solid"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
    <div class="text-center">

        <x-primary-button class="btn btn-lg btn-primary fw-bold">
            {{ __(' Envoyer') }}
        </x-primary-button>

</div>
</form>
<!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->

    </div>
    <!--end::Body-->
</div>
<!--end::Authentication - New password-->
                         	</div>
<!--end::Main-->


        <!--begin::Javascript-->
        <script>
            var hostUrl = "/craft/assets/";        </script>

                    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                            <script src="../../assets/plugins/global/plugins.bundle.js"></script>
                            <script src="../../assets/js/scripts.bundle.js"></script>
                        <!--end::Global Javascript Bundle-->


                    <!--begin::Custom Javascript(used for this page only)-->
                            <script src="../../assets/js/custom/authentication/reset-password/new-password.js"></script>
                        <!--end::Custom Javascript-->
                <!--end::Javascript-->

            </body>
    <!--end::Body-->
</html>
