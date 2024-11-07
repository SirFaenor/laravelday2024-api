{{-- notifica ad admin di richiesta di rimborso --}}
@extends('mails.layout')

@section('content')
	
	<div class="section">
		Richiesta di rimborso ordine da utente
		<br>
		Codice Ordine: {{ $order->ordine_code }} <br>
		Utente: {{ $order->customer->nome.' '.$order->customer->cognome }} <br>
		Link pannello: <a href="{{ config("app.frontsite_url").'/area_amministrazione/func/function_update_item.php?id_item='.$order->id.'&n=ordini_attivi' }}">entra</a>
		
	</div>


@endsection