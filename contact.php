<?php

if (isset($_POST['email']))
	{

	$email_to = "contact@mvlaunch.com";
	$email_subject = "MIT Launch Website Contact Form";
	function died($error)
		{

		echo "There were errors with your form, please check them.";
		echo "<br /><br />";
		echo $error . "<br /><br />";
		die();
		}


	if (!isset($_POST['name']) ||  !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['message']))
		{
		died('There was an error with the form. Please try again.');
		}

	$name = $_POST['name']; // required
	$email_from = $_POST['email']; // required
	$phone = $_POST['phone']; // not required
	$message = $_POST['message']; // required
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	if (!preg_match($email_exp, $email_from))
		{
		$error_message.= 'The Email Address you entered does not appear to be valid.<br />';
		}

	$string_exp = "/^[A-Za-z .'-]+$/";
	if (!preg_match($string_exp, $name))
		{
		$error_message.= 'The First Name you entered does not appear to be valid.<br />';
		}


	if (strlen($message) < 2)
		{
		$error_message.= 'The message you entered do not appear to be valid.<br />';
		}

	if (strlen($error_message) > 0)
		{
		died($error_message);
		}

	$email_message = "Form details below.\n\n";
	function clean_string($string)
		{
		$bad = array(
			"content-type",
			"bcc:",
			"to:",
			"cc:",
			"href"
		);
		return str_replace($bad, "", $string);
		}

	$email_message.= "Name: " . clean_string($name) . "\n";
	$email_message.= "Email: " . clean_string($email_from) . "\n";
	$email_message.= "phone: " . clean_string($phone) . "\n";
	$email_message.= "message: " . clean_string($message) . "\n";

	// create email headers

	$headers = 'From: ' . $email_from . "\r\n" . 'Reply-To: ' . $email_from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers);
?>
<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thanks for Contacting! | Monta Vista MIT Launch</title>
    <meta name="description" content="Minimal and business HTML template and theme.">
    <script src="plugins/jquery.min.2.1.4.js"></script>
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href='css/components.css'>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="skin.css">
</head>
<body>
      <div id="preloader"></div>
    <header class="fixed-top scroll-change" data-menu-anima="fade-in">
        <div class="navbar navbar-default mega-menu-fullwidth navbar-fixed-top" role="navigation">
            <div class="navbar navbar-main">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.html"><img src="images/mit-launch.png" height="60%" width="60%" alt="logo" /></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <div class="nav navbar-nav navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="dropdown mega-dropdown mega-tabs">
                                   <a href="index.html" role="button">Home<span class="caret"></span></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">About Us<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="about.html">Info</a></li>
                                        <li><a href="officers.html">Officer Team</a></li>
                                    </ul>
                                <li class="dropdown mega-dropdown mega-tabs">
                                   <a href="faq.html" role="button">FAQ<span class="caret"></span></a>
                                </li>
                                <li class="dropdown mega-dropdown mega-tabs">
                                   <a href="contact.html" role="button">Contact Us<span class="caret"></span></a>
                                </li>
                                <li class="dropdown mega-dropdown mega-tabs active current-active">
                                   <a href="join.html" role="button">Join The Club <span class="caret"></span></a>
                                </li>
                        </div>
                    </div>
                </div>
                </li>

                </ul>
            </div>
        </div>
        </div>
        </div>
        </div>
    </header>
    <div class="background-page" style="background-image:url(images/tempbg.jpg)">
        <div class="bg-overlay"></div>
    </div>
    <a class="btn-text" href="#">Click me</a><span class="space"></span>


    <footer class="footer-center footer-minimal">
      <div class="content">
          <div class="container">
              <div class="row footer-main">
                  <img src="images/mit-launch.png" height="30%" width="30%" alt="" />
                  <hr class="space m" />
                  <p>A High-School Entrepreneurship Program</p>
                  <p>Monta Vista High School | A MIT Launch Chapter</p>
                  <hr class="space xs" />
                  <div class="btn-group navbar-social">
                      <div class="btn-group social-group">
                          <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                          <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                          <a target="_blank" href="#"><i class="fa fa-instagram"></i></a>
                          <a target="_blank" href="#"><i class="fa fa-youtube"></i></a>
                      </div>
                  </div>
              </div>
              <div class="row copy-row">
                  <div class="col-md-12 copy-text">
                      <div class="tag-row">
                          <span>&copy; 2016 MV Launch</span>
                          <span>All Rights Reserved</span>
                          <span>Design by: <a href="http://github.com/neelgriddalur">Neel Griddalur</a> & <a href="http://github.com/sameerkapur">Sameer Kapur</a></span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <link rel="stylesheet" href="plugins/iconsmind/line-icons.min.css">
        <script async src="plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/imagesloaded.min.js"></script>
        <script src='plugins/jquery.progress-counter.js'></script>
        <script src='plugins/jquery.tab-accordion.js'></script>
    </footer>
</body>

<!-- Mirrored from templates.framework-y.com/minimal/demo-main/coming-soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Nov 2016 19:33:45 GMT -->
</html>


<?php

}

?>
