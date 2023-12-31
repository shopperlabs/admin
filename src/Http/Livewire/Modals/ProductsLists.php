<?php

declare(strict_types=1);

namespace Shopper\Http\Livewire\Modals;

use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;
use Shopper\Core\Repositories\Store\CollectionRepository;
use Shopper\Core\Repositories\Store\ProductRepository;

class ProductsLists extends ModalComponent
{
    public $collection;

    public string $search = '';

    public array $exceptProductIds;

    public array $selectedProducts = [];

    public function mount(int $id, array $exceptProductIds = []): void
    {
        $this->collection = (new CollectionRepository())->getById($id);
        $this->exceptProductIds = $exceptProductIds;
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function getProductsProperty(): Collection
    {
        return (new ProductRepository())
            ->where('name', '%' . $this->search . '%', 'like')
            ->get(['name', 'price_amount', 'id'])
            ->except($this->exceptProductIds);
    }

    public function addSelectedProducts(): void
    {
        $currentProducts = $this->collection->products->pluck('id')->toArray();
        $this->collection->products()->sync(array_merge($this->selectedProducts, $currentProducts));

        $this->emitUp('onProductsAddInCollection');

        Notification::make()
            ->title(__('shopper::layout.status.added'))
            ->body(__('shopper::pages/collections.modal.success_message'))
            ->success()
            ->send();

        $this->closeModal();
    }

    public function render(): View
    {
        return view('shopper::livewire.modals.products-lists');
    }
}
