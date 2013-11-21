class.validation.php
====================

Validation Multilanguage Class PHP
This class has differents methods that allow to validate an input form field.
All methods return a string localized by language if there is an error or a blank string if the input pass the validation

##How to use
Require and setup the class:<br>
<code>
require("class.validation.php");<br>
$validate = New Validate("ENG");<br>
</code>

Setup a error variable:<br>
<code>
$error = "";
</code>

On form submit use the selected methods (i.e. Numeric) to validate the input:<br>
<code>
$error .= $validate->Numeric( $_POST["inputname"], "Label of field", true, 3, 10);
</code>

In all methods the first passed value it's the input value, the second it's the label of input and the third it's obligatoriness.

##Public Methods
-String(value, label, mandatory, minimum length, maximum length)
-Numeric(value, label, mandatory, minimum length, maximum length)
-Email(value, label, mandatory, minimum length, maximum length)
-URL(value, label, mandatory, minimum length, maximum length)
-Date(value, label, delimiter, mandatory)