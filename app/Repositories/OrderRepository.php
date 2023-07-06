<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface 
{
    public function getAllOrders() 
    {
        return Order::with('orderContactIndex')->with('orderContactIndex.contact')->get();
    }

    public function getOrderById($orderId) 
    {
        return Order::findOrFail($orderId);
    }

    public function createOrder(array $orderDetails) 
    {
        return Order::create($orderDetails);
    }
}