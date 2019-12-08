@extends('templates.master')



@section('view-css')
@endsection


@section('view-sub-header')
    @include('templates.sub-header')
@endsection

@section('view-content')
    @include('templates.control-buttons')

    @if(session('success'))
      <div id="alert-success" class="alert alert-success" role="alert">
        {{ session('success')['messages'] }} 
      </div>
    @endif
    
    <table id="table-forms" class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Título</td>
                <td>Descrição</td>
                <td>Data de início</td>
                <td>Data final</td>
                <td>user_type_id</td> 
                <td>Opções</td>
            </tr>    
        </thead>

        <tbody> 
            @foreach ($evaluationForms as $form)
            <tr>
              <td>{{ $form->id }}</td>
              <td>{{ $form->title }}</td>
              <td>{{ $form->description }}</td>
              <td>{{ $form->formatted_begin_date }}</td>
              <td>{{ $form->formatted_end_date }}</td>
              <td>{{ $form->user_type_id }}</td>
              <td>
                <a href="{{ route('form.show', $form->id) }}">Visualizar</a>
              </td>
            </tr>
            @endforeach
        </tbody>

    </table>



@endsection



@section('view-js')
@endsection