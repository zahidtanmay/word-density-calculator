@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Word Density</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('word-densities.create') }}"> Create New</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Url</th>
            <th>Note</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($wordDensities as $wordDensity)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $wordDensity->url }}</td>
                <td>
                    <ul>
                        @foreach(json_decode($wordDensity->notes, 1) as $key => $density)
                            <li><strong>{{$key}}</strong>: {{$density}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('word-densities.show', $wordDensity->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('word-densities.edit', $wordDensity->id) }}">Edit</a>

                    <form action="{{ route('word-densities.destroy', $wordDensity->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <form action="{{ route('convertToHtml') }}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" placeholder="URL" name="url" value="{{$wordDensity->url}}" hidden>
                        <button type="submit" class="btn btn-warning">Rerun</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="row justify-content-center">
        {!! $wordDensities->links() !!}
    </div>

@endsection
