@extends('layout')
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


{{--
Namesto na sekoe da pisuvame Html moze da se pristapi od @extends('layout')

--}}
