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
                                 style="background-image:url({{ asset('storage') . $election->banner }})"></div>
                            <div class="overlay-layer rounded bg-black" style="opacity: 0.1"></div>
                        </div>
                        <div class="position-absolute text-white mb-8 ms-10 bottom-0">

                        </div>
                    </div>

                    <div class="d-flex flex-column flex-lg-row mb-17">

                        <div class="flex-lg-row-fluid me-0 me-lg-20">
                            <div class="mb-17">
                                <div class="m-0">
                                    <h4 class="fs-2hx text-gray-800 w-bolder mb-6">{{ $election->name }}</h4>
                                    <p class="fw-semibold fs-4 text-gray-600 mb-2">{!! $election->description !!}</p>
                                </div>
                            </div>

                            <div class="mb-17">
                                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

                                    <div class="col-xl-6">
                                        <div class="card h-lg-100" style="background: linear-gradient(112.14deg, #b5b5b5 0%, #807f7f 100%)">
                                            <div class="card-body p-5">
                                                <div class="row align-items-center">
                                                    <div class="col-12 pe-0 mb-5 mb-sm-0">
                                                        <div class="d-flex justify-content-between h-100 flex-column pt-xl-5 pb-xl-2 ps-xl-7">
                                                            <div class="mb-7">
                                                                <div class="mb-6">
                                                                    <i class="ki-outline ki-category text-white fs-2x ms-n1"></i>
                                                                </div>
                                                                <div class="mb-6">
                                                                    <h3 class="fs-2x fw-bolder text-white_" style="color: #5f5f5f">Lista de Medios Habilitados</h3>
                                                                    <span class="fw-semibold text-white opacity-75">Publicación de los Medios de Comunicación Habilitados para la Difución.</span>
                                                                </div>
                                                            </div>
                                                            <div class="m-0">
                                                                <a href="{{ route('web_show_list_accreditation_rates', ['id' => $election->id, 'slug' => \Illuminate\Support\Str::slug($election->name)]) }}" class="btn btn-dark bg-white_ bg-opacity-15_ bg-hover-opacity-35 fw-semibold">Ver más</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="card h-lg-100" style="background: linear-gradient(112.14deg, #f9bf17 0%, #f7c73d 100%)">
                                            <div class="card-body p-5">
                                                <div class="row align-items-center">
                                                    <div class="col-12 pe-0 mb-5 mb-sm-0">
                                                        <div class="d-flex justify-content-between h-100 flex-column pt-xl-5 pb-xl-2 ps-xl-7">
                                                            <div class="mb-7">
                                                                <div class="mb-6">
                                                                    <i class="ki-outline ki-category text-white fs-2x ms-n1"></i>
                                                                </div>
                                                                <div class="mb-6">
                                                                    <h3 class="fs-2x fw-bolder text-white_" style="color: #5f5f5f">Material de Propaganda Electoral</h3>
                                                                    <span class="fw-semibold text-white opacity-75">Publicación del listado de Material de los Partido Políticos.</span>
                                                                </div>
                                                            </div>
                                                            <div class="m-0">
                                                                <a href="{{ route('web_show_list_material', ['id' => $election->id, 'slug' => \Illuminate\Support\Str::slug($election->name)]) }}" class="btn btn-dark bg-white_ bg-opacity-15_ bg-hover-opacity-35 fw-semibold">Ver más</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="flex-lg-row-auto w-100 w-lg-275px w-xxl-350px">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <div class="mb-8">
                                        <h4 class="text-gray-700 w-bolder mb-10">Datos del Proceso Electoral</h4>
                                        <div class="my-2">
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="bullet me-3"></span>
                                                <div class="text-gray-600 fw-semibold fs-6">
                                                    <span class="fw-bold">Fecha del Proceso:</span><span class="text-gray-900">{{ $election->election_date }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="bullet me-3"></span>
                                                <div class="text-gray-600 fw-semibold fs-6">
                                                    <span class="fw-bold">Categoría:</span><span class="text-gray-900">{{ $election->type }}</span>
                                                </div>
                                            </div>
                                            @if($election->end_date_media_registration)
                                            <div class="d-flex align-items-center mb-3">
                                                <span class="bullet me-3"></span>
                                                <div class="text-gray-600 fw-semibold fs-6">
                                                    <span class="fw-bold">Plazo Registro Medios:</span><span class="text-gray-900">{{ $election->end_date_media_registration }}</span>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

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