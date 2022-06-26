@extends('layouts.mail')

@section('content')
    <h1>{{ __('app.mails.submit-confirmation.title') }}</h1>
    <p>{{ __('app.mails.hello') }}</p>
    <p>
        {!! __('app.mails.submit-confirmation.message', ['name' => config('app.asta-name')]) !!}
    </p>
    <p>
        {!! __('app.mails.submit-confirmation.support', ['email' => config('app.support-mail')]) !!}
    </p>
    <p>{{ __('app.mails.your-team') }}</p>
@endsection
