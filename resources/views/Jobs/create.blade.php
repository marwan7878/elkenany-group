@extends('layouts.app')

@section('content')

<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">            
            <div class="row">
                <form action="{{route('job.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="title">العنوان</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="address">المكان</label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>
                    </div>
            
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="description">الوصف</label>
                            <textarea name="description"></textarea>
                        </div>
                    </div>
            
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <input class="main-btn primary-btn btn-hover w-25 text-center" type="submit" value="Submit">
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
  

<script>
    tinymce.init({
        selector: "textarea",
        directionality: 'rtl',
        plugins:
        "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss",
        toolbar:
        "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat",
        tinycomments_mode: "embedded",
        tinycomments_author: "Author name",
        mergetags_list: [
            { value: "First.Name", title: "First Name" },
            { value: "Email", title: "Email" },
        ],
    });
    
</script>

@endsection