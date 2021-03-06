@extends('layouts.master')

@section('content')


<section id="contact">
	<div class="contact-content flex">
		<div class="contact-info flex-col">
			<h3>Coordonnées</h4>
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
			<h3 class="title">Contactez-nous</h3>
			<div class="contact-form">
				<form action="" method="" novalidate="novalidate">
					<div class="flex">
						<div class="form-left flex-col">
							<input type="text" name="nom" value="" class="nom" required="required" placeholder="Nom *">
							<input type="text" name="email" value="" class="email" required="required" placeholder="Email *">
							<input type="text" name="sujet" value="" class="sujet" placeholder="Sujet">
						</div>
						<div class="form-right">
							<textarea name="message" cols="40" rows="6" class="message" required="required" placeholder="Message *"></textarea>
						</div>
					</div>
					<p class="form-submit">
						<input type="submit" class="submit" value="Envoyer un message">
					</p>
				</form>
			</div>
		</div>
	</div>
	<div class="carte">
		<p>
			<img src="{{ URL::asset('images/carte.jpg') }}" alt="" title="Carte">
		</p>
	</div>
</section>

@endsection