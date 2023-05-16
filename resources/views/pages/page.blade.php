@extends('layouts.theme')

@section('content')
{{print_r($page)}}
{{$title = $page['title']}}
@endsection
