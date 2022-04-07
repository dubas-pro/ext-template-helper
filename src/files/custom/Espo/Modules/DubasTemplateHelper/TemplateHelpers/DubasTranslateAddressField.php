<?php

namespace Espo\Modules\DubasTemplateHelper\TemplateHelpers;

use Espo\Core\Htmlizer\{
    Helper,
    Helper\Data,
    Helper\Result,
};
use Espo\Core\Utils\Language;

class DubasTranslateAddressField implements Helper
{
    protected $language;

    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    public function render(Data $data): Result
    {
        $value      = $data->getArgumentList()[0] ?? null;
        $language   = $data->getOption('language') ?? 'en_US';

        if ( !$value ) {
            $html = null;
        } else {
            $translation = $this->language;
            $translation->setLanguage($language);
            $html = $translation->translate($value, 'countryLabels', 'DubasAddress');
        }

        return Result::createSafeString($html);
    }
}
