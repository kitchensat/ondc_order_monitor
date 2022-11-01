<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= 'K@ - ONDC Monitor | '.@$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url().'assets/logo/logo_mobile.png' ?>" type="image/x-icon">

    <!-- cdn jquery-confirm style-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tail.select@0.5.15/css/default/tail.select-light.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    
    <!-- cdn toastr style-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <!-- cdn style -->
    <link rel="stylesheet" href="<?= base_url().'assets/library/bootstrap@4.6.1/css/bootstrap.min.css' ?>">

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.0.1/css/fixedColumns.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.dataTables.min.css">
    <!-- local links -->

    <!-- tail.select -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/intro.js@4.2.2/introjs.min.css">

    <!-- toggle button css -->
    <!-- base_url() -->
    <link rel="stylesheet" href="<?= base_url().'assets/style/datatable/datatable.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/style/toggle_button/toggle.min.css' ?>">

    <link rel="stylesheet" href="<?= base_url().'assets/style/all/style.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/style/utility/style.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/style/variables/variables.css' ?>">
    <link rel="stylesheet" href="<?= base_url().'assets/style/navbar/navbar.css' ?>">


    <style>
        .user-image-container
        {
            background:#263544;
        }
        .dataTables_wrapper .dt-buttons {
            float:none;  
            text-align:center;
        }

        #toast-container>div
        {
            top: 3.5rem; 
            opacity:1;
        }
        .toast-success
        {
            background-color:#51A351;
        }
        .toast-info
        {
            background-color:#48627c;
        }
        .toast-error
        {
            background-color:#BD362F;
        }
        .toast-warning
        {
            background-color:#F89406;
        }
        .btn-primary
        {
            background-color:#263544f2;
            border-color:#263544f2;
        }
        .btn-primary:hover {
            background-color:#263544;
            border-color:#263544;
        }
        .btn-primary.focus, .btn-primary:focus
        {
            background-color: #263544;
            border-color: #263544;
            box-shadow: 0 0 0 0.2rem #263544d1;
        }

        .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle
        {
            background-color:#263544f2;
            border-color:#263544f2;
        }
        .btn-primary:not(:disabled):not(.disabled):active:focus
        {
            background-color: #263544;
            border-color: #263544;
            box-shadow: 0 0 0 0.2rem #263544d1;
        }
        .jconfirm .jconfirm-box.jconfirm-type-green
        {
            border-top : solid 7px #2c3945 !important
        }
        .nav-tabs .nav-link
        {
            color:#263544f2;
        }
        #ui-id-1
        {
            top:59.5px !important;
            z-index: 11 !important;
            position: fixed !important;
        }
        .my-navbar
        {
            z-index: 1000;
        }
        .loader
        {
            position: fixed;
            z-index: 10000;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100vh;
            background-color: #263544b5;
            /* rgba(255,255,255,0.6); */
        }
        .loader-container
        {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #nav-inactive_data-tab,#nav-deleted_data-tab
        {
            color:red;
        }
        .page_search_icon 
        {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="loader" id="cust_loader">
        <div class="loader-container">
            <h3 style="color:#fff">Please Wait...</h3>
            <!-- <img src="<?php //echo base_url('assets/loaders/loader.gif'); ?> " style="width: 50px;" alt=""> -->
        </div>
    </div>
    <nav class="my-navbar">
        <div class="left-nav">
            <div class="logo-sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="toggle-btn" class="toggle-btn" title="Desktop" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="toggle-btn_mobile" class="toggle-btn_mobile" title="Mobile" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <a href="<?= base_url().'Dashboard' ?>">
                    <img src="<?= base_url().'assets/logo/logo.png' ?>" class="logo" alt="">
                    <img src="<?= base_url().'assets/logo/logo_mobile.png' ?>" class="logo_mobile" alt="">
                </a>
            </div>
            <div class="page_title_container">
                <p class="page_title"><?=@$title?></p>
            </div>
        </div>
        <div class="right-nav">
            <?php 
                // if(@$search=='true')
                // {
            ?>
            <div class="page_Search_container">
                <input type="text" class="page_search_input page_search_input_js" placeholder="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="page_search_icon page_search_icon_js" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </div>
            <?php //} ?>
            <div class="alert-container" id="call_notifi_js">
                <svg class="alert-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                </svg>
                <p class="alert-number alert_messages_ele" style='display:none'>
                    <span id="alert_messages_count"></span>
                </p>
                <div class="alert_msg_container">
                    <div class="inner_alert_msg">
                        <ul class="inner_alert_msg_list" id="alert_messages">
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="user-settings" id="call_user_settings_js">
                <div class="user-image-container">
                    <img src="<?=@$_SESSION['image']?@$_SESSION['image']:base_url('assets/images/face3.png');?>" class="user-image" alt="">
                </div>
                <p class="username"><?=@$_SESSION['username'];?></p>
                <svg class="user-menu" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
                <div class="user-settings-container">
                    <div class="inner-user-settings">
                        <!-- <div class="user-image-container">
                            <div>
                            <img src="<?=@$_SESSION['image']?@$_SESSION['image']:''?>" class="user-image" alt="">
                            <?=@$_SESSION['username']?@$_SESSION['username']:''?>
                            </div>
                        </div> -->
                        <ul class="user-settings-list">
                            <!-- <li>
                                <a href="" class="user-settings-link">
                                    <svg class="settings-menu-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                    </svg>
                                    <span>Settings</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="" class="user-settings-link">
                                    <svg class="settings-menu-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    </svg>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="" class="user-settings-link">
                                    <svg class="settings-menu-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                    <span>My Message</span>
                                </a>
                            </li>
                            <li class="login_confirm" data-target="<?= base_url().'login/logout' ?>">
                                <span class="user-settings-link">
                                    <svg class="settings-menu-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M7.5 1v7h1V1h-1z"/>
                                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                                    </svg>
                                    <span>Logout</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav class="sidebar" id="sidebar_js">
        <div class="sidebar_container">
            <ul class="sidebar_list">
                <li>
                    <p class="menu_title">Navigation</p>
                </li>
                <div class="sidebar_list_js">
                    <li id="Dashboard_menutab">
                        <a class="openable openable_js" href="<?= base_url().'Dashboard' ?>">
                            <div class="link_content">
                                <p class="link_icon">
                                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                                    </svg>
                                </p>
                                <p class="link_name">Dashboard</p>
                                <!-- <p class="my-badge my-badge-new">12</p> -->
                            </div>
                        </a>
                    </li>
                    <li id="privacy_policy_master_menutab">
                        <a class="openable openable_js" href="<?= base_url().'order/order_details' ?>">
                            <div class="link_content">
                                <p class="link_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bullseye" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
                                        <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    </svg>
                                </p>
                                <p class="link_name">Order Details</p>
                            </div>
                        </a>
                    </li>
                    <li id="privacy_policy_master_menutab">
                        <a class="openable openable_js" href="<?= base_url().'order/order_grievance' ?>">
                            <div class="link_content">
                                <p class="link_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                        <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                    </svg>
                                </p>
                                <p class="link_name">Order Grievance</p>
                            </div>
                        </a>
                    </li>
                </div>

                <!-- <li>
                    <p class="menu_title">Change Theme</p>
                </li>
                <li>
                    <a class="">
                        <div class="link_content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                            </svg>
                            <p class="link_name">Dark Theme</p>
                        </div>
                        <div class="theme_checkbox">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </a>
                </li> -->
            </ul>
        </div>
    </nav>
    <div class="sidebar_wrapper"></div>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- jquery-confirm cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/tail.select@0.5.15/js/tail.select-full.min.js"></script>
    
    <!-- jquery-confirm cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="<?= base_url().'assets/library/bootstrap@4.6.1/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- datatable cdn -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/intro.js@4.2.2/intro.min.js"></script>
    <script type="text/javascript" src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    

</body>
</html>

<script type="text/javascript">
      $(document).on('click',".confirm_submit_btn",function(e){
        e.preventDefault()
		let form = this.closest('form')
		let elements = $('input,textarea,select').filter('[required]:visible')
		let empty_count = 0
		elements.each((i,ele)=>{
			if(!$(ele).val())
				empty_count++
		})
		if(empty_count==0)
		{
			$.confirm({
				title: 'Confirm!',
				content: 'Are You Sure You Want To Submit?',
				type: 'green',
				// columnClass: 'small text-danger',
				typeAnimated: true,
				buttons: {
					confirm: {
						text: 'Yes',
						btnClass: 'btn-primary',
						action: function(){
							form.submit();
						}
					},
					cancel: {
						text: 'No',
						action: function(){
						}
					},
				}
			});
		}
		else
			toastr.error('Please Fill The Mandatory Details!')
      });
</script>
<script>
    let window_width;
    toastr.options = {
        'closeButton': true,
        'debug': false,
        'newestOnTop': false,
        'progressBar': true,
        'positionClass': 'toast-top-right',
        'preventDuplicates': false,
        'showDuration': '1000',
        'hideDuration': '1000',
        'timeOut': '5000',
        'extendedTimeOut': '1000',
        'showEasing': 'swing',
        'hideEasing': 'linear',
        'showMethod': 'fadeIn',
        'hideMethod': 'fadeOut',
    }
    
    // toastr.success('You clicked Success toast');
    // toastr.info('You clicked Info toast')
    // toastr.error('You clicked Error Toast')
    // toastr.warning('You clicked Warning Toast')
    
    $(document).ready(function(){
        window_width = $(window).width();
        adjust_sidebar();

        $(".login_confirm").click(function(){
            let url = $(this).data('target');
            $.confirm({
                title: 'Confirm!',
                content: 'Are You Sure You Want To Logout?',
                type: 'green',
                // columnClass: 'small text-danger',
                typeAnimated: true,
                buttons: {
                    confirm: {
                        text: 'Yes',
                        btnClass: 'btn-primary',
                        action: function(){
                            $('#logout_confirmed').click()
                            location.replace(url);
                        }
                    },
                    cancel: {
                        text: 'No',
                        action: function(){
                        }
                    },
                }
            });
        });

        // function for calling user settings menu
        
        $("#call_user_settings_js").click(function(){
            $(".alert_msg_container").hide();
            $(".user-settings-container").toggle();
        });


        // function for calling notification menu
        $("#call_notifi_js").click(function(){
            $(".user-settings-container").hide();
            $(".alert_msg_container").toggle();
            let alert_ids = $(".alert_ids").val();
            if(alert_ids)
            {
                $.ajax({
                    url:"<?php echo site_url('Dashboard/ajax_update_alert_message');?>",
                    data:{alert_ids},
                    type:'POST',
                    beforeSend: function() {
                        // $('#cust_loader').fadeOut(1500);
                    },
                    success:function(data)
                    {
                        $('.alert_messages_ele').hide()
                    },
                    complete: function() {
                        // $('#cust_loader').hide()
                    },
                });
            }
        });

        // function for calling sidebar
        $("#toggle-btn").click(function(){
            $("#sidebar_js").toggleClass('my-active');
            $("#page-container").toggleClass('sidebar_open');
        });

        // function for calling sidebar in mobile
        $("#toggle-btn_mobile, .sidebar_wrapper").click(function(){
            $("#sidebar_js").toggleClass('my-active');
            $(".sidebar_wrapper").fadeToggle();
        });

        // function for dropdown menu in sidebar
        $(".openable_js").click(function(){
            $(this).parent("li").toggleClass("my-active");
            $(this).next(".sidebar_list").slideToggle();
            $(this).toggleClass("link_open");
        });
    });

    // calling a function to responsive of sidebar
    $(window).resize(function(){
        adjust_sidebar();
    });

    // function for responsive sidebar
    function adjust_sidebar()
    {
        window_width = $(window).width();
        if(window_width<1075)
        {
            $("#sidebar_js").removeClass("my-active");
        }
        else if(window_width>1075)
        {
            $("#sidebar_js").addClass("my-active");
        }
    }

    // function for hiding user settings popup and notification popup if click outside
    $(document).on('click',function(e){
        try {
            if((e.target.attributes.class.value!='user-settings') && (e.target.attributes.class.value!='alert-container'))
            {
                $(".user-settings-container").hide();
                $(".alert_msg_container").hide();
                let alert_ids = $(".alert_ids").val();
                if(alert_ids && e.target.attributes.class.value!='alert-container')
                    get_navbar_details()
            }
        }
        catch (exception_var) {
            $(".user-settings-container").hide();
            $(".alert_msg_container").hide();
        }
    });
</script>

<script>
    $(document).on('click','.page_search_icon_js',function(e){
        let search_val = $('.page_search_input_js').val()
        $(".sidebar_list_js a").each(function() {
            let link_name = $(this).find('.link_name').text()
            if(link_name==search_val)
                window.location.href = $(this).attr("href"); 
        });
    });
    
    
    $(".sidebar_list_js a").click(function() {
        $('#cust_loader').show();
    });

    function get_navbar_details()
    {
        $.ajax({
            url:"<?php echo site_url('Dashboard/ajax_navbar_details');?>",
            data:{},
            type:'POST',
            beforeSend: function() {
                $('#cust_loader').fadeOut(1500);
            },
            success:function(data)
            {
                let res = $.parseJSON(data)
                if(res.alert_messages)
                {
                    let messages = res.alert_messages
                    let row = '';
                    
                    if(messages.length)
                    {
                        $('.alert_messages_ele').show()
                        $('#alert_messages_count').html(messages.length)

                        row = `<li>
                                <a href="#">
                                    <div class="user-image-container">
                                        <img src="<?=@$_SESSION['image']?@$_SESSION['image']:base_url('assets/images/face3.png');?>" class="user-image" alt="">
                                    </div>
                                    <div class="alert_details_container">
                                        <p class="alert_title">Hi, <?=@$_SESSION['username'];?> Welcome Back</p>
                                        <p class="alert_details">Hope You Are Doing Well.</p>
                                    </div>
                                </a>
                            </li>`;
                        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' , hour: 'numeric', minute: 'numeric' };
                        let ids = []
                        let alert_ids = ''
                        messages.forEach(ele => {
                            let str = Date.parse(ele.login_datetime)
                            let date = new Date(ele.login_datetime)
                            ids.push(ele.id)
                            alert_ids = ids.join(',')
                            date = date.toLocaleDateString("en-US", options)
    
                            row += `<li>
                                <a href="#">
                                    <div class="user-image-container">
                                        <img src="<?=@$_SESSION['image']?@$_SESSION['image']:base_url('assets/images/face3.png');?>" class="user-image" alt="">
                                    </div>
                                    <div class="alert_details_container">
                                        <p class="alert_title">Login Alert</p>
                                        <p class="alert_details">Last Login Timings ${date}</p>
                                    </div>
                                </a>
                            </li>`;
                            // <p class="alert_time"></p>    
                        });
                        row += `<input type='hidden' name='alert_ids' class='alert_ids' value='${alert_ids}'>`
                    }
                    else
                    {
                        row = `<li>
                            <a href="#">
                                <div class="user-image-container">
                                    <img src="<?=@$_SESSION['image']?@$_SESSION['image']:base_url('assets/images/face3.png');?>" class="user-image" alt="">
                                </div>
                                <div class="alert_details_container">
                                    <p class="alert_title">Hi, <?=@$_SESSION['username'];?> Welcome Back</p>
                                    <p class="alert_details">Hope You Are Doing Well.</p>
                                    <p class="alert_time">No Messages</p>
                                </div>
                            </a>
                        </li>`;
                        $('.alert_messages_ele').hide()
                    }
                        
                    $('#alert_messages').html(row)
                }
            },
            complete: function() {
                $('#cust_loader').hide()
            },
        });
    }

    $(document).ready(function() {
        setTimeout(() => {
            $('#cust_loader').fadeOut(1500);
        }, 100);
        get_navbar_details()
    });

    function goToByScroll() {

        var path=window.location.pathname;
        var abc=path.split("/");
        var controller=abc[2];
        var method=abc[3] || "index";

        var items = []
        var loc = window.location.href;
        $(".sidebar_list_js a").each(function() {
            let link_name = $(this).find('.link_name').text()
            if(link_name)
                items.push(link_name)
            if ($(this).attr("href")==loc)
                $(this).css("color","yellow");
            else if((method=='insert_approved_bonus_leave' || method=='insert_rejected_bonus_leave') && '<?php echo site_url('employee_leave_approval/approve_bonus_leave'); ?>'==$(this).attr("href"))
                $(this).css("color","yellow");
            else if(method=='update_bonus_leave' && '<?php echo site_url('employee_leave_approval/view_and_edit_bonus_leave'); ?>'==$(this).attr("href"))
                $(this).css("color","yellow");
            else if(method=='lookup_designationwise_edit' && '<?php echo site_url('lookup_master_new/index'); ?>'==$(this).attr("href"))
                $(this).css("color","yellow");
        });
        
        $('.page_search_input_js').autocomplete({
            source:items
        });

        
        if(method == 'salary_report' || method == 'salary_reconciliation' || method == 'salary_reconciliation_report' || method == 'salary_reconciliation_comparison' || method == 'income_tax_computation_upload' || method == 'income_tax_computation')
            controller=controller+'_salary'
        if(controller=='employee_update' || controller=='mobile' || controller=='mobile')
            controller='employee'
        if(controller=='blood_group_update')
            controller='blood'
        
        $("#" + controller+'_menutab').addClass('my-active')
        $("#" + controller+'_menutab' +' a').addClass('link_open')
        $("#" + controller+'_menutab' +' .sidebar_list_js').css('display','block')
        if(controller!='Dashboard')// || controller!='Employee_sabbatical_leave'
        {
            $('.sidebar_container').animate({
                scrollTop: $("#" + controller+'_menutab').offset().top-60
            }, 'fast');
        }
    }
    goToByScroll()
</script>