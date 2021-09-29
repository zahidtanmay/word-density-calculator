@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Word Density</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('word-densities.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>URL:</strong>
                {{ $wordDensity->url }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Density:</strong>
                <ul>
                    @foreach(json_decode($wordDensity->notes, 1) as $key => $density)
                        <li><strong>{{$key}}</strong>: {{$density}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
