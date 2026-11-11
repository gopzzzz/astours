@extends('layouts.mainlayout')

@section('content')

<style>

/* =========================================
   UPLOAD TABLE
========================================= */

.upload-table-wrapper {
    width: 100%;
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(25, 35, 55, .04);
}

.upload-table {
    width: 100%;
    margin: 0;
    border: 0 !important;
}

.upload-table thead {
    background: #f7f8fb;
}

.upload-table thead th {
    padding: 14px 16px;
    border: 0 !important;
    border-bottom: 1px solid #e8ebf0 !important;

    color: #697281;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .35px;
    white-space: nowrap;
}

.upload-table tbody td {
    padding: 13px 16px;
    border: 0 !important;
    border-bottom: 1px solid #f0f2f5 !important;

    vertical-align: middle;
    color: #394150;
    font-size: 12px;
}

.upload-table tbody tr:last-child td {
    border-bottom: 0 !important;
}

.upload-table tbody tr {
    transition: background .2s ease;
}

.upload-table tbody tr:hover {
    background: #fafbff;
}


/* =========================================
   UPLOAD ID
========================================= */

.upload-id {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 29px;
    height: 27px;

    padding: 0 7px;

    border-radius: 7px;

    background: #f1f4f8;
    color: #667080;

    font-size: 10px;
    font-weight: 600;
}


/* =========================================
   IMAGE CELL
========================================= */

.upload-image-cell {
    display: flex;
    align-items: center;
    gap: 11px;
}

.upload-image {
    width: 58px;
    height: 45px;

    object-fit: cover;

    border-radius: 8px;

    border: 1px solid #e2e6ec;

    background: #f7f8fb;
}

.upload-image-info {
    display: flex;
    flex-direction: column;

    min-width: 0;
}

