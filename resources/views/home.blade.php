@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bem vindo ao FinanTop') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <img src="https://www.agoraos.com.br/blog/wp-content/uploads/2017/03/Contas-a-pagar-e-receber.png">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
