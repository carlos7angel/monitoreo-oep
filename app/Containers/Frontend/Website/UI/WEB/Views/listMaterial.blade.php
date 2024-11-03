@extends('vendor@template::landing.layouts.master')

@section('content')
    <!--begin:: Section-->
    <div class="mt-lg-15 mb-lg-15 position-relative z-index-2">
        <div class="container">
            <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                <div class="card-body p-lg-15">

                    <div class="position-relative mb-17">
                        <div class="overlay overlay-show">
                            <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-300px"
                                 style="background-image:url({{ asset('storage') . $election->banner }})">
                            </div>
                            <div class="overlay-layer rounded bg-black" style="opacity: 0.1"></div>
                        </div>
                        <div class="position-absolute text-white mb-8 ms-10 bottom-0">

                        </div>
                    </div>

                    <div class="row mb-17">

                        <div class="text-center mb-17">
                            <div class="fs-4 text-muted fw-bold">Lista de Partidos Políticos Habilitados<br/>
                            <h4 class="fs-2hx text-warning fw-bolder mb-1">Material Propaganda Electoral</h4>
                            </div>
                        </div>


                        @foreach($registrations as $registration)
                        <div class="d-flex flex-column flex-lg-row">
                            <div class="flex-column flex-lg-row-auto w-100 w-lg-275px mb-10 me-lg-20">
                                <div class="mb-15">
                                    <img src="{{ asset('storage') . $registration->politicalGroup->logo }}" class="w-100" style="max-width: 350px" alt="Logo Partido Político">
                                </div>
                            </div>
                            <div class="flex-lg-row-fluid">
                                <div class="mb-13">
                                    <div class="mb-15">
                                        <h4 class="fs-2x text-gray-800 w-bolder mb-1">{{ $registration->politicalGroup->name }}</h4>
                                        <p class="fw-semibold fs-4 text-gray-600 mb-2">Material de Propaganda Electoral</p>
                                    </div>
                                    <div class="mb-15">

                                        @foreach($registration->materials as $material)
                                        <div class="overflow-auto pb-5">
                                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                                <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                    <img alt="" class="w-30px me-3" src="{{ asset('themes/admin/media/svg/files/pdf.svg') }}" />
                                                    <div class="ms-1 fw-semibold">
                                                        @if($material->type == 'FILE')
                                                            <a href="{{ $material->fileMaterial->url_file }}" target="_blank" class="fs-6 text-hover-primary fw-bold">{{ $material->name }}</a>
                                                        @endif
                                                        @if($material->type == 'LINK')
                                                            <a href="{{ $material->link_material }}" target="_blank" class="fs-6 text-hover-primary fw-bold">{{ $material->name }}</a>
                                                        @endif
                                                        <div class="text-gray-500">1.9mb</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

{{--                                        <div class="overflow-auto pb-5">--}}
{{--                                            <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">--}}
{{--                                                <div class="d-flex flex-aligns-center pe-10 pe-lg-20">--}}
{{--                                                    <img alt="" class="w-30px me-3" src="{{ asset('themes/admin/media/svg/files/pdf.svg') }}" />--}}
{{--                                                    <div class="ms-1 fw-semibold">--}}
{{--                                                        <a href="" class="fs-6 text-hover-primary fw-bold">Finance KPI App Guidelines</a>--}}
{{--                                                        <div class="text-gray-500">1.9mb</div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator border-gray-400 my-5"></div>
                        @endforeach

                    </div>




{{--                    <div class="d-flex flex-column flex-lg-row">--}}
{{--                        <div class="flex-column flex-lg-row-auto w-100 w-lg-275px mb-10 me-lg-20">--}}
{{--                            <div class="mb-15">--}}
{{--                                <h4 class="text-gray-900 mb-7">Categories</h4>--}}
{{--                                <div class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary menu-active-bg-light-primary fw-semibold">--}}
{{--                                    <div class="menu-item mb-1">--}}
{{--                                        <a href="#" class="menu-link py-3 active">Bootstrap Admin</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="flex-lg-row-fluid">--}}
{{--                            <div class="mb-13">--}}
{{--                                <div class="mb-15">--}}
{{--                                    <h4 class="fs-2x text-gray-800 w-bolder mb-6">Frequesntly Asked Questions</h4>--}}
{{--                                    <p class="fw-semibold fs-4 text-gray-600 mb-2">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</p>--}}
{{--                                </div>--}}
{{--                                <div class="mb-15">--}}

{{--                                    <div class="overflow-auto pb-5">--}}
{{--                                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">--}}
{{--                                            <div class="d-flex flex-aligns-center pe-10 pe-lg-20">--}}
{{--                                                <img alt="" class="w-30px me-3" src="{{ asset('themes/admin/media/svg/files/pdf.svg') }}" />--}}
{{--                                                <div class="ms-1 fw-semibold">--}}
{{--                                                    <a href="" class="fs-6 text-hover-primary fw-bold">Finance KPI App Guidelines</a>--}}
{{--                                                    <div class="text-gray-500">1.9mb</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="overflow-auto pb-5">--}}
{{--                                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">--}}
{{--                                            <div class="d-flex flex-aligns-center pe-10 pe-lg-20">--}}
{{--                                                <img alt="" class="w-30px me-3" src="{{ asset('themes/admin/media/svg/files/pdf.svg') }}" />--}}
{{--                                                <div class="ms-1 fw-semibold">--}}
{{--                                                    <a href="" class="fs-6 text-hover-primary fw-bold">Finance KPI App Guidelines</a>--}}
{{--                                                    <div class="text-gray-500">1.9mb</div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}



                </div>
            </div>
        </div>
    </div>
    <!--end:: Section-->
@endsection

@section('styles')
@endsection

@section('scripts')

@endsection