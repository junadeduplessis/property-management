<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\ContactRepositoryInterface;
use App\Interfaces\ContactIndexRepositoryInterface;

class OrderController extends Controller
{
    private OrderRepositoryInterface $orderRepository;
    private ContactRepositoryInterface $contactRepository;
    private ContactIndexRepositoryInterface $contactIndexRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, ContactRepositoryInterface $contactRepository, ContactIndexRepositoryInterface $contactIndexRepository) 
    {
        $this->orderRepository = $orderRepository;
        $this->contactRepository = $contactRepository;
        $this->contactIndexRepository = $contactIndexRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->orderRepository->getAllOrders();

        return view('order')->withOrders($orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = $this->contactRepository->getAllContacts();

        return view('create')->withContacts($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOrderRequest $request)
    {
        $order = saveOrder($request);

        $ordered = $this->orderRepository->createOrder($order);

        $orderedId = $ordered->id;

        if (isset($orderedId)) {
        
            $contactIndexes = saveContactIndex($orderedId, $request->contact);

            $contactIndex = $this->contactIndexRepository->createContactIndex($contactIndexes);

            return redirect()->back()->with([
                'message' => 'Your order has been placed successfully.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
