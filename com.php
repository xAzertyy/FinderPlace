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
    #nav {
        background-color: red !important;


    }

    #selectedTipo {

        font-size: 64;
    }

    #valoreDinamico {
        font-size: 78;
        text-align: center;
        justify-content: center;
        align-items: center;
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
</style>