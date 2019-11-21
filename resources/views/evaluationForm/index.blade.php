@extends('templates.master')



@section('view-css')
@endsection

@section('view-sub-header')
    @include('templates.sub-header', ['title' => 'Novo formulário'])
@endsection

@section('view-content')

    <div id="form-control">
    {!! Form::open(['method' => 'post', 'class' => 'default-form']) !!}
        
        <div><h4>Informações básicas</h4></div>  

        @include('templates.form.input', ['input' => 'Título', 'attributes' => ['id' => 'title', 'name' => 'title', 'placeholder' => 'Título']])
        @include('templates.form.textarea', ['label' => 'Descrição (opcional)', 'class' => 'form-control', 'textarea' => 'description', 'attributes' => ['id' => 'description', 'name' => 'description', 'rows' => 32, 'cols' => 54, 'placeholder' => 'Digite aqui a descrição do formulário...']])  
        
        @include('templates.form.select', ['label' => "Quem irá avaliar?", 'select' => 'user_type_id', 'data' => $appraisers_id_list ?? [0 => 'Aluno', 1 => 'Professor', 2 => 'Coordenador', 3 => 'Membro da administração'], 'attributes' => ['id' => 'user_types', 'name' => 'user_types', 'placeholder' => "Avaliador"]])
        @include('templates.form.select', ['label' => "Quem será avaliado?", 'select' => 'evaluated_id', 'data' => $evalueted_id_list ?? [0 => 'Aluno', 1 => 'Professor', 2 => 'Coordenador', 3 => 'Membro da administração'], 'attributes' => ['id' => 'evaluated', 'name' => 'evaluated', 'placeholder' => "Avaliados"]])
    
        @include('templates.form.select', ['label' => "Categoria", 'select' => 'category_id', 'data' => $categories_list ?? [0 => 'Alunos para Professores', 1 => 'Alunos para Disciplinas', 2 => 'Professores para Coordenadores', 3 => 'Coordenadores para Administração'], 'attributes' => ['id' => 'categories', 'name' => 'categories', 'placeholder' => "Categoria"]])
        @include('templates.form.select', ['label' => "Curso", 'select' => 'course_id', 'data' => $courses_list ?? [0 => 'ADS', 1 => 'AGRO', 2 => 'GEAD', 3 => 'LOG', 4 => 'RH'], 'attributes' => ['placeholder' => "Curso"]])
        @include('templates.form.date', ['input' => "Início"])
        @include('templates.form.date', ['input' => "Fim"])

        <hr id="line-section-questions">
        <div id="content-questions">
          
          <div id="title-section-questions"><h4>Questões</h4></div>  
          <div id="control-buttons">  
                <button id="add_field_button" class="add_field_button btn btn-success">
                  <i class="fa fa-plus"></i>
                    Adicionar uma nova questão
                </button>
            </div>

            <div id="group-questions">
              <div id="questao1" class="question">
                
                @include('templates.form.textarea', ['label' => 'Questão 01', 'class' => 'form-control question', 'textarea' => 'Questão', 'attributes' => ['id' => 'question1', 'name' => 'questions[]', 'rows' => 32, 'cols' => 54, 'placeholder' => 'Descrição da questão textual']])        
              
              </div> 
            </div>
        </div>

        
        @include('templates.form.submit', ['input' => "Salvar"])
    {!! Form::close() !!}
    </div>

@endsection


@section('view-js')
    <script>
        $(document).ready(function() {
              var wrapper = $("#group-questions"); //Fields wrapper
              var add_button = $(".add_field_button"); //Add button ID

              var x = 1; //initlal text box count
              $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                
                x++; //text box increment
                $(wrapper).append("<div id='questao"+x+"' class='question'>"
                                      + "<label class='form-control '>"
                                          + "<span>Questão 0"+x+"</span>"
                                          + "<textarea id='question"+x+"' name='questions[]' rows='32' cols='54' placeholder='Descrição da questão textual'>"
                                          + "</textarea>"
                                          + "<div class='trash-question'><a href='#' class='remove_field'><i class='fa fa-trash'></i></a><div>"
                                      + "</label>"
                                      
                                + "</div>"); 
                $('#questao'+x+' > label > textarea')[0].focus()

                $()
              });
              
              

              $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                if(confirm("Tem certeza que deseja remover esta questão?"))
                  $(this).parent('div').parent('label').parent('div').remove();
                  x--;
              })

            });
    </script>
@endsection



