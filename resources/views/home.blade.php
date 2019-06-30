@extends('layouts.app')

@section('content')
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <a href="{{url('admin/tenders')}}" class="btn btn-success">
                            <i class="fas fa-file-contract"></i> <span>Тендеры</span>
                        </a>
                    </div>
                    <div class="col-sm-7">
                        <a href="{{ route('addtender') }}" class="btn btn-primary"><i class="material-icons"></i> <span>Добавить тендер</span></a>
                        <!-- <a href="#" class="btn btn-primary"><i class="material-icons"></i> <span>Export to Excel</span></a> -->                       
                    </div>
                </div>
            </div>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Наименование товара</th>                        
                        <th>Ссылка на тендер</th>
                        <th>Дата окончание</th>
                        <th>Статус</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenders as $key=>$tender)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                <a href="{{url('tender/'.$tender->id)}}">
                                {{ $tender->title }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ $tender->link }}" target="_blank">{{ $tender->link }}</a>
                            </td>                        
                            <td>{{ $tender->finishTime }}</td>
                            <td><span class="status text-danger text-warning text-success">•</span> Active</td>
                            <td>
                                <a href="{{url('tender/'.$tender->id.'/edit')}}" class="settings" title=""  data-original-title="Settings"><i class="material-icons"></i></a>
                                <a onclick="return confirm('Вы уверены?')"  href="{{url('tender/'.$tender->id.'/delete')}}" class="delete" data-original-title="Delete"><i class="material-icons"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

            @include('pagination', ['paginator' => $tenders])
        </div>
    </div>
@endsection
