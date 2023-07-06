<?php

/**
 * Remove first and last commas from tags
 *
 * @param [string] $string
 * @return void
 */
function trimTags($string)
{
    if(str_starts_with($string, ',') !== false ) {
        $string = substr($string, 1, -1);
    }

    return $string;
}

/**
 * Get full address for order
 *
 * @param [array] $order
 * @return void
 */
function getFullAddress($order)
{
    return implode(", ", array_filter([$order->address1, $order->address2, $order->address3, $order->town, $order->postcode]));
}

/**
 * Get name of agent/owner and the type
 *
 * @param [array] $orderDetails
 * @return void
 */
function getNameAndType($orderDetails)
{
    $fullnameAndType = array();

    foreach($orderDetails as $cont) {
        foreach ($cont->contact as $contact) {
            $fullnameAndType[] = $contact['firstname'] . ' ' . $contact['lastname'] . ' - ' . $contact['type'];
        }
    }

    return $fullnameAndType;
}

/**
 * Get all services for specific order
 *
 * @param [array] $orderData
 * @return void
 */
function getAllServices($orderData)
{
    $servicesProvided = array();
    $servicesData = unserializeOrderData($orderData);

    if (!empty($servicesData)) {
        foreach ($servicesData as $key => $values){
            if ($key == 'services') {
                foreach ($values as $listedService) {
                    $servicesProvided[] = $listedService;
                }
            }
        }
    } else {
        $servicesProvided = '';
    }

    return $servicesProvided;
}

/**
 * Unserialize Order Data field
 *
 * @param [type] $data
 * @return void
 */
function unserializeOrderData($data)
{
    $serializationCheckTrue = canBeUnserialized($data);

    if ($serializationCheckTrue) {
        return unserialize($data);
    }

    return '';
}

function canBeUnserialized($data) 
{
    if (@unserialize($data) === false) {
        return false;
    }

    return true;
} 

/**
 * Format order to be saved
 *
 * @param [array] $order
 * @return void
 */
function saveOrder($order)
{
    $orderDetails = array();

    $current_date = date('Y-m-d H:i:s');

    $orderDetails['created'] = strtotime($current_date);
    $orderDetails['updated'] = strtotime($current_date);
    $orderDetails['address1'] = $order->address1;
    $orderDetails['address2'] = $order->address2;
    $orderDetails['address3'] = '';
    $orderDetails['town'] = $order->town;
    $orderDetails['postcode'] = strtoupper($order->postcode);
    $orderDetails['tags'] = '';
    $orderDetails['data'] = '';

    if (isset($order->address3)) {
        $orderDetails['address3'] = $order->address3;
    }

    if (isset($order->tags)) {
        $orderDetails['tags'] = implode(',', $order->tags);
    }

    return $orderDetails;
}

/**
 * Format contact indexes save data
 *
 * @param [string] $orderId
 * @param [string] $contactId
 * @return void
 */
function saveContactIndex($orderId, $contactId)
{
    $indexes = array();

    $indexes['orderId'] = $orderId;
    $indexes['contactId'] = $contactId;

    return $indexes;
}

