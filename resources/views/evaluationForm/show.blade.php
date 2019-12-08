@extends('templates.master')

@section('view-css')
@endsection

@section('view-sub-header')
    @include('templates.sub-header', ['title' => 'Formulário'])
@endsection

@section('view-content')
    <header>
        <h1>Título: {{ $evaluationForm->title }}</h1>
        <h3>Descrição: {{ $evaluationForm->description }}</h3>
        <h3>Data de início: {{ $evaluationForm->begin_date }}</h3>
        <h3>Data final{{ $evaluationForm->end_date }}</h3>
        <h3>Questões do formulário:
            {{$i = 1}}
        @foreach ($evaluationForm->questions as $question)
            <h4>{{ $i++ }} - {{ $question->description }}</h4>    
        @endforeach        
    </header>

@endsection