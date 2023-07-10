<?php

declare(strict_types=1);

namespace Shopper\Http\Livewire\Components\Account;

use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Shopper\Core\Rules\RealEmailValidator;
use Shopper\Traits\HasAuthenticated;

class Profile extends Component
{
    use HasAuthenticated;
    use WithFileUploads;

    public string $first_name;

    public string $last_name;

    public string $email;

    public ?string $phone_number = null;

    public $picture;

    public function mount(): void
    {
        $user = $this->getUser();

        $this->first_name = $user->first_name; // @phpstan-ignore-line
        $this->last_name = $user->last_name; // @phpstan-ignore-line
        $this->email = $user->email; // @phpstan-ignore-line
        $this->phone_number = $user->phone_number; // @phpstan-ignore-line
    }

    public function updatedPicture(): void
    {
        $this->validate(['picture' => 'nullable|image|max:1024']);
    }

    public function save(): void
    {
        $this->validate([
            'email' => [
                'required',
                'email',
                Rule::unique(shopper_table('users'), 'email')->ignore(auth()->id()),
                new RealEmailValidator(),
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'picture' => 'nullable|image|max:1024',
        ]);

        $user = $this->getUser();

        $user->update([
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
        ]);

        if ($this->picture) {
            $filename = $this->picture->store('/', config('shopper.core.storage.disk_name'));

            $user->update([
                'avatar_type' => 'storage',
                'avatar_location' => $filename,
            ]);
        }

        $this->emit('updatedProfile');

        Notification::make()
            ->title(__('Profile Updated'))
            ->body(__('Your profile have been successfully updated!'))
            ->success()
            ->send();
    }

    public function render(): View
    {
        return view('shopper::livewire.account.profile');
    }
}
