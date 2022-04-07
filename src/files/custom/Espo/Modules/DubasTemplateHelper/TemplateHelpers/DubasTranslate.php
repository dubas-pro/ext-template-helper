<?php

namespace Espo\Modules\DubasTemplateHelper\TemplateHelpers;

use Espo\Core\Htmlizer\{
    Helper,
    Helper\Data,
    Helper\Result,
};
use Espo\Core\Utils\Language;

class DubasTranslate implements Helper
{
    protected $language;

    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    public function render(Data $data): Result
    {
        $scope      = $data->getOption('scope') ?? null;
        $field      = $data->getOption('field') ?? null;
        $value      = $data->getOption('value') ?? null;
        $language   = $data->getOption('language') ?? 'en_US';

        if ( !$scope || !$category || !$label ) {
            $html = null;
        } else {
            $translation = $this->language;
            $translation->setLanguage($language);
            $html = $translation->translate($label, $category, $scope);
        }

        return Result::createSafeString($html);
    }
}
