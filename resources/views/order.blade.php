@extends('layout.main')
@section('title')
    <div class="container">
        <h1 class="jumbotron-heading text-center m-3">List of Orders</h1>
    </div>
@endsection
@section('content')
   <div class="album text-muted">
        <div class="container">
            <div class="row">
                <table class="table w-auto">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="col-3">Address</th>
                            <th scope="col">Date of Order</th>
                            <th scope="col">Agents/Owners</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Services</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)                       
                            <?php
                                $fulladdress = getFullAddress($order);
                                $clientDetails = getNameAndType($order->orderContactIndex);
                                $tags = trimTags($order->tags);
                                $services = getAllServices($order->data);     
                            ?>
                            <tr>
                                <td scope="row">{{ $order->id }}</td>
                                <td>{{ $fulladdress }}</td>
                                <td>{{ date("Y-m-d H:i:s", $order->created) }}</td>
                                <td>
                                    @foreach ($clientDetails as $name)
                                        <li>{{ $name }}</li>
                                    @endforeach
                                </td>
                                <td>{{ $tags }}</td>
                                <td>
                                    @if (!empty($services))
                                        @foreach ($services as $service)
                                            <li>{{ $service }}</li>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
   </div>
@endsection
<b></b>