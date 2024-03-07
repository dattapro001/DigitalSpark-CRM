<?php
include 'config.php';
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: login.php");
  die();
}
$user_id = $_SESSION['user_id'];

$query ="SELECT * FROM `details` WHERE id='$user_id'";
$allData = mysqli_query($conn,$query);

$arrayData = mysqli_fetch_array($allData);

if(isset($_POST['contact_send'])){
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    $contact_subject = $_POST['contact_subject'];
    $contact_phone = $_POST['contact_phone'];
    $contact_message= $_POST['contact_message'];

    $name_pattern = "/[A-Za-z ]+$/";                                        
    $email_pattern = "/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/";
    $phone_pattern = "/(\+88)?-?01[3-9]\d{8}/";
    $subject_pattern = "/[A-Za-z ]+$/";
    $message_pattern = "/[A-Za-z 0-9 @#!$%^&**%*^! ]/";


    if(!preg_match($name_pattern,$contact_name)){
      echo "<script> alert('Characters Only (Name Field)!!') </script>";
  }elseif(!preg_match($phone_pattern,$contact_phone)){
    echo "<script> alert('Only Bangladeshi Phone Number!!') </script>";
  }elseif(!preg_match($email_pattern,$contact_email)){
    echo "<script> alert('Invalid email!!') </script>";
  }elseif(!preg_match($subject_pattern,$contact_subject)){
    echo "<script> alert('Characters Only (Subject Field)!!') </script>";
  }elseif(!preg_match($message_pattern,$contact_message)){
    echo "<script> alert('Characters Only (Message Field)!!') </script>";
  }else{
    $sql = "INSERT INTO contact (name, email, subject, phone, message) VALUES ('{$contact_name}', '{$contact_email}', '{$contact_subject}', '{$contact_phone}', '{$contact_message}')";
    $result = mysqli_query($conn, $sql);
  if($result){
    echo "<script> alert('Information Send Succesfully!!') </script>";
  }
  } 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DigiatSpark CRM</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">



  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@500;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">
<style>
  
:root {

/*colors*/

--safety-orange: hsl(25, 100%, 50%);
--lavender-gray: hsl(230, 19%, 81%);
--persian-rose: hsl(328, 100%, 59%);
--red-crayola: hsl(341, 100%, 49%);
--eerie-black: hsl(240, 6%, 10%);
--light-gray: hsl(0, 0%, 80%);
--cultured-2: hsl(210, 60%, 98%);
--platinum: hsl(0, 0%, 90%);
--gray-web: hsl(220, 5%, 49%);
--cultured: hsl(0, 0%, 93%);
--black_10: hsla(0, 0%, 0%, 0.1);
--black_5: hsla(0, 0%, 0%, 0.05);
--white-1: hsl(0, 0%, 100%);
--white-2: hsl(0, 14%, 98%);
--black: hsl(0, 0%, 0%);

/*gradient color*/

--gradient: linear-gradient(to left top, var(--persian-rose), var(--safety-orange));

/*typography*/

--ff-roboto: 'Roboto', sans-serif;
--ff-league-spartan: 'League Spartan', sans-serif;

--fs-1: 3.5rem;
--fs-2: 3rem;
--fs-3: 2.1rem;
--fs-4: 1.7rem;
--fs-5: 1.4rem;
--fs-6: 1.3rem;

--fw-700: 700;
--fw-500: 500;

/*spacing*/

--section-padding: 60px;

/*shadow*/

--shadow-1: 0 6px 24px var(--black_5);
--shadow-2: 0 2px 28px var(--black_10);

/* border radius */

--radius-2: 2px;
--radius-5: 5px;
--radius-8: 8px;


 /* transition */

--transition-1: 0.25s ease;
--transition-2: 0.5s ease;
--cubic-out: cubic-bezier(0.33, 0.85, 0.4, 0.96);

}



/*  #RESET */

*,
*::before,
*::after {
margin: 0;
padding: 0;
box-sizing: border-box;
}

li { list-style: none; }

a {
text-decoration: none;
color: inherit;
}

a,
img,
span,
time,
label,
input,
button,
textarea,
ion-icon { display: block; }

img { height: auto; }

input,
button,
textarea {
background: none;
border: none;
font: inherit;
}

input,
textarea { width: 100%; }

button { cursor: pointer; }

ion-icon { pointer-events: none; }

address { font-style: normal; }

html {
font-family: var(--ff-roboto);
font-size: 10px;
scroll-behavior: smooth;
}

body {
background-color: var(--white-1);
color: var(--gray-web);
font-size: 1.6rem;
line-height: 1.8;
}

::-webkit-scrollbar { width: 10px; }

::-webkit-scrollbar-track { background-color: hsl(0, 0%, 98%); }

::-webkit-scrollbar-thumb { background-color: hsl(0, 0%, 80%); }

::-webkit-scrollbar-thumb:hover { background-color: hsl(0, 0%, 70%); }

:focus-visible { outline-offset: 4px; }





/*#REUSED STYLE*/

.container { padding-inline: 15px; }

.btn {
max-width: max-content;
color: var(--white-1);
font-size: var(--fs-6);
font-weight: var(--fw-700);
padding: 10px 30px;
border-radius: var(--radius-5);
transition: var(--transition-1);
}

.btn-primary {
background-image: var(--gradient);
background-size: 1000%;
}

.btn-primary:is(:hover, :focus) { background-position: bottom right; }

.btn-secondary {
background-color: var(--white-1);
color: var(--eerie-black);
}

.btn-secondary:is(:hover, :focus) {
background-color: var(--eerie-black);
color: var(--white-1);
}

.section { padding-block: var(--section-padding); }

.h1,
.h2,
.h3 {
color: var(--eerie-black);
font-family: var(--ff-league-spartan);
line-height: 1.2;
}

.h1 { font-size: var(--fs-1); }

.h2 { font-size: var(--fs-2); }

.h3 { font-size: var(--fs-3); }

.w-100 { width: 100%; }

.section-title,
.section-text { text-align: center; }

.section-text { font-size: var(--fs-6); }

.grid-list {
display: grid;
gap: 30px;
}

.img-holder {
aspect-ratio: var(--width) / var(--height);
background-color: var(--light-gray);
}

.img-cover {
width: 100%;
height: 100%;
object-fit: cover;
}





/*#HEADER*/

.header {
position: fixed;
top: 0;
left: 0;
width: 100%;
background-color: var(--white-1);
padding-block: 15px;
border-block-end: 1px solid var(--cultured);
z-index: 4;
transition: var(--transition-1);
}

.header.active { filter: drop-shadow(var(--shadow-2)); }

.header > .container {
display: flex;
justify-content: space-between;
align-items: center;
}

.logo {
font-family: var(--ff-league-spartan);
color: var(--black);
font-size: 3.5rem;
font-weight: var(--fw-700);
line-height: 1;
}

.nav-toggle-btn { font-size: 40px; }

.nav-toggle-btn.active .open,
.nav-toggle-btn .close { display: none; }

.nav-toggle-btn .open,
.nav-toggle-btn.active .close { display: block; }

.navbar {
background-color: var(--white-1);
position: absolute;
top: 100%;
left: 50%;
transform: translateX(-50%);
max-width: calc(100% - 30px);
width: 100%;
padding-inline: 0;
border: 1px solid var(--cultured);
transition: 0.3s var(--cubic-out);
max-height: 0;
visibility: hidden;
overflow: hidden;
}

.navbar.active {
max-height: 320px;
visibility: visible;
transition-duration: 0.5s;
}

.navbar-list {
padding: 20px 15px;
padding-block-start: 10px;
opacity: 0;
transition: var(--transition-1);
}

.navbar.active .navbar-list { opacity: 1; }

.navbar-link {
color: var(--eerie-black);
font-family: var(--ff-league-spartan);
font-size: var(--fs-4);
line-height: 1.2;
padding-block: 8px;
transition: var(--transition-1);
}

.navbar-link:is(:hover, :focus) { color: var(--red-crayola); }

.header .btn { margin-block-start: 10px; }





/* #HEO */

.hero {
padding-block-start: calc(var(--section-padding) + 50px);
text-align: center;
}

.hero-content { margin-block-end: 30px; }

.hero-subtitle {
color: var(--eerie-black);
font-size: var(--fs-5);
font-weight: var(--fw-500);
}

.hero-title { margin-block: 12px 8px; }

.hero-text { font-size: var(--fs-5); }

.hero .btn {
margin-inline: auto;
margin-block-start: 20px;
}





/* #SERVICE */

.service { background-color: var(--white-2); }

.service .section-text { margin-block: 5px 35px; }

.service-card {
background-color: var(--white-1);
padding: 20px 15px;
border: 1px solid var(--platinum);
border-radius: var(--radius-5);
text-align: center;
box-shadow: var(--shadow-1);
transition: var(--transition-2);
}

.service-card:is(:hover, :focus-within) { transform: translateY(-10px); }

.service-card .card-icon {
color: var(--white-1);
font-size: 25px;
max-width: max-content;
margin-inline: auto;
padding: 18px;
border-radius: 50%;
}

.service-card .card-title { margin-block: 20px 8px; }

.service-card .card-text { font-size: var(--fs-6); }





/* #PROJECT */

.project .section-text { margin-block: 5px 35px; }

.project-card {
position: relative;
border-radius: var(--radius-8);
overflow: hidden;
}

.project-card::after {
content: "";
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: var(--black);
opacity: 0.5;
transition: var(--transition-2);
}

.project-card:is(:hover, :focus-within)::after { opacity: 0.8; }

.project-card .card-content {
position: absolute;
bottom: 0;
left: 0;
right: 0;
padding: 20px;
z-index: 1;
transition: var(--transition-2);
}

.project-card:is(:hover, :focus-within) .card-content { transform: translateY(-20px); }

.project-card .card-subtitle {
color: var(--lavender-gray);
font-size: var(--fs-6);
line-height: 1;
}

.project-card .card-title {
color: var(--white-1);
margin-block: 12px 15px;
}





/* #ABOUT */

.about { background-color: var(--white-2); }

.about-banner {
position: relative;
border-radius: var(--radius-5);
overflow: hidden;
margin-block-end: 25px;
}

.play-btn {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
background-color: var(--white-1);
color: var(--red-crayola);
font-size: 32px;
padding: 16px;
border-radius: 50%;
animation: pulse 1.5s ease-out infinite;
}

@keyframes pulse {
0% { box-shadow: 0 0 0 1px var(--white-1); }
100% { box-shadow: 0 0 0 25px transparent; }
}

.about :is(.section-title, .section-text) { text-align: left; }

.about .section-title { margin-block-end: 5px; }

.about .section-text:not(:last-child) { margin-block-end: 18px; }

.about .h3 { margin-block-end: 8px; }

.about-list { margin-block: 15px 18px; }

.about-item {
display: flex;
align-items: flex-start;
gap: 5px;
}

.about-item ion-icon {
color: var(--red-crayola);
flex-shrink: 0;
margin-block-start: 2px;
}

.about-item:not(:last-child) { margin-block-end: 12px; }





/* #CTA */

.cta {
position: relative;
background-repeat: no-repeat;
background-size: cover;
background-position: center;
background-attachment: fixed;
z-index: 1;
}

.cta::after {
content: "";
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-image: var(--gradient);
opacity: 0.95;
z-index: -1;
}

.cta-subtitle,
.cta .section-title { color: var(--white-1); }

.cta-subtitle {
font-size: var(--fs-6);
font-weight: var(--fw-500);
text-align: center;
}

.cta .section-title { margin-block: 12px 18px; }

.cta .btn { margin-inline: auto; }





/* #BLOG */

.blog .section-text { margin-block: 5px 35px; }

.blog-card { background-color: var(--white-2); }

.blog-card .card-banner { overflow: hidden; }

.blog-card .card-banner img { transition: var(--transition-2); }

.blog-card:is(:hover, :focus-within) .card-banner img { transform: scale(1.05); }

.blog-card .card-content { padding: 15px; }

.blog-card .time {
color: var(--red-crayola);
font-size: var(--fs-6);
line-height: 1;
margin-block-end: 10px;
}

.blog-card .card-title { transition: var(--transition-1); }

.blog-card .card-title:is(:hover, :focus) { color: var(--red-crayola); }





/* #CONTACT */

.contact { background-color: var(--white-2); }

.contact .section-text { margin-block: 5px 35px; }

.contact-form {
background-color: var(--white-1);
padding: 20px;
border-radius: var(--radius-2);
margin-block-end: 30px;
box-shadow: var(--shadow-1);
}

.input-field {
background-color: var(--white-2);
color: var(--eerie-black);
font-size: var(--fs-5);
padding: 15px;
border-radius: var(--radius-2);
outline: 1px solid transparent;
outline-offset: 0;
margin-block-end: 15px;
}

.input-field::-webkit-inner-spin-button { display: none; }

.input-field:focus { outline-color: var(--red-crayola); }

.input-field::placeholder { transition: var(--transition-1); }

.input-field:focus::placeholder { opacity: 0; }

textarea.input-field {
resize: vertical;
min-height: 80px;
height: 100px;
max-height: 200px;
overscroll-behavior: contain;
}

.checkbox {
width: max-content;
margin-block-start: 5px;
accent-color: var(--red-crayola);
}

.label-link {
display: inline-block;
color: var(--red-crayola);
}

.label-link:is(:hover, :focus) { text-decoration: underline; }

.checkbox-wrapper {
display: flex;
align-items: flex-start;
gap: 10px;
margin-block-end: 15px;
}

.checkbox-wrapper .label { font-size: var(--fs-6); }

.contact-list {
display: flex;
flex-wrap: wrap;
justify-content: center;
gap: 30px 25px;
}

.contact-item { min-width: 100%; }

.contact-card {
background-color: var(--white-1);
padding: 20px;
border-radius: var(--radius-2);
box-shadow: var(--shadow-1);
display: flex;
align-items: flex-start;
gap: 15px;
}

.contact-card .card-icon {
background-color: var(--cultured-2);
color: var(--red-crayola);
font-size: 25px;
padding: 13px;
border-radius: 50%;
transition: var(--transition-1);
}

.contact-card:is(:hover, :focus) .card-icon {
background-color: var(--red-crayola);
color: var(--white-1);
}

.contact-card .card-title { margin-block-end: 5px; }

.contact-card :is(.card-link, .card-address) {
font-size: var(--fs-6);
transition: var(--transition-1);
}

.contact-card .card-link:is(:hover, :focus) { color: var(--red-crayola); }





/* #FOOTER */

.footer {
background-color: var(--white-2);
padding-block: 20px;
}

.copyright {
font-size: var(--fs-6);
text-align: center;
}

.copyright-link {
color: var(--red-crayola);
font-weight: var(--fw-500);
display: inline-block;
}





/* #BACK TO TOP */

.back-top-btn {
position: fixed;
bottom: 10px;
right: 20px;
background-color: var(--eerie-black);
color: var(--white-1);
padding: 12px;
border-radius: 50%;
box-shadow: var(--shadow-2);
z-index: 4;
opacity: 0;
visibility: hidden;
transition: var(--transition-1);
}

.back-top-btn.active {
opacity: 1;
visibility: visible;
transform: translateY(-10px);
}

.back-top-btn:is(:hover, :focus) { opacity: 0.9; }





/* #MEDIA QUERIES */

/**
* responsive for larger than 575px screen
*/

@media (min-width: 575px) {

/**
 * REUSED STYLE
 */

.container {
  max-width: 540px;
  width: 100%;
  margin-inline: auto;
}

.grid-list {
  grid-template-columns: 1fr 1fr;
  column-gap: 25px;
}



/*
 * BLOG
 */

.blog .grid-list { grid-template-columns: 1fr; }

.blog-card.grid {
  display: grid;
  grid-template-columns: 0.47fr 1fr;
  align-items: center;
  gap: 10px;
}



/*
 * CONTACT
 */

.input-wrapper {
  display: flex;
  gap: 15px;
}

.contact-item { min-width: calc(50% - 18px); }

}





/*
* responsive for larger than 768px screen
*/

@media (min-width: 768px) {

/*
 * CUSTOM PROPERTY
 */

:root {

  /*
   * typography
   */

  --fs-1: 4.5rem;
  --fs-2: 3.7rem;
  --fs-3: 2.3rem;
  --fs-4: 1.8rem;
  --fs-5: 1.5rem;
  --fs-6: 1.4rem;

}



/*
 * REUSED STYLE
 */

.container { max-width: 720px; }

.section-text {
  max-width: 65ch;
  margin-inline: auto;
}



/*
 * HERO
 */

.hero-text {
  max-width: 60ch;
  margin-inline: auto;
}



/*
 * ABOUT
 */

.about-banner { max-width: 550px; }

.about .section-text {
  max-width: unset;
  margin-inline: 0;
}



/*
 * CONTACT
 */

.contact-form { padding: 30px; }

.contact-item { min-width: calc(50% - 12.5px); }

}





/*
* responsive for larger than 992px screen
*/

@media (min-width: 992px) {

/*
 * CUSTOM PROPERTY
 */

:root {

  /*
   * typography
   */

  --fs-1: 5rem;
  --fs-2: 4rem;
  --fs-3: 2.5rem;

  /*
   * spacing
   */

  --section-padding: 100px;

}


/*
 * REUSED STYLE
 */

.container { max-width: 960px; }

.grid-list { grid-template-columns: repeat(3, 1fr); }


/*
 * HEADER
 */

.nav-toggle-btn { display: none; }

.navbar,
.navbar.active { all: unset; }

.navbar-list {
  all: unset;
  display: flex;
  align-items: center;
  gap: 30px;
}

.navbar-link { position: relative; }

.navbar-link:is(:hover, :focus) { color: var(--eerie-black); }

.navbar-link::after {
  content: "";
  position: absolute;
  bottom: 5px;
  left: 0;
  width: 100%;
  height: 2px;
  background-image: var(--gradient);
  transform: scaleX(0);
  transform-origin: left;
  transition: var(--transition-2);
}

.navbar-link:is(:hover, :focus)::after { transform: scaleX(1); }

.header .btn { margin-block-start: 0; }



/*
 * HERO
 */

.hero .container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  gap: 30px;
  text-align: left;
}

.hero-content { margin-block-end: 0; }

.hero-subtitle {
  position: relative;
  padding-inline-start: 15px;
}

.hero-subtitle::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 2px;
  height: 100%;
  background-color: var(--red-crayola);
}

