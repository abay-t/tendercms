@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ФИО') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Наименование организации') }}</label>

                            <div class="col-md-6">
                                <input id="organization" type="text" class="form-control " name="organization" value="{{ old('organization') }}"  autocomplete="organization" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('БИН') }}</label>

                            <div class="col-md-6">
                                <input id="bin" type="number" class="form-control " name="bin" value="{{ old('bin') }}"  autocomplete="bin" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Должность') }}</label>

                            <div class="col-md-6">
                                <input id="dolzhnost" type="text" class="form-control " name="dolzhnost" value="{{ old('dolzhnost') }}"  autocomplete="dolzhnost" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Адрес') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control " name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Контакты') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="number" max="10" class="form-control " name="contact" value="{{ old('contact') }}"  autocomplete="contact" autofocus>

                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Реквизиты ') }}</label>

                            <div class="col-md-6">
                                <input id="rekvizit" type="file" class="form-control " name="rekvizit" value="{{ old('rekvizit') }}"  autocomplete="rekvizit" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Свидетельство о регистрации ') }}</label>

                            <div class="col-md-6">
                                <input id="svidetelstvo" type="file" class="form-control " name="svidetelstvo" value="{{ old('svidetelstvo') }}"  autocomplete="svidetelstvo" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Свидетельство о постановке на учет по НДС ') }}</label>

                            <div class="col-md-6">
                                <input id="nds" type="file" class="form-control " name="nds" value="{{ old('nds') }}"  autocomplete="nds" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Устав  ') }}</label>

                            <div class="col-md-6">
                                <input id="ustav" type="file" class="form-control " name="ustav" value="{{ old('ustav') }}"  autocomplete="ustav" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Приказ  ') }}</label>

                            <div class="col-md-6">
                                <input id="prikaz" type="file" class="form-control " name="prikaz" value="{{ old('prikaz') }}"  autocomplete="prikaz" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Решение ед. участника  ') }}</label>

                            <div class="col-md-6">
                                <input id="reshenie" type="file" class="form-control " name="reshenie" value="{{ old('reshenie') }}" autocomplete="reshenie" autofocus>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Регистрировать') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
