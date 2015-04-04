@if ($name == 'hasMany')
    @foreach($options as $hasManyName => $hasManyOptions)
        <div class="form-group {{ $errors->has($hasManyName)? 'has-error' : '' }}">
            {!! Form::label($hasManyName, $hasManyOptions['label'], [ 'class' => 'control-label' ]) !!}
            {!! Form::select("hasMany[{$hasManyName}][]", $hasMany[$hasManyName], $selectedHasMany[$hasManyName], ['multiple' => 'multiple', 'class' => 'form-control']) !!}
        </div>
    @endforeach
@elseif ($name == 'belongsTo')
    @foreach($options as $belongsToName => $belongsToOptions)
        <div class="form-group {{ $errors->has($belongsToName)? 'has-error' : '' }}">
            {!! Form::label($belongsToName, $belongsToOptions['label'], [ 'class' => 'control-label' ]) !!}
            @if($entity)
                {!! Form::select($belongsToOptions['column'], $belongsTo[$belongsToName], $entity->$belongsToOptions['column'], ['class' => 'form-control']) !!}
            @else
                {!! Form::select($belongsToOptions['column'], $belongsTo[$belongsToName], null, ['class' => 'form-control']) !!}
            @endif
        </div>
    @endforeach
@else
    <div class="form-group {{ $errors->has($name)? 'has-error' : '' }}">
        {!! Form::label($name, $options['label']) !!}
        @if($options['type'] == 'checkbox')
            {!! Form::hidden($name, 0) !!}
            {!! Form::$options['type']($name, 1, $entity ? $entity->$name : null) !!}
        @elseif ($options['type'] == 'number')
            {!! Form::input($options['type'], $name, $entity ? $entity->$name : null, ['class'=>'form-control']) !!}
        @elseif ($options['type'] == 'password')
            {!! Form::input($options['type'], $name, null, ['class'=>'form-control']) !!}

            {!! Form::label($name . ' Confirm', $options['label'].'_confirmation') !!}
            {!! Form::input($options['type'], $name.'_confirmation', null, ['class'=>'form-control']) !!}
        @else
            {!! Form::$options['type']($name, isset($entity) ? $entity->$name : null, ['class'=>'form-control']) !!}
        @endif
        @if ($errors->has($name))
            <p class="help-block">{{ $errors->first($name) }}</p>
        @endif
    </div>
@endif