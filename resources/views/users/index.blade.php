@extends('test.index')
@section('content')
<div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
    <!--begin::Title-->
    <h1 class="text-dark fw-bold my-1 fs-2">
        listes des employes<small class="text-muted fs-6 fw-normal ms-1"></small>
    </h1>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
	<!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
<div class=" container-xxl ">
<!--begin::Card-->
<div class="card">
<!--begin::Card header-->
<div class="card-header border-0 pt-6">
<!--begin::Card title-->
<div class="card-title">
<!--begin::Search-->
<div class="d-flex align-items-center position-relative my-1">
<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->

<div>
    <div class="menu-item menu-accordion">
        <div class="">

            <form action="{{ route('users.index') }}" method="GET" role="search" >

                <div class="input-group" >
                    <span class="menu-bullet">
                        <button class="btn btn-primary" type="submit" title="chercher par Matricule ">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control mr-2" name="term" placeholder="chercher utilisateur" id="term">
                    <a href="{{ route('users.index') }}" class=" mt-1">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" title="Refresh page">
                                <span class="fas fa-sync-alt"></span>
                            </button>
                        </span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!--end::Search-->
</div>
<!--begin::Card title-->

<!--begin::Card toolbar-->
<div class="card-toolbar">
<!--begin::Toolbar-->
<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">



<!--begin::Add user-->
<a type="button" href="{{ route('users.create') }}" class="btn btn-primary"  >
    Ajouter utilisateur
</a>
<!--end::Add user-->

<!--end::Toolbar-->



<!--begin::Modal - Adjust Balance-->
<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
<!--begin::Modal dialog-->
<div class="modal-dialog modal-dialog-centered mw-650px">
<!--begin::Modal content-->
<div class="modal-content">
<!--begin::Modal header-->
<div class="modal-header">
<!--begin::Modal title-->
<h2 class="fw-bold">Export Users</h2>
<!--end::Modal title-->

<!--begin::Close-->
<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
<span class="svg-icon svg-icon-1"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
</svg>

</span>
<!--end::Svg Icon-->                </div>
<!--end::Close-->
</div>
<!--end::Modal header-->

<!--begin::Modal body-->
<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
<!--begin::Form-->

<!--end::Form-->
</div>
<!--end::Modal body-->
</div>
<!--end::Modal content-->
</div>
<!--end::Modal dialog-->
</div>
<!--end::Modal - New Card-->

<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
<!--begin::Modal dialog-->
<div class="modal-dialog modal-dialog-centered mw-650px">
<!--begin::Modal content-->
<div class="modal-content">
<!--begin::Modal header-->
<div class="modal-header" id="kt_modal_add_user_header">
<!--begin::Modal title-->
<h2 class="fw-bold">Ajouter un utilisateur</h2>
<!--end::Modal title-->

<!--begin::Close-->
<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
<span class="svg-icon svg-icon-1"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
</svg>

</span>
<!--end::Svg Icon-->                </div>
<!--end::Close-->
</div>
<!--end::Modal header-->

<!--begin::Modal body-->
<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
<!--begin::Form-->
<form id="kt_modal_add_user_form" class="form" action="#">
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
            <!--end::Label-->


<!--begin::Image placeholder-->
<style>
.image-input-placeholder {
background-image: url('../../../assets/media/svg/files/blank-image.svg');
}

