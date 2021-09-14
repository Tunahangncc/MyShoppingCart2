<?php

use App\Models\Color;

function getColorProperties($hex)
{
    return Color::query()->where('hex_code', $hex)->first();
}
