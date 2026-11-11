@extends('layouts.mainlayout')

@section('content')

<style>

/* =========================================
   ENQUIRY TABLE
========================================= */

.enquiry-table-wrapper {
    width: 100%;
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(25, 35, 55, .04);
}

.enquiry-table {
    width: 100%;
    margin: 0;
    border: 0 !important;
}

.enquiry-table thead {
    background: #f7f8fb;
}

.enquiry-table thead th {
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

.enquiry-table tbody td {
    padding: 13px 16px;
    border: 0 !important;
    border-bottom: 1px solid #f0f2f5 !important;

    vertical-align: middle;
    color: #394150;
    font-size: 12px;
}

.enquiry-table tbody tr:last-child td {
    border-bottom: 0 !important;
}

.enquiry-table tbody tr {
    transition: background .2s ease;
}

.enquiry-table tbody tr:hover {
    background: #fafbff;
}


/* =========================================
   ID
========================================= */

.enquiry-id {
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
   NAME
========================================= */

.enquiry-name-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.enquiry-avatar {
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

.enquiry-name-cell strong {
    display: block;

    color: #2d3542;
    font-size: 12px;
    font-weight: 600;
}

.enquiry-name-cell small {
    display: block;

    margin-top: 2px;

    color: #9ba3b0;
    font-size: 9px;
}


/* =========================================
   PHONE
========================================= */

.enquiry-phone {
    color: #697281;
    font-size: 11px;
    font-weight: 500;
}


/* =========================================
   LOCATION
========================================= */

.enquiry-location {
    color: #697281;
    font-size: 11px;
}


/* =========================================
   MESSAGE
========================================= */

.enquiry-message {
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
   EDIT BUTTON
========================================= */

.enquiry-edit-btn {
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

.enquiry-edit-btn i {
    margin-right: 4px;
    font-size: 9px;
}

.enquiry-edit-btn:hover {
    background: #3867e8;
    border-color: #3867e8;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   DELETE BUTTON
========================================= */

.enquiry-delete-btn {
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

.enquiry-delete-btn i {
    margin-right: 4px;
    font-size: 9px;
}

.enquiry-delete-btn:hover {
    background: #e74c3c;
    border-color: #e74c3c;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   EMPTY STATE
========================================= */

.enquiry-empty {
    padding: 45px 20px;
    text-align: center;
}

.enquiry-empty-icon {
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

.enquiry-empty h5 {
    margin: 0;

    color: #3c4452;
    font-size: 14px;
    font-weight: 600;
}

.enquiry-empty p {
    margin: 5px 0 0;

    color: #9ba3b0;
    font-size: 11px;
}


/* =========================================
   MODAL
========================================= */

.enquiry-modal .modal-dialog {
    max-width: 800px;
}

.enquiry-modal .modal-content {
    border: none;
    border-radius: 18px;
    overflow: hidden;

    box-shadow: 0 25px 70px rgba(20, 30, 50, .18);
}


/* =========================================
   MODAL HEADER
========================================= */

.enquiry-modal-header {
    position: relative;

    display: flex;
    align-items: center;
    gap: 13px;

    padding: 20px 24px;

    background: #fff;
    border-bottom: 1px solid #edf0f4;
}

.enquiry-header-icon {
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

.enquiry-modal-header h4 {
    margin: 0;

    color: #202735;
    font-size: 17px;
    font-weight: 700;
}

.enquiry-modal-header p {
    margin: 4px 0 0;

    color: #929aaa;
    font-size: 11px;
}

.enquiry-modal-close {
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

.enquiry-modal-close:hover {
    background: #eceef2;
    color: #303744;
}


/* =========================================
   FORM BODY
========================================= */

.enquiry-form-body {
    background: #f7f8fc;
    padding: 22px;

    max-height: 70vh;
    overflow-y: auto;
}


/* =========================================
   SECTION
========================================= */

.enquiry-section {
    background: #fff;

    border: 1px solid #e7ebf1;
    border-radius: 15px;

    padding: 20px;
    margin-bottom: 17px;

    box-shadow: 0 2px 9px rgba(25, 35, 55, .035);
}

.enquiry-section:last-child {
    margin-bottom: 0;
}


/* =========================================
   SECTION HEADING
========================================= */

.enquiry-section-heading {
    display: flex;
    align-items: center;
    gap: 12px;

    padding-bottom: 15px;
    margin-bottom: 20px;

    border-bottom: 1px solid #edf0f4;
}

.enquiry-section-icon {
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

.enquiry-section-heading h5 {
    margin: 0;

    font-size: 14px;
    color: #252d3a;
    font-weight: 700;
}

.enquiry-section-heading p {
    margin: 3px 0 0;

    font-size: 10px;
    color: #99a1ad;
}


/* =========================================
   FORM FIELDS
========================================= */

.enquiry-field {
    margin-bottom: 7px;
}

.enquiry-field label {
    display: block;

    margin-bottom: 7px;

    color: #3d4654;
    font-size: 12px;
    font-weight: 600;
}

.enquiry-field label span {
    color: #ef4444;
}


/* =========================================
   INPUT
========================================= */

.enquiry-input {
    position: relative;
}

.enquiry-input > i {
    position: absolute;

    left: 13px;
    top: 50%;

    transform: translateY(-50%);

    color: #9ba4b2;
    font-size: 12px;

    z-index: 2;

    pointer-events: none;
}

.enquiry-input .form-control {
    height: 42px;

    border: 1px solid #dfe3e9;
    border-radius: 9px;

    padding-left: 36px;

    color: #303744;
    font-size: 12px;

    box-shadow: none;

    transition: .2s ease;
}

.enquiry-input .form-control:focus {
    border-color: #3867e8;

    box-shadow: 0 0 0 3px rgba(56, 103, 232, .09);
}


/* =========================================
   TEXTAREA
========================================= */

.enquiry-textarea {
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

.enquiry-textarea:focus {
    border-color: #3867e8;

    box-shadow: 0 0 0 3px rgba(56, 103, 232, .09);

    outline: none;
}


/* =========================================
   FOOTER
========================================= */

.enquiry-modal-footer {
    display: flex;

    justify-content: flex-end;
    align-items: center;

    gap: 9px;

    padding: 14px 22px;

    background: #fff;

    border-top: 1px solid #e8ebf0;
}

.enquiry-cancel-btn {
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

.enquiry-cancel-btn:hover {
    background: #f6f7f9;
    color: #333b48;
}

.enquiry-save-btn {
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

.enquiry-save-btn:hover {
    background: #2f59d1;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   SCROLLBAR
========================================= */

.enquiry-form-body::-webkit-scrollbar {
    width: 5px;
}

.enquiry-form-body::-webkit-scrollbar-track {
    background: transparent;
}

.enquiry-form-body::-webkit-scrollbar-thumb {
    background: #d1d6de;
    border-radius: 20px;
}

</style>


<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Enquiries</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Enquiries
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


            <!-- ENQUIRY CARD -->

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Enquiry List
                    </h3>


                    <!-- ADD BUTTON -->

                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addEnquiryModal">

                        <i class="fas fa-plus"></i>

                        Add Enquiry

                    </button>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <div class="enquiry-table-wrapper">

                            <table class="table enquiry-table">

                                <thead>

                                    <tr>

                                        <th width="70">
                                            #
                                        </th>

                                        <th>
                                            Name
                                        </th>

                                        <th>
                                            Phone Number
                                        </th>

                                        <th>
                                            Location
                                        </th>

                                        <th>
                                            Message
                                        </th>

                                        <th width="190"
                                            class="text-center">
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @forelse($enquiries as $enquiry)

                                        <tr>


                                            <!-- ID -->

                                            <td>

                                                <span class="enquiry-id">
                                                    #{{ $loop->iteration }}
                                                </span>

                                            </td>


                                            <!-- NAME -->

                                            <td>

                                                <div class="enquiry-name-cell">

                                                    <div class="enquiry-avatar">

                                                        <i class="fas fa-user"></i>

                                                    </div>

                                                    <div>

                                                        <strong>
                                                            {{ $enquiry->name }}
                                                        </strong>

                                                        <small>
                                                            Enquiry
                                                        </small>

                                                    </div>

                                                </div>

                                            </td>


                                            <!-- PHONE -->

                                            <td>

                                                <span class="enquiry-phone">

                                                    <i class="fas fa-phone-alt mr-1"></i>

                                                    {{ $enquiry->phonenumber }}

                                                </span>

                                            </td>


                                            <!-- LOCATION -->

                                            <td>

                                                <span class="enquiry-location">

                                                    <i class="fas fa-map-marker-alt mr-1"></i>

                                                    {{ $enquiry->location }}

                                                </span>

                                            </td>


                                            <!-- MESSAGE -->

                                            <td>

                                                <div class="enquiry-message">

                                                    {{ $enquiry->message }}

                                                </div>

                                            </td>


                                            <!-- ACTION -->

                                            <td class="text-center">


                                                <!-- EDIT -->

                                                <button type="button"
                                                        class="enquiry-edit-btn"
                                                        data-toggle="modal"
                                                        data-target="#editEnquiryModal"

                                                        data-id="{{ $enquiry->id }}"
                                                        data-name="{{ $enquiry->name }}"
                                                        data-phonenumber="{{ $enquiry->phonenumber }}"
                                                        data-location="{{ $enquiry->location }}"
                                                        data-message="{{ $enquiry->message }}">

                                                    <i class="fas fa-edit"></i>

                                                    Edit

                                                </button>


                                                <!-- DELETE -->

                                                <form action="{{ route('enquiries.destroy', $enquiry->id) }}"
                                                      method="POST"
                                                      style="display:inline-block;">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="enquiry-delete-btn"
                                                            onclick="return confirm('Are you sure you want to delete this enquiry?');">

                                                        <i class="fas fa-trash"></i>

                                                        Delete

                                                    </button>

                                                </form>


                                            </td>

                                        </tr>


                                    @empty


                                        <tr>

                                            <td colspan="6">

                                                <div class="enquiry-empty">

                                                    <div class="enquiry-empty-icon">

                                                        <i class="fas fa-envelope"></i>

                                                    </div>

                                                    <h5>
                                                        No Enquiries Found
                                                    </h5>

                                                    <p>
                                                        There are currently no enquiries available.
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
<!-- ADD ENQUIRY MODAL -->
<!-- ================================================= -->

<div class="modal fade enquiry-modal"
     id="addEnquiryModal">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">


            <!-- HEADER -->

            <div class="enquiry-modal-header">

                <div class="enquiry-header-icon">

                    <i class="fas fa-envelope"></i>

                </div>


                <div>

                    <h4>
                        Add Enquiry
                    </h4>

                    <p>
                        Enter enquiry information
                    </p>

                </div>


                <button type="button"
                        class="enquiry-modal-close"
                        data-dismiss="modal">

                    <i class="fas fa-times"></i>

                </button>

            </div>


            <!-- FORM -->

            <form method="POST"
                  action="{{ route('enquiries.store') }}">

                @csrf


                <div class="modal-body enquiry-form-body">


                    <div class="enquiry-section">


                        <!-- SECTION HEADER -->

                        <div class="enquiry-section-heading">

                            <div class="enquiry-section-icon">

                                <i class="fas fa-pen"></i>

                            </div>


                            <div>

                                <h5>
                                    Enquiry Information
                                </h5>

                                <p>
                                    Enter basic enquiry details
                                </p>

                            </div>

                        </div>


                        <div class="row">


                            <!-- NAME -->

                            <div class="col-md-6">

                                <div class="enquiry-field">

                                    <label>
                                        Name <span>*</span>
                                    </label>

                                    <div class="enquiry-input">

                                        <i class="fas fa-user"></i>

                                        <input type="text"
                                               name="name"
                                               class="form-control"
                                               placeholder="Enter name"
                                               value="{{ old('name') }}"
                                               required>

                                    </div>

                                </div>

                            </div>


                            <!-- PHONE -->

                            <div class="col-md-6">

                                <div class="enquiry-field">

                                    <label>
                                        Phone Number <span>*</span>
                                    </label>

                                    <div class="enquiry-input">

                                        <i class="fas fa-phone"></i>

                                        <input type="text"
                                               name="phonenumber"
                                               class="form-control"
                                               placeholder="Enter phone number"
                                               value="{{ old('phonenumber') }}"
                                               required>

                                    </div>

                                </div>

                            </div>


                            <!-- LOCATION -->

                            <div class="col-md-12">

                                <div class="enquiry-field">

                                    <label>
                                        Location <span>*</span>
                                    </label>

                                    <div class="enquiry-input">

                                        <i class="fas fa-map-marker-alt"></i>

                                        <input type="text"
                                               name="location"
                                               class="form-control"
                                               placeholder="Enter location"
                                               value="{{ old('location') }}"
                                               required>

                                    </div>

                                </div>

                            </div>


                            <!-- MESSAGE -->

                            <div class="col-md-12">

                                <div class="enquiry-field">

                                    <label>
                                        Message <span>*</span>
                                    </label>

                                    <textarea name="message"
                                              class="form-control enquiry-textarea"
                                              rows="5"
                                              placeholder="Enter enquiry message"
                                              required>{{ old('message') }}</textarea>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>


                <!-- FOOTER -->

                <div class="enquiry-modal-footer">

                    <button type="button"
                            class="enquiry-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>

                        Cancel

                    </button>


                    <button type="submit"
                            class="enquiry-save-btn">

                        <i class="fas fa-save"></i>

                        Save Enquiry

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>



<!-- ================================================= -->
<!-- EDIT ENQUIRY MODAL -->
<!-- ================================================= -->

<div class="modal fade enquiry-modal"
     id="editEnquiryModal">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">


            <!-- HEADER -->

            <div class="enquiry-modal-header">

                <div class="enquiry-header-icon">

                    <i class="fas fa-edit"></i>

                </div>


                <div>

                    <h4>
                        Edit Enquiry
                    </h4>

                    <p>
                        Update enquiry information
                    </p>

                </div>


                <button type="button"
                        class="enquiry-modal-close"
                        data-dismiss="modal">

                    <i class="fas fa-times"></i>

                </button>

            </div>


            <!-- FORM -->

            <form method="POST"
                  id="editEnquiryForm">

                @csrf

                @method('PUT')


                <div class="modal-body enquiry-form-body">


                    <div class="enquiry-section">


                        <!-- SECTION HEADER -->

                        <div class="enquiry-section-heading">

                            <div class="enquiry-section-icon">

                                <i class="fas fa-pen"></i>

                            </div>


                            <div>

                                <h5>
                                    Enquiry Information
                                </h5>

                                <p>
                                    Update enquiry details
                                </p>

                            </div>

                        </div>


                        <div class="row">


                            <!-- NAME -->

                            <div class="col-md-6">

                                <div class="enquiry-field">

                                    <label>
                                        Name <span>*</span>
                                    </label>

                                    <div class="enquiry-input">

                                        <i class="fas fa-user"></i>

                                        <input type="text"
                                               name="name"
                                               id="edit_name"
                                               class="form-control"
                                               placeholder="Enter name"
                                               required>

                                    </div>

                                </div>

                            </div>


                            <!-- PHONE -->

                            <div class="col-md-6">

                                <div class="enquiry-field">

                                    <label>
                                        Phone Number <span>*</span>
                                    </label>

                                    <div class="enquiry-input">

                                        <i class="fas fa-phone"></i>

                                        <input type="text"
                                               name="phonenumber"
                                               id="edit_phonenumber"
                                               class="form-control"
                                               placeholder="Enter phone number"
                                               required>

                                    </div>

                                </div>

                            </div>


                            <!-- LOCATION -->

                            <div class="col-md-12">

                                <div class="enquiry-field">

                                    <label>
                                        Location <span>*</span>
                                    </label>

                                    <div class="enquiry-input">

                                        <i class="fas fa-map-marker-alt"></i>

                                        <input type="text"
                                               name="location"
                                               id="edit_location"
                                               class="form-control"
                                               placeholder="Enter location"
                                               required>

                                    </div>

                                </div>

                            </div>


                            <!-- MESSAGE -->

                            <div class="col-md-12">

                                <div class="enquiry-field">

                                    <label>
                                        Message <span>*</span>
                                    </label>

                                    <textarea name="message"
                                              id="edit_message"
                                              class="form-control enquiry-textarea"
                                              rows="5"
                                              placeholder="Enter enquiry message"
                                              required></textarea>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>


                <!-- FOOTER -->

                <div class="enquiry-modal-footer">

                    <button type="button"
                            class="enquiry-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>

                        Cancel

                    </button>


                    <button type="submit"
                            class="enquiry-save-btn">

                        <i class="fas fa-save"></i>

                        Update Enquiry

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>



<!-- ================================================= -->
<!-- JAVASCRIPT -->
<!-- ================================================= -->

<<<<<<< HEAD
<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
=======
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
>>>>>>> b5c3e0b96c017bb9aa170d490a335023050c2d38

<script>

$(document).ready(function () {


    /* =========================================
       EDIT ENQUIRY MODAL
    ========================================= */

    $('#editEnquiryModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget);


        var id = button.data('id');

        var name = button.data('name');

        var phonenumber = button.data('phonenumber');

        var location = button.data('location');

        var message = button.data('message');


        /* Fill form fields */

        $('#edit_name').val(name);

        $('#edit_phonenumber').val(phonenumber);

        $('#edit_location').val(location);

        $('#edit_message').val(message);


       

        var action = "{{ route('enquiries.update', ':id') }}";

        action = action.replace(':id', id);

        $('#editEnquiryForm').attr('action', action);

    });


});

</script>

@endsection