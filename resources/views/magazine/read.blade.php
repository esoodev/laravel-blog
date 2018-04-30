@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">

        <div class="magazine-title m-b-md">
            {{ $magazine->title }}
        </div>

        <div class="magazine-category m-b-md">
            {{ $category->name }}
        </div>

        <div class="magazine-created_at m-b-md">
            {{ $magazine->created_at }}
        </div>

        <div class="magazine-content">
            {{!! $magazine->content_html !!}}
        </div>
    </div>
</div>
@endsection
