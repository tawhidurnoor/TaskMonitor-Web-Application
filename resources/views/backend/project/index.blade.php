@extends('backend.layouts.full.mainlayout')

@section('body')

<!--begin::Toolbar-->
<div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column py-1">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center my-1">
            <span class="text-dark fw-bolder fs-1">My Projects</span>
        </h1>
        <!--end::Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="../../index.html" class="text-muted text-hover-primary">Home</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">Apps</li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">Projects</li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">My Projects</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
    <!--begin::Actions-->
    <div class="d-flex align-items-center py-1">
        <!--begin::Button-->
        <a href="#" class="btn btn-flex btn-sm btn-primary fw-bolder border-0 fs-6 h-40px" data-bs-toggle="modal"
            data-bs-target="#kt_modal_create_project" id="kt_toolbar_primary_button">Create</a>
        <!--end::Button-->
    </div>
    <!--end::Actions-->
</div>
<!--end::Toolbar-->

<!--begin::Row-->
<div class="row g-6 g-xl-9">
    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        <!--begin::Card-->
        <a href="project.html" class="card border-hover-primary">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="assets_backend/media/svg/brand-logos/plurk.svg" alt="image" class="p-3" />
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->
            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bolder text-dark">Fitnes App</div>
                <!--end::Name-->
                <!--begin::Description-->
                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                <!--end::Description-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">Sep 22, 2022</div>
                        <div class="fw-bold text-gray-400">Due Date</div>
                    </div>
                    <!--end::Due-->
                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
                        <div class="fw-bold text-gray-400">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->
                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 50% completed">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->
                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Emma Smith">
                        <img alt="Pic" src="assets_backend/media/avatars/300-6.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Rudy Stone">
                        <img alt="Pic" src="assets_backend/media/avatars/300-1.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                        <span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        <!--begin::Card-->
        <a href="project.html" class="card border-hover-primary">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="assets_backend/media/svg/brand-logos/disqus.svg" alt="image" class="p-3" />
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light fw-bolder me-auto px-4 py-3">Pending</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->
            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bolder text-dark">Leaf CRM</div>
                <!--end::Name-->
                <!--begin::Description-->
                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                <!--end::Description-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">May 10, 2021</div>
                        <div class="fw-bold text-gray-400">Due Date</div>
                    </div>
                    <!--end::Due-->
                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">$36,400.00</div>
                        <div class="fw-bold text-gray-400">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->
                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 30% completed">
                    <div class="bg-info rounded h-4px" role="progressbar" style="width: 30%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->
                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
                        <span class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Brian Cox">
                        <img alt="Pic" src="assets_backend/media/avatars/300-5.jpg" />
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        <!--begin::Card-->
        <a href="project.html" class="card border-hover-primary">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="assets_backend/media/svg/brand-logos/figma-1.svg" alt="image" class="p-3" />
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Completed</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->
            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bolder text-dark">Atica Banking</div>
                <!--end::Name-->
                <!--begin::Description-->
                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                <!--end::Description-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">Mar 14, 2021</div>
                        <div class="fw-bold text-gray-400">Due Date</div>
                    </div>
                    <!--end::Due-->
                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">$605,100.00</div>
                        <div class="fw-bold text-gray-400">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->
                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 100% completed">
                    <div class="bg-success rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->
                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Mad Macy">
                        <img alt="Pic" src="assets_backend/media/avatars/300-2.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Cris Willson">
                        <img alt="Pic" src="assets_backend/media/avatars/300-9.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Mike Garcie">
                        <span class="symbol-label bg-info text-inverse-info fw-bolder">M</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        <!--begin::Card-->
        <a href="project.html" class="card border-hover-primary">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="assets_backend/media/svg/brand-logos/sentry-3.svg" alt="image" class="p-3" />
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light fw-bolder me-auto px-4 py-3">Pending</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->
            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bolder text-dark">Finance Dispatch</div>
                <!--end::Name-->
                <!--begin::Description-->
                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                <!--end::Description-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">May 05, 2022</div>
                        <div class="fw-bold text-gray-400">Due Date</div>
                    </div>
                    <!--end::Due-->
                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
                        <div class="fw-bold text-gray-400">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->
                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 60% completed">
                    <div class="bg-info rounded h-4px" role="progressbar" style="width: 60%" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->
                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Nich Warden">
                        <span class="symbol-label bg-warning text-inverse-warning fw-bolder">N</span>
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Rob Otto">
                        <span class="symbol-label bg-success text-inverse-success fw-bolder">R</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        <!--begin::Card-->
        <a href="project.html" class="card border-hover-primary">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="assets_backend/media/svg/brand-logos/xing-icon.svg" alt="image" class="p-3" />
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->
            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bolder text-dark">9 Degree</div>
                <!--end::Name-->
                <!--begin::Description-->
                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                <!--end::Description-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">Dec 20, 2022</div>
                        <div class="fw-bold text-gray-400">Due Date</div>
                    </div>
                    <!--end::Due-->
                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
                        <div class="fw-bold text-gray-400">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->
                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 40% completed">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 40%" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->
                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Francis Mitcham">
                        <img alt="Pic" src="assets_backend/media/avatars/300-20.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michelle Swanston">
                        <img alt="Pic" src="assets_backend/media/avatars/300-7.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                        <span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        <!--begin::Card-->
        <a href="project.html" class="card border-hover-primary">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="assets_backend/media/svg/brand-logos/tvit.svg" alt="image" class="p-3" />
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->
            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bolder text-dark">GoPro App</div>
                <!--end::Name-->
                <!--begin::Description-->
                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                <!--end::Description-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">Mar 10, 2022</div>
                        <div class="fw-bold text-gray-400">Due Date</div>
                    </div>
                    <!--end::Due-->
                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
                        <div class="fw-bold text-gray-400">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->
                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 70% completed">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 70%" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->
                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                        <img alt="Pic" src="assets_backend/media/avatars/300-2.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Robin Watterman">
                        <span class="symbol-label bg-success text-inverse-success fw-bolder">R</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        <!--begin::Card-->
        <a href="project.html" class="card border-hover-primary">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="assets_backend/media/svg/brand-logos/aven.svg" alt="image" class="p-3" />
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3">In Progress</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->
            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bolder text-dark">Buldozer CRM</div>
                <!--end::Name-->
                <!--begin::Description-->
                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                <!--end::Description-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">Feb 21, 2022</div>
                        <div class="fw-bold text-gray-400">Due Date</div>
                    </div>
                    <!--end::Due-->
                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
                        <div class="fw-bold text-gray-400">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->
                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 70% completed">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 70%" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->
                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                        <img alt="Pic" src="assets_backend/media/avatars/300-2.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="John Mixin">
                        <img alt="Pic" src="assets_backend/media/avatars/300-14.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Emma Smith">
                        <span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        <!--begin::Card-->
        <a href="project.html" class="card border-hover-primary">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="assets_backend/media/svg/brand-logos/treva.svg" alt="image" class="p-3" />
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-danger fw-bolder me-auto px-4 py-3">Overdue</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->
            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bolder text-dark">Aviasales App</div>
                <!--end::Name-->
                <!--begin::Description-->
                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                <!--end::Description-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">Aug 19, 2022</div>
                        <div class="fw-bold text-gray-400">Due Date</div>
                    </div>
                    <!--end::Due-->
                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
                        <div class="fw-bold text-gray-400">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->
                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 10% completed">
                    <div class="bg-danger rounded h-4px" role="progressbar" style="width: 10%" aria-valuenow="10"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->
                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
                        <span class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Brian Cox">
                        <img alt="Pic" src="assets_backend/media/avatars/300-5.jpg" />
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        <!--begin::Card-->
        <a href="project.html" class="card border-hover-primary">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="assets_backend/media/svg/brand-logos/kanba.svg" alt="image" class="p-3" />
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-success fw-bolder me-auto px-4 py-3">Completed</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->
            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bolder text-dark">Oppo CRM</div>
                <!--end::Name-->
                <!--begin::Description-->
                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                <!--end::Description-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">Jun 20, 2022</div>
                        <div class="fw-bold text-gray-400">Due Date</div>
                    </div>
                    <!--end::Due-->
                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bolder">$284,900.00</div>
                        <div class="fw-bold text-gray-400">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->
                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 100% completed">
                    <div class="bg-success rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->
                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Nick Macy">
                        <img alt="Pic" src="assets_backend/media/avatars/300-2.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Sean Paul">
                        <img alt="Pic" src="assets_backend/media/avatars/300-9.jpg" />
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Mike Collin">
                        <span class="symbol-label bg-info text-inverse-info fw-bolder">M</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->

