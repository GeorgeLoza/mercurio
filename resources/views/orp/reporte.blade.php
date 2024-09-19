@extends('layout.app')


@section('contenido')
@livewire('dashbord.orp-reporte', ['orpId' => $id])
@endsection
