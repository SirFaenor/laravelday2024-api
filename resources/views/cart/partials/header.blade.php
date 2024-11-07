<header class="-mt-[80px] bg-pattern-gray pb-20">
    <h1 class="text-6xl lg:text-8xl font-bold text-center text-stroke">Ordine online</h1>
    <p class="container max-w-[600px] mx-auto mt-6 md:mt-10 text-md md:text-lg leading-7 text-center ">
        Scegli i piatti da ordinare.<br>
        Paga online con carta di credito o Paypal.<br>
        Quando vuoi ritirare, entro le 2 ore successive, mostra alla cassa ordini online il codice del pagamento e in quel momento ti prepareremo il vassoio.<br>
        {{-- sfruttiamo la classe link-1 disponibile tra gli stili dell'app main --}}
        <a href="#" class="link-1">Maggiori info su come funziona ≫</a>
    </p>
    <ul class="order-steps">
        <li @class(['active' => $step === 1])><span>Composizione ordine</span></li>
        <li @class(['active' => $step === 2])><span>I tuoi dati</span></li>
        <li @class(['active' => $step === 3])><span>Grazie</span></li>
    </ul>
</header>