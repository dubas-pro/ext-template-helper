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
        $id = $data->getArgumentList()[0] ?? null;
        $scope = $data->getOption('scope') ?? null;
        $field = $data->getOption('field') ?? null;
        $language = $data->getOption('language') ?? 'en_US';

        if (!$scope || !$id || !$field) {
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
