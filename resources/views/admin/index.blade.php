@extends('layouts.admin')

@section('title', 'Admintrator')
@section('content')
<div class="container-fluid py-5">
    <div>
        <h1>Xin chào: {{auth()->user()->username}} </h1> 
    </div>
</div>
@endsection