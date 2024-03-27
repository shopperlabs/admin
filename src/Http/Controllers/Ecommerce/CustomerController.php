<?php

declare(strict_types=1);

namespace Shopper\Http\Controllers\Ecommerce;

use Illuminate\Contracts\View\View;
use Shopper\Core\Repositories\UserRepository;
use Shopper\Http\Controllers\ShopperBaseController;

final class CustomerController extends ShopperBaseController
{
    public function index(): View
    {
        $this->authorize('browse_customers');

        return view('shopper::pages.customers.index');
    }

    public function create(): View
    {
        $this->authorize('add_customers');

        return view('shopper::pages.customers.create');
    }

    public function show(int $id): View
    {
        $this->authorize('read_customers');

        return view('shopper::pages.customers.show', [
            'customer' => (new UserRepository())->with(['addresses', 'orders'])->getById($id),
        ]);
    }
}