<!--begin::Pagination-->
<div class="d-flex flex-stack flex-wrap pt-10">
    <div class="fs-6 fw-bold text-gray-700">Showing 1 to 10 of 50 entries</div>
    <!--begin::Pages-->
    <ul class="pagination">
        <li class="page-item previous">
            <a href="#" class="page-link">
                <i class="previous"></i>
            </a>
        </li>
        <li class="page-item active">
            <a href="#" class="page-link">1</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">2</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">3</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">4</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">5</a>
        </li>
        <li class="page-item">
            <a href="#" class="page-link">6</a>
        </li>
        <li class="page-item next">
            <a href="#" class="page-link">
                <i class="next"></i>
            </a>
        </li>
    </ul>
    <!--end::Pages-->
</div>
<!--end::Pagination-->
@endsection


<!--begin::Modal - Create Campaign-->
<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_create_project" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="add_project" action="{{route('project.store')}}" method="POST" class="form" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Add a project</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">If you need more info, please check
                            <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Project Title</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Specify a title for the project"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Enter project Title"
                            name="project_title" required />
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Project Details</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Write some description about the peoject"></i>
                        </label>
                        <textarea class="form-control form-control-solid" rows="3" name="project_description"
                            placeholder="Type Target Details" required></textarea>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="d-block fw-bold fs-6 mb-5">
                            <span class="required">Project Logo</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="E.g. Select a logo to represent the company that's running the campaign."></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Image input-->
                        <div class="image-input image-input-empty image-input-outline" data-kt-image-input="true"
                            style="background-image: url(../../assets/media/svg/files/blank-image.svg)">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px"></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="project_logo" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
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

                    {{-- <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Tags</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Specify a target priorty"></i>
                        </label>
                        <!--end::Label-->
                        <input class="form-control form-control-solid" value="Important, Urgent" name="tags" />
                    </div>
                    <!--end::Input group--> --}}

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
<!--end::Modal - Create Campaign-->