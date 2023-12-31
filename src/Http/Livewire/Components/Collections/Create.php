<?php

declare(strict_types=1);

namespace Shopper\Http\Livewire\Components\Collections;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Shopper\Core\Enum\CollectionType;
use Shopper\Core\Models\Collection;
use Shopper\Core\Models\CollectionRule;
use Shopper\Core\Repositories\Store\CollectionRepository;
use Shopper\Core\Traits\Attributes\WithConditions;
use Shopper\Core\Traits\Attributes\WithSeoAttributes;

class Create extends Component
{
    use WithConditions;
    use WithSeoAttributes;

    public string $name = '';

    public ?string $description = null;

    public string $type = 'auto';

    public ?string $publishedAt = null;

    public ?string $publishedAtFormatted = null;

    public ?string $fileUrl = null;

    public string $condition_match = 'all';

    public $seoAttributes = [
        'name' => 'name',
        'description' => 'description',
    ];

    protected $listeners = [
        'trix:valueUpdated' => 'onTrixValueUpdate',
        'shopper:fileUpdated' => 'onFileUpdate',
    ];

    public function onTrixValueUpdate(string $value): void
    {
        $this->description = $value;
    }

    public function onFileUpdate($file): void
    {
        $this->fileUrl = $file;
    }

    public function updatedPublishedAt($value): void
    {
        if ($value) {
            $this->publishedAtFormatted = Carbon::createFromFormat('Y-m-d H:i', $value)->toRfc7231String();
        }
    }

    public function store(): void
    {
        $this->validate($this->rules());

        /** @var Collection $collection */
        $collection = (new CollectionRepository())->create([
            'name' => $this->name,
            'slug' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'match_conditions' => $this->condition_match,
            'seo_title' => $this->seoTitle,
            'seo_description' => $this->seoDescription,
            'published_at' => $this->publishedAt ?? now(),
        ]);

        if ($this->fileUrl) {
            $collection->addMedia($this->fileUrl)->toMediaCollection(config('shopper.core.storage.collection_name'));
        }

        if ($this->type === CollectionType::AUTO->value && count($this->conditions) > 0 && $this->rule) {
            foreach ($this->rule as $key => $value) {
                CollectionRule::query()->create([
                    'collection_id' => $collection->id,
                    'rule' => $this->rule[$key],
                    'operator' => $this->operator[$key],
                    'value' => $this->value[$key],
                ]);
            }

            $this->conditions = [];
            $this->resetConditionsFields();
        }

        session()->flash('success', __('shopper::notifications.actions.create', ['item' => __('shopper::words.collection')]));

        $this->redirectRoute('shopper.collections.edit', $collection);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:150|unique:' . shopper_table('collections'),
            'type' => 'required',
        ];
    }

    public function render(): View
    {
        return view('shopper::livewire.collections.create');
    }
}
