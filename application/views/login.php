<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url().'assets/logo/logo_mobile.png' ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>K@ - ONDC Monitor</title>
    <style>
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
        
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300);
        * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-weight: 300;
        }
        body {
        font-family: 'Source Sans Pro', sans-serif;
        /* color: white; */
        font-weight: 300;
        }
        body ::-webkit-input-placeholder {
        /* WebKit browsers */
        font-family: 'Source Sans Pro', sans-serif;
        color: white;
        font-weight: 300;
        }
        body :-moz-placeholder {
        /* Mozilla Firefox 4 to 18 */
        font-family: 'Source Sans Pro', sans-serif;
        color: white;
        opacity: 1;
        font-weight: 300;
        }
        body ::-moz-placeholder {
        /* Mozilla Firefox 19+ */
        font-family: 'Source Sans Pro', sans-serif;
        color: white;
        opacity: 1;
        font-weight: 300;
        }
        body :-ms-input-placeholder {
        /* Internet Explorer 10+ */
        font-family: 'Source Sans Pro', sans-serif;
        color: white;
        font-weight: 300;
        }
        .wrapper {
        /* background: #a35050;
        background: linear-gradient(top left, #a35050 0%, #e35353 100%);
        background: linear-gradient(to bottom right, #a35050 0%, #e35353 100%); */
        background: #6d94bb;
        background: linear-gradient(top left, #6d94bb 0%, #263544 100%);
        background: linear-gradient(to bottom right, #6d94bb 0%, #263544 100%);
        position: absolute;
        /* top: 50%; */
        left: 0;
        width: 100%;
        height: 100vh;
        /* 400px */
        /* margin-top: -200px; */
        overflow: hidden;
        }
        .wrapper.form-success .container .logo {
                transform: translateY(100px);
        }
        .container {
            /* max-width: 600px;
            margin: 140px auto;
            padding: 200px 0;
            height: 400px;
            text-align: center; */
            position: absolute;
            margin: auto;
            top: 37%;
            right: 0;
            bottom: 0;
            left: 0;
            text-align: center;
            max-width: 600px;
        }
        .copy-right{
            position: absolute;
            margin: auto;
            right: 0;
            bottom: 8%;
            left: 0;
            text-align: center;
            max-width: 600px;
        }
        .container .logo {
        font-size: 40px;
        transition-duration: 1s;
        transition-timing-function: ease-in-put;
        font-weight: 200;
        }
        form {
        /* padding: 20px 0; */
        position: relative;
        z-index: 2;
        }
        form .cust_input {
        appearance: none;
        outline: 0;
        border: 1px solid rgba(255, 255, 255, 0.4);
        background-color: rgba(255, 255, 255, 0.2);
        width: 300px;
        border-radius: 3px;
        padding: 10px 15px;
        margin: 0 auto 20px auto;
        display: block;
        text-align: center;
        font-size: 15px;
        color: white;
        -webkit-transition-duration: 0.25s;
                transition-duration: 0.25s;
        font-weight: 300;
        }
        form .cust_input:hover {
        background-color: rgba(255, 255, 255, 0.4);
        }
        form .cust_input:focus {
        background-color: white;
        width: 300px;
        color: #263544;
        }
        form button {
                appearance: none;
        outline: 0;
        background-color: white;
        border: 0;
        padding: 10px 15px;
        color: #263544;
        border-radius: 3px;
        width: 250px;
        cursor: pointer;
        font-size: 15px;
        transition-duration: 0.25s;

        }
        form button:hover {
        background-color: #f5f7f9;
        }
        .bg-bubbles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        }
        .bg-bubbles li {
        position: absolute;
        list-style: none;
        display: block;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.15);
        /* bottom: 0px; */
        bottom: -160px;
        animation: square 25s infinite; 
        transition-timing-function: linear;
        }
        .bg-bubbles li:nth-child(1) {
        left: 10%;
        }
        .bg-bubbles li:nth-child(2) {
        left: 20%;
        width: 80px;
        height: 80px;
        animation-delay: 2s;
        animation-duration: 17s;
        }
        .bg-bubbles li:nth-child(3) {
        left: 25%;
        animation-delay: 4s;
        
        }
        .bg-bubbles li:nth-child(4) {
        left: 40%;
        width: 60px;
        height: 60px;
        animation-duration: 22s;
        background-color: rgba(255, 255, 255, 0.25);
        }
        .bg-bubbles li:nth-child(5) {
        left: 70%;
        }
        .bg-bubbles li:nth-child(6) {
        left: 80%;
        width: 120px;
        height: 120px;
        animation-delay: 3s;
        background-color: rgba(255, 255, 255, 0.2);
        }
        .bg-bubbles li:nth-child(7) {
        left: 32%;
        width: 160px;
        height: 160px;
        animation-delay: 7s;
        }
        .bg-bubbles li:nth-child(8) {
        left: 55%;
        width: 20px;
        height: 20px;
        animation-delay: 15s;
        animation-duration: 40s;
        }
        .bg-bubbles li:nth-child(9) {
        left: 25%;
        width: 10px;
        height: 10px;
        animation-delay: 2s;
        animation-duration: 40s;
        background-color: rgba(255, 255, 255, 0.3);
        }
        .bg-bubbles li:nth-child(10) {
        left: 90%;
        width: 160px;
        height: 160px;
        animation-delay: 11s;        
        }
        @keyframes square {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-700px) rotate(600deg);
        }
        }
        @keyframes square {
        0% {
                    transform: translateY(0);
        }
        100% {
                    transform: translateY(-700px) rotate(600deg);
        }
        }
        .cp-text{ margin-top:150px;text-align:center;font-size:15px;font-weight:500;font-family:sans-serif; text-shadow: 0 1px rgba(255, 255, 255, 0.1);}
