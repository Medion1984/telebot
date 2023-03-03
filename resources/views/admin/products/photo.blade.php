@extends('admin.layout')

@section('special_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
<style>
form{
  height: auto;
}
.container2{
  height: 100%;
}
.container2 div{
  height: 100%;
}

#imagePreview{
  max-width: 600px;
  margin: 10px auto;
}
#imagePreview img{
  width: 100%;
  object-fit: cover;
}
#image {
    display: block;
    /* This rule is very important, please don't ignore this */
    max-width: 100%;
}
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Загрузка фото</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form enctype="multipart/form-data" action="{{route('products.photo', $product->id)}}" method="POST" class="avatar-upload">
            <div class="avatar-edit">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="imageUpload" class="imageUpload" />
                <input type="hidden" name="base64image" name="base64image" id="base64image">
                <input type="submit" class="btn btn-primary">
            </div>
            <div class="avatar-preview container2">
                <div id="imagePreview">
                    <img id="previewer" src="{{ $product->getImage() }} " alt="">
                </div>
            </div>
        </form>
        <div class="modal fade bd-example-modal-lg imagecrop" id="model" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <div class="row">
                                <div class="col-md-11">
                                    <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary crop" id="crop">Crop</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection

@section('custom_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script>
var $modal = $('.imagecrop');
var image = document.getElementById('image');
var cropper;
$("body").on("change", ".imageUpload", function(e) {
    var files = e.target.files;
    var done = function(url) {
        image.src = url;
        $modal.modal('show');
    };
    var reader;
    var file;
    var url;
    if (files && files.length > 0) {
        file = files[0];
        if (URL) {
            done(URL.createObjectURL(file));
        } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function(e) {
                done(reader.result);
            };
            reader.readAsDataURL(file);
        }
    }
});
$modal.on('shown.bs.modal', function() {
    cropper = new Cropper(image);
}).on('hidden.bs.modal', function() {
    cropper.destroy();
    cropper = null;
});
$("body").on("click", "#crop", function() {
    canvas = cropper.getCroppedCanvas();
    canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function() {
            var base64data = reader.result;
            $('#base64image').val(base64data);
            $('#previewer').attr('src', base64data);
            $modal.modal('hide');
        }
    });
})
</script>
@endsection