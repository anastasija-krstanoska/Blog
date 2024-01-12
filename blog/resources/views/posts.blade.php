<x-layout>
    @foreach ($posts as $post)

        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">
                    {!! $post->title !!}
                </a>
            </h1>
            <p>
                <a href="/categories/{{ $post->category->slug }}">
                    {{ $post->category->name }}
                </a>
            </p>
            <div>
                {{$post->excerpt}}
            </div>

        </article>
    @endforeach

</x-layout>

{{--

Bez papka components
@extends('components.layout')
@section('content')
    @foreach ($posts as $post)

        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">
                    {{ $post->title }}
                </a>
            </h1>
            <div>
                {{$post->excerpt}}
            </div>

        </article>
    @endforeach
@endsection


--}}
{{--
Namesto na sekoe da pisuvame Html moze da se pristapi od @extends('layout')

--}}

