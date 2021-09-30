@extends('layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="signup" class="form-horizontal" role="form" method="POST" action="{{route('convertToHtml')}}">
        {!! csrf_field() !!}

        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="URL" name="url" required>
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Search</button>
                </span>
                </div>
            </div>
        </div>
    </form>

    <div>
        @if ($url = Session::get('url'))

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left" style="margin-bottom: 30px;">
                        <h2>Result for : </h2><a>{{$url}}</a>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Word</th>
                    <th>Density</th>
                </tr>
                @php $wordDensities = json_decode(Session::get('wordDensities'), true); $i = 0;@endphp
                @foreach ($wordDensities as $key => $wordDensity)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{ $key }}</td>
                        <td>{{ $wordDensity }}</td>
                    </tr>
                @endforeach
            </table>

        @endif
    </div>


@endsection
