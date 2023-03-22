<footer id="footer" class="h-fit p-5 gap-5 md:p-10 bg-d-green">
    {{-- main item --}}
    <div class="h-fit flex justify-around items-center ">
        {{-- logo --}}
        <div class="">
            <img src="{{ asset('images/logo/2_transparent_logo_white.png') }}" height="150px" width="150px" alt="">
        </div>
        {{-- divider --}}
        {{-- right section --}}
        <div class="md:h-5/6 flex gap-5 md:gap-20">
            {{-- help and information --}}
            <div class="w-1/2">
                {{-- <h6 class="text-white font-bold">Aide et Informations</h6>
                <br> --}}
                <div class="text-gray-400">
                    {{-- <a href="#">A propos</a> <br> --}}
                    {{-- <a href="#">Mode de paiement</a> <br>
                    <a href="#">Livraison standard</a> <br>
                    <a href="#">CGV</a> --}}
                    <div class="flex justify-center items-center gap-5">
                        <x-akar-shipping-box-v2 class="w-10 text-white" />
                        <p class="text-white">
                            Expédition en 24h et livraison sous 48h/72h
                        </p>
                    </div>
                </div>
            </div>
            {{-- contacts --}}
            <div class="w-1/2">
                <h6 class="text-white font-bold">Nous contacter</h6>
                <br>
                <div class="text-gray-400">
                    <a href="#">8 Place de Geneve. 7300 Chambery</a> <br>
                    <a href="#">contact@hairclip.fr</a> <br>
                </div>
            </div>
        </div>
    </div>
    {{-- copyright --}}
    <div class="w-full mt-9 flex items-center justify-center">
        <div class="text-white">Full Created by miarajoris.com</div>
    </div>
</footer>
