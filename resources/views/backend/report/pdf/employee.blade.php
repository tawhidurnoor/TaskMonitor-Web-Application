<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--begin::Head-->

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{ public_path('assets_backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ public_path('assets_backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<!--end::Head-->

<!--begin::Body-->

<body>

    <div class="position-relative">
        <!--begin::Row-->
        <div class="row g-3 g-lg-6">
            <table>
                <tr>
                    <td style="width: 300px">
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
                    </td>
                    <td style="width: 300px">
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
                    </td>
                    <td style="width: 300px">
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
                    </td>
                </tr>
            </table>



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

    <br><br>
    <a href="{{ route('report.employee.pdf', 'date=' . $date . '&employee_id=' . $employee_id) }}"
        class="btn btn-primary">Download PDF</a>

    @include('backend.layouts.partials.scripts')
</body>

</html>
