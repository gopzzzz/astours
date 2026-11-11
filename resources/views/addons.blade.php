@extends('layouts.mainlayout')

@section('content')

<style>
    /* =========================================
   DEPARTMENT EDIT MODAL
========================================= */

/* =========================================
   DEPARTMENT TABLE
========================================= */

.department-table-wrapper {
    width: 100%;
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 3px 12px rgba(25, 35, 55, .04);
}


/* Table */

.department-table {
    width: 100%;
    margin: 0;
    border: 0 !important;
}


/* Header */

.department-table thead {
    background: #f7f8fb;
}

.department-table thead th {
    padding: 14px 18px;
    border: 0 !important;
    border-bottom: 1px solid #e8ebf0 !important;

    color: #697281;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .3px;
}


/* Body */

.department-table tbody td {
    padding: 14px 18px;
    border: 0 !important;
    border-bottom: 1px solid #f0f2f5 !important;
    vertical-align: middle;

    color: #394150;
    font-size: 13px;
}

.department-table tbody tr:last-child td {
    border-bottom: 0 !important;
}


/* Hover */

.department-table tbody tr {
    transition: background .2s ease;
}

.department-table tbody tr:hover {
    background: #fafbff;
}


/* =========================================
   ID
========================================= */

.department-id {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 30px;
    height: 28px;

    padding: 0 8px;

    border-radius: 7px;

    background: #f1f4f8;
    color: #667080;

    font-size: 11px;
    font-weight: 600;
}


/* =========================================
   DEPARTMENT NAME
========================================= */

.department-name-cell {
    display: flex;
    align-items: center;
    gap: 11px;
}

.department-list-icon {
    width: 36px;
    height: 36px;

    border-radius: 9px;

    background: #eef4ff;
    color: #3867e8;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 13px;
}

.department-name-cell strong {
    display: block;
    color: #2d3542;
    font-size: 13px;
    font-weight: 600;
}

.department-name-cell small {
    display: block;
    margin-top: 2px;

    color: #9ba3b0;
    font-size: 10px;
}


/* =========================================
   EDIT BUTTON
========================================= */

.department-edit-btn {
    height: 34px;

    padding: 0 12px;

    border: 1px solid #dbe4ff;
    border-radius: 7px;

    background: #f1f5ff;
    color: #3867e8;

    font-size: 11px;
    font-weight: 600;

    transition: all .2s ease;
}

.department-edit-btn i {
    margin-right: 5px;
    font-size: 10px;
}