.hero-text,
.hero .btn { margin-inline: 0; }



/*
 * SERVICE
 */

.service-card { padding: 20px; }

.service-card .h3 { --fs-3: 2.3rem; }

/*
 * PROJECT
 */

.project-card .card-subtitle { --fs-6: 1.5rem; }


/*
 * ABOUT
 */

.about .container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  gap: 30px;
}

.about-banner { margin-block-end: 0; }

/*
 * BLOG
 */

.blog .grid-list {
  grid-template-columns: 1fr 1fr;
  row-gap: 20px;
}

.blog .grid-list > li:first-child {
  grid-column: 1 / 2;
  grid-row: 1 / 5;
}

.blog-card:not(.grid) { height: 100%; }

.blog-card .card-content { padding-block: 10px; }

.blog-card:not(.grid) .card-content { padding: 25px; }

.blog-card.grid .h3 { --fs-3: 2rem; }

.blog-card .time { --fs-6: 1.6rem; }

/*
 * CONTACT
 */

.checkbox-wrapper { margin-block: 20px; }

.contact-item { min-width: calc(33.33% - 16.66px); }

.contact-card { padding: 30px; }

.contact-card .card-icon { font-size: 32px; }

}





/*
* responsive for larger than 1200px screen
*/

@media (min-width: 1200px) {

/*
 * CUSTOM PROPERTY
 */

:root {

  /*
   * typography
   */

  --fs-1: 6.8rem;
  --fs-2: 4.5rem;
  --fs-4: 1.9rem;
  --fs-5: 1.6rem;
  --fs-6: 1.6rem;

}



/*
 * REUSED STYLE
 */

.container { max-width: 1140px; }

.btn { --fs-6: 1.5rem; }



/*
 * SERVICE
 */

.service-card { padding: 30px; }

.service-card .h3 { --fs-3: 2.5rem; }



/*
 * PROJECT
 */

.project-card .card-content { padding: 30px; }

.project-card .card-subtitle { --fs-6: 1.6rem; }



/*
 * ABOUT
 */

.about .container { gap: 60px; }

.about-item { gap: 7px; }

.about-item ion-icon { font-size: 20px; }



/*
 * CTA
 */

.cta .section-title { margin-block: 15px 24px; }



/*
 * BLOG
 */

.blog-card .time { --fs-6: 1.6rem; }

.blog-card.grid .h3 { --fs-3: 2.4rem; }



/*
 * CONTACT
 */

.contact-form { padding: 50px; }

.contact-card { gap: 20px; }

.contact-card .card-icon { padding: 15px; }

}

