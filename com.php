<?php

include_once "config.php";
include_once "navbar.php";

?>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link rel="stylesheet" type="text/css" href="./style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<style>
    .navbar-toggler,
    #nav {
        background-color: #8A9A5B !important;
    }
    .right, .left{
        background-color:#FEFEFE!important;

    }

    #userdiv, #passdiv{

        padding: 1vh;
       
    }

    #userspan, #passspan{

        min-width: 15.4vh;

    }

    #selectedTipo {

        font-size: 54;
    }

    #valoreDinamico {
        font-size: 90;
        text-align: center;
        justify-content: center;
        align-items: center;

        margin-bottom: 20px;
        /* Space between km display and control elements */
    }

    #customRange1 {
        left: 35px;
        /* Adjust based on the size of your '-' button */
        right: 35px;
        /* Adjust based on the size of your '+' button */
        width: auto;
        /* Allows the slider to fill the space between buttons */
    }

    #decrease,
    #increase {
        border: none;
        background: none;
        cursor: pointer;
        /* Adjust size as needed */
        width: 50px;
        /* Example size increase */
        height: 50px;
        /* Example size increase */
        top: 50%;
        /* Center vertically */
        transform: translateY(-50%);
        /* Shift up by half its height */
        font-size: 40;
    }

    li,
    ul {

        font-weight: bold !important;

    }

    .alert {
        margin: 2rem;
    }

    .bi {
        width: 4rem;
        height: 4rem;
    }


    h1,
    h2 {
        text-align: center;
        padding: 1rem;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    #tab {
        width: 100% !important;
        margin-right: 2rem;
        text-align: center;
        border-radius: 10px;
        overflow: hidden;
    }

    #tab_div {
        margin: 2rem;
        padding-bottom: 2rem;
    }

    body{
        background-color:#F5F5DC;
    }
</style>