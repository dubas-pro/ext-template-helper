# Dubas Template Helper
Template helper for EspoCRM which will let you add translated strings to email or pdf template.

## Getting started
1. Download installer from our [website](https://devcrm.it/template-helper):
2. Install our extension;
3. Open template manager for PDF's or emails; 
4. Create new template for testing purposes;
5. In template use one of helpers delivered by extension. Below you can find available helpers

### dubasTranslate helper
This helper will let you get label of field in specific language.
You just need to add this string to your template:

`{{dubasTranslate scope='Task' category='fields' label='createdAt' language='de_DE'}}`

**Parameters:**
+ `dubasTranslate` - name of helper;
+ `scope` - Scope from Label Manager;
+ `category` - Category from scope which you set above;
+ `label` - name of field which you want to translate;
+ `language` - optional language parameter which determine in which you want to get translation. If you don't use this parameter, helper will use as default `en_US`.

### dubasTranslateOption helper
This helper will let you get label for fields with options.
You just need to add this string to your template:

`{{dubasTranslateOption scope='Task' field='status' value='Canceled' language='de_DE'}}`

**Parameters:**
+ `dubasTranslateOption` - name of helper;
+ `scope` - Scope from Label Manager;
+ `field` - Name of field with options;
+ `value` - Name of options; 
+ `language` - optional language parameter which determine in which you want to get translation. If you don't use this parameter, helper will use as default `en_US`.

### dubasTranslateValue helper
This helper will let you get label in specific language for actual value of field with options.
You just need to add this string to your template:

`{{dubasTranslateValue id scope='Task' field='status' language='pl_PL'}}`

**Parameters:**
+ `dubasTranslateValue` - name of helper;
+ `id` - id od specific record which will let us fetch value of field;
+ `scope` - Scope from Label Manager;
+ `field` - Name of field with options;
+ `language` - optional language parameter which determine in which you want to get translation. If you don't use this parameter, helper will use as default `en_US`.

## TO DO
1. ~~Helper which will translate labels of fields~~
2. ~~Helper which will translate options~~
3. ~~Helper which will translate actual option field value~~
