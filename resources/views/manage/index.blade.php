@extends('layouts.app')

@section('content')
<head>
    <link href="../../css/queue_form.css" rel="stylesheet" />    
</head>
@if (Auth::user())

<main class="py-4 bg-light">
    <div class="container center-block rounded box-shadow mb-3">

        <table class="table table-hover focus">
            <thead>
                <tr>
                    <th>ИД</th>
                    <th>Имя</th>
                    <th>Фамилия</th>                
                    <th>№ чит. билета</th> 
                    <th>Дата/вр начала</th>
                    <th>Дата/вр окончания</th>
                    <th>Длительность</th>                
                    <th>Кол-во мест</th>               
                </tr>
            </thead>
            <tbody>
                @foreach($queues as $queue)
                <tr>
                    <td>{{ $queue->id }}</td>
                    <td>{{ $queue->firstName }}</td>
                    <td>{{ $queue->lastName }}</td>
                    <td>{{ $queue->libCardNumber }}</td>
                    <td>{{ $queue->resDateBegin }}</td>
                    <td>{{ $queue->resDateEnd }}</td>
                    <td>{{ $queue->duration }}</td>
                    <td>{{ $queue->seatsQuantity }}</td>
                    <td>
                        {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['manage.destroy', $queue->id]])  !!} --}}

                            <button formmethod="POST" class="btn btn-danger" onclick="return confirm('Вы действительно хотите удалить запись?')">  
                                <i class="fas fa-trash-alt fa-sm"></i> 
                            </button>
                        {{-- {!! Form::close() !!} --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</main>

@else
    <div class="container center-block">
        <strong class="d-flex align-items-center">
            У вас недостаточно прав для просмотра данной страницы
        </strong>
    </div>
@endif

@endsection