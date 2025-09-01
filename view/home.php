<section class="bg-white pt-16">
    <!-- image placeholder -->
    <div class="w-full h-[500px] bg-zinc-100">
        <img src="" class="slide-image w-full h-full object-cover object-center transition-opacity duration-500 ease-in-out">
    </div>
    <!-- paraghraph middle -->
    <div class="@container mx-auto p-12 space-y-12 max-w-4xl">
        <div class="text-center justify-center mx-auto space-y-8">
            <img class="size-50 mx-auto" src="../img/1755576547837.png" alt="Logo Sekolah">
            <div class="flex mx-auto text-center items-center justify-center p-8 space-x-50 translate-x-4">
                <h2 class="text-4xl">TK</h2>
                <h2 class="text-4xl">SD</h2>
                <h2 class="text-4xl">SMP</h2>
            </div>
            <h1>VISI</h1>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, vero. Reprehenderit nobis nesciunt modi saepe fuga corrupti iste, cumque aliquam et quasi mollitia numquam error minus fugiat hic facilis? Eligendi!</p>
            <h1>MISI</h1>
            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita consequatur eius recusandae ad sint dolorem atque officiis sunt labore aliquid? Aperiam nostrum ipsam facilis qui ab repudiandae quaerat maiores sint.</p>
        </div>
        <div class="text-center justify-center space-y-4 [&>h1]:text-3xl">
            <h1>Keunggulan Kami</h1>
            <ul class="text-justify list-disc ml-5">
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet consectetur.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
            </ul>
        </div>
        <div class="text-center justify-center space-y-4 [&>h1]:text-3xl">
            <h1>Keluaran Sekolah Kami</h1>
            <ul class="text-justify list-disc ml-5">
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime suscipit veritatis perspiciatis.</li>
            </ul>
        </div>
    </div>
    <!-- image dot -->
    <div class="relative">
        <!-- <div id="slide-left-image" class="absolute -top-58 left-0 bg-zinc-400 p-1">
            <svg id="slide-left" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </div>
        <div id="slide-right-image" class="absolute -top-58 right-0 bg-zinc-400 p-1">
            <svg id="slide-right" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </div> -->
        <div id="image-stage" class="absolute -top-700 left-1/2 -translate-x-1/2">
            <div class="flex flex-row space-x-2">
                <svg height="12" width="12" xmlns="http://www.w3.org/2000/svg">
                    <circle class="pic transition-colors duration-500 fill-white" r="5" cx="6" cy="6"/>
                </svg>
                <svg height="12" width="12" xmlns="http://www.w3.org/2000/svg">
                    <circle class="pic transition-colors duration-500 fill-white" r="5" cx="6" cy="6" />
                </svg>
                <svg height="12" width="12" xmlns="http://www.w3.org/2000/svg">
                    <circle class="pic transition-colors duration-500 fill-white" r="5" cx="6" cy="6" />
                </svg>
                <svg height="12" width="12" xmlns="http://www.w3.org/2000/svg">
                    <circle class="pic transition-colors duration-500 fill-white" r="5" cx="6" cy="6" />
                </svg>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        let state = 0
        let image_page = 0
        setTimeout(() => {
            $(".slide-image").attr("src","/img/1755576547837.png")
            setInterval(function(){
                $(".pic").addClass("fill-white")
                $(".pic").eq(state).removeClass("fill-white").addClass("fill-black")
                state = (state+1) % 4

                image_page = (image_page+1) % 4
                $(".slide-image").attr("src",`img/pic${image_page}.jpg`)
            },8000)    
        }, 0);
        
    })
</script>