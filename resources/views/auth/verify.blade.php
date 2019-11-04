@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um novo link de verificação foi enviado para o seu e-mail.') }}
                        </div>
                    @endif

                    {{ __('Antes de prosseguir, por favor verifique seu e-mail.') }}
                    {{ __('Se você não recebeu o e-mail') }}, <a href="{{ route('verification.resend') }}">{{ __('Clique aqui para requisitar outro') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
