@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <form class="area-de-entrega form-inline mt-3 mb-3" method="post" action="/area-de-entrega">
       @csrf
            <p class="text-{{$tipo ?? ''}}"><small> {{ $msn ?? '' }}</small></p>
            <span class="area-de-entrega-texto text-primary mr-5" > verifique se fazemos entrega em sua região</span> 
            <input  class="form-cep form-control" type="text" name="cep" placeholder="digite seu cep"> 
            <button class="btn btn-outline-primary form-control">verificar</button>
      </form>
            <div class="col-md-12">
                    <form method="POST" action="{{ route('register') }}" class="row">
                        @csrf
                        <div class="card col-md-6" style="padding:0">
                        <div class="card-header">{{ __('Cadastro') }}</div>
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-3 col-form-label text-md-right">{{ __('Telefone') }}</label>

                            <div class="col-md-9">
                                <input id="telefone" type="telefone" class="form-control @error('telefone') is-invalid @enderror" name="telefone" required autocomplete="new-telefone">

                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Senha') }}</label>

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="card col-md-6" style="padding:0">
                        <div class="card-header">{{ __('Endereço') }}</div>
                        <div class="card-body">
                        <div class="form-group row">
                            <label for="numero" class="col-md-3 col-form-label text-md-right">{{ __('Numero') }}</label>

                            <div class="col-md-9">
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero">

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logradouro-tipo" class="col-md-3 col-form-label text-md-right">{{ __('Logradouro') }}</label>
                            <div class="col-md-9">
                            <select id="logradouro-tipo" type="logradouro-tipo" class="form-control @error('logradouro-tipo') is-invalid @enderror" name="logradouro-tipo" value="{{ old('logradouro-tipo') }}" required autocomplete="logradouro-tipo">
                              <option value="Rua">Rua</option>
                              <option value="Av">Av</option>
                            </select>
                                @error('logradouro-tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rua" class="col-md-3 col-form-label text-md-right">{{ __('Rua') }}</label>

                            <div class="col-md-9">
                                <input id="rua" type="rua" class="form-control @error('rua') is-invalid @enderror" name="rua" value="{{ old('rua') }}" required autocomplete="rua">

                                @error('rua')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bairro" class="col-md-3 col-form-label text-md-right">{{ __('Bairro') }}</label>

                            <div class="col-md-9">
                                <input id="bairro" type="bairro" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro">

                                @error('bairro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cep" class="col-md-3 col-form-label text-md-right">{{ __('Cep') }}</label>

                            <div class="col-md-9">
                                <input id="cep" type="cep" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep') }}" required autocomplete="cep">

                                @error('cep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10" style="margin:auto">
                                <button type="submit" class="btn btn-outline-primary form-control">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        </div>
                        </div>
                    </form>
                </div>
          </div>
    </div>
</div>
<script src="js/jquery-2.1.1-jquery.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script src="js/mascara.js"></script>

@endsection
