@extends('layouts.app')

@section('content')
<body>
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">:(</h1>
          <p class="lead my-3">{{ $exception->getMessage() }}  </p>
          <p class="lead mb-0"><a href="/" class="text-white font-weight-bold">Вернуться назад...</a></p>
        </div>
    </div>
</body>
@endsection