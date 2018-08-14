<?php 

	include 'header.php';

?>

	

		<form class="panel-body" method="POST" action="zgloszenie.php" >
			<fieldset class="well">
			<h3 class="panel-heading">PRZYJMOWNAIE ZGŁOSZENIA</h3>
			<br />
			<div class="panel-body panel panel-primary">
				<h4 class="panel-heading ">Dane klienta</h4>
					<div class="form-group-text">
						<label for="text">Imię: </label>
						<input type="text" required name="imie" id="imie" class="form-control" placeholder="Imię">
					</div>
					<div class="form-group-text">
						<label for="text">Nazwisko: </label>
						<input type="text" required name="nazwisko" id="nazwisko" class="form-control" placeholder="Nazwisko">
					</div>
					<div class="form-group-text">
						<label for="text">Telefon: </label>
						<input type="text" required name="telefon" id="telefon" class="form-control" placeholder="Telefon">
					</div>
					<div class="form-group-text">
						<label for="text">E-mail: </label>
						<input type="email" required name="email" id="email" class="form-control" placeholder="E-mail">
					</div>
				</div>
			
				<div class="panel-body panel panel-success">
					<h4 class="panel-heading">Adres</h4>
				
					<div class="form-group-text">
						<label for="text">Ulica: </label>
						<input type="text" required name="ulica" id="ulica" class="form-control" placeholder="Ulica">
					</div>
					<div class="form-group-text">
						<label for="text">Numer domu: </label>
						<input type="text" required name="nr_domu" id="nr_domu" class="form-control" placeholder="Nr domu">
					</div>
					<div class="form-group-text">
						<label for="text">Numer mieszkania: </label>
						<input type="text" required name="nr_mieszkania" id="nr_mieszkania" class="form-control" placeholder="Nr mieszkania">
					</div>
					<div class="form-group-text">
						<label for="text">Kod pocztowy: </label>
						<input type="text" required name="kod_pocztowy" id="kod_pocztowy" class="form-control" placeholder="00-000">
					</div>
					<div class="form-group-text">
						<label for="text">Miejscowość: </label>
						<input type="text" required name="miejscowosc" id="miejscowosc" class="form-control" placeholder="Miejscowość">
					</div>
				</div>
			<div class="panel-body panel panel-info">	
			<h4 class="panel-heading">Przyjęty sprzęt</h4>
				
					<div class="form-group-text">
						<label for="text">Marka: </label>
						<input type="text" required name="marka" id="marka" class="form-control" placeholder="Marka">
					</div>
					<div class="form-group-text">
						<label for="text">Model: </label>
						<input type="text" required name="model" id="model" class="form-control" placeholder="Model">
					</div>
					<div class="form-group-text">
						<label for="text">Numer Seryjny: </label>
						<input type="text" required name="numer_seryjny" id="numer_seryjny" class="form-control" placeholder="N/S">
					</div>
				<div class="panel">
					<div class="form-group col-xs-12">
						<label for="textarea">Opis Usterki: </label>
						<textarea rows="10" required name="opis_usterki" id="opis_usterki" class="form-control" placeholder="Opis Usterki"></textarea>
					</div>
				</div>
			</div>
			<div class="panel-body panel panel-info">
				<h4 class="panel-heading">Przyjęty sprzęt i akcesoria</h4>
			
				<div class="form-group col-xs-12">
					<label for="textarea">Przyjęty sprzęt: </label>
					<textarea rows="10" required name="przyjety_sprzet" id="przyjety_sprzet" class="form-control" placeholder="Przyjęty sprzęt, aparat, laptop, ładowarka, bateria, torba, karta pamięci, dodatkowe kable itp."></textarea>
				</div>
			</div>
				<input type="submit" value="Zapisz zgłoszenie" name="zgloszenie" class="btn btn-primary btn-block">
			</fieldset>
		</form>

		
	</div>

	
<?php 

	include 'footer.php';

?>