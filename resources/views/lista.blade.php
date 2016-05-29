@extends('layout.default')

@section('title', 'Lista')

@section('content')

	<div class="title-lista" style="color:{!! $color !!};">Lista {!! $fam_name or 'Default' !!}</div>

	@include('form', ['id' => $id])

	<div class="box-table">
		<table class="table table-hover">
			<tr>
				<th>N°</th>
				<th>Nome e Cognome</th>
				<th>Et&agrave;</th>
				<th>Partecipazione</th>
				<th>Invito</th>
				<th>Indirizzo</th>
				<th>Cellulare</th>
				<th class="text-center">AZIONI</th>
			</tr>
			

			<?php $n=0; ?>

			@foreach($relatives as $relative)
				<?php $n++; ?>
				<tr>
					<td>{!! $n !!}</td>
					<td>{!! $relative->nome !!} {!! $relative->cognome !!}</td>
					<td>{!! $relative->eta !!}&nbsp;</td>
					<td>@if($relative->partecipazione==0) No @else Si @endif</td>
					<td>@if($relative->invito==0) No @else Si @endif</td>
					<td>@if($relative->indirizzo!="") {!! $relative->indirizzo !!}<br>{!! $relative->citta !!} {!! $relative->cap !!} @endif&nbsp;</td>
					<td>{!! $relative->mobile !!}&nbsp;</td>
					<td class="text-center" style="display: inline-flex;">
						<form action="{!! $fam_name. '/' . $relative->id !!}" method="get">
							<button class="btn btn-success btn-xs">MODIFICA</button>
						</form>&nbsp;
						<form action="{!! $fam_name.'/'.$relative->id.'/delete' !!}" method="get">
							<input type="hidden" name="id" value="{!! $relative->id !!}">
							<input type="hidden" name="fam" value="{!! $relative->fam !!}">
							<button class="btn btn-danger btn-xs">ELIMINA</button>
						</form>
					</td>
				</tr>
			@endforeach

		</table>
	</div>

@stop