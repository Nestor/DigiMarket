<?php require (ROOT . "/themes/default/configuration/configuration.php"); ?>
<style>
    /* FONTS */
@font-face {
    font-family: Kyak_R;
    src: url("<?= $themeDir ?>/fonts/Kyak_Regular.otf");
}
@font-face {
    font-family: Kyak_R_I;
    src: url('<?= $themeDir ?>/fonts/Kyak_Regular(Italic).otf');
}
@font-face {
    font-family: Kyak_L;
    src: url('<?= $themeDir ?>/fonts/Kyak_Light.otf');
}
@font-face {
    font-family: Kyak_L_I;
    src: url('<?= $themeDir ?>/fonts/Kyak_Light(Italic).otf');
}
@font-face {
    font-family: Kyak_B;
    src: url('<?= $themeDir ?>/fonts/Kyak_Bold.otf');
}
@font-face {
    font-family: Kyak_B_I;
    src: url('<?= $themeDir ?>/fonts/Kyak_Bold(Italic).otf');
}

/* BODY */
body {
    background-color:rgba(<?= $background ?>, 255);
    color:lightgrey;
}

/* TRICKS */
.font-center-container {;
    position:relative;
    display:table;
    text-align:center;
}
.font-center-wrapper {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

/* TEXT STYLING */
h1 {
    font-family: <?= $primary_font ?>, serif;
}
.actionBoxH h1, .actionBoxHL h1 {
    font-family: <?= $primary_font ?>, serif;
    font-size:20px;
    position: relative;
    top: -2.5%;
    transform: translateY(2.5%);
    text-align:center;
}
.actionBoxH p, .actionBoxHL p {
    color:rgb(82,83,78);
    margin-left:1%;
    font-family:<?= $bold_font ?>;
}
.actionBoxH u, .actionBoxHL u {
    text-decoration:underline;
}
h2 {
    font-family: <?= $primary_font ?>, serif;
}
h3 {
    font-family: <?= $primary_font ?>, serif;
}
h4 {
    font-family: <?= $primary_font ?>, serif;
}
h5 {
    font-family: <?= $primary_font ?>, serif;
}
p {
    font-family: <?= $primary_font ?>, serif;
}
label {
    font-family: <?= $primary_font ?>, serif;
    font-size:25px;
}

/* MAIN CONTENT */

/* Action Box Header */
.actionBoxH {
    position: absolute;
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    background-color:rgba(255,255,255,0.2);
    width:40%;
    height:40%;
    border-radius:4px;
}
.actionBoxHL { /* L For Large */
    position: absolute;
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    background-color:rgba(255,255,255,0.2);
    width:40%;
    height:60%;
    border-radius:4px;
}
/* Action Box Content */
.actionBoxC {
    position: absolute;
    -webkit-transform: translate(0%,-100%);
    transform: translate(0%,-100%);
    top: 100%;
    background-color:rgba(255,255,255,0.5);
    width:100%;
    height:90%;
    border-bottom-left-radius:4px;
    border-bottom-right-radius:4px;
    border-top-left-radius:2px;
    border-top-right-radius:2px;
}
input[type="email"], input[type="password"], input[type="text"] {
    font-family:<?= $primary_font ?>, serif;
    font-size:15px;
    width:100%;
    height:15%;
    text-indent:5px;
    border-top-right-radius:3px;
    border-bottom-right-radius:3px;
    border:solid rgba(0,0,0,0) 0px;
    margin-bottom:10px;
    background:rgba(255,255,255,0.6);
}
.actionBoxHL input[type="email"], .actionBoxHL input[type="password"], .actionBoxHL input[type="text"] {
    font-family:<?= $primary_font ?>, serif;
    font-size:15px;
    width:100%;
    height:11.6%;
    text-indent:5px;
    border-top-right-radius:3px;
    border-bottom-right-radius:3px;
    border:solid rgba(0,0,0,0) 0px;
    margin-bottom:10px;
    background:rgba(255,255,255,0.6);
}
input[type="submit"] {
    font-family:<?= $primary_font ?>, serif;
    position:relative;
    -webkit-transform: translate(-50%,0%);
    transform: translate(-50%,0%);
    left: 50%;
    font-size:15px;
    border-radius:3px;
    width:100px;
    height:50px;
    border:solid white 0px;
    color:rgb(82,83,78);
    background:rgba(255,255,255,0.5);
}

::-webkit-input-placeholder {
    color: black;
    opacity:0.5;
}
:-moz-placeholder {
    color:black;
    opacity:0.5;
}
::-moz-placeholder {
    color:black;
    opacity:0.5;
}
:ms-input-placeholder {
    color:black;
    opacity:0.5;
}
</style>