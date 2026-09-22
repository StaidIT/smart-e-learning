@for ($i = 0; $i < ($count ?? 6); $i++)
    <div
        class="sk-subject relative flex flex-col justify-between md:p-5 p-2 gap-4 rounded-xl border-[1.5px] border-[#CECBF6]/15 bg-[#CECBF6]/6"
        aria-hidden="true"
    >
        <div class="flex items-start justify-between">
            <div class="sk-sub-shimmer size-11 rounded-lg"></div>

            <div class="sk-sub-shimmer size-11 shrink-0 rounded-full"></div>
        </div>

        <div class="flex flex-col gap-1">
            <div class="h-[15px] flex items-center">
                <div class="sk-sub-shimmer h-[10px] w-10 rounded-full"></div>
            </div>

            <div class="h-[22px] flex items-center">
                <div class="sk-sub-shimmer h-4 w-3/4 rounded-full"></div>
            </div>

            <div class="h-4 flex items-center">
                <div class="sk-sub-shimmer h-3 w-1/2 rounded-full"></div>
            </div>
        </div>

        <div class="flex items-center gap-2 pt-1">
            <div class="sk-sub-shimmer flex-1 h-9 rounded-lg"></div>
            <div class="sk-sub-shimmer flex-1 h-9 rounded-lg"></div>
        </div>
    </div>
@endfor

<style>
    .sk-subject {
        min-height: 190px;
        overflow: hidden;
    }

    .sk-sub-shimmer {
        background-color: rgba(206, 203, 246, 0.10);
        background-image: linear-gradient(
            100deg,
            rgba(206, 203, 246, 0) 20%,
            rgba(206, 203, 246, 0.28) 50%,
            rgba(206, 203, 246, 0) 80%
        );
        background-size: 250% 100%;
        background-repeat: no-repeat;
        background-position: 150% 0;
        animation: sk-sub-shimmer 1.25s ease-in-out infinite;
    }

    @keyframes sk-sub-shimmer {
        0% {
            background-position: 150% 0;
        }

        100% {
            background-position: -50% 0;
        }
    }

    /*
     * If Vue keeps <subjects-card> as a DOM wrapper,
     * make its children behave like direct grid items.
     */
    #subjects .grid > subjects-card {
        display: contents;
    }

    /*
     * Hide the Blade skeleton as soon as Vue renders
     * any real subject card.
     */
    #subjects .grid:has(.group) > .sk-subject {
        display: none !important;
    }

    @media (prefers-reduced-motion: reduce) {
        .sk-sub-shimmer {
            animation: none;
        }
    }
</style>