@if ($paginator->hasPages())

    @if ($paginator->onFirstPage())
        <span aria-disabled="true" type="button" class="inline-flex items-center px-4 py-2 border border-secondary-300 dark:border-secondary-700 shadow-sm text-sm font-medium rounded-md text-secondary-700 dark:text-white bg-white dark:bg-secondary-700 hover:bg-secondary-50 dark:hover:bg-secondary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-secondary-900 opacity-50 cursor-not-allowed">
            {{ __('pagination.previous') }}
        </span>
    @else
        <x-shopper::buttons.default type="button" class="relative" wire:click="previousPage" rel="prev" aria-label="{{ __('ppagination.previous') }}">
            {{ __('pagination.previous') }}
        </x-shopper::buttons.default>
    @endif

    @if ($paginator->hasMorePages())
        <x-shopper::buttons.default type="button" wire:click="nextPage" rel="next" class="ml-3 relative" aria-label="{{ __('Next') }}">
            {{ __('pagination.next') }}
        </x-shopper::buttons.default>
    @else
        <span type="button" aria-disabled="true" class="ml-3 inline-flex items-center px-4 py-2 border border-secondary-300 dark:border-secondary-700 shadow-sm text-sm font-medium rounded-md text-secondary-700 dark:text-white bg-white dark:bg-secondary-700 hover:bg-secondary-50 dark:hover:bg-secondary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-secondary-900 opacity-50 cursor-not-allowed" aria-label="{{ __('pagination.next') }}">
            {{ __('pagination.next') }}
        </span>
    @endif

@endif
