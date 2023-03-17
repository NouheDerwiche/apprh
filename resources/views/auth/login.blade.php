
<!DOCTYPE html>

<html lang="en">
    <!--begin::Head-->
    <head>
        <title>Craft | Bootstrap 5 HTML Admin Dashboard Theme by Keenthemes</title>
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
        <link rel="shortcut icon" href="{{asset('../../assets/media/logos/favicon.ico')}}">

        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="../../../css?family=Inter:300,400,500,600,700">        <!--end::Fonts-->



                    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
                            <link href="{{asset('../../assets/plugins/global/plugins.bundle.css')}} rel="stylesheet" type="text/css">
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
		<!--begin::Authentication - Sign-in -->
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
            <!--begin::Header-->
            <div class="d-flex flex-row-fluid flex-column text-center p-5 p-lg-10 pt-lg-20">
                <!--begin::Logo-->
                <a href="../../index.html" class="py-2 py-lg-20">
                    <img alt="Logo" src="{{asset('../../assets/media/logos/logo-ellipse.svg')}}" class="h-60px h-lg-70px">
                </a>
                <!--end::Logo-->

                <!--begin::Title-->
                <h1 class="d-none d-lg-block fw-bold text-white fs-2qx pb-5 pb-md-10">
                    Welcome To NACHED-IT
                </h1>
                <!--end::Title-->


            </div>
            <!--end::Header-->

            <!--begin::Illustration-->
            <div class="d-none d-lg-block d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url({{asset('../../assets/media/illustrations/sigma-1/17.png)')}}">
            </div>
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
            <div class="w-lg-500px p-10 p-lg-15 mx-auto">






                <form  class="form w-100" novalidate="novalidate" id="kt_sign_in_form"  method="POST" action="{{ route('login') }}">
                     <!--begin::Heading-->
    <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-dark mb-3">
           {{ __('Sign In')}}     </h1>
        <!--end::Title-->
                    @csrf
    </div>
                    <!-- Email Address -->
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bold text-dark">{{ __('Email') }}</label>


                        <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="invalid-feedback" />
                    </div>

                    <!-- Password -->
                    <div class="fv-row mb-10">
                        <div class="d-flex flex-stack mb-2">
                            <label class="form-label fw-bold text-dark fs-6 mb-0">{{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bold">
                                {{ __('Forgot your password?') }}
                                @endif
                            </a>
                        </div>
                        <x-text-input id="password" class="form-control form-control-lg"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="invalid-feedback" />
                    </div>





                    <div class="text-center">
                        <x-primary-button class="btn btn-lg btn-primary w-50 mb-5">

                            {{ __('Log in') }}

                        </x-primary-button>
                    </div>
                </form>























            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->

        <!--begin::Footer-->
        <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
            <!--begin::Links-->
            <div class="d-flex flex-center fw-semibold fs-6">
                <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">About</a>

                <a href="https://devs.keenthemes.com" class="text-muted text-hover-primary px-2" target="_blank">Support</a>

                <a href="https://themes.getbootstrap.com/product/craft-bootstrap-5-admin-dashboard-theme" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Body-->
</div>
<!--end::Authentication - Sign-in-->
                         	</div>
<!--end::Main-->


        <!--begin::Javascript-->
        <script>
            var hostUrl = "/craft/assets/";        </script>

                    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                            <script src="{{asset('../../assets/plugins/global/plugins.bundle.js')}}"></script>
                            <script src="{{asset('../../assets/js/scripts.bundle.js')}}"></script>
                        <!--end::Global Javascript Bundle-->


                    <!--begin::Custom Javascript(used for this page only)-->
                            <script src="{{asset('../../assets/js/custom/authentication/sign-in/general.js')}}"></script>
                        <!--end::Custom Javascript-->
                <!--end::Javascript-->

            </body>
    <!--end::Body-->
</html>
