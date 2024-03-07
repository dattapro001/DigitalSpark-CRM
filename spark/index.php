<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>DigitalSpark CRM</title>

    <link href='https://fonts.googleapis.com/css?family=Timmana' rel='stylesheet'>


    <style>
        body{
            font-family: 'Timmanna' !important;
        }
        .blue-bg {
            background-color: rgb(46, 36, 135);
            padding: 20px;
            border-radius: 0px 500px 500px 300px;
            margin-left: -60px;
            width: 630px;
            height: 640px;
        }

        .text {
            font-size: 4rem;
            display: flex;
            border-right: 5px solid;
            height: 70px;
            overflow: hidden;
            white-space: nowrap;
            width: 450px;
            margin-left: 0px;
            margin-top: -250px;
            animation: typing 6s, cursor 1s infinite alternate;
        }

        /* Cursor animation */
        @keyframes cursor {
            50% { border-color: transparent }
        }

        /* typing effect */
        @keyframes typing {
            from { width: 0; }
            to { width: 100; }
        }

        .animate-from-bottom {
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInFromBottom 2s ease-out forwards;
        }

        @keyframes fadeInFromBottom {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .button {
            display: inline-block;
            font-size: 16px;
            height: 40px;
            text-align: center;
            text-decoration: none;
            border-radius: 0px 500px 500px 300px;
            color: #fff;
            background: linear-gradient(to right, #05b20e 50%, rgb(0, 255, 128) 50%);
            background-size: 200% 100%;
            transition: background-position 0.6s;
            margin-left: -90px;
        }

        .button:hover {
            background-position: -100% 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="position: relative;">
        <div class="col-md-12">
            <div class="container col-md-12">
                <div class="row">
                    <!-- Blue background for the text side with rounded right border -->
                    <div class="col-md-6 blue-bg">
                        <h1 class="text" style="margin-top: 120px;color: #ffffff; font-family: 'Timmana';">DigitalSpark CRM</h1>
                        <p class="mt-2 animate-from-bottom" style="color: #ffffff; font-family: 'Timmana'; font-size: 20px;">DigitalSpark CRM is customer relationship management software suitable for use by IT companies or freelancers.
                            DigitalSpark CRM can help you appear more professional to your customers and improve business performance at the same time.</p>

                        <div class="d-flex " style="position: absolute;">
                            <div class="dropdown dropend" style="margin-left: 340px; margin-top:-40px; font-family: 'Timmana';">
                                <button type="button" class=" button btn dropdown-toggle" data-bs-toggle="dropdown">
                                    Join Us
                                </button>
                                <ul class="dropdown-menu" style="background-color: #54bd59; font-family: 'Timmana';">
                                    <li><a class="dropdown-item drop-item" href="admin-login.php">Admin</a></li>
                                    <li><a class="dropdown-item drop-item" href="manager-login.php">Project-Manager</a></li>
                                    <li><a class="dropdown-item drop-item" href="dev-login.php">Developer</a></li>
                                    <li><a class="dropdown-item drop-item" href="client-login.php">Client</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- White background for the image side -->
                    <div class="col-md-6">
                        <img src="images/CRM.jpg" class="mt-5 bg-info" style="width: 600px; height: 500px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
