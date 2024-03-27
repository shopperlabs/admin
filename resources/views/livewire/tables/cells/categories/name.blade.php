<div class="flex items-center space-x-3 lg:pl-2">
    <div class="shrink-0 w-2.5 h-2.5 rounded-full {{ $category->is_enabled ? 'bg-green-600': 'bg-gray-400 dark:bg-gray-600' }}"></div>
    <div class="flex items-center">
        <img class="h-8 w-8 rounded-lg object-cover object-center" src="{{ $category->getFirstMediaUrl(config('shopper.core.storage.collection_name'))}}" alt="" />
        <a href="{{ route('shopper.categories.edit', $category) }}" class="ml-2 truncate hover:text-gray-600 font-medium">
            <span>
                {{ $category->name }}
                @if($category->parent_id)
                    <span class="text-gray-500 font-normal dark:text-gray-400">
                        {{ __('shopper::pages/categories.parent', ['parent' => $category->parent_name]) }}
                    </span>
                @endif
            </span>
        </a>
    </div>
</div>
