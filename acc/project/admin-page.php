<?php 
  include "config.php";
  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("Location: admin-login.php");
    die();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>DigitalSpark CRM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

  

  <!-- Chart link -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    :root {
  --bs-blue: #63B3ED;
  --bs-indigo: #596CFF;
  --bs-purple: #6f42c1;
  --bs-pink: #d63384;
  --bs-red: #F56565;
  --bs-orange: #fd7e14;
  --bs-yellow: #FBD38D;
  --bs-green: #81E6D9;
  --bs-teal: #20c997;
  --bs-cyan: #0dcaf0;
  --bs-white: #fff;
  --bs-gray: #6c757d;
  --bs-gray-dark: #343a40;
  --bs-gray-100: #f8f9fa;
  --bs-gray-200: #f0f2f5;
  --bs-gray-300: #dee2e6;
  --bs-gray-400: #ced4da;
  --bs-gray-500: #adb5bd;
  --bs-gray-600: #6c757d;
  --bs-gray-700: #495057;
  --bs-gray-800: #343a40;
  --bs-gray-900: #212529;
  --bs-primary: #e91e63;
  --bs-secondary: #7b809a;
  --bs-success: #4CAF50;
  --bs-info: #1A73E8;
  --bs-warning: #fb8c00;
  --bs-danger: #F44335;
  --bs-light: #f0f2f5;
  --bs-dark: #344767;
  --bs-white: #fff;
  --bs-dark-blue: #1A237E;
  --bs-primary-rgb: 233, 30, 99;
  --bs-secondary-rgb: , 128, 154;
  --bs-success-rgb: 76, 175, 80;
  --bs-info-rgb: 26, 115, 232;
  --bs-warning-rgb: 251, 140, 0;
  --bs-danger-rgb: 244, 67, 53;
  --bs-light-rgb: 240, 242, 245;
  --bs-dark-rgb: 52, 71, 103;
  --bs-white-rgb: 255, 255, 255;
  --bs-dark-blue-rgb: 26, 35, 126;
  --bs-white-rgb: 255, 255, 255;
  --bs-black-rgb: 0, 0, 0;
  --bs-body-color-rgb: , 128, 154;
  --bs-body-bg-rgb: 255, 255, 255;
  --bs-font-sans-serif: "Roboto", Helvetica, Arial, sans-serif;
  --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
  --bs-body-font-family: var(--bs-font-sans-serif);
  --bs-body-font-size: 1rem;
  --bs-body-font-weight: 400;
  --bs-body-line-height: 1.5;
  --bs-body-color: #7b809a;
  --bs-body-bg: #fff;
  --bs-border-width: 1px;
  --bs-border-style: solid;
  --bs-border-color: #dee2e6;
  --bs-border-color-translucent: rgba(0, 0, 0, 0.175);
  --bs-border-radius: 0.375rem;
  --bs-border-radius-sm: 0.125rem;
  --bs-border-radius-lg: 0.5rem;
  --bs-border-radius-xl: 0.75rem;
  --bs-border-radius-2xl: 1rem;
  --bs-border-radius-pill: 50rem;
  --bs-link-color: #e91e63;
  --bs-link-hover-color: #e91e63;
  --bs-code-color: #d63384;
  --bs-highlight-bg: #fcf8e3;
    }
    .nav {
      background-color: rgb(0,0,0,0.8); 
      margin-left: -20px;
      
    }

    .nav-link.active,
    .nav-link:active {
      background-color: deeppink !important;
      margin-left: 8px;
      width: 230px;
    }

body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: url('images/admin-bg.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover; 
  padding: 0 10px;
}

.client-container .back-icon{
  color:white;
  font-size: 1.5rem;
  padding: 20px;
}

.users-list::-webkit-scrollbar { 
  display: none; 
 } 

/* Client Section */
.container-fluid .users .search input{
  position: absolute;
  height: 42px;
  width: calc(100% - 50px);
  font-size: 16px;
  padding: 0 200px;
  margin-left: -530px;
  margin-top:-20px;
  border: 5px solid #646161;
  outline: none;
  border-radius: 5px 0 0 5px;
  opacity: 0;
  pointer-events: none;
  transition: all 0.2s ease;
}
.container-fluid .users .search input.show{
  opacity: 1;
  pointer-events: auto;
}
.container-fluid .users .search button{
  position: relative;
  z-index: 1;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: #fff;
  color: black;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.2s ease;
}
.container-fluid .users .search button.active{
  background: black;
  color: #fff;
}
.container-fluid .search button.active i::before{
  content: '\f00d';
}

 .container-fluid .users-list  .status-dot .button{
  font-size: 14px;
  background-color: green;
}

