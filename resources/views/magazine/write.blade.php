@extends('layouts.app') 

@section('header')
    <!-- TinyMCE -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=793utg3aukm6rw3boy73oxa90e843o0k8zmh6t5l510wzt2n"></script>
    <script src="{{ asset('js/tinymce.js') }}" defer></script>
@endsection

@section('content')
<div class="container">
    <div class="add-post">
        <header>
            <h3 class="h6">Write a New Post</h3>
        </header>
        <form method="POST" action="/magazine/write" class="blogging-form">
            {{ csrf_field() }}
            <div class="row form-description">
                <div class="form-group col">
                    <input type="text" name="title" id="title" placeholder="Title" class="form-control">
                </div>
                <div class="form-group col">
                    <input type="text" name="category" id="category" placeholder="Category" class="form-control">
                </div>
                <div class="form-group col">
                    <input type="text" name="tags" id="tags" placeholder="Add tags separated by whitespace." class="form-control">
                </div>
            </div>
            <div class="form-group col-md-12">
                <textarea type="text" name="content_lead" id="content_lead" placeholder="Short summary of the post." class="form-control"></textarea>
            </div>
            <div class="form-group col-md-12">
                <textarea name="content_body" class="form-control my-editor">{!! old('content', $content_body) !!}</textarea>
            </div>
            <div class="form-group col-md-12 text-center">
                <button type="submit" class="btn btn-secondary">Submit Post</button>
            </div>
        </form>
    </div>
</div>
@endsection