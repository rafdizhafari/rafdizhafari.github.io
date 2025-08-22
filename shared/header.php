<header>
<nav class="w-full fixed shadow-md bg-sky-200 h-[64px] z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-40">
        <div class="flex justify-between items-center h-16">
            <!-- Logo and image -->
            <div class="flex flex-row items-center gap-1">
                <img src="/img/1755576547837.png" alt="Logo Sekolah" class="size-18 items-start object-contain z-40">
                <h1 class="text-left font-medium tracking-tight text-sm md:text-base lg:text-xl z-40">UWAIS AL QORNI<br>ISLAMIC SCHOOL (UAQIS)</h1>
            </div>
            <!-- navbar for lg to md -->
            <div class="hidden md:flex text-white flex-row space-x-6">
                <a href="/">Beranda</a>
                <a href="/view/facilities.php">Fasilitas</a>
                <a href="#">Contact</a>
            </div>
            <!-- hamburger button -->
            <div class="md:hidden pt-2 transition hover:-translate-y-1 hover:scale-110 ease-in-out">
                <button id="menu-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" 
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div> 
        </div>
    </div>
    <!-- menu after hamburger -->
    <div id="menu" class="md:hidden px-4 pb-4 pt-4 bg-sky-200 right-0 shadow-md transition-all overflow-hidden duration-1000 ease-in-out max-h-0 -translate-y-30 z-20">
        <div class="flex flex-col space-y-6 w-15 text-right ml-auto">
            <a class="block" href="/">Beranda</a>
            <a class="block" href="/view/facilities.php">Fasilitas</a>
            <a class="block" href="#">Contact</a>
        </div>
    </div>
</nav>
</header>
<script>
    $(document).ready(function(){
        $("#menu-btn").click(function(){
            if ($("#menu").hasClass('max-h-0')){
                $("#menu").removeClass('-translate-y-30')
                $("#menu").removeClass('max-h-0')
                $("#menu").addClass('max-h-96')
            }else{
                $("#menu").removeClass('max-h-96')
                $("#menu").addClass('max-h-0')
                $("#menu").addClass('-translate-y-30')
            }
        })
    })
</script>