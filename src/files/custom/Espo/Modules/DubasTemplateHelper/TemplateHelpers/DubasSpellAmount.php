<?php

/*
 * This file is part of the Dubas Template Helper - EspoCRM extension.
 *
 * DUBAS - contact@dubas.pro
 * Copyright (C) 2022
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace Espo\Modules\DubasTemplateHelper\TemplateHelpers;

use Espo\Core\Htmlizer\{
    Helper,
    Helper\Data,
    Helper\Result,
};

class DubasSpellAmount implements Helper
{
    public function render(Data $data): Result
    {
        $value      = $data->getArgumentList()[0] ?? null;
        $number     = number_format($value, 2, '.', '');
        $language   = $data->getOption('language') ?? 'en_US';

        $leftOperandText    = $data->getOption('leftOperandText') ?? 'dollars';
        $rightOperandText   = $data->getOption('rightOperandText') ?? 'cents';
        $separator          = $data->getOption('separator') ?? 'and';

        $a = bcmul($number, 100);
        $c = $a % 100;
        $d = ($a - $c) / 100;

        $amount = new \NumberFormatter($language, \NumberFormatter::SPELLOUT);

        return Result::createSafeString(sprintf("%s $leftOperandText $separator %s $rightOperandText", $amount->format($d), $amount->format($c)));
    }
}
