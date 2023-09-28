<?php

declare(strict_types=1);

namespace Shopper\Http\Livewire\Components\Products\Form;

use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Shopper\Core\Repositories\Store\ProductRepository;
use Shopper\Core\Traits\Attributes\WithSeoAttributes;

class Seo extends Component
{
    use WithSeoAttributes;

    public $product;

    public int $productId;

    public string $slug;

    public $seoAttributes = [
        'name' => 'name',
        'description' => 'description',
    ];

    public function mount($product): void
    {
        $this->product = $product;
        $this->productId = $product->id;
        $this->slug = $product->slug;
        $this->seoTitle = $product->seo_title;
        $this->seoDescription = $product->seo_description;
    }

    public function store(): void
    {
        $this->validate([
            'slug' => [
                'required',
                Rule::unique(shopper_table('products'), 'sku')->ignore($this->productId),
            ],
        ]);

        (new ProductRepository())->getById($this->productId)->update([
            'slug' => str_slug($this->slug),
            'seo_title' => $this->seoTitle,
            'seo_description' => str_limit($this->seoDescription, 157),
        ]);

        $this->emit('productHasUpdated', $this->productId);

        Notification::make()
            ->body(__('shopper::pages/products.notifications.seo_update'))
            ->success()
            ->send();
    }

    public function render(): View
    {
        return view('shopper::livewire.products.forms.form-seo');
    }
}