.container-fluid .users-list .status-dot .button.offline{
   background-color: white;
} 


/* developer Section */
.container-fluid .users .dev-search input{
  position: absolute;
  height: 42px;
  width: calc(100% - 50px);
  font-size: 16px;
  padding: 0 200px;
  margin-left: -545px;
  margin-top:-20px;
  border: 5px solid #646161;
  outline: none;
  border-radius: 5px 0 0 5px;
  opacity: 0;
  pointer-events: none;
  transition: all 0.2s ease;
}
.container-fluid .users .dev-search input.show{
  opacity: 1;
  pointer-events: auto;
}
.container-fluid .users .dev-search button{
  position: relative;
  z-index: 1;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: #fff;
  color: black;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.2s ease;
}
.container-fluid .users .dev-search button.active{
  background: black;
  color: #fff;
}
.container-fluid .dev-search button.active i::before{
  content: '\f00d';
}

.container .dev-users-list  .status-dot .button{
  background-color: green;

}

.container-fluid .dev-users-list .status-dot .button.offline{
   background-color: white;
} 

.dev-users-list::-webkit-scrollbar { 
  display: none; 
 }

.container .dev-users-list a .status-dot .button.offline{
   background-color: white;
} 

/* Suspend Section */
.container-fluid .users .suspend-search input{
  position: absolute;
  height: 42px;
  width: calc(80% - 68px);
  font-size: 16px;
  padding: 0 200px;
  margin-left: -545px;
  margin-top:-20px;
  border: 5px solid #646161;
  outline: none;
  border-radius: 5px 0 0 5px;
  opacity: 0;
  pointer-events: none;
  transition: all 0.2s ease;
}
.container-fluid .users .suspend-search input.show{
  opacity: 1;
  pointer-events: auto;
}
.container-fluid .users .suspend-search button{
  position: relative;
  z-index: 1;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: #fff;
  color: black;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.2s ease;
}
.container-fluid .users .suspend-search button.active{
  background: black;
  color: #fff;
}
.container-fluid .suspend-search button.active i::before{
  content: '\f00d';
}

.container .suspend-list a .status-dot .button{
  background-color: green;

}

.suspend-list::-webkit-scrollbar { 
  display: none; 
 }

.container .suspendlist a .status-dot .button.offline{
   background-color: white;
} 
  </style>
  
</head>
<body>

