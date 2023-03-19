<footer id="footer" class="h-fit p-5 gap-5 md:p-10 bg-neutral-700">
    {{-- main item --}}
    <div class="h-6/5 flex flex-col justify-around items-center ">
        {{-- logo --}}
        <div class="h-5/6">
            <img src="{{ asset('images/logo/2_transparent_logo_white.png') }}" height="150px" width="150px" alt="">
        </div>
        {{-- divider --}}
        <div></div>
        {{-- right section --}}
        <div class="md:h-5/6 flex gap-5 md:gap-20">
            {{-- help and information --}}
            <div class="w-1/2">
                <h6 class="text-white font-bold">Aide et Informations</h6>
                <br>
                <div class="text-gray-400">
                    <a href="#">A propos</a> <br>
                    <a href="#">Mode de paiement</a> <br>
                    <a href="#">Livraison standard</a> <br>
                    <a href="#">CGV</a>
                </div>
            </div>
            {{-- contacts --}}
            <div class="w-1/2">
                <h6 class="text-white font-bold">Nous contacter</h6>
                <br>
                <div class="text-gray-400">
                    <a href="#">16 rue Hair clip, 75003 Paris</a> <br>
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
