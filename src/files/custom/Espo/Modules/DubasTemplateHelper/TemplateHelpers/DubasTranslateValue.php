<?php

namespace Espo\Modules\DubasTemplateHelper\TemplateHelpers;

use Espo\Core\Htmlizer\{
    Helper,
    Helper\Data,
    Helper\Result,
};
use Espo\Core\ORM\EntityManager;
use Espo\Core\Utils\Language;

class DubasTranslateValue implements Helper
{
    protected $entityManager;

    protected $language;

    public function __construct(EntityManager $entityManager, Language $language)
    {
        $this->entityManager = $entityManager;
        $this->language = $language;
    }

    public function render(Data $data): Result
    {
        $id         = $data->getArgumentList()[0] ?? null;
        $scope      = $data->getOption('scope') ?? null;
        $field      = $data->getOption('field') ?? null;
        $language   = $data->getOption('language') ?? 'en_US';

        if ( !$scope || !$category || !$label ) {
            $html = null;
        } else {
            $entity = $this->entityManager->getEntity($scope, $id);
            $value = $entity->get($field);

            if (!$value) {
                $html = null;
            } else {
                $translation = $this->language;
                $translation->setLanguage($language);
                $html = $translation->translateOption($value, $field, $scope);
            }
        }

        return Result::createSafeString($html);
    }
}
