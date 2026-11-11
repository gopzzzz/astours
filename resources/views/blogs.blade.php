@extends('layouts.mainlayout')

@section('content')

<style>

/* =========================================
   BLOG TABLE
========================================= */

.blog-table-wrapper {
    width: 100%;
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(25, 35, 55, .04);
}

.blog-table {
    width: 100%;
    margin: 0;
    border: 0 !important;
}

.blog-table thead {
    background: #f7f8fb;
}

.blog-table thead th {
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

.blog-table tbody td {
    padding: 13px 16px;
    border: 0 !important;
    border-bottom: 1px solid #f0f2f5 !important;

    vertical-align: middle;
    color: #394150;
    font-size: 12px;
}

.blog-table tbody tr:last-child td {
    border-bottom: 0 !important;
}

.blog-table tbody tr {
    transition: background .2s ease;
}

.blog-table tbody tr:hover {
    background: #fafbff;
}


/* =========================================
   BLOG ID
========================================= */

.blog-id {
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
   BLOG NAME
========================================= */

.blog-name-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.blog-avatar {
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

.blog-name-cell strong {
    display: block;

    color: #2d3542;
    font-size: 12px;
    font-weight: 600;
}

.blog-name-cell small {
    display: block;

    margin-top: 2px;

    color: #9ba3b0;
    font-size: 9px;
}


/* =========================================
   BLOG IMAGE
========================================= */

.blog-image-box {
    display: flex;
    align-items: center;
    gap: 10px;
}

.blog-image {
    width: 55px;
    height: 42px;

    object-fit: cover;

    border-radius: 8px;
    border: 1px solid #e3e7ed;

    background: #f7f8fb;
}

.blog-image-name {
    color: #697281;
    font-size: 10px;
    font-weight: 500;

    max-width: 160px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* =========================================
   DESCRIPTION
========================================= */

.blog-description {
    max-width: 280px;

    color: #697281;
    font-size: 11px;

    line-height: 1.5;

    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;

    overflow: hidden;
}


/* =========================================
   IMAGE BUTTON
========================================= */

.blog-copy-btn {
    height: 31px;

    padding: 0 10px;

    border: 1px solid #dbe4ff;
    border-radius: 7px;

    background: #f1f5ff;
    color: #3867e8;

    font-size: 10px;
    font-weight: 600;

    transition: .2s ease;
}

.blog-copy-btn:hover {
    background: #3867e8;
    border-color: #3867e8;
    color: #fff;
}


/* =========================================
   EDIT BUTTON
========================================= */

.blog-edit-btn {
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

.blog-edit-btn i {
    margin-right: 4px;
    font-size: 9px;
}

.blog-edit-btn:hover {
    background: #3867e8;
    border-color: #3867e8;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   DELETE BUTTON
========================================= */

.blog-delete-btn {
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

.blog-delete-btn i {
    margin-right: 4px;
    font-size: 9px;
}

.blog-delete-btn:hover {
    background: #e74c3c;
    border-color: #e74c3c;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   EMPTY STATE
========================================= */

.blog-empty {
    padding: 45px 20px;
    text-align: center;
}

.blog-empty-icon {
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

.blog-empty h5 {
    margin: 0;

    color: #3c4452;
    font-size: 14px;
    font-weight: 600;
}

.blog-empty p {
    margin: 5px 0 0;

    color: #9ba3b0;
    font-size: 11px;
}


/* =========================================
   BLOG MODAL
========================================= */

.blog-modal .modal-dialog {
    max-width: 800px;
}

.blog-modal .modal-content {
    border: none;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 25px 70px rgba(20, 30, 50, .18);
}


/* =========================================
   MODAL HEADER
========================================= */

.blog-modal-header {
    position: relative;

    display: flex;
    align-items: center;
    gap: 13px;

    padding: 20px 24px;

    background: #fff;
    border-bottom: 1px solid #edf0f4;
}

.blog-header-icon {
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

.blog-modal-header h4 {
    margin: 0;

    color: #202735;
    font-size: 17px;
    font-weight: 700;
}

.blog-modal-header p {
    margin: 4px 0 0;

    color: #929aaa;
    font-size: 11px;
}

.blog-modal-close {
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

.blog-modal-close:hover {
    background: #eceef2;
    color: #303744;
}


/* =========================================
   FORM BODY
========================================= */

.blog-form-body {
    background: #f7f8fc;
    padding: 22px;

    max-height: 70vh;
    overflow-y: auto;
}


/* =========================================
   SECTIONS
========================================= */

.blog-section {
    background: #fff;

    border: 1px solid #e7ebf1;
    border-radius: 15px;

    padding: 20px;
    margin-bottom: 17px;

    box-shadow: 0 2px 9px rgba(25, 35, 55, .035);
}

.blog-section:last-child {
    margin-bottom: 0;
}


/* =========================================
   SECTION HEADING
========================================= */

.blog-section-heading {
    display: flex;
    align-items: center;
    gap: 12px;

    padding-bottom: 15px;
    margin-bottom: 20px;

    border-bottom: 1px solid #edf0f4;
}

.blog-section-icon {
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

.blog-section-heading h5 {
    margin: 0;

    font-size: 14px;
    color: #252d3a;
    font-weight: 700;
}

.blog-section-heading p {
    margin: 3px 0 0;

    font-size: 10px;
    color: #99a1ad;
}


/* =========================================
   FORM FIELDS
========================================= */

.blog-field {
    margin-bottom: 7px;
}

.blog-field label {
    display: block;

    margin-bottom: 7px;

    color: #3d4654;
    font-size: 12px;
    font-weight: 600;
}

.blog-field label span {
    color: #ef4444;
}


/* =========================================
   INPUT
========================================= */

.blog-input {
    position: relative;
}

.blog-input > i {
    position: absolute;

    left: 13px;
    top: 50%;

    transform: translateY(-50%);

    color: #9ba4b2;
    font-size: 12px;

    z-index: 2;

    pointer-events: none;
}

.blog-input .form-control {
    height: 42px;

    border: 1px solid #dfe3e9;
    border-radius: 9px;

    padding-left: 36px;

    color: #303744;
    font-size: 12px;

    box-shadow: none;

    transition: .2s ease;
}

.blog-input .form-control:focus {
    border-color: #3867e8;

    box-shadow: 0 0 0 3px rgba(56, 103, 232, .09);
}


/* =========================================
   TEXTAREA
========================================= */

.blog-textarea {
    width: 100%;

    border: 1px solid #dfe3e9;
    border-radius: 9px;

    padding: 11px 13px;

    color: #303744;
    font-size: 12px;

    line-height: 1.6;

    resize: vertical;

    box-shadow: none;
}

.blog-textarea:focus {
    border-color: #3867e8;

    box-shadow: 0 0 0 3px rgba(56, 103, 232, .09);

    outline: none;
}


/* =========================================
   IMAGE INFO
========================================= */

.blog-image-info {
    margin-top: 8px;

    padding: 9px 11px;

    border-radius: 8px;

    background: #f5f7fa;

    color: #7d8694;

    font-size: 10px;
}

.blog-image-info i {
    color: #3867e8;
    margin-right: 5px;
}


/* =========================================
   OPEN UPLOADS BUTTON
========================================= */

.blog-upload-link {
    display: inline-flex;

    align-items: center;
    gap: 5px;

    margin-top: 8px;

    padding: 7px 10px;

    border-radius: 7px;

    background: #eef4ff;
    color: #3867e8;

    font-size: 10px;
    font-weight: 600;

    text-decoration: none !important;

    transition: .2s ease;
}

.blog-upload-link:hover {
    background: #3867e8;
    color: #fff;
}


/* =========================================
   CURRENT IMAGE
========================================= */

.current-blog-image {
    display: flex;
    align-items: center;
    gap: 12px;

    padding: 12px;

    border: 1px solid #e1e5eb;
    border-radius: 10px;

    background: #fafbfc;
}

.current-blog-image img {
    width: 65px;
    height: 50px;

    object-fit: cover;

    border-radius: 8px;

    border: 1px solid #e3e7ed;
}

.current-blog-image-info {
    display: flex;
    flex-direction: column;
    gap: 3px;

    min-width: 0;
    flex: 1;
}

.current-blog-image-info strong {
    font-size: 11px;
    color: #394150;
}

.current-blog-image-info span {
    font-size: 10px;
    color: #9aa3b0;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* =========================================
   FOOTER
========================================= */

.blog-modal-footer {
    display: flex;

    justify-content: flex-end;
    align-items: center;

    gap: 9px;

    padding: 14px 22px;

    background: #fff;

    border-top: 1px solid #e8ebf0;
}

.blog-cancel-btn {
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

.blog-cancel-btn:hover {
    background: #f6f7f9;
    color: #333b48;
}

.blog-save-btn {
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

.blog-save-btn:hover {
    background: #2f59d1;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   SCROLLBAR
========================================= */

.blog-form-body::-webkit-scrollbar {
    width: 5px;
}

.blog-form-body::-webkit-scrollbar-track {
    background: transparent;
}

.blog-form-body::-webkit-scrollbar-thumb {
    background: #d1d6de;
    border-radius: 20px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .blog-table-wrapper {
        overflow-x: auto;
    }

    .blog-table {
        min-width: 850px;
    }

    .blog-table thead th,
    .blog-table tbody td {
        padding: 11px 12px;
    }
}

@media (max-width: 767px) {

    .blog-modal .modal-dialog {
        margin: 10px;
    }

    .blog-modal-header {
        padding: 16px;
    }

    .blog-form-body {
        padding: 13px;
    }

    .blog-section {
        padding: 15px;
    }

    .blog-field {
        margin-bottom: 15px;
    }

    .blog-modal-footer {
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
                    <h1>Reviews</h1>
                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Reviews
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

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Review List
                    </h3>


                    <!-- ADD BUTTON -->

                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addBlogModal">

                        <i class="fas fa-plus"></i>
                        Add Review

                    </button>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <div class="blog-table-wrapper">

                            <table class="table blog-table">

                                <thead>

                                    <tr>

                                        <th width="70">
                                            #
                                        </th>

                                        <th>
                                           Customer Name
                                        </th>

                                        <th>
                                            Review About Trip
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

                                    @forelse($blogs as $blog)

                                        <tr>

                                            <!-- ID -->

                                            <td>

                                                <span class="blog-id">
                                                    {{ $blog->id }}
                                                </span>

                                            </td>


                                            <!-- BLOG NAME -->

                                            <td>

                                                <div class="blog-name-cell">

                                                    <div class="blog-avatar">

                                                        <i class="fas fa-blog"></i>

                                                    </div>

                                                    <div>

                                                        <strong>
                                                            {{ $blog->blogname }}
                                                        </strong>

                                                        <small>
                                                            Blog
                                                        </small>

                                                    </div>

                                                </div>

                                            </td>


                                            <!-- DESCRIPTION -->

                                            <td>

                                                <div class="blog-description">

                                                    {{ $blog->description }}

                                                </div>

                                            </td>


                                            <!-- IMAGE -->

                                            <td>

                                                <div class="blog-image-box">

                                                    <img src="{{ asset('public/uploads/' . $blog->image) }}"
                                                         alt="{{ $blog->image }}"
                                                         class="blog-image">

                                                    <span class="blog-image-name">
                                                        {{ $blog->image }}
                                                    </span>

                                                </div>

                                            </td>


                                            <!-- ACTION -->

                                            <td class="text-center">

                                                <!-- Copy Image Name -->

                                                <button type="button"
                                                        class="blog-copy-btn"
                                                        onclick="copyImageName('{{ $blog->image }}')">

                                                    <i class="fas fa-copy"></i>
                                                    Copy

                                                </button>


                                                <!-- Edit -->

                                                <button type="button"
                                                        class="blog-edit-btn"
                                                        data-toggle="modal"
                                                        data-target="#editBlogModal"

                                                        data-id="{{ $blog->id }}"
                                                        data-blogname="{{ $blog->blogname }}"
                                                        data-description="{{ $blog->description }}"
                                                        data-image="{{ $blog->image }}">

                                                    <i class="fas fa-edit"></i>
                                                    Edit

                                                </button>


                                                <!-- Delete -->

                                                <form action="{{ route('blogs.destroy', $blog->id) }}"
                                                      method="POST"
                                                      style="display:inline-block;">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="blog-delete-btn"
                                                            onclick="return confirm('Are you sure you want to delete this blog?');">

                                                        <i class="fas fa-trash"></i>
                                                        Delete

                                                    </button>

                                                </form>

                                            </td>

                                        </tr>


                                    @empty

                                        <tr>

                                            <td colspan="5">

                                                <div class="blog-empty">

                                                    <div class="blog-empty-icon">

                                                        <i class="fas fa-blog"></i>

                                                    </div>

                                                    <h5>
                                                        No Reviews Found
                                                    </h5>

                                                    <p>
                                                        There are currently no Reviews available.
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
<!-- ADD BLOG MODAL -->
<!-- ================================================= -->

<div class="modal fade blog-modal"
     id="addBlogModal">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">


            <!-- Header -->

            <div class="blog-modal-header">

                <div class="blog-header-icon">

                    <i class="fas fa-blog"></i>

                </div>

                <div>

                    <h4>
                        Add Review
                    </h4>

                    <p>
                        Enter Reviews 
                    </p>

                </div>


                <button type="button"
                        class="blog-modal-close"
                        data-dismiss="modal">

                    <i class="fas fa-times"></i>

                </button>

            </div>


            <form method="POST"
                  action="{{ route('blogs.store') }}">

                @csrf


                <div class="modal-body blog-form-body">


                    <!-- Blog Information -->

                    <div class="blog-section">

                        <div class="blog-section-heading">

                            <div class="blog-section-icon">

                                <i class="fas fa-pen"></i>

                            </div>

                            <div>

                                <h5>
                                    Reviews 
                                </h5>

                                <!-- <p>
                                    Enter basic blog details
                                </p> -->

                            </div>

                        </div>


                        <div class="row">


                            <!-- Blog Name -->

                            <div class="col-md-6">

                                <div class="blog-field">

                                    <label>
                                        Customer Name <span>*</span>
                                    </label>

                                    <div class="blog-input">

                                        <i class="fas fa-heading"></i>

                                        <input type="text"
                                               name="blogname"
                                               class="form-control"
                                               placeholder="Enter blog name"
                                               value="{{ old('blogname') }}"
                                               required>

                                    </div>

                                </div>

                            </div>


                            <!-- Image -->

                            <div class="col-md-6">

                                <div class="blog-field">

                                    <label>
                                        Image Name <span>*</span>
                                    </label>

                                    <div class="blog-input">

                                        <i class="fas fa-image"></i>

                                        <input type="text"
                                               name="image"
                                               class="form-control"
                                               placeholder="Example: banner.jpg"
                                               value="{{ old('image') }}"
                                               required>

                                    </div>


                                    <div class="blog-image-info">

                                        <i class="fas fa-info-circle"></i>

                                        Enter only the image filename from the Uploads module.

                                    </div>


                                    <a href="{{ route('uploads.index') }}"
                                       target="_blank"
                                       class="blog-upload-link">

                                        <i class="fas fa-images"></i>

                                        Open Uploads

                                    </a>

                                </div>

                            </div>


                            <!-- Description -->

                            <div class="col-md-12">

                                <div class="blog-field">

                                    <label>
                                        Reviews <span>*</span>
                                    </label>

                                    <textarea name="description"
                                              class="form-control blog-textarea"
                                              rows="5"
                                              placeholder="Enter blog description"
                                              required>{{ old('description') }}</textarea>

                                </div>

                            </div>


                        </div>

                    </div>


                </div>


                <!-- Footer -->

                <div class="blog-modal-footer">

                    <button type="button"
                            class="blog-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>

                        Cancel

                    </button>


                    <button type="submit"
                            class="blog-save-btn">

                        <i class="fas fa-save"></i>

                        Save Reviews

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>



<!-- ================================================= -->
<!-- EDIT BLOG MODAL -->
<!-- ================================================= -->

<div class="modal fade blog-modal"
     id="editBlogModal">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">


            <!-- Header -->

            <div class="blog-modal-header">

                <div class="blog-header-icon">

                    <i class="fas fa-edit"></i>

                </div>

                <div>

                    <h4>
                        Edit Review
                    </h4>

                    <!-- <p>
                        Update blog information
                    </p> -->

                </div>


                <button type="button"
                        class="blog-modal-close"
                        data-dismiss="modal">

                    <i class="fas fa-times"></i>

                </button>

            </div>


            <form method="POST"
                  id="editBlogForm">

                @csrf

                @method('PUT')


                <div class="modal-body blog-form-body">


                    <!-- Blog Information -->

                    <div class="blog-section">

                        <div class="blog-section-heading">

                            <div class="blog-section-icon">

                                <i class="fas fa-pen"></i>

                            </div>

                            <div>

                                <h5>
                                    Reviews 
                                </h5>

                                <p>
                                    Update Review details
                                </p>

                            </div>

                        </div>


                        <div class="row">


                            <!-- Blog Name -->

                            <div class="col-md-6">

                                <div class="blog-field">

                                    <label>
                                        Customer Name <span>*</span>
                                    </label>

                                    <div class="blog-input">

                                        <i class="fas fa-heading"></i>

                                        <input type="text"
                                               name="blogname"
                                               id="edit_blogname"
                                               class="form-control"
                                               placeholder="Enter blog name"
                                               required>

                                    </div>

                                </div>

                            </div>


                            <!-- Image -->

                            <div class="col-md-6">

                                <div class="blog-field">

                                    <label>
                                        Image Name <span>*</span>
                                    </label>

                                    <div class="blog-input">

                                        <i class="fas fa-image"></i>

                                        <input type="text"
                                               name="image"
                                               id="edit_image"
                                               class="form-control"
                                               placeholder="Example: banner.jpg"
                                               required>

                                    </div>


                                    <div class="blog-image-info">

                                        <i class="fas fa-info-circle"></i>

                                        Paste an image filename from the Uploads module.

                                    </div>


                                    <a href="{{ route('uploads.index') }}"
                                       target="_blank"
                                       class="blog-upload-link">

                                        <i class="fas fa-images"></i>

                                        Open Uploads

                                    </a>

                                </div>

                            </div>


                            <!-- Description -->

                            <div class="col-md-12">

                                <div class="blog-field">

                                    <label>
                                        Reviews <span>*</span>
                                    </label>

                                    <textarea name="description"
                                              id="edit_description"
                                              class="form-control blog-textarea"
                                              rows="5"
                                              placeholder="Enter Reviews "
                                              required></textarea>

                                </div>

                            </div>


                            <!-- Current Image -->

                            <div class="col-md-12">

                                <div class="blog-field">

                                    <label>
                                        Current Image
                                    </label>

                                    <div class="current-blog-image">

                                        <img id="edit_image_preview"
                                             src=""
                                             alt="Blog Image">

                                        <div class="current-blog-image-info">

                                            <strong>
                                                Current Customer Image
                                            </strong>

                                            <span id="edit_image_name">
                                                Image
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>


                </div>


                <!-- Footer -->

                <div class="blog-modal-footer">

                    <button type="button"
                            class="blog-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>

                        Cancel

                    </button>


                    <button type="submit"
                            class="blog-save-btn">

                        <i class="fas fa-save"></i>

                        Update Review

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>




<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>


<script>

/* =========================================
   EDIT BLOG MODAL
========================================= */

$('#editBlogModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);

    var id = button.data('id');

    var blogname = button.data('blogname');

    var description = button.data('description');

    var image = button.data('image');


    // Assign values

    $('#edit_blogname').val(blogname);

    $('#edit_description').val(description);

    $('#edit_image').val(image);

    $('#edit_image_name').text(image);


    // Image preview

    if (image) { 

        $('#edit_image_preview')
            .attr('src', "{{ asset('public/uploads') }}/" + image)
            .show();

    }


    // Update form action

    var action = "{{ route('blogs.update', ':id') }}";

    action = action.replace(':id', id);

    $('#editBlogForm').attr('action', action);

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