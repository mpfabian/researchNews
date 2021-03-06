

<div class="form-group">
    {{ Form::label('name', 'Nombre del Producto') }}
    {{ Form::label('name','*', array('class' => 'text-danger'))}}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('investigation_group_id', "Grupo de investigación asociado") }}
    {{ Form::label('investigation_group_id','*', array('class' => 'text-danger'))}}
    {{ Form::select('investigation_group_id', $invGroups, null, 
    ['class' => 'form-control', 'placeholder' => 'Seleccione Grupo de investigación', 'id' => 'investigation_group_id']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Descripción del Producto') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) }}
</div>

<div class="form-group">
    <label for="researchers">Otros Investigador(es) Asociado(s)</label>
    {{ Form::label('researchers','*', array('class' => 'text-danger'))}}
    {{ Form::select('researchers[]', $researchers, null,
            ['class' => 'form-control', 'multiple' => true, 'id' => 'researchers_id']) }}
</div>

<a href="#" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#researcher_form">Crear nuevo Investigador</a>

<div class="form-group">
    {{ Form::label('date', 'Fecha de Creación') }}
    {{ Form::label('date','*', array('class' => 'text-danger'))}}
    {{ Form::date('date', \Carbon\Carbon::now(), ['readonly'])}}
</div>
<div class="form-group">
    {{ Form::label('project_id', "Nombre del Proyecto asociado") }}
    {{ Form::select('project_id', $projects, null, 
    ['class' => 'form-control', 'placeholder' => 'Seleccione Proyecto asociado', 'id' => 'project_id']) }}
</div>

<div class="form-group mt-4 text-center">
    <button type="submit" class="btn btn-secondary mb-4" name="product">
        {{ __('Guardar') }}
    </button>
</div>

@include("admin-invest\products\partials\\researcher_form")