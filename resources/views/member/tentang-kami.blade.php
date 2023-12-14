@extends('member.layout.master')
@section('addCss')
@endsection
@section('title')
    Tentang Kami
@endsection
@section('')
    active active-menu
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Tentang Kami</title>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300' rel='stylesheet' type='text/css'>

<link href="https://fonts.googleapis.com/css?family=Raleway:100,400,700" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Oswald:200,400,700" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<script src="https://use.fontawesome.com/20ab91acc4.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<style>body {
  margin: 0;
  padding: 0;
  padding-bottom: 100px;
}

#contact {
  width: 100%;
  height: 100%;
}

.section-header {
  text-align: center;
  margin: 0 auto;
  padding: 40px 0;
  font: 30 sans-serif;
  color: red;
  letter-spacing: 6px;
}

.contact-wrapper {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  margin: 0 auto;
  padding: 20px;
  position: relative;
  max-width: 840px;
}

/* Left contact page */
.form-horizontal {
  /*float: left;*/
  max-width: 400px;
  font-family: 'Lato';
  font-weight: 400;
}

.form-control, 
textarea {
  max-width: 400px;
  color: red;
  letter-spacing: 1px;
  border-color:white;
}

.send-button {
  margin-top: 15px;
  height: 34px;
  width: 400px;
  overflow: hidden;
}

.alt-send-button {
  width: 400px;
  height: 34px;

}

.send-text {
  display: block;
  margin-top: 10px;
  font: 700 12px 'Lato', sans-serif;
  letter-spacing: 2px;
}

.alt-send-button:hover {
  transform: translate3d(0px, -29px, 0px);
}

/* Begin Right Contact Page */
.direct-contact-container {
  max-width: 400px;
}

/*  Phone, Email Section */

.list-item {
  line-height: 4;
  color: #aaa;
}

.contact-text {
  font: 300 18px 'Lato', sans-serif;
  letter-spacing: 1.9px;
  color: #bbb;

}

.phone {
  margin-left: 56px;
}

.gmail {
  margin-left: 53px;
}

.contact-text a {
  color: #bbb;
  text-decoration: none;
  transition-duration: 0.2s;
}

.contact-text a:hover {
  color: #fff;
  text-decoration: none;
}


/* Social Media Icons */
.social-media-list {
  position: relative;
  font-size: 22px;
  text-align: center;
  width: 100%;
  margin: 0 auto;
  padding: 0;
}

.social-media-list li a {
  color: #fff;
}

.social-media-list li {
  position: relative; 
  display: inline-block;
  height: 60px;
  width: 60px;
  margin: 10px 3px;
  line-height: 60px;
  border-radius: 50%;
  color: #fff;
  background-color: rgb(27,27,27);
  cursor: pointer; 
  transition: all .2s ease-in-out;
}

.social-media-list li:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 60px;
  height: 60px;
  line-height: 60px;
  border-radius: 50%;
  opacity: 0;
  box-shadow: 0 0 0 1px #fff;
  transition: all .2s ease-in-out;
}

.social-media-list li:hover {
  background-color: #fff; 
}

.social-media-list li:hover:after {
  opacity: 1;  
  transform: scale(1.12);
  transition-timing-function: cubic-bezier(0.37,0.74,0.15,1.65);
}

.social-media-list li:hover a {
  color: #000;
}

hr {
  border-color: rgba(255,255,255,.6);
}

/* Begin Media Queries*/
@media screen and (max-width: 850px) {
  .contact-wrapper {
    display: flex;
    flex-direction: column;
  }
  .direct-contact-container, .form-horizontal {
    margin: 0 auto;
  }  
  
  .direct-contact-container {
    margin-top: 60px;
    max-width: 300px;
  }    
  .social-media-list li {
    height: 60px;
    width: 60px;
    line-height: 60px;
  }
  .social-media-list li:after {
    width: 60px;
    height: 60px;
    line-height: 60px;
  }
}

@media screen and (max-width: 569px) {

  .direct-contact-container, .form-wrapper {
    float: none;
    margin: 0 auto;
  }  
  .form-control, textarea {
    
    margin: 0 auto;
  }
 
  
  .name, .email, textarea {
    width: 280px;
  } 
  
  .direct-contact-container {
    margin-top: 60px;
    max-width: 280px;
  }  
  .social-media-list {
    left: 0;
  }
  .social-media-list li {
    height: 55px;
    width: 55px;
    line-height: 55px;
    font-size: 2rem;
  }
  .social-media-list li:after {
    width: 55px;
    height: 55px;
    line-height: 55px;
  }
  
}

@media screen and (max-width: 410px) {
  .send-button {
    width: 99%;
  }
}
.content h1{
    text-align:center;
    color:red;
  font-size:30px;
  padding:20px;
}
.content p{
    text-align:center;
    font-size:20px;
    color:white;
}

