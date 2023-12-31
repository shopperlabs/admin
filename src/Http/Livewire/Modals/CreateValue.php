<?php

declare(strict_types=1);

namespace Shopper\Http\Livewire\Modals;

use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use LivewireUI\Modal\ModalComponent;
use Shopper\Core\Models\Attribute;

class CreateValue extends ModalComponent
{
    public Attribute $attribute;

    public string $type = 'select';

    public string $value = '';

    public string $key = '';

    public function mount(int $attributeId): void
    {
        $this->attribute = $attribute = Attribute::find($attributeId);
        $this->type = $attribute->type;
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function save(): void
    {
        $this->validate($this->rules());

        $this->attribute->values()->create([
            'value' => $this->value,
            'key' => mb_strtolower($this->key),
        ]);

        $this->emit('updateValues');

        Notification::make()
            ->title(__('shopper::layout.status.added'))
            ->body(__('shopper::pages/attributes.notifications.value_created', ['name' => $this->attribute->name]))
            ->success()
            ->send();

        $this->closeModal();
    }

    public function rules(): array
    {
        return [
            'value' => 'required|max:50',
            'key' => 'required|unique:' . shopper_table('attribute_values'),
        ];
    }

    public function render(): View
    {
        return view('shopper::livewire.modals.create-value');
    }
}
