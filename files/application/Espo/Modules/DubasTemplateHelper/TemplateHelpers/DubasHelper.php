<?php

namespace Espo\Modules\DubasTemplateHelper\TemplateHelpers;

use LightnCandy\LightnCandy as LightnCandy;

class DubasHelper
{
    public static function dubasTranslate()
    {
        $args = func_get_args();
        $context = $args[count($args) - 1];
        $hash = $context['hash'];
        $data = $context['data']['root'];

        $scope     = $hash['scope'] ?? null;
        $category  = $hash['category'] ?? null;
        $label     = $hash['label'] ?? null;
        $language  = $hash['language'] ?? 'en_US';

        if 
        (
            !$scope
            ||
            !$category
            ||
            !$label
        )
        {
            $html = null;
        }
        else
        {
            $translation = $data['__language'];
            $translation->setLanguage($language);
            $html = $translation->translate($label, $category, $scope);
        }

        return new LightnCandy\SafeString($html);
    }

    public static function dubasTranslateOption()
    {
        $args = func_get_args();
        $context = $args[count($args) - 1];
        $hash = $context['hash'];
        $data = $context['data']['root'];

        $scope     = $hash['scope'] ?? null;
        $field     = $hash['field'] ?? null;
        $value     = $hash['value'] ?? null;
        $language  = $hash['language'] ?? 'en_US';

        if 
        (
            !$scope
            ||
            !$field
            ||
            !$value
        )
        {
            $html = null;
        }
        else
        {
            $translation = $data['__language'];
            $translation->setLanguage($language);
            $html = $translation->translateOption($value, $field, $scope);
        }

        return new LightnCandy\SafeString($html);
    }
}