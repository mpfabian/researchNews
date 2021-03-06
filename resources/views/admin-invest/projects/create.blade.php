@extends('layouts.app')

@section('content')
<section class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="card border-secondary shadow">
                <div class = "card-header h2 d-flex justify-content-center mb-4 bg-tertiary" >
                    Crear Proyecto
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'projects.store']) !!}
                    @include('admin-invest.projects.partials.form')
                    {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
</section>
@include("admin-invest\projects\partials\\researcher_form")
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

        function loadResearchers(){
            var invGroup_id = $('#investigation_group_id').val(); //Obtiene la id del grupo de investigacion
        
            var option = " "; // Define las opciones
        
            $.ajax({ //Define la respuesta ajax de tipo get, llamando a la ruta researchersGroup y enviando invGroup_id como id
                type: 'get',
                url: '{!!URL::to('researchersGroup')!!}',
                data: {'id': invGroup_id},
                success: function (researchers) {
                    for (var i = 0; i < researchers.length; i++) {
                        option +=  "<option value='" + researchers[i].id + "'>" + researchers[i].researcher_name + "</option>";
                    } 
                
                    $('#researchers').html(" ");
                    $("#researchers").append('<option value="0" selected disabled>Seleccione investigador(es)</option>');
                    $("#researchers").append(option); //Agrega las options al select #researchers
                },
                error: function () {
                    option += '<option value="0" selected disabled>Seleccione proyecto asociado</option>';
                    $('#project_id').html(" ");
                    $("#project_id").append(option); //Agrega las options al select #researchers
                }
            });
        }

        function loadNotResearchers(){
            var invGroup_id = $('#investigation_group_id').val(); //Obtiene la id del grupo de investigacion

            var option = " "; // Define las opciones

            $.ajax({ //Define la respuesta ajax de tipo get, llamando a la ruta researchersGroup y enviando invGroup_id como id
                type: 'get',
                url: '{!!URL::to('notResearchersGroup')!!}',
                data: {'id': invGroup_id},
                success: function (notResearchers) {
                    for (var i = 0; i < notResearchers.length; i++) {
                        option +=  "<option value='" + notResearchers[i].id + "'>" + notResearchers[i].researcher_name + "</option>";
                    } 
                
                    $('#notResearchers').html(" ");
                    $("#notResearchers").append(option); //Agrega las options al select #researchers
                },
                error: function () {
                    option += '<option value="0" selected disabled>Seleccione investigador(es)</option>';
                    $('#notResearchers').html(" ");
                    $("#notResearchers").append(option); //Agrega las options al select #researchers
                }
            });
        }

        function loadAllResearchers(){
            loadResearchers();
            loadNotResearchers();
        }

        loadAllResearchers(); //Se llama apenas cargue la página para que rellene con investigadores del grupo si es que hubo un error al rellenar el formulario->Guardar
        $(document).on('change', '#investigation_group_id', loadAllResearchers);
    });
</script>
@endsection