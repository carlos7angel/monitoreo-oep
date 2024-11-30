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

                        @if(count($registrations) > 0)
                        @foreach($registrations as $registration)
                        <div class="d-flex flex-column flex-lg-row">
                            <div class="flex-column flex-lg-row-auto w-100 w-xl-275px w-lg-200px mb-10 me-xl-20 me-lg-10">
                                <div class="mb-md-15">
                                    <div class="w-100">
                                        <div class="w-xl-275px h-xl-275px w-lg-200px h-lg-200px w-200px h-200px position-relative border-2 border-dashed border-secondary rounded-2"
                                             style="background-image: url({{ asset('storage') . $registration->politicalGroup->logo }}); background-size: contain;
                                                    background-repeat: no-repeat; background-position: center top">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-lg-row-fluid">
                                <div class="mb-10">
                                    <div class="mb-12">
                                        <h4 class="fs-2x text-gray-800 w-bolder mb-1">{{ $registration->politicalGroup->name }}</h4>
                                        <p class="fw-semibold fs-4 text-muted mb-2">Material de Propaganda Electoral</p>
                                    </div>
                                    <div class="mb-0">

                                        @if($registration->materials->where('genre', 'PROPAGANDA')->count() > 0)

                                        @foreach($registration->materials as $material)
                                            @if($material->genre == 'PROPAGANDA')
                                            <div class="overflow-auto pb-5">
                                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded p-5">
                                                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                        <img alt="" class="w-30px me-3" src="{{ asset('themes/common/media/svg/files/upload.svg') }}" />
                                                        <div class="ms-1 fw-semibold">
                                                            @if($material->type == 'FILE')
                                                                <a href="{{ $material->fileMaterial->url_file }}" target="_blank" rel="noopener" class="fs-6 text-hover-primary fw-bold">{{ $material->name }}</a>
                                                                <div class="text-gray-500">
                                                                    {{ $material->genre }}
                                                                </div>
                                                            @endif
                                                            @if($material->type == 'LINK')
                                                                <a href="{{ $material->link_material }}" target="_blank" rel="noopener" class="fs-6 text-hover-primary fw-bold">{{ $material->name }}</a>
                                                                <div class="text-gray-500">Enlace externo</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                        @else
                                            <span class="text-gray-500"><i>No exiten registros</i></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator border-gray-400 my-5"></div>
                        @endforeach
                        @else
                            <div class="text-center text-muted my-20"><i>No existen registros</i></div>
                        @endif

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