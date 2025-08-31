<header>
<nav class="w-full fixed shadow-md bg-sky-200 h-[58px] md:h-[64px] z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-40">
        <div class="flex justify-between items-center h-16">
            <!-- Logo and image -->
            <div class="flex flex-row items-center gap-1">
                <img src="/img/1755576547837.png" alt="Logo Sekolah" class="size-18 items-start object-contain z-40">
                <h2 class="text-left font-medium tracking-tight z-40">UWAIS AL QORNI<br>ISLAMIC SCHOOL (UAQIS)</h2>
            </div>
            <!-- navbar for lg to md -->
            <div class="hidden md:flex text-white flex-row space-x-6 px-12">
                <a href="/">Beranda</a>
                <a href="/view/about.php">Tentang kami</a>
                <div class="relative group">
                    <a href="#" class="">Sekolah Kami</a>
                    <div class="absolute hidden group-hover:block bg-sky-200 p-4 py-6 w-50 -left-5 space-y-6 transition-all duration-1000">
                        <a href="#" class="block">TK Uwais Al Qorni</a>
                        <a href="/view/elementary.php" class="block">SD Uwais Al Qorni</a>
                        <a href="/view/middle.php" class="block">SMP Uwais Al Qorni</a>
                    </div>
                </div>
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
        <div class="flex flex-col space-y-6 w-24 text-right ml-auto">
            <a href="/">Beranda</a>
            <a href="/view/about.php">Tentang kami</a>
            <a href="/view/facilities.php">Fasilitas</a>
            <a href="/view/Intracurricular.php">Intrakulikuler</a>
            <a href="/view/extracurricular.php">Ekstrakulikuler</a>
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