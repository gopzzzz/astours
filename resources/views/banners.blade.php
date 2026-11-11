@extends('layouts.mainlayout')

@section('content')

<style>

/* =========================================
   BANNER TABLE
========================================= */

.banner-table-wrapper {
    width: 100%;
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(25, 35, 55, .04);
}

.banner-table {
    width: 100%;
    margin: 0;
    border: 0 !important;
}

.banner-table thead {
    background: #f7f8fb;
}

.banner-table thead th {
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

.banner-table tbody td {
    padding: 13px 16px;
    border: 0 !important;
    border-bottom: 1px solid #f0f2f5 !important;

    vertical-align: middle;
    color: #394150;
    font-size: 12px;
}

.banner-table tbody tr:last-child td {
    border-bottom: 0 !important;
}

.banner-table tbody tr {
    transition: background .2s ease;
}

.banner-table tbody tr:hover {
    background: #fafbff;
}


/* =========================================
   ID
========================================= */

.banner-id {
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
   BANNER NAME
========================================= */

.banner-name-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.banner-avatar {
    width: 35px;
    height: 35px;
    min-width: 35px;

    border-radius: 9px;

    background: #eef4ff;
    color: #3867e8;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 12px;
}

.banner-name-cell strong {
    display: block;

    color: #2d3542;
    font-size: 12px;
    font-weight: 600;
}

.banner-name-cell small {
    display: block;

    margin-top: 2px;

    color: #9ba3b0;
    font-size: 9px;
}


/* =========================================
   IMAGE
========================================= */

.banner-image-box {
    display: flex;
    align-items: center;
    gap: 10px;
}

.banner-image {
    width: 75px;
    height: 45px;

    object-fit: cover;

    border-radius: 8px;
    border: 1px solid #e3e7ed;

    background: #f7f8fb;
}

.banner-image-name {
    color: #697281;
    font-size: 10px;
    font-weight: 500;

    max-width: 160px;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* =========================================
   EDIT BUTTON
========================================= */

.banner-edit-btn {
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

.banner-edit-btn i {
    margin-right: 4px;
    font-size: 9px;
}

.banner-edit-btn:hover {
    background: #3867e8;
    border-color: #3867e8;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   DELETE BUTTON
========================================= */

.banner-delete-btn {
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

.banner-delete-btn i {
    margin-right: 4px;
    font-size: 9px;
}

.banner-delete-btn:hover {
    background: #e74c3c;
    border-color: #e74c3c;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   EMPTY STATE
========================================= */

.banner-empty {
    padding: 45px 20px;
    text-align: center;
}

.banner-empty-icon {
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

.banner-empty h5 {
    margin: 0;

    color: #3c4452;
    font-size: 14px;
    font-weight: 600;
}

.banner-empty p {
    margin: 5px 0 0;

    color: #9ba3b0;
    font-size: 11px;
}


/* =========================================
   MODAL
========================================= */

.banner-modal .modal-dialog {
    max-width: 800px;
}

.banner-modal .modal-content {
    border: none;
    border-radius: 18px;
    overflow: hidden;

    box-shadow: 0 25px 70px rgba(20, 30, 50, .18);
}


/* =========================================
   MODAL HEADER
========================================= */

.banner-modal-header {
    position: relative;

    display: flex;
    align-items: center;
    gap: 13px;

    padding: 20px 24px;

    background: #fff;
    border-bottom: 1px solid #edf0f4;
}

.banner-header-icon {
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

.banner-modal-header h4 {
    margin: 0;

    color: #202735;
    font-size: 17px;
    font-weight: 700;
}

.banner-modal-header p {
    margin: 4px 0 0;

    color: #929aaa;
    font-size: 11px;
}

.banner-modal-close {
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

.banner-modal-close:hover {
    background: #eceef2;
    color: #303744;
}


/* =========================================
   FORM BODY
========================================= */

.banner-form-body {
    background: #f7f8fc;
    padding: 22px;

    max-height: 70vh;
    overflow-y: auto;
}


/* =========================================
   SECTION
========================================= */

.banner-section {
    background: #fff;

    border: 1px solid #e7ebf1;
    border-radius: 15px;

    padding: 20px;
    margin-bottom: 17px;

    box-shadow: 0 2px 9px rgba(25, 35, 55, .035);
}


/* =========================================
   SECTION HEADING
========================================= */

.banner-section-heading {
    display: flex;
    align-items: center;
    gap: 12px;

    padding-bottom: 15px;
    margin-bottom: 20px;

    border-bottom: 1px solid #edf0f4;
}

.banner-section-icon {
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

.banner-section-heading h5 {
    margin: 0;

    font-size: 14px;
    color: #252d3a;
    font-weight: 700;
}

.banner-section-heading p {
    margin: 3px 0 0;

    font-size: 10px;
    color: #99a1ad;
}


/* =========================================
   FIELD
========================================= */

.banner-field {
    margin-bottom: 7px;
}

.banner-field label {
    display: block;

    margin-bottom: 7px;

    color: #3d4654;
    font-size: 12px;
    font-weight: 600;
}

.banner-field label span {
    color: #ef4444;
}


/* =========================================
   INPUT
========================================= */

.banner-input {
    position: relative;
}

.banner-input > i {
    position: absolute;

    left: 13px;
    top: 50%;

    transform: translateY(-50%);

    color: #9ba4b2;
    font-size: 12px;

    z-index: 2;

    pointer-events: none;
}

.banner-input .form-control {
    height: 42px;

    border: 1px solid #dfe3e9;
    border-radius: 9px;

    padding-left: 36px;

    color: #303744;
    font-size: 12px;

    box-shadow: none;

    transition: .2s ease;
}

.banner-input .form-control:focus {
    border-color: #3867e8;

    box-shadow: 0 0 0 3px rgba(56, 103, 232, .09);
}


/* =========================================
   FILE INPUT
========================================= */

.banner-file-input {
    padding: 9px 12px !important;
    height: 42px !important;
}


/* =========================================
   IMAGE INFO
========================================= */

.banner-image-info {
    margin-top: 8px;

    padding: 9px 11px;

    border-radius: 8px;

    background: #f5f7fa;

    color: #7d8694;

    font-size: 10px;
}

.banner-image-info i {
    color: #3867e8;
    margin-right: 5px;
}


/* =========================================
   CURRENT IMAGE
========================================= */

.current-banner-image {
    display: flex;
    align-items: center;
    gap: 12px;

    padding: 12px;

    border: 1px solid #e1e5eb;
    border-radius: 10px;

    background: #fafbfc;
}

.current-banner-image img {
    width: 100px;
    height: 60px;

    object-fit: cover;

    border-radius: 8px;
    border: 1px solid #e3e7ed;
}

.current-banner-image-info {
    display: flex;
    flex-direction: column;
    gap: 3px;

    min-width: 0;
    flex: 1;
}

.current-banner-image-info strong {
    font-size: 11px;
    color: #394150;
}

.current-banner-image-info span {
    font-size: 10px;
    color: #9aa3b0;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* =========================================
   FOOTER
========================================= */

.banner-modal-footer {
    display: flex;

    justify-content: flex-end;
    align-items: center;

    gap: 9px;

    padding: 14px 22px;

    background: #fff;

    border-top: 1px solid #e8ebf0;
}

.banner-cancel-btn {
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

.banner-cancel-btn:hover {
    background: #f6f7f9;
    color: #333b48;
}

.banner-save-btn {
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

.banner-save-btn:hover {
    background: #2f59d1;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   SCROLLBAR
========================================= */

.banner-form-body::-webkit-scrollbar {
    width: 5px;
}

.banner-form-body::-webkit-scrollbar-track {
    background: transparent;
}

.banner-form-body::-webkit-scrollbar-thumb {
    background: #d1d6de;
    border-radius: 20px;
}


/* =========================================
   MOBILE
========================================= */

@media(max-width:768px) {

    .banner-table {
        min-width: 850px;
    }

}

</style>


<div class="content-wrapper">

    <!-- Content Header -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Banners</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Banners
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <!-- Main Content -->

    <section class="content">

        <div class="container-fluid">


            {{-- SUCCESS --}}

            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            {{-- ERROR --}}

            @if(session('error'))

                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

            @endif


            {{-- VALIDATION ERRORS --}}

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


            <!-- BANNER CARD -->

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Banner List
                    </h3>


                    <!-- ADD BUTTON -->

                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addBannerModal">

                        <i class="fas fa-plus"></i>

                        Add Banner

                    </button>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <div class="banner-table-wrapper">

                            <table class="table banner-table">

                                <thead>

                                    <tr>

                                        <th width="70">
                                            #
                                        </th>

                                        <th>
                                            Banner Title
                                        </th>

                                        <th>
                                            Banner Image (Width * Height) (1265 * 700)
                                        </th>

                                        <th width="190"
                                            class="text-center">
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @forelse($banners as $banner)

                                        <tr>


                                            <!-- ID -->

                                            <td>

                                                <span class="banner-id">

                                                    #{{ $loop->iteration }}

                                                </span>

                                            </td>


                                            <!-- TITLE -->

                                            <td>

                                                <div class="banner-name-cell">

                                                    <div class="banner-avatar">

                                                        <i class="fas fa-bullhorn"></i>

                                                    </div>


                                                    <div>

                                                        <strong>
                                                            {{ $banner->bannertitle }}
                                                        </strong>

                                                        <small>
                                                            Banner
                                                        </small>

                                                    </div>

                                                </div>

                                            </td>


                                            <!-- IMAGE -->

                                            <td>

                                                <div class="banner-image-box">

                                                    <img src="{{ asset('public/uploads/banners/' . $banner->bannerimage) }}"
                                                         alt="{{ $banner->bannertitle }}"
                                                         class="banner-image">


                                                    <span class="banner-image-name">

                                                        {{ $banner->bannerimage }}

                                                    </span>

                                                </div>

                                            </td>


                                            <!-- ACTION -->

                                            <td class="text-center">


                                                <!-- EDIT -->

                                                <button type="button"
                                                        class="banner-edit-btn"

                                                        data-toggle="modal"
                                                        data-target="#editBannerModal"

                                                        data-id="{{ $banner->id }}"

                                                        data-bannertitle="{{ $banner->bannertitle }}"

                                                        data-bannerimage="{{ $banner->bannerimage }}">

                                                    <i class="fas fa-edit"></i>

                                                    Edit

                                                </button>


                                                <!-- DELETE -->

                                                <form action="{{ route('banners.destroy', $banner->id) }}"
                                                      method="POST"
                                                      style="display:inline-block;">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="banner-delete-btn"

                                                            onclick="return confirm('Are you sure you want to delete this banner?');">

                                                        <i class="fas fa-trash"></i>

                                                        Delete

                                                    </button>

                                                </form>


                                            </td>

                                        </tr>


                                    @empty

                                        <tr>

                                            <td colspan="4">

                                                <div class="banner-empty">

                                                    <div class="banner-empty-icon">

                                                        <i class="fas fa-bullhorn"></i>

                                                    </div>

                                                    <h5>
                                                        No Banners Found
                                                    </h5>

                                                    <p>
                                                        There are currently no banners available.
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
<!-- ADD BANNER MODAL -->
<!-- ================================================= -->

<div class="modal fade banner-modal"
     id="addBannerModal">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">


            <!-- HEADER -->

            <div class="banner-modal-header">

                <div class="banner-header-icon">

                    <i class="fas fa-bullhorn"></i>

                </div>


                <div>

                    <h4>
                        Add Banner
                    </h4>

                    <p>
                        Enter banner information
                    </p>

                </div>


                <button type="button"
                        class="banner-modal-close"
                        data-dismiss="modal">

                    <i class="fas fa-times"></i>

                </button>

            </div>


            <!-- FORM -->

            <form method="POST"
                  action="{{ route('banners.store') }}"
                  enctype="multipart/form-data">

                @csrf


                <div class="modal-body banner-form-body">


                    <div class="banner-section">


                        <!-- SECTION HEADER -->

                        <div class="banner-section-heading">

                            <div class="banner-section-icon">

                                <i class="fas fa-pen"></i>

                            </div>


                            <div>

                                <h5>
                                    Banner Information
                                </h5>

                                <p>
                                    Enter basic banner details
                                </p>

                            </div>

                        </div>


                        <div class="row">


                            <!-- TITLE -->

                            <div class="col-md-6">

                                <div class="banner-field">

                                    <label>
                                        Banner Title <span>*</span>
                                    </label>


                                    <div class="banner-input">

                                        <i class="fas fa-heading"></i>

                                        <input type="text"
                                               name="bannertitle"
                                               class="form-control"
                                               placeholder="Enter banner title"
                                               value="{{ old('bannertitle') }}"
                                               required>

                                    </div>

                                </div>

                            </div>


                            <!-- IMAGE -->

                            <div class="col-md-6">

                                <div class="banner-field">

                                    <label>
                                      Banner Image (Width * Height) (1265 * 700) <span>*</span> 
                                    </label>


                                    <div class="banner-input">

                                        <i class="fas fa-image"></i>

                                        <input type="file"
                                               name="bannerimage"
                                               class="form-control banner-file-input"
                                               accept="image/*"
                                               required>

                                    </div>


                                    <div class="banner-image-info">

                                        <i class="fas fa-info-circle"></i>

                                        JPG, JPEG, PNG, GIF or WEBP. Maximum 10MB.

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>


                <!-- FOOTER -->

                <div class="banner-modal-footer">

                    <button type="button"
                            class="banner-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>

                        Cancel

                    </button>


                    <button type="submit"
                            class="banner-save-btn">

                        <i class="fas fa-save"></i>

                        Save Banner

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>



<!-- ================================================= -->
<!-- EDIT BANNER MODAL -->
<!-- ================================================= -->

<div class="modal fade banner-modal"
     id="editBannerModal">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">


            <!-- HEADER -->

            <div class="banner-modal-header">

                <div class="banner-header-icon">

                    <i class="fas fa-edit"></i>

                </div>


                <div>

                    <h4>
                        Edit Banner
                    </h4>

                    <p>
                        Update banner information
                    </p>

                </div>


                <button type="button"
                        class="banner-modal-close"
                        data-dismiss="modal">

                    <i class="fas fa-times"></i>

                </button>

            </div>


            <!-- FORM -->

            <form method="POST"
                  id="editBannerForm"
                  enctype="multipart/form-data">

                @csrf

                @method('PUT')


                <div class="modal-body banner-form-body">


                    <div class="banner-section">


                        <!-- SECTION HEADER -->

                        <div class="banner-section-heading">

                            <div class="banner-section-icon">

                                <i class="fas fa-pen"></i>

                            </div>


                            <div>

                                <h5>
                                    Banner Information
                                </h5>

                                <p>
                                    Update banner details
                                </p>

                            </div>

                        </div>


                        <div class="row">


                            <!-- TITLE -->

                            <div class="col-md-6">

                                <div class="banner-field">

                                    <label>
                                        Banner Title <span>*</span>
                                    </label>


                                    <div class="banner-input">

                                        <i class="fas fa-heading"></i>

                                        <input type="text"
                                               name="bannertitle"
                                               id="edit_bannertitle"
                                               class="form-control"
                                               placeholder="Enter banner title"
                                               required>

                                    </div>

                                </div>

                            </div>


                            <!-- NEW IMAGE -->

                            <div class="col-md-6">

                                <div class="banner-field">

                                    <label>
                                        Banner Image (Width * Height) (1265 * 700)
                                    </label>


                                    <div class="banner-input">

                                        <i class="fas fa-image"></i>

                                        <input type="file"
                                               name="bannerimage"
                                               class="form-control banner-file-input"
                                               accept="image/*">

                                    </div>


                                    <div class="banner-image-info">

                                        <i class="fas fa-info-circle"></i>

                                        Leave empty to keep the current image.

                                    </div>

                                </div>

                            </div>


                            <!-- CURRENT IMAGE -->

                            <div class="col-md-12">

                                <div class="banner-field">

                                    <label>
                                        Current Banner Image
                                    </label>


                                    <div class="current-banner-image">

                                        <img id="edit_banner_preview"
                                             src=""
                                             alt="Banner Image">


                                        <div class="current-banner-image-info">

                                            <strong>
                                                Current Banner Image
                                            </strong>

                                            <span id="edit_banner_image_name">
                                                Image
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>


                <!-- FOOTER -->

                <div class="banner-modal-footer">

                    <button type="button"
                            class="banner-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>

                        Cancel

                    </button>


                    <button type="submit"
                            class="banner-save-btn">

                        <i class="fas fa-save"></i>

                        Update Banner

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>



<!-- ================================================= -->
<!-- JAVASCRIPT -->
<!-- ================================================= -->

<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>

<script>

$(document).ready(function () {


    /* =========================================
       EDIT BANNER MODAL
    ========================================= */

    $('#editBannerModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget);


        var id = button.data('id');

        var bannertitle = button.data('bannertitle');

        var bannerimage = button.data('bannerimage');


        // Fill title

        $('#edit_bannertitle').val(bannertitle);


        // Current image name

        $('#edit_banner_image_name').text(bannerimage);


        // Current image preview

        if (bannerimage) {

            $('#edit_banner_preview')
                .attr(
                    'src',
                    "{{ asset('public/uploads/banners') }}/" + bannerimage
                )
                .show();

        }


        
        var action = "{{ route('banners.update', ':id') }}";

        action = action.replace(':id', id);


        $('#editBannerForm').attr('action', action);

    });


});

</script>

@endsection