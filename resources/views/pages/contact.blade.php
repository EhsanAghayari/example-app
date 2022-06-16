@extends('layouts.app')

@section('content')
    @if(count($people))
        <ul>
            @foreach($people as $person)
                <li>{{$person}}</li>
            @endforeach
        </ul>
    @endif
@endsection

@section('footer')
    <p> 1999-2022 All rights reserved © </p>
@endsection