[data-bs-theme="dark"] .image-input-placeholder {
background-image: url('../../../assets/media/svg/files/blank-image-dark.svg');
}
</style>
<!--end::Image placeholder-->
            <!--begin::Image input-->
            <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-125px h-125px" style="background-image: url(../../../assets/media/avatars/300-6.jpg);"></div>
                <!--end::Preview existing avatar-->

                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>

                    <!--begin::Inputs-->
                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                    <input type="hidden" name="avatar_remove">
                    <!--end::Inputs-->
                </label>
                <!--end::Label-->

                <!--begin::Cancel-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <!--end::Cancel-->

                <!--begin::Remove-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <!--end::Remove-->
            </div>
            <!--end::Image input-->

            <!--begin::Hint-->
            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
            <!--end::Hint-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
            <!--end::Label-->

            <!--begin::Input-->
            <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="Emma Smith">
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2">Email</label>
            <!--end::Label-->

            <!--begin::Input-->
            <input type="email" name="user_email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="smith@kpmg.com">
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-7">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-5">Role</label>
            <!--end::Label-->

            <!--begin::Roles-->
                                            <!--begin::Input row-->
                <div class="d-flex fv-row">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input me-3" name="user_role" type="radio" value="0" id="kt_modal_update_role_option_0" checked='checked'>
                        <!--end::Input-->

                        <!--begin::Label-->
                        <label class="form-check-label" for="kt_modal_update_role_option_0">
                            <div class="fw-bold text-gray-800">Administrator</div>
                            <div class="text-gray-600">Best for business owners and company administrators</div>
                        </label>
                        <!--end::Label-->
                    </div>
                    <!--end::Radio-->
                </div>
                <!--end::Input row-->

                <div class='separator separator-dashed my-5'></div>                                                            <!--begin::Input row-->
                <div class="d-flex fv-row">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input me-3" name="user_role" type="radio" value="1" id="kt_modal_update_role_option_1">
                        <!--end::Input-->

                        <!--begin::Label-->
                        <label class="form-check-label" for="kt_modal_update_role_option_1">
                            <div class="fw-bold text-gray-800">Developer</div>
                            <div class="text-gray-600">Best for developers or people primarily using the API</div>
                        </label>
                        <!--end::Label-->
                    </div>
                    <!--end::Radio-->
                </div>
                <!--end::Input row-->

                <div class='separator separator-dashed my-5'></div>                                                            <!--begin::Input row-->
                <div class="d-flex fv-row">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input me-3" name="user_role" type="radio" value="2" id="kt_modal_update_role_option_2">
                        <!--end::Input-->

                        <!--begin::Label-->
                        <label class="form-check-label" for="kt_modal_update_role_option_2">
                            <div class="fw-bold text-gray-800">Analyst</div>
                            <div class="text-gray-600">Best for people who need full access to analytics data, but don't need to update business settings</div>
                        </label>
                        <!--end::Label-->
                    </div>
                    <!--end::Radio-->
                </div>
                <!--end::Input row-->

                <div class='separator separator-dashed my-5'></div>                                                            <!--begin::Input row-->
                <div class="d-flex fv-row">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input me-3" name="user_role" type="radio" value="3" id="kt_modal_update_role_option_3">
                        <!--end::Input-->

                        <!--begin::Label-->
                        <label class="form-check-label" for="kt_modal_update_role_option_3">
                            <div class="fw-bold text-gray-800">Support</div>
                            <div class="text-gray-600">Best for employees who regularly refund payments and respond to disputes</div>
                        </label>
                        <!--end::Label-->
                    </div>
                    <!--end::Radio-->
                </div>
                <!--end::Input row-->

                <div class='separator separator-dashed my-5'></div>                                                            <!--begin::Input row-->
                <div class="d-flex fv-row">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input me-3" name="user_role" type="radio" value="4" id="kt_modal_update_role_option_4">
                        <!--end::Input-->

                        <!--begin::Label-->
                        <label class="form-check-label" for="kt_modal_update_role_option_4">
                            <div class="fw-bold text-gray-800">Trial</div>
                            <div class="text-gray-600">Best for people who need to preview content data, but don't need to make any updates</div>
                        </label>
                        <!--end::Label-->
                    </div>
                    <!--end::Radio-->
                </div>
                <!--end::Input row-->

                                                                        <!--end::Roles-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Scroll-->

    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
            Discard
        </button>

        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
            <span class="indicator-label">
                Submit
            </span>
            <span class="indicator-progress">
                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
    <!--end::Actions-->
