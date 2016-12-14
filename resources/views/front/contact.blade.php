@extends('layouts.static')

@section('content')


<section id="contact">
	<h2>Contact</h2>
	<div class="contact-content flex">
		<div class="contact-info flex-col">
			<h3 class="title">Joins le lycée</h3>
			<div class="flex part contact-tel">
				<div class="boxes-icon">
					<i class="fa fa-phone"></i>
				</div>
				<div class="">
					<h4>Téléphone</h4>
					<div class="text">
						<a href="tel:0123456789">01 23 45 67 89</a>
					</div>
				</div>
			</div>
			<div class="flex part contact-email">
				<div class="boxes-icon">
					<i class="fa fa-envelope-o"></i>
				</div>
				<div class="">
					<h4>Email</h4>
					<div class="text">
						<a href="mailto:contact@elycee.com">contact@elycee.com</a>
					</div>
				</div>
			</div>
			<div class="flex part contact-adress">
				<div class="boxes-icon">
					<i class="fa fa-map-marker"></i>
				</div>
				<div class="">
					<h4>Adresse</h4>
					<div class="text">
						66 avenue Bamboo 75002 Paris
					</div>
				</div>
			</div>
		</div>
		<div class="contact-form">
			<h3 class="title">Envoi-nous un petit message</h3>
			<div class="contact-form">
				<form action="" method="post" novalidate="novalidate">
					<div class="flex">
						<div class="form-left flex-col">
							<p>
								<input type="text" name="nom" value="" class="nom" required="required" placeholder="Nom *">
							</p>
							<p>
								<input type="text" name="email" value="" class="email" required="required" placeholder="Email *">
							</p>
							<p>
								<input type="text" name="sujet" value="" class="sujet" placeholder="Sujet">
							</p>
						</div>
						<div class="form-right">
							<p>
								<textarea name="message" cols="40" rows="6" class="message" required="required" placeholder="Message *"></textarea>
							</p>
						</div>
					</div>
					<p class="form-submit">
						<input type="submit" class="submit" value="Envoyer un message">
					</p>
				</form>
			</div>
		</div>
	</div>
	<div class="Carte">
		C'est la carte ! C'est la carte !
	</div>
</section>

<style type="text/css">

	*, *:before, *:after { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }
	p { margin-bottom: 20px; }

	/* FORMULAIRES */
	input[type=text], input[type=email], input[type=tel], input[type=number], input[type=date], form select, form textarea {width: 100%; background: #fff; border: 1px solid #e5e5e5; border-radius: 0; box-shadow: none; min-height: 40px; padding: 5px 10px; line-height: 28px; font-size: 12px; -webkit-transition: all .3s ease-in-out; -moz-transition: all .3s ease-in-out; -o-transition: all .3s ease-in-out; -ms-transition: all .3s ease-in-out; transition: all .3s ease-in-out; }
	.submit { margin-top: 20px; clear: both; border-radius: 30px; padding: 5px 30px; font-size: 13px; font-weight: 700; line-height: 30px; text-transform: uppercase; border: 0; color: #fff; }

	/* PAGE CONTACT */
	#contact .contact-content { justify-content: space-between; }
	#contact .contact-content > div  { width: 50%; margin: 30px 0; }
	#contact h3.title { color: #333; text-transform: uppercase; font-size: 20px; line-height: 30px; font-weight: 600; margin-bottom: 30px; }

	#contact .contact-info .boxes-icon { width: 30px; height: 30px; margin: 10px 10px 0 0; }
	#contact .contact-info .part { margin-bottom: 30px; }
	#contact .contact-info .part h4 { font-size: 16px; line-height: 16px; font-weight: 600; margin: 0 0 10px; }
	#contact .contact-info .part .text,
	#contact .contact-info .part .text a { color: #666; }
	#contact .contact-info .part .text a:hover { color: #439fdf; font-weight: 600; }

	#contact .contact-form .form-left { width: 50%; padding-right: 15px; float: left; }
	#contact .contact-form input.submit { background: #439fdf; }

</style>


@endsection