.box {
	border-radius: 150px;
	position:relative;
	overflow: hidden;
	text-align:center;
  padding:10px;
}
.box:before {
    position: absolute;
    content: '';
    left: 0px;
    top: 0px;
    width: 0px;
    height: 100%;
    border-radius: 150px;
    box-shadow: inset 0 0 25px rgba(0,0,0,0.30);
    transition: all 0.3s ease;
   
}
.box:hover:before {
    width: 100%;
}
.box:hover .image-wrapper {
	padding:0;
}
.box:hover .box-desc {
	color:#fff;
}
.image-wrapper {
    position: relative;
	max-width: 250px;
    max-height: 250px;
	margin:0 auto;
    overflow: hidden;
    border-radius: 50%;
    padding: 10px;
    transition: all 0.5s ease;
    box-shadow: inset 0px 0px 10px rgba(0,0,0,0.20);
    
}
.image-wrapper img {
    border-radius: 50%;
    transition: all 300ms ease;
}
.box-desc {
	position:relative;

}
.container h3{
text-align:center;
padding:20px;
font-size:30px;
color:red;
}
</style>
<body>
  <section id="about" class="about">
</div>
<div class="content">
    <h1>Gamelab Event</h1>
   <p> Gamelab Event adalah teknologi unggul dalam mendukung seluruh penyelenggara event mulai dari distribusi manajemen tiket,hingga penyediaan laporan analisa event di akhir acara. Gamelab Event mendukung berbagai jenis event termasuk festival,pameran,konser musik dan berbagai jenis lainnya.</p>

<div class="container">
<h3>Tim Kami</h3>
	<div class="row vh-100">
		<div class="col-sm-6 col-lg-3 my-auto">
			<div class="box shadow-sm p-4">
				<div class="image-wrapper mb-3">
					<img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png" alt="..." />
				</div>
				<div class="box-desc">
					<h5>Jon Doe</h5>
					<p>FrontEnd Developer</p>
				</div>

			</div>
		</div>
		<div class="col-sm-6 col-lg-3 my-auto">
			<div class="box shadow-sm p-4">
				<div class="image-wrapper mb-3">
					<img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png" alt="..." />
				</div>
				<div class="box-desc">
					<h5>Jon Doe</h5>
					<p>FrontEnd Developer</p>
				</div>
			</div>
		</div>
    <div class="col-sm-6 col-lg-3 my-auto">
			<div class="box shadow-sm p-4">
				<div class="image-wrapper mb-3">
					<img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png" alt="..." />
				</div>
				<div class="box-desc">
					<h5>Jon Doe</h5>
					<p>FrontEnd Developer</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-3 my-auto">
			<div class="box shadow-sm p-4">
				<div class="image-wrapper mb-3">
					<img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png" alt="..." />
				</div>
				<div class="box-desc">
					<h5>Jon Doe</h5>
					<p>FrontEnd Developer</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-3 my-auto">
			<div class="box shadow-sm p-4">
				<div class="image-wrapper mb-3">
					<img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png" alt="..." />
				</div>
				<div class="box-desc">
					<h5>Jon Doe</h5>
					<p>FrontEnd Developer</p>
				</div>
			</div>
		</div>
		
	</div>
</div>	
	
<section id="contact">
  
  <h2 class="section-header">Kontak</h2>
  
  <div class="contact-wrapper">
  
  <!-- Left contact page --> 
    
    <form id="contact-form" class="form-horizontal" role="form">
       
      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" id="name" placeholder="NAME" name="name" value="" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="" required>
        </div>
      </div>

      <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required></textarea>
      
      <button class="btn btn-primary send-button" id="submit" type="submit" value="kirim">
        <div class="alt-send-button">
          <i class="fa fa-paper-plane"></i><span class="send-text">kirim</span>
        </div>
      
      </button>
      
    </form>
    
  <!-- Left contact page --> 
    
      <div class="direct-contact-container">

        <ul class="contact-list">
          <li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text phone"><a href="tel:1-212-555-5555" title="Give me a call">081523873</a></span></i></li>
          
          <li class="list-item"><i class="fa fa-envelope fa-2x"><span class="contact-text gmail"><a href="mailto:#" title="Send me an email">gamelab_event@gmail.com</a></span></i></li>
          
        </ul>

        <hr>
        <ul class="social-media-list">
          <li><a href="#" target="_blank" class="contact-icon">
            <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
          </li>
          <li><a href="#" target="_blank" class="contact-icon">
            <i class="fa fa-twitter" aria-hidden="true"></i></a>
          </li>
          <li><a href="#" target="_blank" class="contact-icon">
            <i class="fa fa-instagram" aria-hidden="true"></i></a>
          </li>       
        </ul>
        <hr>

        </div>
    
    </div>
    
</section>
<!-- partial -->
<script>document.querySelector('#contact-form').addEventListener('submit', (e) => {
    e.preventDefault();
    e.target.elements.name.value = '';
    e.target.elements.email.value = '';
    e.target.elements.message.value = '';
  });</script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>

@endsection
@section('addJs')

@endsection
