@extends('template')
@section('Judul')Log
@endsection()
@section('content')
<h1>ini Log </h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">device</th>
            <th scope="col">min value</th>
            <th scope="col">max value</th>
            <th scope="col">current value</th>
            <th scope="col">created at</th>
            <th scope="col">updated at</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($nilai as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->device->device_name}}</td>
                <td>{{ $p->device->min_value }}</td>
                <td>{{ $p->device->max_value }}</td>
                <td>{{ $p->current_value }}</td>
                <td>{{ $p->created_at }}</td>
                <td>{{ $p->updated_at }}</td>




            </tr>
        @endforeach
    </tbody>
</table>
@endsection
