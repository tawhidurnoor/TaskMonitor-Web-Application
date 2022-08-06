@extends('backend.layouts.full.mainlayout')

@section('body')
    <!--begin::Content-->
    <div class="content flex-column-fluid" id="kt_content">
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <div class="page-title d-flex flex-column py-1">
                <h1 class="d-flex align-items-center my-1">
                    <span class="text-dark fw-bolder fs-1">Price Tier List</span>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('price.tier.store') }}" class="form-inline">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-12">
                            <input name="tier_name" id="tier_name" type="text"
                                class="form-control w-auto @error('tier_name') is-invalid @enderror"
                                placeholder="Tier Name">
                            <div class="invalid-feedback">
                                @error('tier_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-12">
                            <input name="payment_interval" id="payment_interval" type="text"
                                class="form-control w-auto @error('payment_interval') is-invalid @enderror"
                                placeholder="Payment Interval (in month)">
                            <div class="invalid-feedback">
                                @error('payment_interval')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-12">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-200px">Tier Name</th>
                                <th class="min-w-175px">Payment Interval</th>
                                <th class="min-w-150px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @forelse ($price_tiers as $item)
                                <tr>
                                    <td>
                                        {{ $item->tier_name }}
                                    </td>
                                    <td>
                                        {{ $item->payment_interval }} {{ Str::plural('Month', $item->payment_interval) }}
                                    </td>
                                    <td>
                                        <button class="btn btn-warning">Action</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center"> No items </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::Content-->
@endsection
