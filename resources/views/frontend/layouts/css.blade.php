<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/chosen.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/lightbox.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/pe-icon-7-stroke.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/jquery.mCustomScrollbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/magnific-popup.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic,400,700,700italic,900,900italic'
    rel='stylesheet' type='text/css'>
<link
    href='https://fonts.googleapis.com/css?family=Roboto:300,100,100italic,300italic,400,400italic,500,500italic,700,700italic,900,900italic'
    rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />


<style>
/* Customize the label (the container) */
.container1 {
    display: inline-block;
    position: relative;
    padding-left: 35px;
    padding-top: 20px;
    margin-left: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    color: black;
}

/* Hide the browser's default checkbox */
.container1 input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border: 1px solid black;
}

.checkmarksize {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    padding: 5px;
    background-color: #eee;
    font-size: 16px;
}

/* On mouse-over, add a grey background color */
.container1:hover input~.checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked~.checkmark {
    background-color: #616161;
}

.container1:hover input~.checkmarksize {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked~.checkmarksize {
    background-color: #616161;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

.checkmarksize:after {
    content: "";
    position: absolute;
    display: none;

}

/* Show the checkmark when checked */
.container input:checked~.checkmark:after {
    display: block;

}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);

}

.container input:checked~.checkmarksize:after {
    display: block;

}

/* Style the checkmark/indicator */
/* .container .checkmarksize:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);

} */
</style>
<link rel="stylesheet" href="{{ asset('css/frontend/sweetalert2.css') }}" />
