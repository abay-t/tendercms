@extends('layouts.app')

@section('content')

<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-9">
						<a href="{{url('admin/tenders')}}" class="btn btn-success">
							<i class="fas fa-file-contract"></i> <span>Тендеры</span>
						</a>
						<a href="{{url('admin/contracts')}}" class="btn btn-success">
							<i class="fas fa-file-contract"></i> <span>Контракты</span>
						</a>
						<a href="{{url('admin/users')}}" class="btn btn-success">
							<i class="fas fa-user"></i> <span>Пользователи</span>
						</a>
						<a href="{{url('admin/portals')}}" class="btn btn-success">
							<i class="fas fa-user"></i> <span>Порталы</span>
						</a>
						<a href="{{url('admin/predmets')}}" class="btn btn-success">
							<i class="fas fa-user"></i> <span>Предметы</span>
						</a>
						<a href="{{url('admin/tips')}}" class="btn btn-success">
							<i class="fas fa-user"></i> <span>Типы</span>
						</a>
					</div>
					<div class="col-sm-3">
						<a href="{{ route('register') }}" class="btn btn-primary"><i class="material-icons"></i> <span>Добавить ползователя</span></a>						
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
                        <th>ФИО</th>						
						<th>Наименование организации</th>
						<th>Должность</th>
                        <th>Status</th>
						<th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach ($users as $key=>$user)

	                	<tr>
	                		<td>{{ ++$key }}</td>
	                		<td>
	                			<a href="#">
	                				<!-- <img src="{{ asset('/images/1.jpg') }}" class="avatar" alt="Avatar">  -->
	                			{{ $user->name }}
	                			</a>
	                		</td>
	                		<td>{{ $user->organization }}</td>                        
	                		<td>{{ $user->dolzhnost }}</td>
	                		<td><span class="status text-success">•</span> Active</td>
	                		<td>
	                			<a href="{{url('user/'.$user->id.'/edit')}}" class="settings" title="" data-toggle="tooltip" data-original-title="Settings"><i class="material-icons"></i></a>
	                			@if(Auth::user()->id != $user->id)
	                			<a onclick="return confirm('Вы уверены?')" href="{{url('user/'.$user->id.'/delete')}}"  class="delete" title="" data-original-title="Delete"><i class="material-icons"></i></a>
	                			@endif
	                		</td>
	                	</tr>
                	@endforeach
                  
                </tbody>
            </table>

            @include('pagination', ['paginator' => $users])
			
        </div>
    </div>

@endsection

@section('scripts')


@endsection