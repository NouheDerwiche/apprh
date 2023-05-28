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
                                <h1 class="text-dark fw-bold my-1 fs-2">
                                    Calendrier </h1>
                                <!--end::Title-->

                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb fw-semibold fs-base my-1">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="../index.html" class="text-muted text-hover-primary">
                                            Tableau de bord </a>
                                    </li>

                                    <li class="breadcrumb-item text-dark">
                                        Calendrier </li>

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Info-->


                        </div>
                    </div>
                    <!--end::Toolbar-->

                    <!--begin::Post-->
                    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div class=" container-xxl ">
                            <!--begin::Card-->
                            <div class="card ">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <h2 class="card-title fw-bold">
                                        Calendrier
                                    </h2>

                                    <div class="card-toolbar">
                                        <a href="{{ route('tache.create') }}" class="btn btn-primary">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2"><svg width="24" height="24"
                                                    viewbox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="11.364" y="20.364"
                                                        width="16" height="2" rx="1"
                                                        transform="rotate(-90 11.364 20.364)" fill="currentColor">
                                                    </rect>
                                                    <rect x="4.36396" y="11.364" width="16"
                                                        height="2" rx="1" fill="currentColor"></rect>
                                                </svg></span>
                                            <!--end::Svg Icon-->
                                            Ajouter une tache
                                            </a>
                                    </div>
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                <div class="card-body">
                    <div class="calendar-container" wire:ignore>
                        <livewire:calendar  />

                    </div>
                    @livewireScripts
                    @stack('scripts')
                </div>
                <!--end::Card body-->




                   </div>
                            <!--end::Card-->


@endsection
