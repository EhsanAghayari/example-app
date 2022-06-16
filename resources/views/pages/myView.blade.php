@extends('layouts.app')

@section('content')
    <div style="text-align: center; font-size: 24px;">

        <h1>به صفحه ویو خوش آمدید</h1>
        <h3>آیدی: {{$id}}</h3>
        <h3>نام: {{$name}}</h3>

    </div>
@endsection

@section('footer')
    <div style="text-align: center; font-size: 24px;">

        <h2>در این بخش فوتر قرار میگیرد</h2>

    </div>
@endsection
