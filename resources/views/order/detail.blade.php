{{--
/**
 * Output dettaglio ordine
 * Viene usato da
 - mail di notifica ordine
 - endpoint api per costruire dettaglio ordine ad uso del sito principale
 */
--}}

<div id="order_detail_widget">     

        <div class="recap_section">
            <header class="recap_header">                
                <h3 class="order_title">
                    {{$trads["codice_ordine"]->get()}}
                </h3>
            </header>
            <p>
                {{ $order->ordine_code }}
            </p>
            <p class="margin-top">
                <img src="{!! urldecode(route("orders.qrcode", [$order->token, 'png'], true)) !!}" alt="Qr code">
            </p>
        </div>

        <div class="recap_section">
            <header class="recap_header">                
                <h3 class="order_title">
                    {!! $trads['data_ordine']->get() !!}
                </h3>
            </header>
            <p>
                {{ 
                    $order->getConfirmDate('d.m.Y H:i:s')
                }}
                <br>
                (Scadenza : {{ $order->getExpirationDate('d.m.Y H:i:s') }})
            </p>
        </div>

        <div class="recap_section">
            <header class="recap_header">
                <h3 class="cap_text">{!! $trads['your_data']->get() !!}</h3>
            </header>
            <p>
                {!!
                       $order->customer->nome.' '.$order->customer->cognome.' <br>
                            '.$order->customer->email.' <br>
                            '.$order->customer->telefono
                !!}
            </p>
        </div>
                
        
        @if($order->note)
                <div class="recap_section -top">
                            <header class="recap_header">
                                <h3 class="cap_text">{{$trads['label_note']->get()}}</h3>
                            </header>
                            <p>{{nl2br($order->note)}}</p>
                        </div>
        @endif
       
            <div class="recap_section">
            <header class="recap_header">
                <h3 class="cap_text">{!! $trads['pagamento']->get() !!}</h3>
            </header>
            <p>
                {!! $order->payment->title !!}
            </p>
        </div>
         
        <div class="recap_section">
            <header class="recap_header">
                <h3 class="cap_text">{!! $trads['purchased_items']->get() !!}</h3>
            </header>
            <div class="recap_section-items">

        @foreach($order->items as $Product)

                     <div class="cart_item">
                        
                            <div class="qta">{{$Product->quantita}} x</div> 
                            <div class="title">
                                <p class="item_name">{!!$Product->title!!}</p>
                                @if($Product->subtitle):
                                <p class="item_info ">{!!$Product->subtitle!!}</p>
                                @endif
                            </div>
                            <p class="price">
                                {{ $Product->prezzo2 < $Product['prezzo'] ? '<del>'.app()->CalculatorService->formatPrice($Product['prezzo']).'</del>' : '' }}
                                {{ app()->CalculatorService->formatPrice($Product['prezzo2']) }}
                            </p>

                    </div>
        @endforeach
            </div>
        </div>

        <div class="recap_section">
            <header class="recap_header">
                <h3>{!! $trads['subtotal']->get() !!}</h3>
            </header>
            <div class="recap_section-items">
                <div class="cart_item">
                    <div class="qta"> </div> 
                    <div class="title"> </div> 
                    <div class="price">{{ app()->CalculatorService->formatPrice($order->totale) }} </div> 
                </div>
            </div>
        </div>

        <div class="recap_section">
            <header class="recap_header">
                <h3>{!! $trads['stato_ordine']->get() !!}</h3>
            </header>

            <p><strong>{!! $trads["label_order_status_".$order->stato]->get() !!}</strong></p>

            <p class="margin-top">
                {{-- Valorizzare la variaible $refundLink nello script controller --}}
                @if($refundLink)
                <a class="btn rounded yellow" id="refund-link" href="{{ $refundLink }}">{{ $trads["richiedi_rimborso"] }}</a>
                @else
                    {{-- $trads["order_refund_disabled"]->get() --}}
                @endif
            </p>
        </div>

</div>
<style type="text/css">
        #order_detail_widget {
            padding: 5vw 0;
            font-size: 1em;
            text-align: left;
         }
        
        #order_detail_widget .recap_section {
            line-height: 1.5;
        }
        #order_detail_widget .recap_section + .recap_section {margin-top: 50px;}
        
        #order_detail_widget .recap_section .recap_header {
            border-bottom: 1px solid #323232;
            margin-bottom: 1em;
        }
        
        
        #order_detail_widget .recap_section .recap_header h3 {
            margin: 0;
            font-size: 1.25em;
            color: #323232;
        }
        
        #order_detail_widget .recap_section p {margin: 0; font-size: 1em;}
        
        #order_detail_widget .recap_section-items .cart_item {
            display: flex;
        }
        
        #order_detail_widget .recap_section-items .cart_item + .cart_item {margin-top: 1em;}
        
        #order_detail_widget .recap_section-items .cart_item > * {
            padding: 0 1em;
        }
        #order_detail_widget .recap_section-items .cart_item .qta {width: 15%;}
        #order_detail_widget .recap_section-items .cart_item .title {width: 75%;}
        #order_detail_widget .recap_section-items .cart_item .price {width: 20%; text-align: right;}
        
        #order_detail_widget .recap_section #cart_subsection_subtotal {
            border-bottom: 0
        }

        #order_detail_widget p.margin-top {margin-top: 2em;}

        
</style>