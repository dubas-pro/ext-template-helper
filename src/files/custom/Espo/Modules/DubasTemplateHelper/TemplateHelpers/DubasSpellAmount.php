<?php

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

        $dollars    = $data->getOption('dollars') ?? 'dollars';
        $cents      = $data->getOption('cents') ?? 'cents';
        $and        = $data->getOption('and') ?? 'and';

        $a = bcmul($number, 100);
        $c = $a % 100;
        $d = ($a - $c) / 100;

        $amount = new NumberFormatter($language, NumberFormatter::SPELLOUT);

        // print_r(sprintf("%s $dollars $and %s $cents", $amount->format($d), $amount->format($c)));


        //return Result::createSafeString($html);
        return Result::createSafeString(print_r(sprintf("%s $dollars $and %s $cents", $amount->format($d), $amount->format($c))));
    }
}
