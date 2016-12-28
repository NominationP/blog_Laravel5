@extends('layouts.app')

@section('content')
<h1>Default content here</h1>

<div>
    @include($markdownViewName)
</div>
@endsection