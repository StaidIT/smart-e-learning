<nav id="navbar-skeleton"
     class="sk-nav bg-[#eef0f3] w-full max-w-2xl h-[50px] fixed md:top-[15px] left-1/2 -translate-x-1/2 z-[60] flex items-center justify-between md:px-4 px-6 md:rounded-full overflow-hidden shadow-xs shadow-gray-200"
     style="transition: opacity .25s ease;"
     aria-hidden="true">

    <!-- Logo -->
    <div class="sk-block h-[14px] w-[115px] rounded-full"></div>

    <!-- Links (desktop only) -->
    <ul class="hidden md:flex items-center justify-center gap-4 m-0 p-0 list-none">
        <li class="sk-block h-[10px] w-[34px] rounded-full"></li>
        <li class="sk-block h-[10px] w-[52px] rounded-full"></li>
        <li class="sk-block h-[10px] w-[30px] rounded-full"></li>
        <li class="sk-block h-[10px] w-[72px] rounded-full"></li>
    </ul>

    <!-- Avatar -->
    <div class="py-2">
        <div class="sk-block w-8 h-8 rounded-full"></div>
    </div>

</nav>

<style>
/* Placeholder blocks (slightly darker than the bar) */
.sk-block {
    background-color: #dcdfe4;
}

/* One shimmer sweep across the ENTIRE navbar */
.sk-nav::after {
    content: "";
    position: absolute;
    inset: 0;
    pointer-events: none;
    background: linear-gradient(
        100deg,
        rgba(255, 255, 255, 0) 30%,
        rgba(255, 255, 255, 0.9) 50%,
        rgba(255, 255, 255, 0) 70%
    );
    transform: translateX(-100%);
    animation: sk-nav-sweep 1.4s ease-in-out infinite;
}

@keyframes sk-nav-sweep {
    0%   { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

@media (prefers-reduced-motion: reduce) {
    .sk-nav::after { animation: none; opacity: 0; }
}
</style>

<script>
    (function () {
        var sk = document.getElementById('navbar-skeleton');
        if (!sk) return;

        var root = document.documentElement;
        var hideTimer = null;
        var observer = null;

        function show() {
            root.classList.add('is-loading'); // swaps real cards for skeletons too
            clearTimeout(hideTimer);
            sk.style.display = '';
            void sk.offsetWidth; // force reflow so the fade runs
            sk.style.opacity = '1';
        }

        function hide() {
            root.classList.remove('is-loading');
            sk.style.opacity = '0';
            clearTimeout(hideTimer);
            hideTimer = setTimeout(function () { sk.style.display = 'none'; }, 250);
            if (observer) { observer.disconnect(); observer = null; }
        }

        // The real navbar is the <nav> Vue renders inside #app
        function realNavExists() {
            return !!document.querySelector('#app nav');
        }

        // Hide as soon as Vue has rendered the real navbar
        if (realNavExists()) {
            hide();
        } else {
            observer = new MutationObserver(function () {
                if (realNavExists()) hide();
            });
            observer.observe(document.documentElement, { childList: true, subtree: true });
        }

        // Safety net: never leave it stuck on screen
        window.addEventListener('load', function () {
            setTimeout(hide, 4000);
        });

        // Refresh via keyboard (F5, Ctrl+R, Cmd+R): show first, then reload
        document.addEventListener('keydown', function (e) {
            var isRefresh = e.key === 'F5' || ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'r');
            if (!isRefresh) return;
            e.preventDefault();
            show();
            requestAnimationFrame(function () {
                requestAnimationFrame(function () { location.reload(); });
            });
        });

        // Clicking a link to another page
        document.addEventListener('click', function (e) {
            var a = e.target.closest && e.target.closest('a[href]');
            if (!a || e.defaultPrevented || e.button !== 0) return;
            if (e.ctrlKey || e.metaKey || e.shiftKey || e.altKey) return;
            if (a.target === '_blank' || a.hasAttribute('download')) return;
            var url = new URL(a.href, location.href);
            if (url.origin !== location.origin) return;
            if (url.pathname === location.pathname && url.search === location.search) return; // #hash links
            show();
        });

        // Browser refresh button / any other unload
        window.addEventListener('beforeunload', show);

        // Back/forward cache restore: don't leave it stuck on screen
        window.addEventListener('pageshow', function (e) {
            if (e.persisted) hide();
        });
    })();
</script>