.container ul{
  list-style: none;
  margin: 0;
  padding: 0;
overflow: auto;
}

ul li{
  display: block;
  position: relative;
  float: left;
}

ul li input[type=radio]{
  position: absolute;
  visibility: hidden;
}

ul li label{
  display: block;
  position: relative;
  font-weight: bold;
  font-size: 15px;
  padding: 20px 10px 30px 50px;
  margin: 10px auto;
  height: 30px;
  z-index: 9;
  cursor: pointer;
  -webkit-transition: all 0.25s linear;
}

ul li:hover label{
	color: #FFFFFF;
}

ul li .check{
  display: block;
  position: absolute;
  border: 2px solid #fff;
  border-radius: 100%;
  height: 20px;
  width: 20px;
  top: 30px;
  left: 20px;
	z-index: 5;
	transition: border .25s linear;
	-webkit-transition: border .25s linear;
}

ul li:hover .check {
  border: 2px solid #FFFFFF;
}

ul li .check::before {
  display: block;
  position: absolute;
	content: '';
  border-radius: 100%;
  height: 10px;
    width: 10px;
    top: 3px;
    left: 3px;
  margin: auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
}

input[type=radio]:checked ~ .check {
  border: 2px solid #fff;
}

input[type=radio]:checked ~ .check::before{
  background: #fff;
}

input[type=radio]:checked ~ label{
  color: #fff;
}


input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}



button.load-button span {
  transition: all 1s;
  opacity: 1;
}
button.load-button svg {
  display: none;
  margin: 0 auto;
  transition: all 1s;
}
button.load-button svg path, button.load-button svg rect {
  fill: #263544;
}

button.loading-start span {
  display: none;
  opacity: 0;
}
button.loading-start svg {
  display: block;
  opacity: 1;
}
.verification-code--inputs input[type=text] {
    border: 2px solid #e1e1e1;
    width: 46px;
    height: 46px;
    padding: 10px;
    text-align: center;
    display: inline-block;
  box-sizing:border-box;
}

    </style>
</head>
<body>
    <div class="wrapper">
    <div class="container">
        <div class="logo" style='margin-bottom: 10px;'>
            <img src="<?= base_url().'assets/logo/logo.png' ?>"   height="50" alt="">
            <span class="remove_element" style="font-size:25px;font-weight:500;font-family:sans-serif;color:#ffffffe6">ONDC Monitor</span>
        </div>
        <form class="animate_element" id="form" action="<?= base_url('login') ?>" method="post">
            <!-- <ul style="margin: auto;width: 300px;">
                <li>
                    <input type="radio" id="f-option" name="login_type" class="login_type" value="login_username" checked>
                    <label for="f-option">Username</label>
                    <div class="check"></div>
                </li>
                <li>
                    <input type="radio" id="s-option" name="login_type" class="login_type" value="login_mobile_no">
                    <label for="s-option">Mobile Number</label>
                    <div class="check">
                    </div>
                </li>
            </ul> -->
            <div>    
                <input type="text" class="cust_input" required name="username" id="username" placeholder="Username" autocomplete="off">
            </div>
            <div>    
                <input type="password" class="cust_input" required name="password" id="password" placeholder="Password" autocomplete="off">
            </div>

            <button type="submit" class="load-button" id="login-button">
                <span>Login</span>
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="24px" height="20px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                <rect x="0" y="10" width="3" height="10" fill="#333" opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
                </rect>
                <rect x="8" y="10" width="3" height="10" fill="#333"  opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                </rect>
                <rect x="16" y="10" width="3" height="10" fill="#333"  opacity="0.2">
                    <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                    <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                </rect>
                </svg>
            </button>
        </form>
        <br>
        <!-- <a class="animate_element" style="cursor:pointer;color:#fff;text-decoration:none;" href="">Forgot Password?</a> -->
    </div>
    
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="copy-right">
        <p class="cp-text remove_element" style="color:#ffffffe6">
            © Copyright <?= date('Y'); ?> Kitchens@. All rights reserved.
        </p>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script> -->
</body>
<script>
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
    
    $(document).ready(function(){
        $("#submit_form_btn").click(function(){
            $("#form").submit();
        })
    })
   
    $("#login-button").click(function(event){
        event.preventDefault();
        let thiss = $(this);
        var value = $('#username').val();
        let password = $('#password').val();
        if(!value || value=='@loyalhospitality.in' || !password)
        {
            toastr.error('Please Enter Valid Username / Password!')
            return false;
        }
        $.ajax({  
            url:'<?= base_url('Login/verify_password'); ?>',
            type: 'post',
            data:{value:value,password:password},
            beforeSend: function(){
                thiss.addClass('loading-start')
            },
            success:function(data){
                let res = $.parseJSON(data)
                if(res.status=='success')
                {
                    $('.remove_element').remove()
                    $('.animate_element').fadeOut(500);
                    $('.wrapper').addClass('form-success');
                    setTimeout(() => {
                        location.reload()
                    }, 1500);
                    toastr.info('Successfully Logged In')
                }
                else
                {
                    toastr.error(res.message)
                    // $('#otp').focus()
                }
                thiss.removeClass('loading-start')
            }  
        });
    });
    
</script>
</html>
