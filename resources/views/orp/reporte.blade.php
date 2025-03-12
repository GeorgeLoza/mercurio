@extends('layout.app')


@section('contenido')
@livewire('dashbord.orp-reporte2', ['orpId' => $id])
@endsection
