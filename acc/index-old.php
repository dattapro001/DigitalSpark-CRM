<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Index</title>
    <style>
        body{
           background: linear-gradient(to left, #ff61d2, #fe9090);
        }

        .container-fluid{
          display: inline-block;
          margin-top:50px;
          width:1300px;
          height:650px;
          margin-left: 90px;
          border: 1px solid rgb(235, 233, 233);
          background: linear-gradient(
             111.29deg,
            rgba(255, 255, 255, 0.53) -1.83%,
            rgba(255, 255, 255, 0) 109.95%
           );
         box-shadow: 50px 60px 100px rgba(0, 0, 0, 0.05);
          border-radius:40px;
        }
        :root{
            
           --safety-orange: hsl(25, 100%, 50%);
           --persian-rose: hsl(328, 100%, 59%);
           --red-crayola: hsl(341, 100%, 49%);
        }
        .feat-img{
            position: relative;
            margin-left:630px;
            animation: animate 2s infinite alternate;
        }
        @keyframes animate{
            0%   {left:0px; top:0px;}
            100%  {left:100px; top:0px;}
           }
        .logo-name{
         font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
         font-size: 2rem;
         color: aqua;
        }
        .text{
            font-size: 4rem;
            display: flex;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-right: 5px solid;
            overflow: hidden;
            white-space: nowrap;
            width: 545px ;
            margin-left: 20px;
            margin-top:-250px;
            color: var(--persian-rose);
            animation: typing 6s,
            cursor 1s infinite alternate;
        }
        /* Cursor animation */
        @keyframes cursor{
            50%{border-color: transparent}
        }
        /* typing effect */
        @keyframes typing {
            from{width: 0; }
            to{width: 100;}
        }
        @keyframes scaleImage {
         from {transform: scale(1);} /* Original size */
          to {transform: scale(0.9);} /* Slightly smaller than the original size */
          }
        .title{
            color: var(--red-crayola) ;
            margin-top: 10px ;
            margin-left: 20px;
            width: 400px;
            font-size: 2rem;
        }
        .title span{
            display: inline-block;
            animation: rotateLetter 2s linear infinite;
        }
        @keyframes rotateLetter {
          0% {transform: scale(1);} /* Original size */
          50%{transform: scale(0.85);} /* Slightly smaller than the original size */
          100%{transform: scale(1);}
        }
        .details{
            margin-top:50px;
            margin-left: 20px;
            color: #740e57;
            font-size: 1.1rem;
        }
       .btn{
        background-color: var(--safety-orange);
        width: 120px;
        height: 60px;
        margin-left: 20px;
        font-family:fantasy;
        font-size: 20px;
       }
       .dropdown ul{
        background-color: rgb(189, 130, 47);
       }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
    <div class="img-wrapper">
          <img src="images/image1.png" width="400px" class="feat-img">
        </div>
    <div>
        <p class="text"><b>DigitalSpark CRM</b></p>
        
        <h1 class="title"><span>M</span><span>a</span><span>n</span><span>n</span><span>g</span><span>e</span> <span>Y</span><span>o</span><span>u</span><span>r</span> <span>P</span><span>r</span><span>o</span><span>j</span><span>e</span><span>c</span><span>t</span> 
            <span>W</span><span>i</span><span>t</span><span>h</span> <span>D</span><span>i</span><span>g</span><span>i</span><span>t</span><span>a</span><span>l</span><span>S</span><span>p</span><span>a</span><span>r</span><span>k</span>
            <span>C</span><span>R</span><span>M</span>
        </h1>
            <p class="details"><b>DigitalSpark CRM is customer relationship management software suitable for use by IT companies or freelancers. 
                DigitalSpark CRM can help you appear more professional to your customers and improve business performance at the same time.</b></p>
    </div>
                <div class="dropdown dropend">
                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                      Join Us
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item drop-item" href="admin-login.php"><b>Admin</b></a></li>
                        <li><a class="dropdown-item drop-item" href="login.php"><b>Client</b></a></li>
                        <li><a class="dropdown-item drop-item" href="dev-login.php"><b>Developer</b></a></li>
                    </ul>
                </div>
    </div>
    </div>
    </div>
            <!-- ICON Link -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>