.upload-image-info strong {
    color: #394150;
    font-size: 11px;
    font-weight: 600;

    max-width: 220px;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.upload-image-info small {
    margin-top: 3px;

    color: #9ba3b0;
    font-size: 9px;
}


/* =========================================
   COPY BUTTON
========================================= */

.upload-copy-btn {
    height: 32px;

    padding: 0 11px;

    border: 1px solid #dbe4ff;
    border-radius: 7px;

    background: #f1f5ff;
    color: #3867e8;

    font-size: 10px;
    font-weight: 600;

    transition: .2s ease;
}

.upload-copy-btn i {
    margin-right: 4px;
    font-size: 9px;
}

.upload-copy-btn:hover {
    background: #3867e8;
    border-color: #3867e8;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   DELETE BUTTON
========================================= */

.upload-delete-btn {
    height: 32px;

    padding: 0 11px;

    border: 1px solid #ffd6d6;
    border-radius: 7px;

    background: #fff2f2;
    color: #e74c3c;

    font-size: 10px;
    font-weight: 600;

    transition: .2s ease;
}

.upload-delete-btn i {
    margin-right: 4px;
    font-size: 9px;
}

.upload-delete-btn:hover {
    background: #e74c3c;
    border-color: #e74c3c;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   EMPTY STATE
========================================= */

.upload-empty {
    padding: 45px 20px;
    text-align: center;
}

.upload-empty-icon {
    width: 52px;
    height: 52px;

    margin: 0 auto 12px;

    border-radius: 13px;

    background: #f1f4f8;
    color: #9aa3b0;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 19px;
}

.upload-empty h5 {
    margin: 0;

    color: #3c4452;
    font-size: 14px;
    font-weight: 600;
}

.upload-empty p {
    margin: 5px 0 0;

    color: #9ba3b0;
    font-size: 11px;
}


/* =========================================
   UPLOAD MODAL
========================================= */

.upload-modal .modal-dialog {
    max-width: 650px;
}

.upload-modal .modal-content {
    border: none;

    border-radius: 18px;

    overflow: hidden;

    box-shadow: 0 25px 70px rgba(20, 30, 50, .18);
}


/* =========================================
   MODAL HEADER
========================================= */

.upload-modal-header {
    position: relative;

    display: flex;
    align-items: center;
    gap: 13px;

    padding: 20px 24px;

    background: #fff;

    border-bottom: 1px solid #edf0f4;
}

.upload-header-icon {
    width: 46px;
    height: 46px;

    border-radius: 13px;

    background: #eef4ff;
    color: #3867e8;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 17px;
}

.upload-modal-header h4 {
    margin: 0;

    color: #202735;

    font-size: 17px;
    font-weight: 700;
}

.upload-modal-header p {
    margin: 4px 0 0;

    color: #929aaa;

    font-size: 11px;
}

.upload-modal-close {
    margin-left: auto;

    width: 34px;
    height: 34px;

    border: 0;
    border-radius: 8px;

    background: #f5f6f8;
    color: #7d8694;

    cursor: pointer;

    transition: .2s ease;
}

.upload-modal-close:hover {
    background: #eceef2;
    color: #303744;
}


/* =========================================
   FORM BODY
========================================= */

.upload-form-body {
    background: #f7f8fc;

    padding: 22px;

    max-height: 70vh;

    overflow-y: auto;
}


/* =========================================
   SECTION
========================================= */

.upload-section {
    background: #fff;

    border: 1px solid #e7ebf1;

    border-radius: 15px;

    padding: 20px;

    margin-bottom: 17px;

    box-shadow: 0 2px 9px rgba(25, 35, 55, .035);
}

.upload-section:last-child {
    margin-bottom: 0;
}


/* =========================================
   SECTION HEADING
========================================= */

.upload-section-heading {
    display: flex;
    align-items: center;

    gap: 12px;

    padding-bottom: 15px;

    margin-bottom: 20px;

    border-bottom: 1px solid #edf0f4;
}

.upload-section-icon {
    width: 40px;
    height: 40px;

    border-radius: 11px;

    background: #f0f4ff;
    color: #3867e8;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 14px;
}

.upload-section-heading h5 {
    margin: 0;

    font-size: 14px;

    color: #252d3a;

    font-weight: 700;
}

.upload-section-heading p {
    margin: 3px 0 0;

    font-size: 10px;

    color: #99a1ad;
}


/* =========================================
   UPLOAD BOX
========================================= */

.upload-image-box {
    height: 180px;

    border: 1.5px dashed #cbd3df;

    border-radius: 12px;

    background: #fafbff;

    position: relative;

    display: flex;
    flex-direction: column;

    align-items: center;
    justify-content: center;

    overflow: hidden;

    transition: all .2s ease;
}

.upload-image-box:hover {
    border-color: #3867e8;

    background: #f5f8ff;
}

.upload-image-box > i {
    color: #3867e8;

    font-size: 30px;

    margin-bottom: 9px;
}

.upload-image-box strong {
    color: #414957;

    font-size: 12px;

    font-weight: 600;
}

.upload-image-box span {
    color: #9ba3b0;

    font-size: 10px;

    margin-top: 5px;
}

.upload-image-box input {
    position: absolute;

    inset: 0;

    width: 100%;
    height: 100%;

    opacity: 0;

    cursor: pointer;
}


/* =========================================
   SELECTED FILE
========================================= */

.selected-file {
    margin-top: 12px;

    padding: 10px 12px;

    border-radius: 8px;

    background: #f1f5ff;

    color: #3867e8;

    font-size: 10px;

    display: none;
}

.selected-file i {
    margin-right: 5px;
}


/* =========================================
   FOOTER
========================================= */

.upload-modal-footer {
    display: flex;

    justify-content: flex-end;
    align-items: center;

    gap: 9px;

    padding: 14px 22px;

    background: #fff;

    border-top: 1px solid #e8ebf0;
}

.upload-cancel-btn {
    height: 40px;

    padding: 0 17px;

    border: 1px solid #dfe3e9;

    border-radius: 8px;

    background: #fff;

    color: #697281;

    font-size: 12px;

    font-weight: 600;

    transition: .2s ease;
}

.upload-cancel-btn:hover {
    background: #f6f7f9;

    color: #333b48;
}

.upload-save-btn {
    height: 40px;

    padding: 0 20px;

    border: 0;

    border-radius: 8px;

    background: #3867e8;

    color: #fff;

    font-size: 12px;

    font-weight: 600;

    box-shadow: 0 4px 12px rgba(56, 103, 232, .20);

    transition: .2s ease;
}

.upload-save-btn:hover {
    background: #2f59d1;

    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   SCROLLBAR
========================================= */

.upload-form-body::-webkit-scrollbar {
    width: 5px;
}

.upload-form-body::-webkit-scrollbar-track {
    background: transparent;
}

.upload-form-body::-webkit-scrollbar-thumb {
    background: #d1d6de;

    border-radius: 20px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .upload-table-wrapper {
        overflow-x: auto;
    }

    .upload-table {
        min-width: 700px;
    }

    .upload-table thead th,
    .upload-table tbody td {
        padding: 11px 12px;
    }
}

@media (max-width: 767px) {

    .upload-modal .modal-dialog {
        margin: 10px;
    }

    .upload-modal-header {
        padding: 16px;
    }

    .upload-form-body {
        padding: 13px;
    }

    .upload-section {
        padding: 15px;
    }

    .upload-modal-footer {
        padding: 12px 14px;
    }
}

</style>


<div class="content-wrapper">

    <!-- Content Header -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Uploads</h1>

                </div>


                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">

                            <a href="#">
                                Home
                            </a>

                        </li>

                        <li class="breadcrumb-item active">

                            Uploads

                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>



    <!-- Main Content -->

    <section class="content">

        <div class="container-fluid">


            {{-- Success Message --}}

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            {{-- Error Message --}}

            @if(session('error'))

                <div class="alert alert-danger">

                    {{ session('error') }}

                </div>

            @endif


            {{-- Validation Errors --}}

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <div class="card">


                <div class="card-header">

                    <h3 class="card-title">

                        Uploaded Images List

                    </h3>


                    <!-- ADD BUTTON -->

                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addUploadModal">

                        <i class="fas fa-plus"></i>

                        Add Image

                    </button>

                </div>



                <div class="card-body">

                    <div class="table-responsive">

                        <div class="upload-table-wrapper">


                            <table class="table upload-table">

                                <thead>

                                    <tr>

                                        <th width="70">
                                            #
                                        </th>

                                        <th>
                                            Image
                                        </th>

                                        <th width="250"
                                            class="text-center">
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>


                                    @forelse($uploads as $upload)

                                        <tr>


                                            <!-- ID -->

                                            <td>

                                                <span class="upload-id">

                                                    {{ $upload->id }}

                                                </span>

                                            </td>



                                            <!-- IMAGE -->

                                            <td>

                                                <div class="upload-image-cell">


                                                    <img src="{{ asset('public/uploads/' . $upload->image) }}"
                                                         alt="{{ $upload->image }}"
                                                         class="upload-image">


                                                    <div class="upload-image-info">

                                                        <strong>

                                                            {{ $upload->image }}

                                                        </strong>

                                                        <small>

                                                            Uploaded Image

                                                        </small>

                                                    </div>


                                                </div>

                                            </td>



                                            <!-- ACTION -->

                                            <td class="text-center">


                                                <!-- COPY IMAGE NAME -->

                                                <button type="button"
                                                        class="upload-copy-btn"
                                                        onclick="copyImageName('{{ $upload->image }}')">

                                                    <i class="fas fa-copy"></i>

                                                    Copy Image Name

                                                </button>



                                                <!-- DELETE -->

                                                <form action="{{ route('uploads.destroy', $upload->id) }}"
                                                      method="POST"
                                                      style="display:inline-block;">

                                                    @csrf

                                                    @method('DELETE')


                                                    <button type="submit"
                                                            class="upload-delete-btn"
                                                            onclick="return confirm('Are you sure you want to delete this image?');">

                                                        <i class="fas fa-trash"></i>

                                                        Delete

                                                    </button>

                                                </form>


                                            </td>


                                        </tr>


                                    @empty


                                        <tr>

                                            <td colspan="3">


                                                <div class="upload-empty">


                                                    <div class="upload-empty-icon">

                                                        <i class="fas fa-images"></i>

                                                    </div>


                                                    <h5>

                                                        No Images Found

                                                    </h5>


                                                    <p>

                                                        There are currently no images uploaded.

                                                    </p>


                                                </div>


                                            </td>

                                        </tr>


                                    @endforelse


                                </tbody>

                            </table>


                        </div>

                    </div>

                </div>


            </div>


        </div>

    </section>

</div>



<!-- ================================================= -->
<!-- ADD IMAGE MODAL -->
<!-- ================================================= -->

<div class="modal fade upload-modal"
     id="addUploadModal">


    <div class="modal-dialog modal-dialog-centered">


        <div class="modal-content">


            <!-- HEADER -->

            <div class="upload-modal-header">


                <div class="upload-header-icon">

                    <i class="fas fa-cloud-upload-alt"></i>

                </div>


                <div>

                    <h4>
                        Add Image
                    </h4>

                    <p>
                        Upload a new image to the server
                    </p>

                </div>


                <button type="button"
                        class="upload-modal-close"
                        data-dismiss="modal">

                    <i class="fas fa-times"></i>

                </button>


            </div>



            <!-- FORM -->

            <form method="POST"
                  action="{{ route('uploads.store') }}"
                  enctype="multipart/form-data">

                @csrf


                <div class="modal-body upload-form-body">


                    <!-- IMAGE SECTION -->

                    <div class="upload-section">


                        <div class="upload-section-heading">


                            <div class="upload-section-icon">

                                <i class="fas fa-image"></i>

                            </div>


                            <div>

                                <h5>
                                    Image Upload
                                </h5>

                                <p>
                                    Select an image from your computer
                                </p>

                            </div>


                        </div>



                        <div class="upload-image-box">


                            <i class="fas fa-cloud-upload-alt"></i>


                            <strong>
                                Click to Upload Image
                            </strong>


                            <span>
                                JPG, JPEG, PNG, GIF or WEBP · Max 10MB
                            </span>


                            <input type="file"
                                   name="image"
                                   id="uploadImageInput"
                                   accept=".jpg,.jpeg,.png,.gif,.webp"
                                   required>


                        </div>


                        <!-- SELECTED FILE -->

                        <div class="selected-file"
                             id="selectedFile">

                            <i class="fas fa-check-circle"></i>

                            <span id="selectedFileName"></span>

                        </div>


                    </div>


                </div>



                <!-- FOOTER -->

                <div class="upload-modal-footer">


                    <button type="button"
                            class="upload-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>

                        Cancel

                    </button>


                    <button type="submit"
                            class="upload-save-btn">

                        <i class="fas fa-upload"></i>

                        Upload Image

                    </button>


                </div>


            </form>


        </div>

    </div>

</div>



<!-- ================================================= -->
<!-- SCRIPT -->
<!-- ================================================= -->

<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>


<script>

/* =========================================
   SHOW SELECTED FILE NAME
========================================= */

$('#uploadImageInput').on('change', function () {

    var fileName = this.files.length
        ? this.files[0].name
        : '';

    if (fileName) {

        $('#selectedFileName').text(fileName);

        $('#selectedFile').css('display', 'block');

    } else {

        $('#selectedFile').hide();

    }

});



/* =========================================
   COPY IMAGE NAME
========================================= */

function copyImageName(imageName)
{
    navigator.clipboard.writeText(imageName)

        .then(function () {

            alert('Image name copied: ' + imageName);

        })

        .catch(function () {

            var textArea = document.createElement("textarea");

            textArea.value = imageName;

            document.body.appendChild(textArea);

            textArea.select();

            document.execCommand('copy');

            document.body.removeChild(textArea);

            alert('Image name copied: ' + imageName);

        });
}

</script>


@endsection