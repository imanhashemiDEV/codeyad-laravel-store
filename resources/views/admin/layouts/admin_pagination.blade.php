@php
    if (! isset($scrollTo)) {
        $scrollTo = 'body';
    }

    $scrollIntoViewJsSnippet = ($scrollTo !== false)
        ? <<<JS
           (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
        JS
        : '';
@endphp


@if ($paginator->hasPages())
    <ul role="navigation" aria-label="Pagination Navigation"
        class="inline-flex items-center m-auto space-x-1 rtl:space-x-reverse">
        <li>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button type="button"
                        class="flex justify-center rounded border-2 border-[#e0e6ed] px-3.5 py-2 font-semibold text-dark transition hover:border-primary hover:text-primary dark:border-[#191e3a] dark:text-white-light dark:hover:border-primary">
                    قبلی
                </button>
            @else
                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                        class="flex justify-center rounded border-2 border-[#e0e6ed] px-3.5 py-2 font-semibold text-dark transition hover:border-primary hover:text-primary dark:border-[#191e3a] dark:text-white-light dark:hover:border-primary">
                    قبلی
                </button>
            @endif
        </li>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li aria-disabled="true">
                    <button
                        class="flex justify-center rounded border-2 border-[#e0e6ed] px-3.5 py-2 font-semibold text-dark transition hover:border-primary hover:text-primary dark:border-[#191e3a] dark:text-white-light dark:hover:border-primary">{{ $element }}
                    </button>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                                <button
                                                    class="flex justify-center rounded border-2 border-primary px-3.5 py-2 font-semibold text-primary transition dark:border-primary dark:text-white-light">{{ $page }}</button>
                                            </span>
                        @else
                            <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                    x-on:click="{{ $scrollIntoViewJsSnippet }}"
                                    class="flex justify-center rounded border-2 border-[#e0e6ed] px-3.5 py-2 font-semibold text-dark transition hover:border-primary hover:text-primary dark:border-[#191e3a] dark:text-white-light dark:hover:border-primary"
                                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                </button>
                        @endif
                    </span>
                @endforeach
            @endif
        @endforeach

        <li>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())

                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                        class="flex justify-center rounded border-2 border-[#e0e6ed] px-3.5 py-2 font-semibold text-dark transition hover:border-primary hover:text-primary dark:border-[#191e3a] dark:text-white-light dark:hover:border-primary">
                    بعدی
                </button>
            @else
                <button type="button"
                        class="flex justify-center rounded border-2 border-[#e0e6ed] px-3.5 py-2 font-semibold text-dark transition hover:border-primary hover:text-primary dark:border-[#191e3a] dark:text-white-light dark:hover:border-primary">
                    بعدی
                </button>
            @endif
        </li>
    </ul>
@endif

