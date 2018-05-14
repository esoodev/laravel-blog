@extends('layouts.app') @section('content')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=793utg3aukm6rw3boy73oxa90e843o0k8zmh6t5l510wzt2n"></script>


<div class="add-post">
    <header>
        <h3 class="h6">Write a New Post</h3>
    </header>
    <form method="POST" action="/magazine/new" class="blogging-form">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-md-6">
                <input type="text" name="title" id="title" placeholder="Title" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="content_lead" id="content_lead" placeholder="Short summary of the post." class="form-control">
            </div>
            <textarea name="content_body" class="form-control my-editor">{!! old('content', $content_body) !!}</textarea>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-secondary">Submit Post</button>
            </div>
        </div>
    </form>
</div>



<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script> @endsection