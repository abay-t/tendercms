@extends('layouts.app')
<?php 
    $namec = '';
    if($name == 'portal'){
        $namec = 'Портал';
    }
    elseif ($name == 'predmet') {
        $namec = 'Предмет';
    }
    else{
        $namec = 'Тип';
    }
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Добавить '.$namec) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add'.$name) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Название '.$namec.'а') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Добавить '.$namec) }}
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

