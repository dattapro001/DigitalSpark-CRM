
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalSpark CRM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="client-page.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

  


 

</head>


<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="#">DigitalSpark CRM</a></div>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="#about" class="menu-btn">About</a></li>
                <li><a href="#services" class="menu-btn">Services</a></li>
                <li><a href="#price-section" class="menu-btn">Price</a></li>
                <li><a href="#project-section" class="menu-btn">Project</a></li>
                <li><a href="#skills" class="menu-btn">Skills</a></li>
                <li><a href="client-admin-chat.php" class="menu-btn">Chat</a></li>
                <li><a href="#contact" class="menu-btn">Contact</a></li>

                <li>
                <a href="client-profile.php" class="navbar-link">
              <div class="nav-profile">
              <?php
               echo '<img class="img-thumbnail" id="profile-image" src="uploaded_img/'.$arrayData['image'].'">'
                ?></div></a>

                </li>
            </ul>

            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>


    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">DigitalSpark CRM Is Customer Relationship Management Software</div>
                <div class="text-2">Grow Your Business With DigitalSpark CRM</div>
                <div class="text-3">Our Services <span class="typing"></span></div>
                <a href="#contact">Contact us</a>
            </div>
        </div>
    </section>


    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">About us</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="images/profile-1.jpg" alt="">
                </div>
                <div class="column right">
                    
                    <p>DigitalSpark CRM is customer relationship management software suitable for use by IT companies or freelancers. DigitalSpark CRM can help you appear more professional to your customers and improve business performance at the same time.</p>
                    <a href="#contact">Contact us</a>
                </div>
            </div>
        </div>
    </section>


    <!-- services section start -->

    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">Our services</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-code "></i>
                        
                        <div class="text">Web Design</div>
                        <p>Web design is the supporting mechanism of your business that speaks emphatically about your services.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-chart-line"></i>
                        <div class="text">SEO</div>
                        <p>Search engine optimization (SEO) is the procedure of facilitating your customers connect with your business online.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-chart-line"></i>
                        <div class="text">PPC</div>
                        <p>Our PPC management services increase your ability to achieve your business goals.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-bullhorn"></i>
                        
                        <div class="text">Social Media Marketing</div>
                        <p>Boost your brand with strategic social media marketing.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-poll-h"></i>
                        <div class="text">Content Marketing</div>
                        <p>Elevate your brand with impactful content marketing. </p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-envelope-open-text"></i>
                        <div class="text">Email Marketing</div>
                        <p>Powerful email marketing solutions to reach, engage, and convert your audience.</p>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </section>



<!--price section start-->

<section class="price-section" id="price-section">
    <div class="container">
    
        <div class="price">
         
            <h1>Pricing Plan</h1>
       
        </div>
    
        <div class="box-container">
    

            <div class="box">
                <h3>Website Development</h3>
                <div class="price month"><span>$</span>450</div>
            
                <div class="list">
                    <p> <i class="fas fa-check"></i> Content 5-7 Pages </p>
                    <p> <i class="fas fa-check"></i> Responsive Design </p>
                    <p> <i class="fas fa-check"></i> Mobile Optimized </p>
                    <p> <i class="fas fa-check"></i> Content Management System </p>
                    <p> <i class="fas fa-check"></i> Support - 1 Month </p>
                </div>
                <?php 
                 echo '<a href=" web.php?user_id='. $arrayData['unique_id'] .'" class="btn">choose plan</a>';
                ?>
            </div>
    

            <div class="box">
                <h3>SEO</h3>
                <div class="prices month"><span>$</span>250</div>
     
                <div class="list">
                    <p> <i class="fas fa-check"></i> Keywords - 10 </p>
                    <p> <i class="fas fa-check"></i> Keyword Analysis </p>
                    <p> <i class="fas fa-check"></i> Unique Titles Tags </p>
                    <p> <i class="fas fa-check"></i> SEO Strategy </p>
                    <p> <i class="fas fa-check"></i> Monthly Report </p>
                </div>
                 echo '<a href=" web.php?user_id='. $arrayData['unique_id'] .'" class="btn">choose plan</a>';
            </div>
    

            <div class="box">
                <h3>PPC</h3>
                <div class="price month"><span>$</span>250</div>
              
                <div class="list">
                    <p> <i class="fas fa-check"></i> Keywords in Campaign – 15 </p>
                    <p> <i class="fas fa-check"></i> Target Audience </p>
                    <p> <i class="fas fa-check"></i> keyword Research & Selection </p>
                    <p> <i class="fas fa-check"></i> Ad Costing Optimization </p>
                    <p> <i class="fas fa-check"></i> Monthly Report </p>
                </div>
                <a href="seo.php" class="btn">choose plan</a>
            </div>
    
        </div>
    
    </div>
    </section>




<!-- project section start-->

    <header>
        <h1>Project</h1>
    </header>

    <section class="project-section" id="project-section">

        <div class="project">
            <img src="images/lawfirm.jpg" alt="Law Firm">
            <h2><a href="https://myfamilymatter.co.uk/">Law Firm</a></h2>
        </div>

        <div class="project">
            <img src="images/realestate.jpg" alt="Real Estate">
            <h2><a href="https://www.premiumgroupre.com/">Real Estate</a></h2>
        </div>

        <div class="project">
            <img src="images/cleaningwebsite.jpg" alt="cleaning Service">
            <h2><a href="https://awesome-maids.com/">cleaning Business</a></h2>
        </div>
    </section>



    <!-- skills section start -->

    <section class="skills" id="skills">
        <div class="max-width">
            <h2 class="title">Our skills</h2>
            <div class="skills-content">
                <div class="column left">
                    <div class="text">Our creative skills & experiences.</div>
                    <p>At DigitalSpark, we are more than just a software development company – we are a passionate team of creative minds, tech enthusiasts, and problem solvers who thrive on turning ideas into reality. Our journey began with a simple yet powerful vision: to transform the digital landscape by crafting exceptional software solutions that not only meet our clients' needs but exceed their expectations.</p>
                </div>
                <div class="column right">
                    <div class="bars">
                        <div class="info">
                            <span>HTML</span>
                            <span>85%</span>
                        </div>
                        <div class="line html"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>CSS</span>
                            <span>60%</span>
                        </div>
                        <div class="line css"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>JavaScript</span>
                            <span>70%</span>
                        </div>
                        <div class="line js"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>PHP</span>
                            <span>60%</span>
                        </div>
                        <div class="line php"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>MySQL</span>
                            <span>75%</span>
                        </div>
                        <div class="line mysql"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- teams section start -->

    <header>
        <h1>Our Team</h1>
    </header>
    
    <section class="team-section" id="team-section">
        <div class="team-member">
            <img src="images/manna.jpeg" alt="Manna">
            <h2>Shahariar Masud (Manna)</h2>
            <p>Web Designer</p>
        </div>

        <div class="team-member">
            <img src="images/saurov.jpeg" alt="saurov">
            <h2>Saurov Karmokar</h2>
            <p>Web Developer</p>
        </div>

        <div class="team-member">
            <img src="images/mugdho.jpeg" alt="Mugdho Datta">
            <h2>Mugdho Datta</h2>
            <p>Web Developer</p>
        </div>
    </section>



    <!-- contact section start -->

    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact us</h2>
            <div class="contact-content">
                <div class="column left">

                    <div class="text">Let’s Start a Project</div>
                    
                    <p>To get in touch with us directly, please use the contact form below. We value your time and will make every effort to respond promptly.</p>
                    
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">DigitalSpark</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Sylhet, Bangladesh</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">digitalspark@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message us</div>


                    <form action="#" method="post">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" name="contact_name" placeholder="Name" required>
                            </div>
                            <div class="field email">
                                <input type="email" name="contact_email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" name="contact_subject" placeholder="Subject" required>
                        </div>
                        <div class="field textarea">
                            <textarea cols="30" rows="10" name="contact_message" placeholder="Message.." required></textarea>
                        </div>
                        <div class="button-area">
                            <button type="submit" name="contact_send">Send message</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>



    <!-- footer section start -->

    <footer>
        <span>Created By <a href="">Shahariar Masud (Manna)</a> | <span class="far fa-copyright"></span>All rights reserved.</span>
    </footer>


    <script>

$(document).ready(function(){
    $(window).scroll(function(){

        // sticky navbar on scroll script
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
        }else{
            $('.navbar').removeClass("sticky");
        }
        
        // scroll-up button show/hide script
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        } // Add the closing parenthesis here
    });

    // slide-up script
    $('.scroll-up-btn').click(function(){
        $('html').animate({scrollTop: 0});
        
        // removing smooth scroll on slide-up button click
        $('html').css("scrollBehavior", "auto");
    });

    $('.navbar .menu li a').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });

    // toggle menu/navbar script
    $('.menu-btn').click(function(){
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });

    // typing text animation script
    var typed = new Typed(".typing", {
        strings: ["Website Design", " Website Developer", "SEO", "SMM", "PPC"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });
});
    </script>

</body>
</html>
