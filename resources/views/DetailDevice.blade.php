@extends('template')
@section('Judul')Detail Device
@endsection()
@section('content')

<h1>Berikut Detail Device</h1>

<h2>Nama Device : {{$data[0]->device_name}}</h2>
<h2>Min Value   : {{$data[0]->min_value}}</h2>
<h2>Max Value   : {{$data[0]->max_value}}</h2>
@endsection
