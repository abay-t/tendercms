@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Изменить ползователя') }}</div>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('edituser', $user->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ФИО') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Наименование организации') }}</label>

                            <div class="col-md-6">
                                <input id="organization" type="text" class="form-control " name="organization" value="{{ $user->organization }}"  autocomplete="organization" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('БИН') }}</label>

                            <div class="col-md-6">
                                <input id="bin" type="number" class="form-control " name="bin" value="{{ $user->bin }}"  autocomplete="bin" >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Должность') }}</label>

                            <div class="col-md-6">
                                <input id="dolzhnost" type="text" class="form-control " name="dolzhnost" value="{{ $user->dolzhnost }}"  autocomplete="dolzhnost" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Адрес') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control " name="address" value="{{ $user->address }}"  autocomplete="address" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Контакты') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="number" class="form-control " name="contact" value="{{ $user->contact }}"  autocomplete="contact" autofocus>

                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Реквизиты ') }}</label>

                            <div class="col-md-6">
                                <?php if(file_exists(getcwd().$user->rekvizit)){ ?>
                                    {{ $user->rekvizit }}
                                <?php } ?>    
                                <input id="rekvizit" type="file" class="form-control " name="rekvizit" value="{{ old('rekvizit') }}"  autocomplete="rekvizit" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Свидетельство о регистрации ') }}</label>

                            <div class="col-md-6">
                                <?php if(file_exists(getcwd().$user->svidetelstvo)){ ?>
                                    {{ $user->svidetelstvo }}
                                <?php } ?>
                                <input id="svidetelstvo" type="file" class="form-control " name="svidetelstvo" value="{{ old('svidetelstvo') }}"  autocomplete="svidetelstvo" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Свидетельство о постановке на учет по НДС ') }}</label>

                            <div class="col-md-6">
                                <?php if(file_exists(getcwd().$user->nds)){ ?>
                                    {{ $user->nds }}
                                <?php } ?>
                                <input id="nds" type="file" class="form-control " name="nds" value="{{ old('nds') }}"  autocomplete="nds" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Устав  ') }}</label>

                            <div class="col-md-6">
                                <?php if(file_exists(getcwd().$user->ustav)){ ?>
                                    {{ $user->ustav }}
                                <?php } ?>
                                <input id="ustav" type="file" class="form-control " name="ustav" value="{{ old('ustav') }}"  autocomplete="ustav" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Приказ  ') }}</label>

                            <div class="col-md-6">
                                <?php if(file_exists(getcwd().$user->prikaz)){ ?>
                                    {{ $user->prikaz }}
                                <?php } ?>
                                <input id="prikaz" type="file" class="form-control " name="prikaz" value="{{ old('prikaz') }}"  autocomplete="prikaz" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Решение ед. участника  ') }}</label>

                            <div class="col-md-6">
                                <?php if(file_exists(getcwd().$user->reshenie)){ ?>
                                    {{ $user->reshenie }}
                                <?php } ?>
                                <input id="reshenie" type="file" class="form-control " name="reshenie" value="{{ old('reshenie') }}" autocomplete="reshenie" autofocus>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Изменить') }}
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
