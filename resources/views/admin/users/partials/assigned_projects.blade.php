<!--begin::Card-->
@if (count($assigned_projects) > 0)
    <div class="card mb-5 mb-xl-10" style="margin-top: 25px">

        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Assigned Projects</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            {{-- <a href="{{route('profile.edit')}}" class="btn btn-primary align-self-center">Edit Profile</a> --}}
            <!--end::Action-->
        </div>

        <!--begin::Card body-->

        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                        {{-- <th class="w-10px pe-2">
            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                <input class="form-check-input" type="checkbox" data-kt-check="true"
                    data-kt-check-target="#kt_table_users .form-check-input" value="1" />
            </div>
        </th> --}}
                        <th class="min-w-150px">Project</th>
                        <th class="min-w-125px">Members</th>
                        <th class="min-w-50px">Created at</th>
                        {{-- <th class="text-end min-w-100px">Actions</th> --}}
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="text-gray-600 fw-bold">
                    @foreach ($assigned_projects as $assigned_project)
                        <!--begin::Table row-->
                        <tr>
                            <td class="d-flex align-items-center">
                                <!--begin:: Avatar -->
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <a href="#">
                                        <div class="symbol-label">
                                            @isset($assigned_project->project_logo)
                                                <img src="uploaded_files/project_logo/{{ $assigned_project->project_logo }}"
                                                    alt="{{ $assigned_project->title }}" class="w-100" />
                                            @else
                                                <img src="{{ Avatar::create($assigned_project->title)->toBase64() }}"
                                                    alt="{{ $assigned_project->title }}" class="w-100">
                                            @endisset
                                        </div>
                                    </a>
                                </div>
                                <div class="d-flex flex-column">
                                    {{ $assigned_project->title }}
                                </div>
                            </td>
                            <td>
                                {{ count($assigned_project->projectPeople) }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($assigned_project->created_at)->format('d M, Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--end::Card body-->
    </div>
@endif
<!--end::Card-->
