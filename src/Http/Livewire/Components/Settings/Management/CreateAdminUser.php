<?php

declare(strict_types=1);

namespace Shopper\Http\Livewire\Components\Settings\Management;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Shopper\Core\Models\Role;
use Shopper\Core\Models\User;
use Shopper\Core\Repositories\UserRepository;
use Shopper\Core\Rules\Phone;
use Shopper\Core\Rules\RealEmailValidator;
use Shopper\Http\Livewire\AbstractBaseComponent;
use Shopper\Notifications\AdminSendCredentials;

class CreateAdminUser extends AbstractBaseComponent
{
    public bool $send_mail = false;

    public ?string $email = null;

    public ?string $password = null;

    public ?string $first_name = null;

    public ?string $last_name = null;

    public string $gender = 'male';

    public ?string $phone_number = null;

    public bool $is_admin = false;

    public $role_id;

    public function generate(): void
    {
        $this->password = mb_substr(mb_strtoupper(uniqid(str_random(10))), 0, 10);

        $this->resetErrorBag(['password']);
    }

    public function updated(string $field): void
    {
        $this->validateOnly($field, $this->rules(), $this->messages());
    }

    public function updatedRoleId(int $id): void
    {
        $chooseRole = Role::findById($id);

        $this->is_admin = $chooseRole->name === config('shopper.core.users.admin_role'); // @phpstan-ignore-line
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique(shopper_table('users'), 'email'),
                new RealEmailValidator(),
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => Password::min(8)->letters()->mixedCase(),
            'role_id' => 'required',
            'phone_number' => [
                'nullable',
                new Phone(),
            ],
        ];
    }

    public function store(): void
    {
        $this->validate($this->rules(), $this->messages());

        /** @var User $user */
        $user = (new UserRepository())->create([
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'password' => Hash::make($this->password),
            'phone_number' => $this->phone_number,
            'gender' => $this->gender,
            'email_verified_at' => now()->toDateTimeString(),
        ]);

        /** @var Role $role */
        $role = Role::findById((int) $this->role_id);

        $user->assignRole([$role->name]);

        if ($this->send_mail) {
            $user->notify(new AdminSendCredentials($this->password));
        }

        session()->flash('success', __('shopper::notifications.actions.create', ['item' => $user->full_name]));

        $this->redirectRoute('shopper.settings.users');
    }

    public function messages(): array
    {
        return [
            'email.required' => __('Email is required'),
            'email.email' => __('This Email is not a valid email address'),
            'email.unique' => __('This email adresse is already used'),
            'first_name.required' => __('Admin first name is required'),
            'last_name.required' => __('Admin last name is required'),
            'password.required' => __('Password is required'),
            'role_id.required' => __('The admin role is required'),
            'phone_number.*' => __('This phone number is not a valid number'),
        ];
    }

    public function render(): View
    {
        return view('shopper::livewire.settings.management.create', [
            'roles' => Role::query()
                ->select(['id', 'display_name', 'name'])
                ->where('name', '<>', config('shopper.core.users.default_role'))
                ->get(),
        ]);
    }
}
