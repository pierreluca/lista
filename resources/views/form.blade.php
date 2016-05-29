<?php
if($id==0):
	$title_form="Aggiungi nuovo";
	$action=$fam_name;
else:
	$title_form="Modifica";
	$action=$id;
endif;
?>
<div class="box">
	
	<div class="h2 title-form">{!! $title_form !!}</div>

	<form action="{!! $action !!}" method="post">
		{{ csrf_field() }}

		<input type="hidden" name="fam" value="{!! $id_fam !!}">
		
		@if($id!=0) <input type="hidden" name="id" value="{!! $id !!}"> @endif

		<div class="row">
			<div class="col-xs-6">
				<div class="row">
					<div class="col-xs-6">
						<input type="text" name="nome" class="form-control" placeholder="Nome" @if($id!=0) value="{!! $relatives[0]->nome !!}" @endif>
					</div>
					<div class="col-xs-6">
						<input type="text" name="cognome" class="form-control" placeholder="Cognome" @if($id!=0) value="{!! $relatives[0]->cognome !!}" @endif>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<select name="eta" class="form-control">
							<option value="" @if($id!=0 && $relatives[0]->eta=='') selected @endif>-- Seleziona l'et&agrave; --</option>
							<option value="Adulto" @if($id!=0 && $relatives[0]->eta=='Adulto') selected @endif>Adulto</option>
							<option value="Bambino" @if($id!=0 && $relatives[0]->eta=='Bambino') selected @endif>Bambino</option>
							<option value="Neonato" @if($id!=0 && $relatives[0]->eta=='Neonato') selected @endif>Neonato</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="row check-area">
							<div class="col-xs-6">
								<input id="check1" type="checkbox" name="partecipazione" value="1" @if($id!=0 && $relatives[0]->partecipazione==1) checked @endif />
					  			<label for="check1">Partecipazione</label>
							</div>
							<div class="col-xs-6">
								<input id="check2" type="checkbox" name="invito" value="1" @if($id!=0 && $relatives[0]->invito==1) checked @endif/>
									<label for="check2">Invito</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-6">
				<div class="row @if($id==0 || ($id!=0 && $relatives[0]->invito==0 && $relatives[0]->partecipazione==0)) hidden @endif add-info-area">
					<div class="col-xs-12">
						<input type="text" name="indirizzo" class="form-control" placeholder="Indirizzo" @if($id!=0) value="{!! $relatives[0]->indirizzo !!}" @endif>
					</div>
				</div>
				<div class="row @if($id==0 || ($id!=0 && $relatives[0]->invito==0 && $relatives[0]->partecipazione==0)) hidden @endif add-info-area">
					<div class="col-xs-8">
						<input type="text" name="citta" class="form-control" placeholder="Città" @if($id!=0) value="{!! $relatives[0]->citta !!}" @endif>
					</div>
					<div class="col-xs-4">
						<input type="text" name="cap" class="form-control" placeholder="CAP" @if($id!=0) value="{!! $relatives[0]->cap !!}" @endif>
					</div>
				</div>
				<div class="row @if($id==0 || ($id!=0 && $relatives[0]->invito==0 && $relatives[0]->partecipazione==0)) hidden @endif add-info-area">
					<div class="col-xs-5">
						<input type="text" name="mobile" class="form-control" placeholder="Cellulare" @if($id!=0) value="{!! $relatives[0]->mobile !!}" @endif>
					</div>
					<div class="col-xs-7">
						<input type="text" name="note" class="form-control" placeholder="Aggiungi note" @if($id!=0) value="{!! $relatives[0]->note !!}" @endif>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				@if($id!=0)
					<input type="submit" class="btn btn-primary" value="SALVA">
					<input type="button" onclick="history.back(-1)" class="btn btn-warning" value="ANNULLA">
				@else
					<input type="submit" class="btn btn-primary" value="REGISTRA">
					<input type="reset" class="btn btn-warning" value="RESET">
				@endif
			</div>
		</div>
	</form>
</div>

<script>
$(document).ready(function(){
    $("#check1, #check2").click(function(){
			if ($('input#check1').is(':checked') || $('input#check2').is(':checked')) {
				$(".add-info-area").removeClass( "hidden" );
			}
			else{
				$(".add-info-area").addClass( "hidden" );
			}
    });
});
</script>