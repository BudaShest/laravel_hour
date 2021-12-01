@extends('layouts/main-layout')

@section('title', $post['title'])


@section('content')
    @include('includes.categories')

    <h1 class="mt-5 mb-4 text-center">Post title</h1>
    <a href="{{route('getPostsByCategory',$post['category']->slug)}}" class="btn btn-outline-primary mb-4">Back</a>
    <article>
        <p>{{$post['description']}}</p>
        <p class="card-text">{{$post['text']}}</p>
    </article>

@endsection
