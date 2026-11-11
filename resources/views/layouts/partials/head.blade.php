<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pandavas tours & travels | Dashboard </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
  <style>
    .tour-form-body {
    background: #f7f9fc;
    padding: 22px;
}


/* Section */
.tour-section {
    background: #ffffff;
    border: 1px solid #e7ebf0;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 18px;
}


/* Section Header */
.tour-section-title {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 14px;
    border-bottom: 1px solid #edf0f4;
}

.tour-section-icon {
    width: 38px;
    height: 38px;
    border-radius: 8px;
    background: #eef5ff;
    color: #337ab7;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

.tour-section-title h5 {
    margin: 0 0 3px;
    font-size: 15px;
    font-weight: 700;
    color: #273444;
}

.tour-section-title p {
    margin: 0;
    font-size: 12px;
    color: #8a94a0;
}


/* Fields */
.tour-field {
    margin-bottom: 18px;
}

.tour-field label {
    display: block;
    margin-bottom: 7px;
    color: #374151;
    font-size: 12px;
    font-weight: 600;
}

.tour-field label span {
    color: #e53935;
}


/* Input Wrapper */
.tour-input {
    position: relative;
}

.tour-input > i {
    position: absolute;
    left: 12px;
    top: 12px;
    color: #9aa4af;
    font-size: 13px;
    z-index: 2;
}

.tour-input .form-control {
    height: 42px;
    border: 1px solid #dce2e8;
    border-radius: 7px;
    box-shadow: none;
    padding-left: 35px;
    font-size: 13px;
    transition: all .2s ease;
}

.tour-input .form-control:focus {
    border-color: #337ab7;
    box-shadow: 0 0 0 3px rgba(51,122,183,.08);
}


/* File Input */
.tour-input input[type="file"] {
    padding-left: 10px;
    padding-top: 9px;
}


/* Helper Text */
.tour-field small {
    display: block;
    margin-top: 6px;
    color: #929ba5;
    font-size: 11px;
}


/* Amount */
.amount-input .rupee-symbol {
    position: absolute;
    left: 12px;
    top: 11px;
    z-index: 2;
    color: #337ab7;
    font-size: 14px;
    font-weight: 700;
}

.amount-input input {
    padding-left: 30px !important;
}


/* Textarea */
.tour-textarea {
    width: 100%;
    border: 1px solid #dce2e8;
    border-radius: 7px;
    box-shadow: none;
    padding: 12px;
    font-size: 13px;
    resize: vertical;
    min-height: 125px;
}

.tour-textarea:focus {
    border-color: #337ab7;
    box-shadow: 0 0 0 3px rgba(51,122,183,.08);
}


/* Footer */
.tour-modal-footer {
    background: #ffffff;
    border-top: 1px solid #e5e9ee;
    padding: 15px 22px;
}


/* Buttons */
.tour-modal-footer .btn {
    height: 40px;
    border-radius: 6px;
    padding: 8px 18px;
    font-size: 12px;
    font-weight: 600;
}

.tour-modal-footer .btn i {
    margin-right: 5px;
}

.tour-save-btn {
    min-width: 110px;
}


/* Mobile */
@media (max-width: 767px) {

    .tour-form-body {
        padding: 12px;
    }

    .tour-section {
        padding: 15px;
    }

    .tour-section-title {
        margin-bottom: 15px;
    }

    .tour-modal-footer {
        padding: 12px 15px;
    }

    .tour-modal-footer .btn {
        width: 100%;
        margin-bottom: 6px;
    }
}

/* =========================================
   EDIT TOUR UI
========================================= */

.tour-form-body {
    background: #f7f8fc;
    padding: 24px;
}

/* Sections */
.tour-section {
    background: #fff;
    border: 1px solid #e7ebf1;
    border-radius: 16px;
    padding: 22px;
    margin-bottom: 18px;
    box-shadow: 0 3px 12px rgba(25, 35, 55, 0.04);
}

.tour-section:last-child {
    margin-bottom: 0;
}

/* Section Header */
.tour-section-title {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 22px;
    padding-bottom: 16px;
    border-bottom: 1px solid #edf0f4;
}

.tour-section-icon {
    width: 43px;
    height: 43px;
    min-width: 43px;
    border-radius: 12px;
    background: #eef4ff;
    color: #3867e8;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

.tour-section-title h5 {
    margin: 0;
    color: #202735;
    font-size: 15px;
    font-weight: 700;
}

.tour-section-title p {
    margin: 4px 0 0;
    color: #929aaa;
    font-size: 11px;
}

/* Fields */
.tour-field {
    margin-bottom: 5px;
}

.tour-field label {
    display: block;
    margin-bottom: 7px;
    color: #3d4654;
    font-size: 12px;
    font-weight: 600;
}

.tour-field label span {
    color: #ef4444;
}

/* Input */
.tour-input {
    position: relative;
}

.tour-input > i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #9aa3b1;
    font-size: 13px;
    z-index: 2;
}

.tour-input .form-control {
    height: 43px;
    border: 1px solid #dfe3e9;
    border-radius: 9px;
    padding-left: 38px;
    font-size: 13px;
    color: #303744;
    box-shadow: none;
    transition: .2s ease;
}

.tour-input .form-control:focus {
    border-color: #3867e8;
    box-shadow: 0 0 0 3px rgba(56,103,232,.10);
}

/* Amount */
.amount-input .rupee-symbol {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #3867e8;
    font-weight: 700;
    z-index: 2;
}

.amount-input .form-control {
    padding-left: 32px;
}

/* =========================================
   CURRENT IMAGE
========================================= */

.current-tour-image-box {
    min-height: 105px;
    border: 1px solid #e2e6ec;
    border-radius: 10px;
    background: #fafbfc;
    padding: 10px;
    display: flex;
    align-items: center;
    gap: 14px;
}

.current-tour-image-box img {
    width: 120px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e2e6ec;
}

.current-image-info {
    display: flex;
    flex-direction: column;
    gap: 5px;
    min-width: 0;
}

.current-image-info strong {
    color: #394150;
    font-size: 12px;
}

.current-image-info span {
    color: #929aaa;
    font-size: 10px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* =========================================
   REPLACE IMAGE
========================================= */

.replace-image-box {
    height: 105px;
    border: 1.5px dashed #cbd3df;
    border-radius: 10px;
    background: #fafbff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    transition: .2s ease;
}

.replace-image-box:hover {
    border-color: #3867e8;
    background: #f5f8ff;
}

.replace-image-box > i {
    color: #3867e8;
    font-size: 20px;
    margin-bottom: 5px;
}

.replace-image-box strong {
    color: #394150;
    font-size: 12px;
}

.replace-image-box span {
    color: #9aa3b1;
    font-size: 10px;
}

.replace-image-box input {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
}

.tour-field small {
    display: block;
    margin-top: 6px;
    color: #9ba3b0;
    font-size: 10px;
}

/* =========================================
   TEXTAREA
========================================= */

.tour-textarea {
    width: 100%;
    min-height: 125px;
    border: 1px solid #dfe3e9;
    border-radius: 9px;
    padding: 12px 13px;
    color: #303744;
    font-size: 13px;
    line-height: 1.6;
    resize: vertical;
    box-shadow: none;
}

.tour-textarea:focus {
    border-color: #3867e8;
    box-shadow: 0 0 0 3px rgba(56,103,232,.10);
}

/* =========================================
   FOOTER
========================================= */

.tour-modal-footer {
    background: #fff;
    border-top: 1px solid #e8ebf0;
    padding: 14px 22px;
    gap: 9px;
}

.tour-close-btn {
    height: 40px;
    padding: 0 17px;
    border-radius: 8px;
    background: #fff;
    border: 1px solid #dfe3e9;
    color: #687180;
    font-size: 12px;
    font-weight: 600;
}

.tour-close-btn:hover {
    background: #f6f7f9;
    color: #333b48;
}

.tour-save-btn {
    height: 40px;
    padding: 0 20px;
    border: 0;
    border-radius: 8px;
    background: #3867e8;
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(56,103,232,.20);
    transition: .2s ease;
}

.tour-save-btn:hover {
    background: #2f59d1;
    color: #fff;
    transform: translateY(-1px);
}

/* Grid spacing */
.tour-section .row {
    margin-left: -7px;
    margin-right: -7px;
}

.tour-section .row > [class*="col-"] {
    padding-left: 7px;
    padding-right: 7px;
}

/* Modal */
.modal-content {
    border: 0;
    border-radius: 17px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(20,30,50,.16);
}

/* Mobile */
@media (max-width: 767px) {

    .tour-form-body {
        padding: 14px;
    }

    .tour-section {
        padding: 16px;
        border-radius: 13px;
    }

    .current-tour-image-box {
        margin-bottom: 15px;
    }

    .tour-section-title {
        margin-bottom: 18px;
    }

    .tour-modal-footer {
        padding: 12px 14px;
    }
}


    </style>

    <style>
    .form-select {
        width: 100%;
        height: 45px;
        padding: 8px 40px 8px 12px;
        font-size: 15px;
        color: #333;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 6px;
        outline: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }

    .form-select:hover {
        border-color: #999;
    }

    .form-select option {
        padding: 10px;
        font-size: 15px;
    }
    .pagination-wrapper {
    margin-top: 20px;
    display: flex;
    justify-content: flex-end;
}

.pagination {
    display: flex;
    align-items: center;
    gap: 5px;
    margin: 0;
}

.pagination .page-item .page-link {
    border: 1px solid #dee2e6;
    border-radius: 5px;
    padding: 7px 12px;
    color: #333;
    background: #fff;
    font-size: 14px;
    text-decoration: none;
}

.pagination .page-item .page-link:hover {
    background: #f5f5f5;
    color: #000;
}

.pagination .page-item.active .page-link {
    background: #000;
    border-color: #000;
    color: #fff;
}

.pagination .page-item.disabled .page-link {
    color: #aaa;
    background: #f8f8f8;
    border-color: #ddd;
}
</style>
</head>