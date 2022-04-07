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
+ `id` - id of specific record which will let us fetch value of field;
+ `scope` - Scope from Label Manager;
+ `field` - Name of field with options;
+ `language` - optional language parameter which determine in which you want to get translation. If you don't use this parameter, helper will use as default `en_US`.

### dubasTranslateAddressField helper
This helper will let you translate DubasAddress field in specific language for actual value.
You just need to add this string to your template:

`{{dubasTranslateAddressField field language='pl_PL'}}`

**Parameters:**
+ `dubasTranslateAddressField` - name of helper;
+ `field` - Name of DubasAddress field in your EspoCRM - if you want to translate country, you have to use for example billingAddressCountry;
+ `language` - optional language parameter which determine in which you want to get translation. If you don't use this parameter, helper will use as default `en_US`.

### dubasSpellAmount helper
This helper will let you transform amount to words.
You just need to add this string to your template:

`{{dubasSpellAmount field leftOperandText="dollars" separator="and" rightOperandText="cents" language='pl_PL'}}`

**Parameters:**
+ `dubasSpellAmount` - name of helper;
+ `field` - Name of field which contain amount in your EspoCRM - you should use currency type field;
+ `leftOperandText` - optional parameter which allow you to left operand text. If you don't define own, helper by default will use `dollars`.
+ `separator` - optional parameter which allow you to set own separator. If you don't define own separator, helper will use by default `and` as separator;
+ `rightOperandText` - optional parameter which allow you to set own operand text. If you don't define, helper by default will use `cents`;
+ `language` - optional language parameter which determine in which you want to get translation. If you don't use this parameter, helper will use as default `en_US`.

If you use record in which you have amount set to 100, add to email template or pdf `{{dubasSpellAmount amount}}`. It'll print `one hundred dollars and zero cents`.