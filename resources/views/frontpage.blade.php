{{-- filepath: c:\Users\larsh\Herd\E5_OefenExamen\resources\views\frontpage.blade.php --}}
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MakersMarkt | Welkom</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
</head>
<body class="min-h-screen bg-[#f5f1e7] text-[#2f2923] overflow-x-hidden">
    <main class="min-h-screen flex items-center justify-center p-6 relative">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,#c9793920,transparent_35%),radial-gradient(circle_at_80%_25%,#a66a3a1c,transparent_35%)]"></div>

        <section class="relative w-full max-w-3xl">
            <div class="js-card bg-[#fffaf0]/95 border border-[#e8dcc8] rounded-3xl p-8 shadow-xl">
                <img
                    src="{{ asset('IMG/MakersMarkt.png') }}"
                    alt="MakersMarkt logo"
                    class="js-logo w-24 h-24 rounded-2xl mb-5 shadow-md"
                >

                <p class="js-kicker text-sm tracking-[0.2em] uppercase text-[#9a6a3f] mb-2">MakersMarkt</p>

                <h1 class="js-title text-4xl md:text-5xl font-black leading-tight mb-4 text-[#2f2923]">
                    Welkom bij MakersMarkt
                </h1>

                <a href="{{ Route::has('login') ? route('login') : url('/login') }}" class="js-login-btn inline-flex w-auto self-start justify-center rounded-lg bg-[#b8743a] hover:bg-[#a66631] text-black font-semibold px-5 py-2.5 shadow-md transition-colors duration-200">Inloggen</a>

                <p class="js-text text-[#5e5245] leading-relaxed mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <p class="js-text text-[#6f6154] leading-relaxed mb-6">
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>

                <h2 class="text-2xl font-bold mb-3 text-[#2f2923]">Verkoop je eigen producten!</h2>

                <a href="{{ Route::has('login') ? route('login') : url('/login') }}" class="js-login-btn inline-flex w-full justify-center rounded-xl bg-[#c97939] hover:bg-[#b56d33] text-black font-bold py-3">Producten verkopen!</a>
            </div>
        </section>
    </main>

    <script>
        gsap.from(".js-card", {
            y: 36,
            opacity: 0,
            duration: 1,
            stagger: 0.25,
            ease: "power3.out"
        });

        gsap.from(".js-logo", {
            scale: 1,
            opacity: 0,
            duration: 1,
            delay: 0.25,
            ease: "back.out(1.6)"
        });

        gsap.from(".js-kicker, .js-title, .js-text", {
            y: 16,
            opacity: 0,
            duration: 1,
            stagger: 0.1,
            delay: 0.25,
            ease: "power2.out"
        });

        gsap.from(".js-login-btn", {
            y: 10,
            opacity: 0,
            duration: 0.5,
            delay: 1,
            ease: "power2.out"
        });
    </script>
</body>
</html>