</form>
<!--end::Form-->
</div>
<!--end::Modal body-->
</div>
<!--end::Modal content-->
</div>
<!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->        </div>
<!--end::Card toolbar-->
</div>
<!--end::Card header-->
</div>
<!--begin::Card body-->
<div class="card-body py-4">

    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
    <!--begin::Table head-->
    <thead>

    <!--begin::Table row-->
    <tr >
    <th>N°</th>
    <th class="min-w-125px">Matricule</th>
    <th class="min-w-125px">Nom d'employe</th>
    <th class="min-w-125px">Email d'employe</th>
    <th class="min-w-125px">Role</th>

    <th class="text-end min-w-100px">Actions</th>
    </tr>

    <!--end::Table row-->
    </thead>
    <!--end::Table head-->

    <!--begin::Table body-->
    <tbody class="text-gray-600 fw-semibold">
        <!--begin::Table row-->

    @foreach ($data as $key => $user)
    @if ($user)
    <tr>
    <!--begin::Checkbox-->

    <!--end::Checkbox-->
    <td>{{ ++$i }}</td>
    <!--begin::User--->


    <td>
        <div class="d-flex flex-column">
            <a href="view.html" class="text-gray-800 text-hover-primary mb-1">
        {{ $user->num_emp }}</a>

        </div>
        </td>



    <td >

        <!--end::Avatar-->

        <!--begin::User details-->
        <div class="d-flex flex-column">
            <a href="view.html" class="text-gray-800 text-hover-primary mb-1">{{ $user->name }} {{ $user->prenom }}</a>

        </div>
        <!--begin::User details-->

    </td>




    <!--end::User--->
    <td>
    <div class="d-flex flex-column">
        <a href="view.html" class="text-gray-800 text-hover-primary mb-1">
    {{ $user->email }}</a>

    </div>
    </td>
    <!--begin::Role--->
    <td>
        @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <!--end::Role--->



    <!--begin::Action--->
    <td class="text-end">
        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            Actions
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
    <span class="svg-icon svg-icon-5 m-0"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
    </svg>
    </span>
    <!--end::Svg Icon-->                    </a>
        <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
    <a href="{{ route('users.edit',$user->id) }}" class="menu-link px-3">
    Edit
    </a>
    </div>
    <div class="menu-item px-3">
        <a href="{{ route('users.show',$user->id) }}" class="menu-link px-3">
        show
        </a>
        </div>



    <!--end::Menu item-->
    <div class="menu-item px-3">
        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
        {!! Form::submit('Delete', ['class' => 'menu-link px-3', 'onclick' => 'return confirmDelete(event)']) !!}
    {!! Form::close() !!}


    <style>.confirm-dialog {
        position: fixed;
        top: 50%;
        left: 60%;
        transform: translate(-50%, -250%);
        background-color: #3987ee;
        border-radius: 5px;
        border: 1px solid #3987ee;
        box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        padding: 20px;
        max-width: 500px;
        margin: 0 auto;
        text-align: center;
    }

    .confirm-dialog h2 {
        margin-top: 0;
    }

    .confirm-dialog p {
        margin-bottom: 2px;
    }

    .confirm-dialog .btn {
        margin-right: 10px;
    }

    </style>

        <script>
            function confirmDelete(event) {
                event.preventDefault(); // Empêche l'envoi du formulaire par défaut

                // Créer la boîte de dialogue personnalisée
                var confirmDialog = document.createElement('div');
                confirmDialog.classList.add('confirm-dialog');

                var title = document.createElement('h2');
                title.textContent = 'Confirmation';
                confirmDialog.appendChild(title);

                var message = document.createElement('p');
                message.textContent = 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?';
                confirmDialog.appendChild(message);

                var confirmBtn = document.createElement('button');
                confirmBtn.classList.add('btn', 'btn-secondary');
                confirmBtn.textContent = 'Confirmer';
                confirmBtn.addEventListener('click', function() {
                    event.target.closest('form').submit();
                    document.body.removeChild(confirmDialog);
                });
                confirmDialog.appendChild(confirmBtn);

                var cancelBtn = document.createElement('button');
                cancelBtn.classList.add('btn', 'btn-secondary');
                cancelBtn.textContent = 'Annuler';
                cancelBtn.addEventListener('click', function() {
                    document.body.removeChild(confirmDialog);
                });
                confirmDialog.appendChild(cancelBtn);

                // Ajouter la boîte de dialogue au corps de la page
                document.body.appendChild(confirmDialog);
            }
        </script>

    </div>
    </div>
    <!--end::Menu-->
    </td>
    <!--end::Action--->
    </tr>
    <!--end::Table row-->

    <!--end::Table row-->
    @endif
    @endforeach
    </tbody>

    <!--end::Table body-->
    </table>

    <!--end::Table-->
    </div>
    <!--end::Card body-->

    <!--end::Card--></div>







</div>



</div>
<!--end::Container-->                	</div>
    <!--end::Post-->



</div>

{!! $data->render() !!}

    </div>


@endsection