<div class="container-fluid mt-1">
  <div class="row">
    <!-- Nav pills -->
    <div class="" id="sidebar" style="height: 600px; width: 250px;">
      <ul class="nav nav-pills flex-column h-100 mt-1" style="border-radius: 10px; " role="tablist">
        <header class="d-flex justify-content-center align-items-center mt-5">
          <p class=" " style="font-family: ‘Aclonica’;font-size: 22px; color: aliceblue; margin-top:-20px;">CRM SYSTEM</p>
        </header>
        <li class="nav-item mt-4">
          <a class="nav-link active d-flex text-light" data-bs-toggle="pill" href="#Deshboard"><i class="fa fa-bar-chart px-4" style="font-size:24px"></i>Deshboard</a>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link d-flex text-light" data-bs-toggle="pill" href="#Clients"><i class="fa fa-user px-4" style="font-size:24px;"></i>Clients</a>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link d-flex text-light" data-bs-toggle="pill" href="#Developers"><i class="fa fa-keyboard-o px-4" style="font-size:24px"></i>Developers</a>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link d-flex text-light" data-bs-toggle="pill" href="#menu2"><i class="fa fa-file-invoice px-4" style="font-size:24px"></i>Billing</a>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link d-flex text-light" data-bs-toggle="pill" href="#menu2"><i class="fa fa-project-diagram px-4" style="font-size:24px"></i>Projects</a>
        </li>
        <li class="nav-item mt-5">
          <header class="d-flex justify-content-center">
            <p class=" py-2 bg-light d-flex justify-content-center" style=" margin-left: -80px; width: 230px; height: 40px; border-radius: 5px;">
            <i class="fa fa-cogs" style="font-size:24px; margin-left: -140px;"></i><p style="margin-left: -140px; margin-top: 10px;"><b>Settings</b></p></p>
          </header>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex text-light" data-bs-toggle="pill" href="#suspend"><i class="fas fa-database px-4" style="font-size: 24px;"></i>Block-List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex text-light" data-bs-toggle="modal" data-bs-target="#logout" style="cursor:pointer;">
          <i class="fas fa-sign-out-alt px-4" style="font-size: 24px;"></i>Logout</a>
        </li>
      </ul>
        
    </div>

    <!-- Tab panes -->
    <div class="col-md-9">
      <div class="tab-content">
        <div id="Deshboard" class="container tab-pane active">

             <div class="d-flex" style="margin-left: -15px;">

                <div class="mt-5">
            <div class="card mx-2" style="background-color: var(--bs-code-color); border-radius: 10px; width: 
            65px; height: 60px; z-index: 2;  margin-top: -20px; position: absolute;">
              <i class="fa fa-street-view d-flex justify-content-center mt-3" style="font-size:24px; color: var(--bs-body-bg);"></i>
              </div>
         <div class="card" style="width: 200px; height: 100px; background-color: var(--bs-gray-100); z-index: 1;
              box-shadow: 2px 2px 2px 2px var(--bs-code-color); ">
              <p class="d-flex justify-content-end mx-2 text-dark"
               style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Total Clients</p>
              <span class="d-flex justify-content-end mx-3 text-dark" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> 30</span>
         </div>
         </div>

           <div class="mt-5 mx-5">
         <div class="card " style="background-color: var(--bs-success); margin-left: 9px; border-radius: 10px; width: 
         65px; height: 60px; z-index: 2;  margin-top: -20px; position: absolute;">
           <i class="fa fa-group d-flex justify-content-center mt-3" style="font-size:24px; color: var(--bs-body-bg);"></i>
           </div>
      <div class="card" style="width: 200px; height: 100px; background-color: var(--bs-gray-100); z-index: 1;
            box-shadow: 2px 2px 2px 2px var(--bs-code-color);">
           <p class="d-flex justify-content-end mx-1 text-dark" 
           style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Total Developers</p>
           <span class="d-flex justify-content-end mx-3 text-dark" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> 30</span>
      </div>
      </div>

    <div class="mt-5 mx-2">
        <div class="card" style="background-color: var(--bs-dark); margin-left: 7px; border-radius: 10px; width: 
        65px; height: 60px; z-index: 2;  margin-top: -20px; position: absolute;">
          <i class="fa fa-money d-flex justify-content-center mt-3" style="font-size:24px; color: var(--bs-body-bg);"></i>
          </div>
     <div class="card " style="width: 200px; height: 100px; background-color: var(--bs-gray-100); z-index: 1;
           box-shadow: 2px 2px 2px 2px var(--bs-code-color)">
          <p class="d-flex justify-content-end mx-1 text-dark" 
          style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Total Revenue</p>
          <span class="d-flex justify-content-end mx-3 text-dark" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> $30</span>
     </div>
     </div>

   <div class="mt-5 mx-3">
    <div class="card" style="background-color: var(--bs-indigo); margin-left: 32px; border-radius: 10px; width: 
    65px; height: 60px; z-index: 2;  margin-top: -20px; position: absolute;">
      <i class="fa fa-handshake-o d-flex justify-content-center mt-3" style="font-size:24px; color: var(--bs-body-bg);"></i>
      </div>
 <div class="card mx-4" style="width: 200px; height: 100px; background-color: var(--bs-gray-100); z-index: 1;
       box-shadow: 2px 2px 2px 2px var(--bs-code-color)">
      <p class="d-flex justify-content-end mx-1 text-dark" 
      style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Total Sales</p>
      <span class="d-flex justify-content-end mx-3 text-dark" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> 30</span>
    </div>
    </div>

    <!-- d-flex div -->
    </div> 

         <!-- Graph Part -->
        <div class="d-flex" style="margin-left: -15px;">
            <div class="mt-5">
                <div class="card mt-3" style="background-color: rgb(255,20,147,0.7); border-radius: 10px; width: 
                  285px; height: 170px; z-index: 2; margin-left: 12px;  margin-top: -20px; position: absolute; ">

                  <!-- Bar Chart -->

                  <div style="width: 100%; height: 100%; margin-top: 30px;">
                    <canvas id="myChart"></canvas>
                  </div>

                  <script>
                    // === include 'setup' then 'config' above ===
                    const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
                    const data = {
                      labels: labels,
                      datasets: [{
                        label: 'My First Dataset',
                        data: [2, 10, 40, 90, 66, 95, 120],
                        backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(255, 205, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(201, 203, 207, 0.7)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    };
                  
                    const config = {
                      type: 'bar',
                      data: data,
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true,
                            grid: {
                              color: 'rgba(255, 255, 255, 0.2)' // Set the grid color to white with 20% opacity
                            },
                            ticks: {
                              color: 'white' // Set the color of the y-axis labels to white
                            }
                          },
                          x: {
                            grid: {
                              color: 'rgba(255, 255, 255, 0.2)' // Set the grid color to white with 20% opacity
                            },
                            ticks: {
                              color: 'white' // Set the color of the x-axis labels to white
                            }
                          }
                        },
                        plugins: {
                          legend: {
                            labels: {
                              color: 'white' // Set the color of the legend labels to white
                            }
                          }
                        }
                      }
                    };


                       var myChart = new Chart(
                       document.getElementById('myChart'),
                           config
                              );
                  
                  </script>

                  </div>
             <div class="card mt-5" style="width: 305px; height: 350px; background-color: rgb(0,0,0,0.4); z-index: 1;
                   box-shadow: 2px 2px 2px 2px var(--bs-code-color)">
                  <p class="d-flex justify-content-end mx-1 text-dark" 
                  style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"></p>
                  <span class="d-flex justify-content-end mx-3 text-dark" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> </span>
                </div>
                </div>
                

                <div class="mt-5">
                    <div class="card mt-3" style="background-color: rgb(20,155,137,0.6); border-radius: 10px; width: 
                      285px; height: 170px; z-index: 2;  margin-top: -20px; position: absolute; margin-left: 35px; ">

                         <!-- Line Chart -->

                     <div style="width: 100%; height: 100%; margin-top: 30px;">
                     <canvas id="myLineChart"></canvas>
                      </div>
                      
                      <script>
                        const Linelabels =['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
                         const Linedata = {
                        labels: Linelabels,
                        datasets: [{
                        label: 'My First Dataset',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        fill: false,
                         borderColor: 'deeppink',
                         tension: 0.1
                          }]
                            };
                            const Lineconfig = {
                              type: 'line',
                              data: Linedata,
                              options: {
                                scales: {
                                  y: {
                                    beginAtZero: true,
                                    grid: {
                                      color: 'rgba(255, 255, 255, 0.8)' // Set the grid color to white with 20% opacity
                                    },
                                    ticks: {
                                      color: 'white' // Set the color of the y-axis labels to white
                                    }
                                  },
                                  x: {
                                    grid: {
                                      color: 'rgba(255, 255, 255, 0.8)' // Set the grid color to white with 20% opacity
                                    },
                                    ticks: {
                                      color: 'white' // Set the color of the x-axis labels to white
                                    }
                                  }
                                },
                                plugins: {
                                  legend: {
                                    labels: {
                                      color: 'white' // Set the color of the legend labels to white
                                    }
                                  }
                                }
                              }
                            };

                                 var myChart = new Chart(
                                  document.getElementById('myLineChart'),
                                     Lineconfig
                                 );
                      </script>
                      
                      </div>
                 <div class="card mt-5 mx-4" style="width: 305px; height: 350px; background-color: rgb(0,0,0,0.4); z-index: 1;
                       box-shadow: 2px 2px 2px 2px var(--bs-code-color)">
                      <p class="d-flex justify-content-end mx-1 text-dark" 
                      style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"></p>
                      <span class="d-flex justify-content-end mx-3 text-dark" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> </span>
                    </div>
                </div>
                    <div class="mt-5">
                        <div class="card mt-3" style="background-color: rgb(0,0,0,0.5); border-radius: 10px; width: 
                          285px; height: 170px; z-index: 2;  margin-top: -20px; position: absolute; margin-left: 12px; ">

                            <!-- Horizontal Bar  Chart -->

                              <div style="width: 100%; height: 100%; margin-top: 30px; margin-left: 0px;">
                                <canvas id="myHorChart"></canvas>
                              </div>
                        
                          <script>
                              const Horlabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
                                const Hordata = {
                                  labels: Horlabels,
                                  datasets: [{
                                    axis: 'y',
                                    label: 'My First Dataset',
                                    data: [65, 59, 80, 81, 56, 55, 40],
                                    fill: false,
                                    backgroundColor: [
                                      'rgba(255, 99, 132, 0.2)',
                                      'rgba(255, 159, 64, 0.2)',
                                      'rgba(255, 205, 86, 0.2)',
                                      'rgba(75, 192, 192, 0.2)',
                                      'rgba(54, 162, 235, 0.2)',
                                      'rgba(153, 102, 255, 0.2)',
                                      'rgba(201, 203, 207, 0.2)'
                                    ],
                                    borderColor: [
                                      'rgb(255, 99, 132)',
                                      'rgb(255, 159, 64)',
                                      'rgb(255, 205, 86)',
                                      'rgb(75, 192, 192)',
                                      'rgb(54, 162, 235)',
                                      'rgb(153, 102, 255)',
                                      'rgb(201, 203, 207)'
                                    ],
                                    borderWidth: 1
                                  }]
                                };
                                const Horconfig = {
                                    type: 'bar',
                                    data,
                                    options: {
                                      indexAxis: 'y',
                                      scales: {
                                        y: {
                                          beginAtZero: true,
                                          grid: {
                                            color: 'rgba(255, 255, 255, 0.8)' // Set the grid color to white with 20% opacity
                                          },
                                          ticks: {
                                            color: 'white' // Set the color of the y-axis labels to white
                                          }
                                        },
                                        x: {
                                          grid: {
                                            color: 'rgba(255, 255, 255, 0.8)' // Set the grid color to white with 20% opacity
                                          },
                                          ticks: {
                                            color: 'white' // Set the color of the x-axis labels to white
                                          }
                                        }
                                      },
                                      plugins: {
                                        legend: {
                                          labels: {
                                            color: 'white' // Set the color of the legend labels to white
                                          }
                                        }
                                      }
                                    }
                                  };


                                var myHorChart = new Chart(
                                  document.getElementById('myHorChart'),
                                     Horconfig
                                 );
                          </script>
                          </div>
                          
                     <div class="card mt-5" style="width: 305px; height: 350px; background-color: rgb(0,0,0,0.4); z-index: 1;
                           box-shadow: 2px 2px 2px 2px var(--bs-code-color)">
                          <p class="d-flex justify-content-end mx-1 text-dark" 
                          style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"></p>
                          <span class="d-flex justify-content-end mx-3 text-dark" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> </span>
                        </div>
                    </div>

            </div>
        </div>

         <!-- Client Part -->
        <div id="Clients" class="container-fluid tab-pane fade" style="margin-left: -20px;"><br>
        <div class="card d-flex" style="margin-left: 15px; position: absolute; z-index: 3;
            background-color: deeppink; width: 920px; height: 80px; border-radius: 10px; margin-top: 42px;">
            <a href="admin-page.php" class="back-icon text-light mx-3 py-3" style="text-decoration: none;font-size: 25px;">Client Table</a>
            </div>

  <div class="wrapper" style="width: 950px; margin-top:88px; margin-right:-200px;
  border-radius: 16px; box-shadow: 0px 0px 5px 0px #8585D5; background-color: rgb(0,0,0,0.5); z-index: 2;">
      
    <section class="users" style="padding: 0px 20px;">
      <header style=" display: flex; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #e6e6e6; justify-content: space-between;">

      </header>
      <div class="search" style="  margin: 20px 0; display: flex; position: relative; align-items: center; justify-content: space-between;">
        <span class="text-light">Select a client to start chat</span>
        <form>
        <input type="text" style=" font-size: 18px; color:black;" name="search" id="search" placeholder="Enter name to search...">
          </form>
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="d-flex mt-3" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> 
              <p class="text-light" style="margin-left: 0px;">Name</p>
              <p class="text-light px-5" style="margin-left: 285px;">Status</p>
              <p class="text-light px-5" style="margin-left: 123px;">Joind</p>
          </div>
      <div class="users-list" id="search-results" style=" max-height: 350px; overflow-y: auto;">
        
        <?php  
        
            $outgoing_id = $_SESSION['unique_id'];
            $sql = "SELECT * FROM details 
            WHERE NOT unique_id = {$outgoing_id} 
            AND status <> 'suspend'
            ORDER BY id DESC";

            $query = mysqli_query($conn, $sql);
            $output = "";
            $function = "client";
            if (mysqli_num_rows($query) == 0) {
            $output .= "No users are available to chat";
            } elseif (mysqli_num_rows($query) > 0) {

          while($row = mysqli_fetch_assoc($query)){
            $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                    OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message ";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if(isset($row2['incoming_msg_id'])){
                ($outgoing_id == $row2['incoming_msg_id']) ? $you = "<b style='color: rgb(0,0,0)'>You:  </b>" : $you = "";
            }else{
                $you = "";
            }
            ($row['active_status'] == "Offline") ? $offline = "offline" : $offline = "";
            ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
      
            $output .= '<div style=" display: flex; position: relative;align-items: center; cursor: pointer;
            padding-bottom: 0px; border-bottom: 1px solid #e6e6e6; justify-content: space-between; margin-bottom: 15px;
            padding-right: 15px; border-bottom-color: #f1f1f1; text-decoration: none; margin-left: 0px; margin-top: 5px; ">

                        <div class="content" style="display: flex; align-items: center;">
                        <img src="uploaded_img/'. $row['image'] .'" alt="" style="object-fit: cover; border-radius: 50%; height: 40px; width: 40px;">
                        <div class="details" style=" color: #fff; margin-left: 20px;">

                        <a href="admin-client-chat.php?user_id='. $row['unique_id'] .'" style="text-decoration:none;"> 
                        <span class="" style="color: white; font-size: 17px; font-family: bold;">'. $row['name'].'</a></span>
                        <p style=" color: white; font-size: 14px;">'. $you . $msg .'</p>
                        </div>
                        </div>
                        <div class="status-dot d-flex" style="position: relative; margin-right: -5px;">
                        <button class="button '. $offline .'" style="width: 55px; height:20px; border-radius: 10px; border: none;"><p class="justify-content-center align-item-center"
                         style="margin-left: -3px; margin-top: 0px;  ">'.$row['active_status'].'</p></button>
                        <p class="date " style=" padding: 0px 200px; color : white; font-size: 13px;  ">'. $row['join_date'] .'
                        </p>
                        <div class="" style="">
                        <a href="ban-list.php?user_id='. $row['unique_id'] .'&action='.$function.'" class="delete-button"  type="submit" style="border:none; color: white; background:transparent; font-size: 14px;">
                        <i class="fa fa-trash"></i></a>
                        </div> 
                        </div>
                    </div>';
        }

       
         echo $output;

      }
  ?>

      </div>
    </section>
  </div>

        </div>

        <!-- Developer Part -->

        <div id="Developers" class="container tab-pane fade" style="margin-left: -30px;">
        <div class="card d-flex" style="margin-left: 15px; position: absolute; z-index: 3;
            background-color: deeppink; width: 950px; height: 80px; border-radius: 10px; margin-top:-42px;">
            <a href="admin-page.php" class="back-icon text-light mx-3 py-3" style="text-decoration: none;font-size: 25px;">Developers Table</a>
            </div>

  <div class="wrapper" style="width: 980px; margin-top:88px; 
  border-radius: 16px; box-shadow: 0px 10px 10px 10px #8585D5;  background-color: rgb(0,0,0,0.5); z-index: 2;">
      
    <section class="users" style="padding: 0px 20px;">
      <header style=" display: flex; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #e6e6e6; justify-content: space-between;">
        <div class="content" style="display: flex; align-items: center; color: #fff; margin-left: 20px;">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
        </div>

      </header>
      <div class="dev-search" style="  margin: 20px 0; display: flex; position: relative; align-items: center; justify-content: space-between;">
        <span class="text-light">Select a Developer to start chat</span>
        <form>
        <input type="text" style=" font-size: 18px; color:black;" name="dev_search" id="dev_search" placeholder="Enter name to search...">
          </form>
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="d-flex mt-3" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> 
              <p class="text-light" style="margin-left: 0px;">Name</p>
              <p class="text-light px-5" style="margin-left: 250px;">Function</p>
              <p class="text-light px-5" style="margin-left: 100px;">Status</p>
              <p class="text-light px-5" style="margin-left: 80px;">Joind</p>
          </div>
      <div class="dev-users-list" id="dev-search-results" style=" max-height: 350px; overflow-y: auto;">
        <?php    

        $outgoing_id = $_SESSION['unique_id'];
        $sql = "SELECT * FROM developer WHERE NOT unique_id = {$outgoing_id} AND status <> 'suspend'
        ORDER BY d_id DESC";
        $query = mysqli_query($conn, $sql);
        $output = "";
        $function2 = "developer";
        if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
        }elseif(mysqli_num_rows($query) > 0){

          while($row = mysqli_fetch_assoc($query)){
            $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                    OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if(isset($row2['incoming_msg_id'])){
              ($outgoing_id == $row2['incoming_msg_id']) ? $you = "<b style='color: rgb(0,0,0)'>You:  </b>" : $you = "";
            }else{
              $you = "";
            }
            ($row['active_status'] == "Offline") ? $offline = "offline" : $offline = "";
            ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
      
            $output .= '<div href="admin-dev-chat.php?user_id='. $row['unique_id'] .'" style="display: flex; position: relative;align-items: center; padding-bottom: 0px; border-bottom: 1px solid #e6e6e6; justify-content: space-between; margin-bottom: 15px; padding-right: 15px; border-bottom-color: #f1f1f1; text-decoration: none; margin-left: px; margin-top: 5px; ">

            <div class="content" style="display: flex; align-items: center;">
                <img src="uploaded_img/'. $row['d_profile'] .'" alt="" style="object-fit: cover; border-radius: 50%; height: 40px; width: 40px;">
                <div class="details" style="color: #fff; margin-left: 20px;">
                   <a href="admin-dev-chat.php?user_id='. $row['unique_id'] .'" style="text-decoration:none;"> 
                    <span class="" style="color: white; font-size: 15px; font-family: bold;"><b>'. $row['name'].'</a></b>
                    </span>
                    <p style="color: white; font-size: 16px;">'. $you . $msg .'</p>
                </div>
            </div>
            
            <div class="status-dot d-flex" style="position: relative; margin-right: -5px;">
               <div class="function" style="position: absolute; margin-left:-490px;">
                <p class="date" style="padding: 0px 50px; color: white; font-size: 13px;"><b>'. $row['d_skill'] .'</b></p>
                </div>
                <div class="">

                <button class="button '. $offline .'" style="width: 45px; height:20px; border-radius: 10px; border:none; margin-left:-185px; font-size: 12px;">
                    <p class="justify-content-center align-item-center" style="margin-left: -3px; margin-top: 0px;"><b>'. $row['active_status'].'</b></p>
                </button>
                </div>
                <div class="">
                <p class="date" style="padding: 0px 20px; color: white; font-size: 13px; margin-right: 40px;"><b>'. $row['date'] .'</b></p>
                </div>
                <div class="" style="">
                        <a href="ban-list.php?user_id='. $row['unique_id'] .'&action='.$function2.'" class="delete-button"  type="submit" style="border:none; color: white; background:transparent; font-size: 14px;">
                        <i class="fa fa-trash"></i></a>
                        </div> 
                       </div>
        </div>';
        }

        }
       
         echo $output;

   
  ?>

      </div>
    </section>
  </div>

        </div>

          <!-- Suspend Part -->
        <div id="suspend" class="container tab-pane fade" style="margin-left: -30px;">
        <div class="card d-flex" style="margin-left: 15px; position: absolute; z-index: 3;
            background-color: deeppink; width: 950px; height: 80px; border-radius: 10px; margin-top:-42px;">
            <a href="admin-page.php" class="back-icon text-light mx-3 py-3" style="text-decoration: none;font-size: 25px;">Suspended Table</a>
            </div>

  <div class="wrapper" style="width: 980px; margin-top:88px; 
  border-radius: 16px; box-shadow: 0px 10px 10px 10px #8585D5;  background-color: rgb(0,0,0,0.5); z-index: 2;">
      
    <section class="users" style="padding: 0px 20px;">
      <header style=" display: flex; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #e6e6e6; justify-content: space-between;">
        <div class="content" style="display: flex; align-items: center; color: #fff; margin-left: 20px;">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
        </div>

      </header>
      <div class="suspend-search" style="  margin: 20px 0; display: flex; position: relative; align-items: center; justify-content: space-between;">
        <span class="text-light"><b><?php echo "Today is: ". date("Y-m-d");?></b></span>
        <span class="text-light"><b>Search Current Date To Unsuspend Users </b></span>
        <form>
        <input type="text" style=" font-size: 18px; color:black;" name="suspend_search" id="suspend_search" placeholder="(YY-MM-DD)">
          </form>
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="d-flex mt-3" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"> 
              <p class="text-light" style="margin-left: 0px;">Name</p>
              <p class="text-light px-5" style="margin-left: 130px;">Email</p>
              <p class="text-light px-5" style="margin-left: 50px;">Function</p>
              <p class="text-light px-5" style="margin-left: 50px;">Action</p>
              <p class="text-light px-5" style="margin-left: 50px;">Release</p>
          </div>
      <div class="suspend-list" id="suspend-results" style=" max-height: 350px; overflow-y: auto;">
        <?php    

        $outgoing_id = $_SESSION['unique_id'];
        $sql = "SELECT * FROM suspend WHERE 1";
        $query = mysqli_query($conn, $sql);
        $output = "";


        while($row = mysqli_fetch_assoc($query)){
      
            $output .= '<div style="display: flex; position: relative;align-items: center; padding-bottom: 0px; border-bottom: 1px solid #e6e6e6;
             justify-content: space-between; margin-bottom: 15px; padding-right: 15px; border-bottom-color: #f1f1f1; text-decoration: none; margin-left: px; margin-top: 5px;">

                <div class="" style="color: #fff; margin-left: 0px; margin-bottom: 20px;">
                    <span class=""style="color: white; font-size: 14px;"><b>'. $row['name'].'</b>
                    </span>
                 
                </div>

            
            <div class="status-dot d-flex" style="position: relative; margin-right: -5px;">
               <div class="function" style="position: absolute; margin-left:-650px;">
                <p class="date" style="padding: 0px 50px; color: white; font-size: 13px;"><b>'. $row['email'] .'</b></p>
                </div>
                <div class="">
                <p class="justify-content-center align-item-center text-light" style="font-size: 14px; margin-left: -370px;"><b>'. $row['function'].'</b></p>
                </div>
                <div class="">
                <div class="" style="  margin-left:-175px; font-size: 13px;">
                    <p class="justify-content-center align-item-center text-light" style=""><b>'. $row['date'].'</b></p>
                </div>
                </div>
                <div class="">
                <p class="date" style="padding: 0px 20px; color: white; font-size: 13px; margin-right: 40px;"><b>'. $row['suspend_date'] .'</b></p>
                </div>
                <div class="" style="">
                        <a href="unsuspend.php?user_id='. $row['unique_id'] .'" class="delete-button"  type="submit" style="border:none;
                         color: white; background:transparent; font-size: 16px;"><i class="fa fa-history"></i></a>
                        </div> 
                       </div>
        </div>';
    
        }
        echo $output;
   
  ?>

      </div>
    </section>
  </div>

        </div>
      </div>
    </div>
  </div>
