<?php

declare(strict_types=1);

namespace Shopper\Http\Livewire\Modals;

use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Shopper\Core\Models\AttributeValue;

class UpdateValue extends ModalComponent
{
    public string $name;

    public string $type = 'select';

    public int $valueId;

    public string $value;

    public string $key;

    public function mount(string $name, string $type, int $id): void
    {
        /** @var AttributeValue $value */
        $value = AttributeValue::query()->find($id);

        $this->valueId = $id;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value->value;
        $this->key = $value->key;
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    public function save(): void
    {
        $this->validate($this->rules());

        AttributeValue::query()
            ->find($this->valueId)
            ->update(['value' => $this->value, 'key' => mb_strtolower($this->key)]);

        $this->emit('updateValues');

        Notification::make()
            ->title(__('shopper::components.tables.status.updated'))
            ->body(__('shopper::pages/attributes.notifications.value_updated'))
            ->success()
            ->send();

        $this->closeModal();
    }

    public function rules(): array
    {
        return [
            'value' => 'required|max:50',
            'key' => [
                'required',
                Rule::unique(shopper_table('attribute_values'))->ignore($this->valueId),
            ],
        ];
    }

    public function render(): View
    {
        return view('shopper::livewire.modals.update-value');
    }
}
