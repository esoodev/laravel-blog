@extends('layouts.app') @section('content')
<div class="container">
    <div class="add-post">
        <header>
            <h3 class="h6">Write a New Post</h3>
        </header>
        <form method="POST" action="/magazine/new" class="blogging-form">
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
                <input type="text" name="content_lead" id="content_lead" placeholder="Short summary of the post." class="form-control">
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