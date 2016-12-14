@extends('layouts.static')

@section('content')


<section id="contact">
	<h2>Contact</h2>
	<div class="flex">
		<div class="contact-info flex-col">
			<h3 class="title">Joindre le lycée</h3>
			<div class="flex contact-tel">
				<div class="boxes-icon">
					<i class="fa fa-phone"></i>
				</div>
				<div class="content-inner"">
					<h4>Téléphone</h3>
					<div class="">
						<a href="tel:0123456789">01 23 45 67 89</a>
					</div>
				</div>
			</div>
			<div class="flex contact-email">
				<div class="boxes-icon">
					<i class="fa fa-envelope-o"></i>
				</div>
				<div class="content-inner"">
					<h4>Email</h3>
					<div class="">
						<a href="mailto:contact@elycee.com">contact@elycee.com</a>
					</div>
				</div>
			</div>
			<div class="flex contact-adress">
				<div class="boxes-icon">
					<i class="fa fa-map-marker"></i>
				</div>
				<div class="content-inner"">
					<h4>Adresse</h3>
					<div class="">
						66 avenue Bamboo - 75002 Paris
					</div>
				</div>
			</div>
		</div>
		<div class="contact-form">
			<h3 class="title">Envoi nous un petit message</h3>
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
								<textarea name="message" cols="40" rows="10" class="message" required="required" placeholder="Message *"></textarea>
							</p>
						</div>
					</div>
					<p class="form-submit">
						<input type="submit" value="Envoyer un message">
					</p>
				</form>
			</div>
		</div>
	</div>
	<div class="Carte">
		C'est la carte ! C'est la carte !
	</div>
</section>


@endsection