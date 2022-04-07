<?php

namespace Espo\Modules\DubasTemplateHelper\TemplateHelpers;

use Espo\Core\Htmlizer\{
    Helper,
    Helper\Data,
    Helper\Result,
};
use Espo\Core\Utils\Language;

class DubasTranslateOption implements Helper
{
    protected $language;

    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    public function render(Data $data): Result
    {
        $scope     = $data->getOption('scope') ?? null;
        $category  = $data->getOption('category') ?? null;
        $label     = $data->getOption('label') ?? null;
        $language  = $data->getOption('language') ?? 'en_US';

        if ( !$scope || !$field || !$value ) {
            $html = null;
        } else {
            $translation = $this->language;
            $translation->setLanguage($language);
            $html = $translation->translateOption($value, $field, $scope);
        }

        return Result::createSafeString($html);
    }
}
