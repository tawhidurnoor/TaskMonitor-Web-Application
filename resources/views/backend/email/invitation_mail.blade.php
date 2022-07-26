<style>
    html,
    body {
        padding: 0;
        margin: 0;
    }
</style>
<div
    style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
        style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
        <tbody>
            <tr>
                <td align="center" valign="center" style="text-align:center; padding: 40px">
                    <a href="https://taskmonitor.xyz/" rel="noopener" target="_blank">
                        <img alt="Logo" src="{{ asset('assets_backend/media/logos/logo-1.svg') }}" />
                    </a>
                </td>
            </tr>
            <tr>
                <td align="left" valign="center">
                    <div
                        style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
                        <!--begin:Email content-->
                        <div style="padding-bottom: 30px; font-size: 17px;">
                            <strong>Welcome to TaskMonitor!</strong>
                        </div>
                        <div style="padding-bottom: 30px">You have been invited to join TaskMonitor from
                            {{ auth()->user()->name }} @isset($has_project_invitation)
                                in his project
                            @endisset .
                            To get started, accept the invite below:
                        </div>
                        <div style="padding-bottom: 40px; text-align:center;">
                            <a href="{{ route('register', 'email=' . $to_email) }}" rel="noopener"
                                style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#ffffff;background-color:#009EF7;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle"
                                target="_blank">Accept Invite</a>
                        </div>
                        <!--end:Email content-->
                        <div style="padding-bottom: 10px">Kind regards,
                            <br>The TaskMonitor Team.
            <tr>
                <td align="center" valign="center"
                    style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
                    <p>154, RK Mission Road, Motijheel, Dhaka, Bangladesh.</p>
                    <p>Copyright ©
                        <a href="https://taskmonitor.xyz/" rel="noopener" target="_blank">TaskMonitor</a>.
                    </p>
                </td>
            </tr></br>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