.department-edit-btn:hover {
    background: #3867e8;
    border-color: #3867e8;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   EMPTY STATE
========================================= */

.department-empty {
    padding: 45px 20px;
    text-align: center;
}

.department-empty-icon {
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

.department-empty h5 {
    margin: 0;

    color: #3c4452;
    font-size: 14px;
    font-weight: 600;
}

.department-empty p {
    margin: 5px 0 0;

    color: #9ba3b0;
    font-size: 11px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 576px) {

    .department-table-wrapper {
        border-radius: 10px;
        overflow-x: auto;
    }

    .department-table {
        min-width: 550px;
    }

    .department-table thead th,
    .department-table tbody td {
        padding: 11px 12px;
    }
}

.department-edit-modal .modal-dialog {
    max-width: 500px;
}

.department-edit-modal .modal-content {
    border: 0;
    border-radius: 17px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 25px 70px rgba(20, 30, 50, .18);
}


/* =========================================
   HEADER
========================================= */

.department-modal-header {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 20px 22px;
    border-bottom: 1px solid #edf0f4;
    background: #fff;
}

.department-header-icon {
    width: 44px;
    height: 44px;
    min-width: 44px;
    border-radius: 12px;
    background: #eef4ff;
    color: #3867e8;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 16px;
}

.department-modal-header h5 {
    margin: 0;
    color: #202735;
    font-size: 16px;
    font-weight: 700;
}

.department-modal-header p {
    margin: 4px 0 0;
    color: #929aaa;
    font-size: 11px;
}


/* Close */

.department-close-btn {
    width: 34px;
    height: 34px;
    margin-left: auto;

    border: 0;
    border-radius: 8px;

    background: #f5f6f8;
    color: #7d8694;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;
    transition: .2s ease;
}

.department-close-btn:hover {
    background: #eceef2;
    color: #303744;
}


/* =========================================
   BODY
========================================= */

.department-modal-body {
    padding: 24px;
    background: #f7f8fc;
}


/* =========================================
   FIELD
========================================= */

.department-field {
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 13px;
    padding: 18px;
    box-shadow: 0 2px 8px rgba(25, 35, 55, .035);
}

.department-field label {
    display: block;
    margin-bottom: 8px;

    color: #3d4654;
    font-size: 12px;
    font-weight: 600;
}

.department-field label span {
    color: #ef4444;
}


/* =========================================
   INPUT
========================================= */

.department-input {
    position: relative;
}

.department-input > i {
    position: absolute;
    left: 14px;
    top: 50%;

    transform: translateY(-50%);

    color: #9ba4b2;
    font-size: 13px;

    z-index: 2;
}

.department-input .form-control {
    height: 44px;

    padding-left: 39px;

    border: 1px solid #dfe3e9;
    border-radius: 9px;

    color: #303744;
    font-size: 13px;

    background: #fff;
    box-shadow: none;

    transition: .2s ease;
}

.department-input .form-control::placeholder {
    color: #adb4bf;
}

.department-input .form-control:hover {
    border-color: #cbd1da;
}

.department-input .form-control:focus {
    border-color: #3867e8;
    box-shadow: 0 0 0 3px rgba(56, 103, 232, .09);
    outline: none;
}


/* =========================================
   FOOTER
========================================= */

.department-modal-footer {
    display: flex;
    justify-content: flex-end;
    align-items: center;

    gap: 9px;

    padding: 14px 22px;

    background: #fff;
    border-top: 1px solid #e8ebf0;
}


/* Cancel */

.department-cancel-btn {
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

.department-cancel-btn:hover {
    background: #f6f7f9;
    color: #333b48;
}


/* Update */

.department-update-btn {
    height: 40px;

    padding: 0 18px;

    border: 0;
    border-radius: 8px;

    background: #3867e8;
    color: #fff;

    font-size: 12px;
    font-weight: 600;

    box-shadow: 0 4px 12px rgba(56, 103, 232, .20);

    transition: .2s ease;
}

.department-update-btn:hover {
    background: #2f59d1;
    color: #fff;

    transform: translateY(-1px);
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 576px) {

    .department-edit-modal .modal-dialog {
        margin: 10px;
    }

    .department-modal-header {
        padding: 16px;
    }

    .department-modal-body {
        padding: 14px;
    }

    .department-field {
        padding: 15px;
    }

    .department-modal-footer {
        padding: 12px 14px;
    }

    .department-update-btn {
        padding: 0 14px;
    }
}
.department-save-btn {
    height: 40px;
    padding: 0 19px;

    border: 0;
    border-radius: 8px;

    background: #3867e8;
    color: #fff;

    font-size: 12px;
    font-weight: 600;

    box-shadow: 0 4px 12px rgba(56, 103, 232, .20);

    transition: all .2s ease;
}

.department-save-btn:hover {
    background: #2f59d1;
    color: #fff;
    transform: translateY(-1px);
}

.department-save-btn i {
    margin-right: 5px;
}

.department-help {
    display: block;
    margin-top: 7px;
    color: #9ba3b0;
    font-size: 10px;
}
</style>

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Addon Features</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Addon Features
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
                        Addon List
                    </h3>


                    <!-- ADD BUTTON -->
                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addDepartmentModal">

                        <i class="fas fa-plus"></i>
                        Add Features

                    </button>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                    <div class="department-table-wrapper">

    <table class="table department-table">

        <thead>
            <tr>
                <th width="80">#</th>
                <th>Feature Name</th>
                 <th>Amount</th>
                <th width="160" class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($addons as $key)

                <tr>

                    <!-- ID -->
                    <td>
                        <span class="department-id">
                            {{ $key->id }}
                        </span>
                    </td>


                    <!-- Department Name -->
                    <td>

                        <div class="department-name-cell">

                            <div class="department-list-icon">
                                <i class="fas fa-building"></i>
                            </div>

                            <div>
                                <strong>
                                    {{ $key->addon }}
                                </strong>

                                <small>
                                    Department
                                </small>
                            </div>

                        </div>

                    </td>


                     <td>

                        <div class="department-name-cell">

                            <div class="department-list-icon">
                               <i class="fas fa-rupee-sign"></i>
                            </div>

                            <div>
                                <strong>
                                    {{ $key->amount }}
                                </strong>

                                <small>
                                    Department
                                </small>
                            </div>

                        </div>

                    </td>



                    <!-- Action -->
                    <td class="text-center">

                        <button type="button"
                                class="department-edit-btn"
                                data-toggle="modal"
                                data-target="#editDepartmentModal"
                                data-id="{{ $key->id }}"
                                data-name="{{ $key->addon }}"
                                data-amount="{{ $key->amount }}">

                            <i class="fas fa-edit"></i>
                            Edit

                        </button>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3">

                        <div class="department-empty">

                            <div class="department-empty-icon">
                                <i class="fas fa-building"></i>
                            </div>

                            <h5>No Departments Found</h5>

                            <p>
                                There are currently no departments available.
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
<!-- ADD DEPARTMENT MODAL -->
<!-- ================================================= -->

   <!-- EDIT MODAL -->

   <div class="modal fade department-edit-modal"
     id="editDepartmentModal"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <!-- Header -->
            <div class="department-modal-header">

                <div class="department-header-icon">
                    <i class="fas fa-building"></i>
                </div>

                <div>
                    <h5>Edit Addons</h5>
                    <p>Update Addons information</p>
                </div>

                <button type="button"
                        class="department-close-btn"
                        data-dismiss="modal">
                    <i class="fas fa-times"></i>
                </button>

            </div>


            <form method="POST"
                  action="{{ route('addons.update', ':id') }}"
                  id="editDepartmentForm">

                @csrf
                @method('PUT')


                <!-- Body -->
                <div class="department-modal-body">

                    <input type="hidden"
                           name="id"
                           id="edit_addon_id">


                    <div class="department-field">

                        <label>
                            Addon Name <span>*</span>
                        </label>

                        <div class="department-input">

                            <i class="fas fa-building"></i>

                            <input type="text"
                                   name="addonsname"
                                   id="edit_addonsname"
                                   class="form-control"
                                   placeholder="Enter Addon  name"
                                   required>

                        </div>

                          <label>
                            Addon Amount <span>*</span>
                        </label>

                        <div class="department-input">

                            <i class="fas fa-rupee-sign"></i>

                            <input type="text"
                                   id="edit_amount"
                                   name="amount"
                                   class="form-control"
                                   placeholder="Enter Amount name"
                                   required>

                        </div>

                    </div>

                </div>


                <!-- Footer -->
                <div class="department-modal-footer">

                    <button type="button"
                            class="department-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>
                        Cancel

                    </button>


                    <button type="submit"
                            class="department-update-btn">

                        <i class="fas fa-save"></i>
                        Update Department

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
<div class="modal fade department-add-modal"
     id="addDepartmentModal"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <!-- Header -->
            <div class="department-modal-header">

                <div class="department-header-icon">
                    <i class="fas fa-building"></i>
                </div>

                <div>
                    <h5>Add Addon</h5>
                    <p>Create a new Addon</p>
                </div>

                <button type="button"
                        class="department-close-btn"
                        data-dismiss="modal">

                    <i class="fas fa-times"></i>

                </button>

            </div>


            <!-- Form -->
            <form method="POST"
                  action="{{ route('addons.store') }}">

                @csrf

                <div class="department-modal-body">

                    <div class="department-field">

                        <label>
                            Addon Name <span>*</span>
                        </label>

                        <div class="department-input">

                            <i class="fas fa-building"></i>

                            <input type="text"
                                   name="addonsname"
                                   class="form-control"
                                   placeholder="Enter Addon name"
                                   required>

                        </div>

                        <label>
                            Addon Amount <span>*</span>
                        </label>

                        <div class="department-input">

                            <i class="fas fa-rupee-sign"></i>

                            <input type="text"
                                   name="amount"
                                   class="form-control"
                                   placeholder="Enter Amount name"
                                   required>

                        </div>


                        <small class="department-help">
                            Enter a unique name for the department.
                        </small>

                    </div>

                </div>


                <!-- Footer -->
                <div class="department-modal-footer">

                    <button type="button"
                            class="department-cancel-btn"
                            data-dismiss="modal">

                        <i class="fas fa-times"></i>
                        Cancel

                    </button>

                    <button type="submit"
                            class="department-save-btn">

                        <i class="fas fa-save"></i>
                        Save Department

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>

<script>
    
    $('#editDepartmentModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);

    var id = button.data('id');
    var name = button.data('name');
    var amount = button.data('amount');

    $('#edit_addon_id').val(id);
    $('#edit_addonsname').val(name);
     $('#edit_amount').val(amount);

    // Update form action
    var action = "{{ route('addons.update', ':id') }}";
    action = action.replace(':id', id);

    $('#editDepartmentForm').attr('action', action);
});
</script>

@endsection


