     <style>
         #gallery-viewer {
             visibility: hidden;
             position: absolute;
             z-index: 9999;
             top: 0;
             left: 0;
             width: 100vw;
             height: 100vh;
             padding-top: 64px;
             padding-bottom: 64px;
             background-color: rgba(0, 0, 0, 0.5);
         }

         #main-gallery-item {

             background-size: cover;
             background-repeat: no-repeat no-repeat;
             background-position: center center;
         }

         #video-viewer {
             visibility: hidden;
             position: absolute;
             z-index: 9999;
             top: 0;
             left: 0;
             display: flex;
             justify-content: center;
             align-items: center;
             width: 100vw;
             height: 100vh;
             padding-top: 64px;
             padding-bottom: 64px;
             background-color: rgba(0, 0, 0, 0.5);
             filter: blur(1);
         }
     </style>

     <section class="overflow-hidden text-neutral-700">
         <div class="container mx-auto px-5 py-2">
             <div class="gallery -m-1 flex flex-wrap md:-m-2">
                 <div class="flex w-1/2 flex-wrap">
                     <div class="w-1/2 p-1 md:p-2 max-h-80">
                         <img alt="gallery"
                             class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item block h-full w-full rounded-lg object-cover object-center "
                             src="{{ asset('images/images/HairClip-02.jpg') }}" />
                     </div>
                     <div class="w-1/2 p-1 md:p-2 max-h-80">
                         <img alt="gallery"
                             class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                             src="{{ asset('images/images/HairClip-01.jpg') }}" />
                     </div>
                     <div id="last-col-1-item" class="w-full p-1 md:p-2 max-h-96">
                         <img alt="gallery"
                             class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                             src="{{ asset('images/images/HairClip-03.jpg') }}" />
                     </div>
                 </div>
                 <div class="flex w-1/2 flex-wrap">
                     <div class="w-full p-1 md:p-2 max-h-96">
                         <img id="video-preview-2" alt="gallery"
                             class="block h-full w-full rounded-lg object-cover object-center "
                             src="{{ asset('images/video-preview/video-preview-2.png') }}" />
                     </div>
                     <div class="w-1/2 p-1 md:p-2 max-h-80">
                         <img alt="gallery"
                             class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                             src="{{ asset('images/images/HairClip-14.jpg') }}" />
                     </div>
                     <div id="last-col-2-item" class="w-1/2 p-1 md:p-2 max-h-80">
                         <img alt="gallery"
                             class="transition ease-in-out hover:scale-[1.025] hover:shadow-sm gallery-item  block h-full w-full rounded-lg object-cover object-center "
                             src="{{ asset('images/images/HairClip-15.jpg') }}" />
                     </div>
                 </div>
             </div>
         </div>
     </section>
     {{-- video player --}}
     <div onclick="closeVideo()" id="video-viewer">
         {{-- <iframe src="https://drive.google.com/file/d/1-5eXfTUb4q6cA6ljtBNfLA3wefJNJ2sc/preview"
             class="md:h-full w-[500px] md:w-10/12 h-[400px]  md:min-h-[400px]" allow="autoplay"></iframe> --}}
     </div>
     {{-- image viewer --}}
     <div id="gallery-viewer" class="flex items-center justify-between md:justify-around gap-2 sm:gap-10">
         <div class="left-arrow h-96 flex items-center hover:bg-white hover:bg-opacity-10 transition ease-in-out">
             <x-gmdi-arrow-back-ios-new-r class="h-10 w-10 text-white" onclick="scrollProducts('l')" />
         </div>
         <div id="main-gallery-item" class="w-[500px] h-[300px] md:w-[50vw] md:h-[80vh] rounded-lg">
         </div>
         <div class="right-arrow h-96 flex items-center hover:bg-white hover:bg-opacity-10 transition ease-in-out">
             <x-gmdi-arrow-back-ios-new-r style="transform: scaleX(-1);" class="h-10 w-10 text-white"
                 onclick="scrollProducts('r')" />
         </div>
     </div>

     @section('component-script')
         <script>
             const item_1 = document.getElementById("video-preview-1");
             const item_2 = document.getElementById("video-preview-2");
             const videoContainer = document.getElementById("video-viewer");
             item_1.addEventListener("click", function(e) {
                 videoContainer.style.top = document.documentElement.scrollTop + "px"
                 videoContainer.style.visibility = 'visible';
                 disableScroll(e);
             })
             item_2.addEventListener("click", function(e) {
                 videoContainer.style.top = document.documentElement.scrollTop + "px"
                 videoContainer.style.visibility = 'visible';
                 disableScroll(e);
             })

             function closeVideo() {
                 videoContainer.style.visibility = 'hidden';
                 window.onscroll = function() {};

             }
         </script>

         <script>
             let imgs = document.querySelectorAll('.gallery .gallery-item');
             let container = document.querySelector('#gallery-viewer');
             let image = document.querySelector("#main-gallery-item");
             let current_index = 0;
             //
             imgs.forEach((img, index) => {
                 img.addEventListener('click', function(e) {
                     container.style.top = document.documentElement.scrollTop + "px"
                     container.style.visibility = 'visible';
                     image.style.backgroundImage = 'url(' + img.src + ')';
                     current_index = Array.prototype.indexOf.call(imgs, img);
                     disableScroll(e);
                 });
             });

             function resetGallery() {
                 imgs = document.querySelectorAll('.gallery .gallery-item');
                 imgs.forEach((img, index) => {
                     img.addEventListener('click', function(e) {
                         container.style.top = document.documentElement.scrollTop + "px"
                         container.style.visibility = 'visible';
                         image.style.backgroundImage = 'url(' + img.src + ')';
                         current_index = Array.prototype.indexOf.call(imgs, img);
                         disableScroll(e);
                     });
                 });
             }

             function disableScroll() {
                 var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                 var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
                 window.onscroll = function() {
                     window.scrollTo(scrollLeft, scrollTop);
                 };
             }
             container.addEventListener("click", function(e) {
                 e.stopPropagation();
                 if (e.target !== e.currentTarget) return;
                 container.style.visibility = "hidden"
                 // enable scroll
                 window.onscroll = function() {};
             })
             //
             const left_arrow = document.querySelector('.left-arrow');
             const right_arrow = document.querySelector('.right-arrow');
             //
             left_arrow.addEventListener('click', (e) => {
                 if (current_index === 0) {
                     image.style.backgroundImage = 'url(' + imgs[imgs.length - 1].src + ')';
                     current_index = imgs.length - 1;
                     return;
                 }
                 image.style.backgroundImage = 'url(' + imgs[current_index - 1].src + ')';
                 current_index--;
             });
             right_arrow.addEventListener('click', (e) => {
                 if (current_index === imgs.length - 1) {
                     image.style.backgroundImage = 'url(' + imgs[0].src + ')';
                     current_index = 0;
                     return;
                 }
                 image.style.backgroundImage = 'url(' + imgs[current_index + 1].src + ')';
                 current_index++;
             });
         </script>
     @endsection
