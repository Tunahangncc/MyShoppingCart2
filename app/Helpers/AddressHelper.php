<?php

use App\Models\Address;

function getAddressInformation($id)
{
    $userAddress = Address::query()->where('user_id', $id)->first();

    return $userAddress;
}
