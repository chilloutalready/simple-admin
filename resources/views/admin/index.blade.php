@extends(SApackageName().'::layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>{{ ucwords(str_replace('_', ' ', str_plural($tableName))) }} <a class="btn btn-primary pull-right" href="/{{ SApackageConfig('prefix') }}/{{ $tableName }}/create">Create new</a></h2>

                @if ($filters)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Filter</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-inline" method="GET">
                                @foreach($filters as $name => $options)
                                    <div class="form-group">
                                        {!! Form::label($name, $options['label'], [ 'class' => 'control-label' ]) !!}
                                        {!! Form::$options['type']($name, @$filterValue[$name], ['class'=>'form-control']) !!}
                                    </div>
                                @endforeach
                                <button class="btn btn-default" type="submit">Filter</button>
                                <a href="/{{ SApackageConfig('prefix') }}/{{ $tableName }}" class="btn btn-warning">Reset</a>
                            </form>
                        </div>
                    </div>
                @endif

                @if (count($rows) == 0)
                    <div class="alert alert-info" role="alert">No records found</div>
                @else
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                            @foreach($columns as $col)
                                <th style="{{ ($col == $orderColumn)? 'text-decoration: underline' : '' }}">
                                    {{ ucfirst($col) }}
                                    <a href="{{ $sortHref . '&column=' . $col }}">
                                        <span class="glyphicon glyphicon-sort-by-alphabet{{ ($col == $orderColumn && $direction == 'desc')? '' : '-alt' }}"></span>
                                    </a>
                                </th>
                            @endforeach
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                            <tr>
                                @foreach($columns as $col)
                                    <td>{{ $row->$col }}</td>
                                @endforeach
                                <td class="text-right">

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                                            Actions <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="/{{ SApackageConfig('prefix') }}/{{ $tableName }}/edit/{{ $row->id }}">Edit</a>
                                            </li>
                                            <li>
                                                <a onclick="return confirm('Are you sure that you want to delete this row?')" href="/{{ SApackageConfig('prefix') }}/{{ $tableName }}/delete/{{ $row->id }}">Remove</a>
                                            </li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        {!! $rows->appends(\Request::all())->render() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection