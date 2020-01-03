<?php 
	include('settings/db.php');
	
	if ($_POST){
		
		mysqli_query($conn, "insert into cRegistration (name, email, institution, degree, major, year, ca_code, skill) values ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['institution'] . "','" . $_POST['degree'] . "', '" . $_POST['major'] . "', '" . $_POST['year'] . "', '" . $_POST['ca_code'] . "', '" . $_POST['skill'] . "')");
	
	$email_to = 'hr@codebinary.in';
    
    $profile = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $subject = "Received. A new registration from Project CodeBinary"; // required
    $message = 'Candidate of ' . $_POST['institution'] . ', ' . $_POST['degree']  . ', ' . $_POST['major'] . ' for ' .  $_POST['skill'] . ' Skill Training.'; // required
 
    $email_message = "Registration Details:\n\n";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Profile: ".clean_string($profile)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail($email_to, $subject, $email_message, $headers);  
	
	if ($_POST['skill'] == 'Front-End')
	{
		header("location: https://imjo.in/WWw9KD");
	} elseif ($_POST['skill'] == 'Back-End')
	{
		header("location: https://imjo.in/ppBz2K");
	} else{
		header("location: register.php");
	}
	
	
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pinnacle: Register</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="CodeBinary Initiatives" name="author">
  <meta content="An initiative to impart industrial skills and knowledge to the budding workforce of tomorrow at a minimal and affordable subscription cost." name="description">
  
  <link rel="canonical" href="https://codebinary.in/register.php" />
  <link rel="shortcut icon" href="img/codebinary_trans.png" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136232244-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136232244-1');
</script>

</head>

<body onload="createCaptcha()">
    <section id="contact">
      <div class="container-fluid">
        <div class="section-header">
          <h3>Register Here</h3>
        </div>

        <div class="row">
		  <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="form">
              <form action="" method="post" onsubmit="validateCaptcha()" id="form" >
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" placeholder="Name" required />
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" placeholder="Email" required />
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="institution" placeholder="Institution" required />
                </div>
				<div class="form-row">
                  <div class="form-group col-lg-4">
                    <input type="text" name="degree" class="form-control" placeholder="Degree (e.g. B.Tech)" required />
                  </div>
                  <div class="form-group col-lg-4">
                    <input type="text" class="form-control" name="major" placeholder="Major (e.g. CSE)" required />
                  </div>
				   <div class="form-group col-lg-4">
                    <input type="text" class="form-control" name="year" placeholder="Graduation Year" required />
                  </div>
                </div>
				<div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="ca_code" class="form-control" placeholder="Campus Ambassador ID" required />
                  </div>
                  <div class="form-group col-lg-6">
					<select name="skill">
						<option value="Front-End" selected>Web Development: Front-End</option>
						<option value="Back-End">Web Development: Back-End</option>
					</select>
                  </div>
                </div>
				<div class="form-row">
				</br>
                  <div class="form-group col-lg-12">
                    <div id="captcha"></div>
					<input type="text" placeholder="Captcha" id="cpatchaTextBox"/>
                  </div> 
                </div></br>
				<div class="text-center"><button type="submit" title="Register">Register & Proceed to Pay</button></div>
              </form>
				</div>
			</div>
		  </div>
		  <div class="col-lg-2"></div>
      </div>
    </section><!-- #contact -->

  </main>

<footer id="footer">
	<div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6 footer-links">
            <h4>ABOUT</h4>
            <p>An initiative to impart industrial skills and knowledge to the budding workforce of tomorrow at a minimal and affordable subscription cost.</br></br>
			CodeBinary's own Virtual Learning Platform is a rich-UI portal that makes learning-in-process quick and efficient.</p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="privacy-policy.html">Privacy Policy</a></li>
              <li><a href="terms-of-service.html">Terms of Service</a></li>
			  <li><a href="acceptable-use-policy.html">Acceptable Use Policy</a></li>
			  <li><a href="https://codebinary.in/sitemap.xml"><i class="fa fa-sitemap"></i></a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
            FF-27,Cross Road Mall,Central Spine,</br>
			Vidhyadhar Nagar, Jaipur</br>
			Rajasthan, 302039 <br>India</br>
              <strong>Email:</strong> contact@codebinary.in
            </p>

          </div>

          <div class="col-lg-2 col-md-6 footer-newsletter">
            <h4>Our Partners</h4>
			
			<div class="owl-carousel testimonials-carousel">
              <div class="testimonial-item">
				<a href="https://kalpanaa.codebinary.in/" class="scrollto"><img src="img/kalpanaa.jpg" style="height:120px; width:120px; float:center;" alt="Kalpanaa" target="_blank" ></a>
              </div>
			  <div class="testimonial-item">
				<a href="https://www.sproutingwingsdigitalmarketing.com/" class="scrollto"><img src="img/spdm.jpeg" style="height:120px; width:120px; float:center;" alt="Sprouting Wings Digital Marketing" target="_blank"></a>
              </div>
			  <div class="testimonial-item">
				<a href="https://www.instamojo.com/" class="scrollto"><img src="img/instamojo.png" style="height:120px; width:120px; float:center;" alt="Instamojo" target="_blank"></a>
              </div>
			  <div class="testimonial-item">
				<a href="https://www.tawk.to/" class="scrollto"><img src="img/tawk.jpg" style="height:120px; width:120px; float:center;" alt="Twak.to" target="_blank"></a>
              </div>
			  <div class="testimonial-item">
				<a href="https://www.ringcentral.com/" class="scrollto"><img src="img/ringcentral.png" style="height:120px; width:120px; float:center;" alt="Ring Central GLIP" target="_blank"></a>
			  </div>
			  <div class="testimonial-item">
				<a href="https://www.namecheap.com/" class="scrollto"><img src="img/namecheap.png" style="height:120px; width:120px; float:center;" alt="Namecheap" target="_blank"></a>
              </div>
			  <div class="testimonial-item">
				<a href="https://www.setmore.com/" class="scrollto"><img src="img/setmore.png" style="height:120px; width:120px; float:center;" alt="Setmore" target="_blank"></a>
              </div>
			  
            </div>
          </div>
		  
		  <div class="col-lg-12 col-md-12 footer-contact text-center">
			<div class="social-links">
              <a href="https://www.linkedin.com/company/codebinary/" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
			  <a href="https://www.instagram.com/codebinary.initiatives/" target="_blank"><i class="fa fa-instagram"></i></a>
			  <a href="https://github.com/projectcodebinary" class="github" target="_blank"><i class="fa fa-github"></i></a>
            </div>
		  </div>

        </div>
      </div>
    </div>
  
	<div class="container">
      <div class="copyright">
        A Project by <strong>CodeBinary Initiatives</strong><br> Registered Under <strong>Ministry of Micro, Small & Medium Enterprises, GoI</strong>
      </div>
    </div>
  </footer>
  
  <div id="preloader"></div> 
  
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c9c7c531de11b6e3b0598c9/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>
</html>
