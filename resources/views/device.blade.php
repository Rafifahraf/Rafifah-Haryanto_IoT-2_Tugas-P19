@extends('template')
@section('Judul')
    Device
@endsection()
@section('content')
    <h1>Haiii </h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">device</th>
                <th scope="col">min value</th>
                <th scope="col">max value</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->device_name }}</td>
                    <td>{{ $p->min_value }}</td>
                    <td>{{ $p->max_value }}</td>
                    <td>
                        <a href="/device/{{ $p->id }}">detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
