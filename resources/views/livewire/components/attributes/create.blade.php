<x-shopper::container>
    <x-shopper::breadcrumb :back="route('shopper.attributes.index')" :current="__('shopper::words.actions_label.add_new', ['name' => strtolower(__('shopper::words.attribute'))])">
        <x-heroicon-s-chevron-left class="shrink-0 h-4 w-4 text-secondary-300 dark:text-secondary-600" />
        <x-shopper::breadcrumb.link :link="route('shopper.attributes.index')" :title="__('shopper::words.attributes')" />
    </x-shopper::breadcrumb>

    <x-shopper::heading class="mt-5">
        <x-slot name="title">
            {{ __('shopper::words.actions_label.add_new', ['name' => strtolower(__('shopper::words.attribute'))]) }}
        </x-slot>
    </x-shopper::heading>

    @include('shopper::livewire.components.attributes._form')

    <div class="mt-8 border-t border-secondary-200 dark:border-secondary-700 pt-6 pb-10">
        <div class="flex justify-end">
            <x-shopper::buttons.primary wire:click="store" wire.loading.attr="disabled" type="button">
                <x-shopper::loader wire:loading wire:target="store" class="text-white" />
                {{ __('shopper::layout.forms.actions.save') }}
            </x-shopper::buttons.primary>
        </div>
    </div>
</x-shopper::container>
