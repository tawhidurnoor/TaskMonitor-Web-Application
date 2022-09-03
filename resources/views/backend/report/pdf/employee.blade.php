<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->

<head>
    <style>
        
    </style>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled">

    <!--begin::Main-->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-column flex-column-fluid">


            <!--begin::Container-->
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-stretch container-xxl">


                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid mt-5 mt-lg-10" id="kt_wrapper">


                    <!-- begin:Main Body -->
                    <div class="position-relative">
                        <!--begin::Row-->
                        <div class="row g-3 g-lg-6">
                            <!--begin::Col-->
                            <div class="col-4">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ count($projects) }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">Working Projects</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-4">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $total_hour }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">hours worked
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-4">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $average_work_per_day }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">hours average work/day</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>

                    <br><br>



                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                    <script>
                        const labels = [
                            @php
                                foreach ($dates as $key => $dat) {
                                    echo '"' . $dat . '"' . ',';
                                }
                                
                            @endphp
                        ];

                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Hours',
                                backgroundColor: 'rgb(0, 158, 247)',
                                borderColor: 'rgb(0, 158, 247)',
                                data: [
                                    @php
                                        foreach ($work_hours as $key => $wh) {
                                            echo '"' . $wh . '"' . ',';
                                        }
                                        
                                    @endphp
                                ],
                            }]
                        };

                        const config = {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            },
                        };
                    </script>

                    <script>
                        const myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                        );
                    </script>
                    <!-- end:Main Bodu-->


                </div>
                <!--end::Wrapper-->


            </div>
            <!--end::Container-->

        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--end::Main-->

    @include('backend.layouts.partials.scripts')
</body>

</html>