</div>

                  <!-- The Logout Modal -->
                  <div class="modal" id="logout">
                    <div class="modal-dialog w-25" style="margin-top: 250px;">
                      <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body">
                          <b>Are you sure to Logout?</b>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger"><a href="logout.php" style="text-decoration:none; color: white;">Yes</a></button>
                          <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                        </div>

                      </div>
                    </div>
                  </div>




        <script>
            
            // Client Search button
            const searchBar = document.querySelector(".search input"),
            searchIcon = document.querySelector(".search button"),
            usersList = document.querySelector(".users-list");

            searchIcon.onclick = ()=>{
            searchBar.classList.toggle("show");
            searchIcon.classList.toggle("active");
            searchBar.focus();
            if(searchBar.classList.contains("active")){
                searchBar.value = "";
                searchBar.classList.remove("active");
            }
            }
             
            //Developer Search button
            const devsearchBar = document.querySelector(".dev-search input"),
            devsearchIcon = document.querySelector(".dev-search button"),
            devusersList = document.querySelector(".dev-users-list");

            devsearchIcon.onclick = ()=>{
            devsearchBar.classList.toggle("show");
            devsearchIcon.classList.toggle("active");
            devsearchBar.focus();
            if(devsearchBar.classList.contains("active")){
                devsearchBar.value = "";
                devsearchBar.classList.remove("active");
            }
            }

                //Developer Search button
                const suspendsearchBar = document.querySelector(".suspend-search input"),
                suspendsearchIcon = document.querySelector(".suspend-search button"),
                suspendusersList = document.querySelector(".suspend-users-list");

                suspendsearchIcon.onclick = ()=>{
                suspendsearchBar.classList.toggle("show");
                suspendsearchIcon.classList.toggle("active");
                suspendsearchBar.focus();
                if(suspendsearchBar.classList.contains("active")){
                suspendsearchBar.value = "";
                suspendsearchBar.classList.remove("active");
            }
            }
          
            //Client Search
            $(document).ready(function() {
                $('#search').on('input', function() {
                    var query = $(this).val();

                    if (query != '') {
                        $.ajax({
                            url: 'admin-client-search.php',
                            method: 'GET',
                            data: { search: query },
                            success: function(data) {
                                $('#search-results').html(data);
                            }
                        });
                    } else {
                        $('#search-results').html('');
                    }
                });
            });

            //Developer Search
            $(document).ready(function() {
                $('#dev_search').on('input', function() {
                    var dev_query = $(this).val();

                    if (dev_query != '') {
                        $.ajax({
                            url: 'admin-dev-search.php',
                            method: 'GET',
                            data: { search: dev_query },
                            success: function(data) {
                                $('#dev-search-results').html(data);
                            }
                        });
                    } else {
                        $('#dev-search-results').html('');
                    }
                });
            });

            //suspend Search
            $(document).ready(function() {
                $('#suspend_search').on('input', function() {
                    var dev_query = $(this).val();

                    if (dev_query != '') {
                        $.ajax({
                            url: 'admin-suspend-search.php',
                            method: 'GET',
                            data: { search: dev_query },
                            success: function(data) {
                                $('#suspend-results').html(data);
                            }
                        });
                    } else {
                        $('#suspend-results').html('');
                    }
                });
            });
     

    
    </script>

</body>
</html>
