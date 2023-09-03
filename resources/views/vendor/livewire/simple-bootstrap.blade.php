<div class="w-100">
    @if ($paginator->hasPages())
        <nav>
            <ul class="pagination d-flex justify-content-between">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link text-start w-auto btn btn-info bg-info">@lang('pagination.previous')</span>
                    </li>
                @else
                    @if (method_exists($paginator, 'getCursorName'))
                        <li class="page-item">
                            {{-- // @todo: Remove `wire:key` once mutation observer has been fixed to detect parameter change for the `setPage()` method call --}}
                            <button dusk="previousPage" type="button"
                                class="page-link text-start w-auto btn btn-info bg-info"
                                wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->previousCursor()->encode() }}"
                                wire:click="setPage('{{ $paginator->previousCursor()->encode() }}','{{ $paginator->getCursorName() }}')"
                                wire:loading.attr="disabled" rel="prev">@lang('pagination.previous')</button>
                        </li>
                    @else
                        <li class="page-item">
                            <button type="button"
                                dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                                class="page-link text-start w-auto btn btn-info bg-info"
                                wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                wire:loading.attr="disabled" rel="prev">@lang('pagination.previous')</button>
                        </li>
                    @endif
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    @if (method_exists($paginator, 'getCursorName'))
                        <li class="page-item">
                            {{-- // @todo: Remove `wire:key` once mutation observer has been fixed to detect parameter change for the `setPage()` method call --}}
                            <button dusk="nextPage" type="button"
                                class="page-link text-start w-auto btn btn-info bg-info"
                                wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->nextCursor()->encode() }}"
                                wire:click="setPage('{{ $paginator->nextCursor()->encode() }}','{{ $paginator->getCursorName() }}')"
                                wire:loading.attr="disabled" rel="next">@lang('pagination.next')</button>
                        </li>
                    @else
                        <li class="page-item">
                            <button type="button"
                                dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                                class="page-link text-start w-auto btn btn-info bg-info"
                                wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                                rel="next">@lang('pagination.next')</button>
                        </li>
                    @endif
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link text-start w-auto btn btn-info bg-info">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
