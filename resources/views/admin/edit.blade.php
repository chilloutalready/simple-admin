@extends(SApackageName().'::layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Edit {{ ucwords(str_replace('_', ' ', str_singular($tableName))) }} #{{ $entity->id }}</h2>
                <form method="POST" action="/{{ SApackageConfig('prefix') }}/{{ $tableName }}/{{ $entity->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">

                    @foreach($form as $name => $options)
                        @include(SApackageName().'::admin.partials.form')
                    @endforeach
                    <button class="btn btn-success" type="submit">Update</button>
                    <a class="btn btn-default" href="/{{ SApackageConfig('prefix') }}/{{ $tableName }}">Cancel</a>
                </form>

            </div>
        </div>
    </div>
@endsection
