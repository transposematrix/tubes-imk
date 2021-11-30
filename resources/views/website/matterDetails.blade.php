@extends('layout/main')

@section('content')
        <p align = "center">
            <iframe src = "{{url('matter/'. $data->matter)}}" style="width:1200px; height:650px;"></iframe>
        </p>
@endsection