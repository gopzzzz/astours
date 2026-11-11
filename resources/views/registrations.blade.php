@extends('layouts.mainlayout')

@section('content')

<style>
    /* =========================================
   STAFF EDIT MODAL
========================================= */
/* =========================================
   STAFF TABLE
========================================= */

.staff-table-wrapper {
    width: 100%;
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(25, 35, 55, .04);
}


/* Table */

.staff-table {
    width: 100%;
    margin: 0;
    border: 0 !important;
}


/* Header */

.staff-table thead {
    background: #f7f8fb;
}

.staff-table thead th {
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


/* Body */

.staff-table tbody td {
    padding: 13px 16px;
    border: 0 !important;
    border-bottom: 1px solid #f0f2f5 !important;

    vertical-align: middle;
    color: #394150;
    font-size: 12px;
}

.staff-table tbody tr:last-child td {
    border-bottom: 0 !important;
}

.staff-table tbody tr {
    transition: background .2s ease;
}

.staff-table tbody tr:hover {
    background: #fafbff;
}


/* =========================================
   STAFF ID
========================================= */

.staff-id {
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
   STAFF NAME
========================================= */

.staff-name-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.staff-avatar {
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

.staff-name-cell strong {
    display: block;

    color: #2d3542;
    font-size: 12px;
    font-weight: 600;
}

.staff-name-cell small {
    display: block;

    margin-top: 2px;

    color: #9ba3b0;
    font-size: 9px;
}


/* =========================================
   DEPARTMENT
========================================= */

.staff-department {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 6px 9px;

    border-radius: 7px;

    background: #f5f7fa;
    color: #596372;

    font-size: 10px;
    font-weight: 600;
}

.staff-department i {
    color: #7c8796;
    font-size: 9px;
}


/* =========================================
   EMAIL
========================================= */

.staff-email {
    display: flex;
    align-items: center;
    gap: 7px;

    color: #626c7b;
}

.staff-email i {
    color: #9aa3b0;
    font-size: 10px;
}

.staff-email span {
    white-space: nowrap;
}


/* =========================================
   DOCUMENT BUTTON
========================================= */

.staff-document-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    height: 31px;

    padding: 0 10px;

    border: 1px solid #dbe4ff;
    border-radius: 7px;

    background: #f1f5ff;
    color: #3867e8;

    font-size: 10px;
    font-weight: 600;

    text-decoration: none !important;

    transition: .2s ease;
}

.staff-document-btn:hover {
    background: #3867e8;
    border-color: #3867e8;
    color: #fff;
}


/* =========================================
   EDIT BUTTON
========================================= */

.staff-edit-btn {
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

.staff-edit-btn i {
    margin-right: 4px;
    font-size: 9px;
}

.staff-edit-btn:hover {
    background: #3867e8;
    border-color: #3867e8;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   EMPTY STATE
========================================= */

.staff-empty {
    padding: 45px 20px;
    text-align: center;
}

.staff-empty-icon {
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

.staff-empty h5 {
    margin: 0;

    color: #3c4452;
    font-size: 14px;
    font-weight: 600;
}

.staff-empty p {
    margin: 5px 0 0;

    color: #9ba3b0;
    font-size: 11px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 768px) {

    .staff-table-wrapper {
        overflow-x: auto;
    }

    .staff-table {
        min-width: 850px;
    }

    .staff-table thead th,
    .staff-table tbody td {
        padding: 11px 12px;
    }
}

.staff-edit-modal .modal-dialog {
    max-width: 900px;
}

.staff-edit-modal .modal-content {
    border: none;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 25px 70px rgba(20, 30, 50, .18);
}


/* =========================================
   HEADER
========================================= */

.staff-modal-header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 20px 24px;
    background: #fff;
    border-bottom: 1px solid #edf0f4;
}

.staff-header-icon {
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

.staff-modal-header h4 {
    margin: 0;
    color: #202735;
    font-size: 17px;
    font-weight: 700;
}

.staff-modal-header p {
    margin: 4px 0 0;
    color: #929aaa;
    font-size: 11px;
}

.staff-modal-close {
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

.staff-modal-close:hover {
    background: #eceef2;
    color: #303744;
}


/* =========================================
   BODY
========================================= */

.staff-form-body {
    background: #f7f8fc;
    padding: 22px;
    max-height: 70vh;
    overflow-y: auto;
}


/* =========================================
   SECTIONS
========================================= */

.staff-section {
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 17px;
    box-shadow: 0 2px 9px rgba(25, 35, 55, .035);
}

.staff-section:last-child {
    margin-bottom: 0;
}


/* Section Heading */

.staff-section-heading {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-bottom: 15px;
    margin-bottom: 20px;
    border-bottom: 1px solid #edf0f4;
}

.staff-section-icon {
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

.staff-section-heading h5 {
    margin: 0;
    font-size: 14px;
    color: #252d3a;
    font-weight: 700;
}

.staff-section-heading p {
    margin: 3px 0 0;
    font-size: 10px;
    color: #99a1ad;
}


/* =========================================
   FORM FIELDS
========================================= */

.staff-field {
    margin-bottom: 7px;
}

.staff-field label {
    display: block;
    margin-bottom: 7px;
    color: #3d4654;
    font-size: 12px;
    font-weight: 600;
}

.staff-field label span {
    color: #ef4444;
}


/* =========================================
   INPUTS
========================================= */

.staff-input {
    position: relative;
}

.staff-input > i {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ba4b2;
    font-size: 12px;
    z-index: 2;
    pointer-events: none;
}

.staff-input .form-control {
    height: 42px;
    border: 1px solid #dfe3e9;
    border-radius: 9px;
    padding-left: 36px;
    color: #303744;
    font-size: 12px;
    box-shadow: none;
    transition: .2s ease;
}

.staff-input .form-control:focus {
    border-color: #3867e8;
    box-shadow: 0 0 0 3px rgba(56, 103, 232, .09);
}

.staff-input select.form-control {
    cursor: pointer;
}


/* =========================================
   ADDRESS
========================================= */

.staff-textarea {
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

.staff-textarea:focus {
    border-color: #3867e8;
    box-shadow: 0 0 0 3px rgba(56, 103, 232, .09);
    outline: none;
}


/* =========================================
   CURRENT DOCUMENT
========================================= */

.current-document-box {
    min-height: 92px;
    border: 1px solid #e1e5eb;
    border-radius: 10px;
    background: #fafbfc;
    padding: 12px;
    display: flex;
    align-items: center;
    gap: 11px;
}

.document-icon {
    width: 40px;
    height: 40px;
    border-radius: 9px;
    background: #fff0f0;
    color: #e74c3c;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.document-info {
    display: flex;
    flex-direction: column;
    gap: 3px;
    min-width: 0;
    flex: 1;
}

.document-info strong {
    font-size: 11px;
    color: #394150;
}

.document-info span {
    font-size: 10px;
    color: #9aa3b0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}


/* View Button */

.view-document-btn {
    padding: 7px 11px;
    border-radius: 7px;
    background: #eef4ff;
    color: #3867e8;
    font-size: 10px;
    font-weight: 600;
    text-decoration: none !important;
    white-space: nowrap;
}

.view-document-btn:hover {
    background: #3867e8;
    color: #fff;
}


/* =========================================
   UPLOAD BOX
========================================= */

.upload-document-box {
    min-height: 92px;
    border: 1.5px dashed #cbd3df;
    border-radius: 10px;
    background: #fafbff;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: .2s ease;
    overflow: hidden;
}

.upload-document-box:hover {
    border-color: #3867e8;
    background: #f5f8ff;
}

.upload-document-box > i {
    color: #3867e8;
    font-size: 18px;
    margin-bottom: 5px;
}

.upload-document-box strong {
    color: #414957;
    font-size: 11px;
}

.upload-document-box span {
    color: #9ba3b0;
    font-size: 9px;
    margin-top: 3px;
}

.upload-document-box input {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}


/* =========================================
   FOOTER
========================================= */

.staff-modal-footer {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 9px;
    padding: 14px 22px;
    background: #fff;
    border-top: 1px solid #e8ebf0;
}


/* Cancel */

.staff-cancel-btn {
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

.staff-cancel-btn:hover {
    background: #f6f7f9;
    color: #333b48;
}


/* Update */

.staff-update-btn {
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

.staff-update-btn:hover {
    background: #2f59d1;
    color: #fff;
    transform: translateY(-1px);
}


/* =========================================
   SCROLLBAR
========================================= */

.staff-form-body::-webkit-scrollbar {
    width: 5px;
}

.staff-form-body::-webkit-scrollbar-track {
    background: transparent;
}

.staff-form-body::-webkit-scrollbar-thumb {
    background: #d1d6de;
    border-radius: 20px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 767px) {

    .staff-edit-modal .modal-dialog {
        margin: 10px;
    }

    .staff-modal-header {
        padding: 16px;
    }

    .staff-form-body {
        padding: 13px;
    }

    .staff-section {
        padding: 15px;
    }

    .staff-field {
        margin-bottom: 15px;
    }

    .staff-modal-footer {
        padding: 12px 14px;
    }
}
/* =========================================
   STAFF UPLOAD
========================================= */

.staff-upload-box {
    height: 88px;
    border: 1.5px dashed #cbd3df;
    border-radius: 10px;
    background: #fafbff;
    position: relative;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    overflow: hidden;
    transition: all .2s ease;
}

.staff-upload-box:hover {
    border-color: #3867e8;
    background: #f5f8ff;
}

.staff-upload-box > i {
    color: #3867e8;
    font-size: 18px;
    margin-bottom: 5px;
}

.staff-upload-box strong {
    color: #414957;
    font-size: 11px;
    font-weight: 600;
}

.staff-upload-box span {
    color: #9ba3b0;
    font-size: 9px;
    margin-top: 3px;
}

.staff-upload-box input {
    position: absolute;
    inset: 0;

    width: 100%;
    height: 100%;

    opacity: 0;
    cursor: pointer;
}


/* =========================================
   ADD MODAL HEADER
========================================= */

.staff-add-modal .modal-dialog {
    max-width: 900px;
}

.staff-add-modal .modal-content {
    border: 0;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 25px 70px rgba(20, 30, 50, .18);
}


/* =========================================
   INPUT PLACEHOLDER
========================================= */

.staff-input .form-control::placeholder,
.staff-textarea::placeholder {
    color: #adb4bf;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 767px) {

    .staff-upload-box {
        margin-bottom: 10px;
    }

    .staff-section {
        padding: 15px;
    }

    .staff-form-body {
        padding: 13px;
    }
}
</style>

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Staff Registrations</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Staff Registrations
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
                        Staff Registration List
                    </h3>


                    <!-- ADD BUTTON -->
                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addStaffModal">

                        <i class="fas fa-plus"></i>
                        Add Staff

                    </button>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                      <div class="staff-table-wrapper">

    <table class="table staff-table">

        <thead>
            <tr>
                <th width="70">#</th>
                <th>Staff Name</th>
                <th>Department</th>
                <th>Email</th>
                <th width="130">Aadhaar</th>
                <th width="130" class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($staffregistrations as $staff)

                @php
                    $department = $departments
                        ->where('id', $staff->department_id)
                        ->first();
                @endphp

                <tr>

                    <!-- ID -->
                    <td>
                        <span class="staff-id">
                            {{ $staff->id }}
                        </span>
                    </td>


                    <!-- Staff Name -->
                    <td>

                        <div class="staff-name-cell">

                            <div class="staff-avatar">
                                <i class="fas fa-user"></i>
                            </div>

                            <div>
                                <strong>
                                    {{ $staff->staff_name }}
                                </strong>

                                <small>
                                    Staff Member
                                </small>
                            </div>

                        </div>

                    </td>


                    <!-- Department -->
                    <td>

                        <span class="staff-department">

                            <i class="fas fa-building"></i>

                            {{ $department
                                ? $department->departmentname
                                : $staff->department_id }}

                        </span>

                    </td>


                    <!-- Email -->
                    <td>

                        <div class="staff-email">

                            <i class="fas fa-envelope"></i>

                            <span>
                                {{ $staff->email }}
                            </span>

                        </div>

                    </td>


                    <!-- Aadhaar -->
                    <td>

                        <a href="{{ asset('uploads/adharcard/' . $staff->adharcard) }}"
                           target="_blank"
                           class="staff-document-btn">

                            <i class="fas fa-file-alt"></i>
                            View

                        </a>

                    </td>


                    <!-- Action -->
                    <td class="text-center">

                        <button type="button"
                                class="staff-edit-btn"
                                data-toggle="modal"
                                data-target="#editStaffModal"
                                data-id="{{ $staff->id }}"
                                data-staffname="{{ $staff->staff_name }}"
                                data-departmentid="{{ $staff->department_id }}"
                                data-email="{{ $staff->email }}"
                                data-dob="{{ $staff->dob }}"
                                data-address="{{ $staff->address }}"
                                data-marriagestatus="{{ $staff->marriage_status }}"
                                data-adharcard="{{ $staff->adharcard }}">

                            <i class="fas fa-edit"></i>
                            Edit

                        </button>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6">

                        <div class="staff-empty">

                            <div class="staff-empty-icon">
                                <i class="fas fa-users"></i>
                            </div>

                            <h5>No Staff Registrations Found</h5>

                            <p>
                                There are currently no staff members available.
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
<!-- ADD STAFF MODAL -->
<!-- ================================================= -->
<div class="modal fade staff-edit-modal" id="editStaffModal">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <!-- Header -->
            <div class="staff-modal-header">

                <div class="staff-header-icon">
                    <i class="fas fa-user-edit"></i>
                </div>

                <div>
                    <h4>Edit Staff Registration</h4>
                    <p>Update staff information and documents</p>
                </div>

                <button type="button"
                        class="staff-modal-close"
                        data-dismiss="modal">
                    <i class="fas fa-times"></i>
                </button>

            </div>


            <form method="POST"
                  enctype="multipart/form-data"
                  id="editStaffForm">

                @csrf
                @method('PUT')

                <div class="modal-body staff-form-body">

                    <!-- Personal Information -->
                    <div class="staff-section">

                        <div class="staff-section-heading">

                            <div class="staff-section-icon">
                                <i class="fas fa-user"></i>
                            </div>

                            <div>
                                <h5>Personal Information</h5>
                                <p>Basic staff details</p>
                            </div>

                        </div>


                        <div class="row">

                            <!-- Staff Name -->
                            <div class="col-md-4">
                                <div class="staff-field">

                                    <label>
                                        Staff Name <span>*</span>
                                    </label>

                                    <div class="staff-input">
                                        <i class="fas fa-user"></i>

                                        <input type="text"
                                               name="staff_name"
                                               id="edit_staff_name"
                                               class="form-control"
                                               placeholder="Enter staff name"
                                               required>
                                    </div>

                                </div>
                            </div>


                            <!-- Department -->
                            <div class="col-md-4">
                                <div class="staff-field">

                                    <label>
                                        Department <span>*</span>
                                    </label>

                                    <div class="staff-input">
                                        <i class="fas fa-building"></i>

                                        <select name="department_id"
                                                id="edit_department_id"
                                                class="form-control"
                                                required>

                                            <option value="">
                                                Select Department
                                            </option>

                                            @foreach($departments as $department)

                                                <option value="{{ $department->id }}">
                                                    {{ $department->departmentname }}
                                                </option>

                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                            </div>


                            <!-- Email -->
                            <div class="col-md-4">
                                <div class="staff-field">

                                    <label>
                                        Email <span>*</span>
                                    </label>

                                    <div class="staff-input">
                                        <i class="fas fa-envelope"></i>

                                        <input type="email"
                                               name="email"
                                               id="edit_email"
                                               class="form-control"
                                               placeholder="Enter email"
                                               required>
                                    </div>

                                </div>
                            </div>


                            <!-- DOB -->
                            <div class="col-md-4">
                                <div class="staff-field">

                                    <label>
                                        Date of Birth <span>*</span>
                                    </label>

                                    <div class="staff-input">
                                        <i class="fas fa-calendar-alt"></i>

                                        <input type="date"
                                               name="dob"
                                               id="edit_dob"
                                               class="form-control"
                                               required>
                                    </div>

                                </div>
                            </div>


                            <!-- Marriage Status -->
                            <div class="col-md-4">
                                <div class="staff-field">

                                    <label>
                                        Marriage Status <span>*</span>
                                    </label>

                                    <div class="staff-input">
                                        <i class="fas fa-heart"></i>

                                        <select name="marriage_status"
                                                id="edit_marriage_status"
                                                class="form-control"
                                                required>

                                            <option value="">
                                                Select Status
                                            </option>

                                            <option value="Single">
                                                Single
                                            </option>

                                            <option value="Married">
                                                Married
                                            </option>

                                            <option value="Divorced">
                                                Divorced
                                            </option>

                                            <option value="Widowed">
                                                Widowed
                                            </option>

                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>


                    <!-- Address -->
                    <div class="staff-section">

                        <div class="staff-section-heading">

                            <div class="staff-section-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>

                            <div>
                                <h5>Contact Information</h5>
                                <p>Staff address details</p>
                            </div>

                        </div>


                        <div class="staff-field">

                            <label>
                                Address <span>*</span>
                            </label>

                            <textarea name="address"
                                      id="edit_address"
                                      class="form-control staff-textarea"
                                      rows="3"
                                      placeholder="Enter complete address"
                                      required></textarea>

                        </div>

                    </div>


                    <!-- Documents -->
                    <div class="staff-section">

                        <div class="staff-section-heading">

                            <div class="staff-section-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>

                            <div>
                                <h5>Staff Documents</h5>
                                <p>Manage Aadhaar card document</p>
                            </div>

                        </div>


                        <div class="row">

                            <!-- Current Aadhaar -->
                            <div class="col-md-6">

                                <div class="staff-field">

                                    <label>Current Aadhaar Card</label>

                                    <div class="current-document-box">

                                        <div class="document-icon">
                                            <i class="fas fa-file-alt"></i>
                                        </div>

                                        <div class="document-info">

                                            <strong>Current Document</strong>

                                            <span id="edit_adharcard_name">
                                                Aadhaar Card
                                            </span>

                                        </div>

                                        <a href="#"
                                           target="_blank"
                                           id="edit_adharcard_link"
                                           class="view-document-btn">

                                            <i class="fas fa-eye"></i>
                                            View

                                        </a>

                                    </div>

                                </div>

                            </div>


                            <!-- Replace Aadhaar -->
                            <div class="col-md-6">

                                <div class="staff-field">

                                    <label>Replace Aadhaar Card</label>

                                    <div class="upload-document-box">

                                        <i class="fas fa-cloud-upload-alt"></i>

                                        <strong>
                                            Upload New Document
                                        </strong>

                                        <span>
                                            JPG, PNG or PDF · Max 10MB
                                        </span>

                                        <input type="file"
                                               name="adharcard"
                                               accept=".jpg,.jpeg,.png,.pdf">

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- Footer -->
                <div class="staff-modal-footer">

                    <button type="button"
                            class="staff-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>
                        Cancel

                    </button>

                    <button type="submit"
                            class="staff-update-btn">

                        <i class="fas fa-save"></i>
                        Update Staff

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<div class="modal fade"
     id="addStaffModal">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">


            <div class="modal-header">

                <h4 class="modal-title">
                    Add Staff Registration
                </h4>

                <button type="button"
                        class="close"
                        data-dismiss="modal">

                    <span>&times;</span>

                </button>

            </div>


       <form method="POST"
      enctype="multipart/form-data"
      action="{{ route('staff_registrations.store') }}">

    @csrf

    <div class="modal-body staff-form-body">

        <!-- Personal Information -->
        <div class="staff-section">

            <div class="staff-section-heading">

                <div class="staff-section-icon">
                    <i class="fas fa-user"></i>
                </div>

                <div>
                    <h5>Personal Information</h5>
                    <p>Enter basic staff registration details</p>
                </div>

            </div>


            <div class="row">

                <!-- Staff Name -->
                <div class="col-md-4">
                    <div class="staff-field">

                        <label>
                            Staff Name <span>*</span>
                        </label>

                        <div class="staff-input">

                            <i class="fas fa-user"></i>

                            <input type="text"
                                   name="staff_name"
                                   class="form-control"
                                   placeholder="Enter staff name"
                                   required>

                        </div>

                    </div>
                </div>


                <!-- Department -->
                <div class="col-md-4">
                    <div class="staff-field">

                        <label>
                            Department <span>*</span>
                        </label>

                        <div class="staff-input">

                            <i class="fas fa-building"></i>

                            <select name="department_id"
                                    class="form-control"
                                    required>

                                <option value="">
                                    Select Department
                                </option>

                                @foreach($departments as $department)

                                    <option value="{{ $department->id }}">
                                        {{ $department->departmentname }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>
                </div>


                <!-- Email -->
                <div class="col-md-4">
                    <div class="staff-field">

                        <label>
                            Email <span>*</span>
                        </label>

                        <div class="staff-input">

                            <i class="fas fa-envelope"></i>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter email address"
                                   required>

                        </div>

                    </div>
                </div>


                <!-- DOB -->
                <div class="col-md-4">
                    <div class="staff-field">

                        <label>
                            Date of Birth <span>*</span>
                        </label>

                        <div class="staff-input">

                            <i class="fas fa-calendar-alt"></i>

                            <input type="date"
                                   name="dob"
                                   class="form-control"
                                   required>

                        </div>

                    </div>
                </div>


                <!-- Marriage Status -->
                <div class="col-md-4">
                    <div class="staff-field">

                        <label>
                            Marriage Status <span>*</span>
                        </label>

                        <div class="staff-input">

                            <i class="fas fa-heart"></i>

                            <select name="marriage_status"
                                    class="form-control"
                                    required>

                                <option value="">
                                    Select Marriage Status
                                </option>

                                <option value="Single">
                                    Single
                                </option>

                                <option value="Married">
                                    Married
                                </option>

                                <option value="Divorced">
                                    Divorced
                                </option>

                                <option value="Widowed">
                                    Widowed
                                </option>

                            </select>

                        </div>

                    </div>
                </div>


                <!-- Aadhaar -->
                <div class="col-md-4">
                    <div class="staff-field">

                        <label>
                            Aadhaar Card <span>*</span>
                        </label>

                        <div class="staff-upload-box">

                            <i class="fas fa-cloud-upload-alt"></i>

                            <strong>
                                Upload Aadhaar
                            </strong>

                            <span>
                                JPG, PNG or PDF · Max 10MB
                            </span>

                            <input type="file"
                                   name="adharcard"
                                   accept=".jpg,.jpeg,.png,.pdf"
                                   required>

                        </div>

                    </div>
                </div>

            </div>

        </div>


        <!-- Address -->
        <div class="staff-section">

            <div class="staff-section-heading">

                <div class="staff-section-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>

                <div>
                    <h5>Contact Information</h5>
                    <p>Enter the staff member's address</p>
                </div>

            </div>


            <div class="staff-field">

                <label>
                    Address <span>*</span>
                </label>

                <textarea name="address"
                          class="form-control staff-textarea"
                          rows="4"
                          placeholder="Enter complete address"
                          required></textarea>

            </div>

        </div>

    </div>


    <!-- Footer -->
    <div class="staff-modal-footer">

        <button type="button"
                class="staff-cancel-btn"
                data-dismiss="modal">

            <i class="fas fa-times"></i>
            Cancel

        </button>


        <button type="submit"
                class="staff-update-btn">

            <i class="fas fa-save"></i>
            Save Staff

        </button>

    </div>

</form>

    </div>

</div>
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<script>
    
    $('#editStaffModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);

    var id = button.data('id');
    var staffname = button.data('staffname');
    var departmentid = button.data('departmentid');
    var email = button.data('email');
    var dob = button.data('dob');
    var address = button.data('address');
    var marriagestatus = button.data('marriagestatus');
    var adharcard = button.data('adharcard');


    // Assign values
    $('#edit_staff_name').val(staffname);

    $('#edit_department_id').val(departmentid);

    $('#edit_email').val(email);

    $('#edit_dob').val(dob);

    $('#edit_address').val(address);

    $('#edit_marriage_status').val(marriagestatus);


    // Aadhaar current file
    if (adharcard) {

        $('#edit_adharcard_link')
            .attr('href', "{{ asset('uploads/adharcard') }}/" + adharcard)
            .show();

    } else {

        $('#edit_adharcard_link').hide();

    }


    // Update form action
    var action = "{{ route('staff_registrations.update', ':id') }}";

    action = action.replace(':id', id);

    $('#editStaffForm').attr('action', action);

});
</script>

@endsection