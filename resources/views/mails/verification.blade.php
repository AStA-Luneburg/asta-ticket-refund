@extends('layouts.mail')

@section('content')
    <h1>{{ __('app.mails.verification.title') }}</h1>
    <p>{{ __('app.mails.hello') }}</p>
    <p>{!! __('app.mails.verification.message', ['name' => config('app.asta-name')]) !!}</p>

    <p>{{ __('app.mails.verification.verification-button') }}</p>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary"
        style="margin-bottom: 40px;">
        <tbody>
            <tr>
                <td align="center">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ $link }}"
                                        target="_blank">{{ __('app.mails.verification.finish-verification') }}</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="margin-bottom: 8px; font-size: 12px;">
        {{ __('app.mails.verification.verification-link') }}</p>
    <p style="margin-bottom: 30px; word-break: break-all; font-size: 12px;">
        <a href="{{ $link }}" target="_blank" style="text-align: center; color: #57697a;">{{ $link }}</a>
    </p>
    <p style="font-weight: 600;">
        {{ __('app.mails.verification.time-limit') }}
    </p>
    <p>
        {!! __('app.mails.verification.support', ['email' => config('app.support-mail')]) !!}
    </p>
    <p>{{ __('app.mails.your-team') }}</p>
@endsection
