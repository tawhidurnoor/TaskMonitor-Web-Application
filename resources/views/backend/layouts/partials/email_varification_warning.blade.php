@if(!isset(auth()->user()->email_verified_at) && auth()->user()->login_method == 'email')
<!--begin::Notice-->
<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
    <!--begin::Icon-->
    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
        </svg>
    </span>
    <!--end::Svg Icon-->
    <!--end::Icon-->
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-grow-1">
        <!--begin::Content-->
        <div class="fw-bold">
            <h4 class="text-gray-900 fw-bolder">Verify Your Email Address</h4>
            <div class="fs-6 text-gray-700">Before proceeding, please check your email for a verification link. You
                won't be able to use any feature unless you verify your emal. If you did not receive the email,
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request
                        another')
                        }}</button>
                </form>.
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Notice-->
@endif