/* nav Profile design */
.nav-profile img{
  width:40px;
  height: 40px;
  border-radius:50px
}
  </style>

  <!-- Java Script -->
  <script>
    'use strict';

/**
 * add event on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * toggle navbar
 */

const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const navToggler = document.querySelector("[data-nav-toggler]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  navToggler.classList.toggle("active");
}

addEventOnElem(navToggler, "click", toggleNavbar);

const closeNavbar = function () {
  navbar.classList.remove("active");
  navToggler.classList.remove("active");
}

addEventOnElem(navbarLinks, "click", closeNavbar);



/**
 * header active
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function () {
  if (window.scrollY > 100) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});
 </script>
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">Digitalpark CRM</a>

      <nav class="navbar container" data-navbar>
        <ul class="navbar-list">

          <li>
            <a href="#home" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li>
            <a href="#about" class="navbar-link" data-nav-link>About Us</a>
          </li>

          <li>
            <a href="#service" class="navbar-link" data-nav-link>Services</a>
          </li>

          <li>
            <a href="#service" class="navbar-link" data-nav-link>Price</a>
          </li>

          <li>
            <a href="#project" class="navbar-link" data-nav-link>Project</a>
          </li>

          <li>
            <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
          </li>

          <li>
            <a href="#contact" class="navbar-link" data-nav-link>Contact Us</a>
          </li>

          <li>
            <a href="profile.php" class="navbar-link">
              <div class="nav-profile">
              <?php
               echo '<img class="img-thumbnail" id="profile-image" src="uploaded_img/'.$arrayData['image'].'">'
             ?></div></a>
          </li>

        </ul>
      </nav>

      <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
        <ion-icon name="menu-outline" class="open"></ion-icon>
        <ion-icon name="close-outline" class="close"></ion-icon>
      </button>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home" aria-label="hero">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">DigitalSpark CRM - Web Development & Marketing Company</p>

            <h1 class="h1 hero-title">Grow Your Business With DigitalSpark CRM</h1>

            <p class="hero-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporthem incididunt ut labore et
              dolore magna
              aliqua.
            </p>

            <a href="#" class="btn btn-primary">Get Started</a>

          </div>

          <figure class="hero-banner">
            <img src="images/hero-banner.png" width="720" height="673" alt="hero banner" class="w-100">
          </figure>

        </div>
      </section>





      <!-- #SERVICE -->

      <section class="section service" id="service" aria-label="service">
        <div class="container">

          <h2 class="h2 section-title">Services We Provided</h2>

          <p class="section-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna.
          </p>

          <ul class="grid-list">

            <li>
              <div class="service-card">

                <div class="card-icon" style="background-color: #13c4a1">
                  <ion-icon name="desktop"></ion-icon>
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Web Development</a>
                </h3>

                <p class="card-text">
                  Sed ut perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudantium, totam rem
                  aperiam, eaque
                  ipsa quae.
                </p>



              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon" style="background-color: #6610f2">
                  <ion-icon name="chatbox"></ion-icon>
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Digital Marketing</a>
                </h3>

                <p class="card-text">
                  Sed ut perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudantium, totam rem
                  aperiam, eaque
                  ipsa quae.
                </p>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon" style="background-color: #ffb700">
                  <ion-icon name="bulb"></ion-icon>
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">SEO</a>
                </h3>

                <p class="card-text">
                  Sed ut perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudantium, totam rem
                  aperiam, eaque
                  ipsa quae.
                </p>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon" style="background-color: #fc3549">
                  <ion-icon name="phone-portrait"></ion-icon>
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">PPC</a>
                </h3>

                <p class="card-text">
                  Sed ut perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudantium, totam rem
                  aperiam, eaque
                  ipsa quae.
                </p>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon" style="background-color: #00d280">
                  <ion-icon name="archive"></ion-icon>
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Email Marketing</a>
                </h3>

                <p class="card-text">
                  Sed ut perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudantium, totam rem
                  aperiam, eaque
                  ipsa quae.
                </p>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon" style="background-color: #E0115F">
                  <ion-icon name="build"></ion-icon>
                </div>

                <h3 class="h3">
                  <a href="#" class="card-title">Marketing & Reporting</a>
                </h3>

                <p class="card-text">
                  Sed ut perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudantium, totam rem
                  aperiam, eaque
                  ipsa quae.
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- #PROJECT -->

      <section class="section project" id="project" aria-label="project">
        <div class="container">

          <h2 class="h2 section-title">Our Recent Projects</h2>

          <p class="section-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna
            aliqua.
          </p>

          <ul class="grid-list">

            <li>
              <div class="project-card">

                <figure class="card-banner img-holder" style="--width: 510; --height: 700;">
                  <img src="images/project-1.jpg" width="510" height="700" loading="lazy"
                    alt="Designing a better cinema experience" class="img-cover">
                </figure>

                <div class="card-content">

                  <p class="card-subtitle">Website Design & Development</p>

                  <h3 class="h3">
                    <a href="#" class="card-title">Real Estate</a>
                  </h3>

                  <a href="#" class="btn btn-primary">View Details</a>

                </div>

              </div>
            </li>

            <li>
              <div class="project-card">

                <figure class="card-banner img-holder" style="--width: 510; --height: 700;">
                  <img src="images/project-2.jpg" width="510" height="700" loading="lazy"
                    alt="Building design process within teams" class="img-cover">
                </figure>

                <div class="card-content">

                  <p class="card-subtitle">Website Design & Development</p>

                  <h3 class="h3">
                    <a href="#" class="card-title">Doctor Appointment Booking </a>
                  </h3>

                  <a href="#" class="btn btn-primary">View Details</a>

                </div>

              </div>
            </li>

            <li>
              <div class="project-card">

                <figure class="card-banner img-holder" style="--width: 510; --height: 700;">
                  <img src="images/project-3.jpg" width="510" height="700" loading="lazy"
                    alt="How intercom brings play into their design process" class="img-cover">
                </figure>

                <div class="card-content">

                  <p class="card-subtitle">Website Design & Development</p>

                  <h3 class="h3">
                    <a href="#" class="card-title">E-Commerce</a>
                  </h3>

                  <a href="#" class="btn btn-primary">View Details</a>

                </div>

              </div>
            </li>

            <li>
              <div class="project-card">

                <figure class="card-banner img-holder" style="--width: 510; --height: 700;">
                  <img src="images/project-4.jpg" width="510" height="700" loading="lazy"
                    alt="Stuck with to-do list, I created a new app for" class="img-cover">
                </figure>

                <div class="card-content">

                  <p class="card-subtitle">Digital Marketing</p>

                  <h3 class="h3">
                    <a href="#" class="card-title">Search engine optimization (SEO)</a>
                  </h3>

                  <a href="#" class="btn btn-primary">View Details</a>

                </div>

              </div>
            </li>

            <li>
              <div class="project-card">

                <figure class="card-banner img-holder" style="--width: 510; --height: 700;">
                  <img src="images/project-5.jpg" width="510" height="700" loading="lazy"
                    alt="Examples of different types of sprints" class="img-cover">
                </figure>

                <div class="card-content">

                  <p class="card-subtitle">Digital Marketing</p>

                  <h3 class="h3">
                    <a href="#" class="card-title">Search engine optimization (SEO)</a>
                  </h3>

                  <a href="#" class="btn btn-primary">View Details</a>

                </div>

              </div>
            </li>

            <li>
              <div class="project-card">

                <figure class="card-banner img-holder" style="--width: 510; --height: 700;">
                  <img src="images/project-6.jpg" width="510" height="700" loading="lazy"
                    alt="Redesigning the New York times app" class="img-cover">
                </figure>

                <div class="card-content">

                  <p class="card-subtitle">Digital Marketing</p>

                  <h3 class="h3">
                    <a href="#" class="card-title">Search engine optimization (SEO)</a>
                  </h3>

                  <a href="#" class="btn btn-primary">View Details</a>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- #ABOUT -->

      <section class="section about" id="about" aria-label="about">
        <div class="container">

          <div class="about-banner img-holder" style="--width: 720; --height: 960;">
            <img src="images/about-banner.jpg" width="720" height="960" loading="lazy" alt="about banner"
              class="img-cover">

            <button class="play-btn" aria-label="Play video">
              <ion-icon name="play" aria-hidden="true"></ion-icon>
            </button>
          </div>

          <div class="about-content">

            <h2 class="h2 section-title">About Us</h2>

            <p class="section-text">
              Lorem ipsum dolor sit amet, con se ctetur adipiscing elit. In sagittis eg esta ante, sed viverra nunc
              tinci dunt nec
              elei fend et tiram.
            </p>

            <h3 class="h3">Who We Are</h3>

            <p class="section-text">
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
              rem aperiam,
              eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            </p>

            <h3 class="h3">Our Success</h3>

            <ul class="about-list">

              <li class="about-item">
                <ion-icon name="checkmark-circle" aria-hidden="true"></ion-icon>

                <p class="section-text">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                </p>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-circle" aria-hidden="true"></ion-icon>

                <p class="section-text">
                  It is a long established fact that a reader will be distracted by the readable content of a page when
                  looking at its
                  layout.
                </p>
              </li>

              <li class="about-item">
                <ion-icon name="checkmark-circle" aria-hidden="true"></ion-icon>

                <p class="section-text">
                  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                  classical Latin
                  literature.
                </p>
              </li>

            </ul>

            <h3 class="h3">Our Mission</h3>

            <p class="section-text">
              At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
              atque corrupti
              quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in.
            </p>

          </div>

        </div>
      </section>





      <!-- #CTA -->

      <section class="section cta" aria-label="cta" style="background-image: url('images/cta-bg.jpg')">
        <div class="container">

          <p class="cta-subtitle"></p>

          <h2 class="h2 section-title">Are You Ready? Let's get to Work!</h2>

          <a href="#" class="btn btn-secondary">Get Started</a>

        </div>
      </section>





      <!-- #BLOG -->

      <section class="section blog" id="blog" aria-label="blog">
        <div class="container">

          <h2 class="h2 section-title">Latest Articles Updated Weekly</h2>

          <p class="section-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna
            aliqua.
          </p>

          <ul class="grid-list">

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder" style="--width: 860; --height: 646;">
                  <img src="images/blog-1.jpg" width="860" height="646" loading="lazy"
                    alt="How to Become a Successful Entry Level UX Designer" class="img-cover">
                </figure>

                <div class="card-content">

                  <time class="time" datetime="2022-06-16">June 16, 2023</time>

                  <h3 class="h3">
                    <a href="#" class="card-title">How to Become a Successful Entry Level UX Designer</a>
                  </h3>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card grid">

                <figure class="card-banner img-holder" style="--width: 860; --height: 646;">
                  <img src="images/blog-2.jpg" width="860" height="646" loading="lazy"
                    alt="2022 Local SEO Success: The Year of Everywhere" class="img-cover">
                </figure>

                <div class="card-content">

                  <time class="time" datetime="2022-06-16">June 16, 2023</time>

                  <h3 class="h3">
                    <a href="#" class="card-title">2023 Local SEO Success: The Year of Everywhere</a>
                  </h3>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card grid">

                <figure class="card-banner img-holder" style="--width: 860; --height: 646;">
                  <img src="images/blog-3.jpg" width="860" height="646" loading="lazy"
                    alt="The Guide to Running a Client Discovery Process" class="img-cover">
                </figure>

                <div class="card-content">

                  <time class="time" datetime="2022-06-16">June 16, 2023</time>

                  <h3 class="h3">
                    <a href="#" class="card-title">The Guide to Running a Client Discovery Process</a>
                  </h3>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card grid">

                <figure class="card-banner img-holder" style="--width: 860; --height: 646;">
                  <img src="images/blog-4.jpg" width="860" height="646" loading="lazy"
                    alt="3 Ways to Get Client Approval for Scope Changes" class="img-cover">
                </figure>

                <div class="card-content">

                  <time class="time" datetime="2022-06-16">June 16, 2023</time>

                  <h3 class="h3">
                    <a href="#" class="card-title">3 Ways to Get Client Approval for Scope Changes</a>
                  </h3>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card grid">

                <figure class="card-banner img-holder" style="--width: 860; --height: 646;">
                  <img src="images/blog-5.jpg" width="860" height="646" loading="lazy"
                    alt="Top 21 Must-Read Blogs For Creative Agencies" class="img-cover">
                </figure>

                <div class="card-content">

                  <time class="time" datetime="2022-06-16">June 16, 2023</time>

                  <h3 class="h3">
                    <a href="#" class="card-title">Top 21 Must-Read Blogs For Creative Agencies</a>
                  </h3>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>




 <!-- sgiuashfdusahushfsiufhsufsfiushfsuhfsiufsufhsusfushfsufhsufh -->

      <!-- #CONTACT-->

      <section class="section contact" id="contact" aria-label="contact">
        <div class="container">

          <h2 class="h2 section-title">Let's Contact With Us</h2>

          <p class="section-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna
            aliqua.
          </p>

          <form action="" method="post" class="contact-form">

            <div class="input-wrapper">
              <input type="text" name="contact_name" aria-label="name" placeholder="Your name*" required class="input-field">

              <input type="email" name="contact_email" aria-label="email" placeholder="Email address*" required
                class="input-field">
            </div>

            <div class="input-wrapper">
              <input type="text" name="contact_subject" aria-label="subject" placeholder="Subject" class="input-field">

              <input type="number" name="contact_phone" aria-label="phone" placeholder="Phone number" class="input-field">
            </div>

            <textarea name="contact_message" aria-label="message" placeholder="Your message...*" required
              class="input-field"></textarea>

            <div class="checkbox-wrapper">
              <input type="checkbox" name="terms_and_policy" id="terms" required class="checkbox">

              <label for="terms" class="label">
                Accept <a href="#" class="label-link">Terms of Services</a> and <a href="#" class="label-link">Privacy
                  Policy</a>
              </label>
            </div>

            <button type="submit" name="contact_send" class="btn btn-primary">Send Message</button>

          </form>

          <ul class="contact-list">

            <li class="contact-item">
              <div class="contact-card">

                <div class="card-icon">
                  <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
                </div>

                <div class="card-content">

                  <h3 class="h3 card-title">Mail Here</h3>

                  <a href="mailto:hello@digiatsparksolutions.com" class="card-link">hello@digiatsparkcrm.com</a>
                  <a href="mailto:info@digiatsparksolutions.com" class="card-link">info@digiatsparkcrm.com</a>

                </div>

              </div>
            </li>

            <li class="contact-item">
              <div class="contact-card">

                <div class="card-icon">
                  <ion-icon name="map-outline" aria-hidden="true"></ion-icon>
                </div>

                <div class="card-content">

                  <h3 class="h3 card-title">Visit Here</h3>

                  <address class="card-address">
                   Sylhet, Bangladesh<br>
                  </address>

                </div>

              </div>
            </li>

            <li class="contact-item">
              <div class="contact-card">

                <div class="card-icon">
                  <ion-icon name="headset-outline" aria-hidden="true"></ion-icon>
                </div>

                <div class="card-content">

                  <h3 class="h3 card-title">Call Here</h3>

                  <a href="tel:+880 1781-555000" class="card-link">+880 1781-555000</a>
                  <a href="tel:+880 1781-555000" class="card-link">+880 1781-555000</a>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>

    </article>
  </main>





  <!-- #FOOTER-->

  <footer class="footer">
    <div class="container">

      <p class="copyright">
        &copy; 2023 All Rights Reserved by <a href="#" class="copyright-link">Shahariar Masud (Manna)</a>
      </p>

    </div>
  </footer>





  <!-- #BACK TO TOP -->

  <a href="#top" aria-label="back to top" data-back-top-btn class="back-top-btn">
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>

  <!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>