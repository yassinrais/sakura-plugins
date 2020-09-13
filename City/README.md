## Country Plugin

### How to use :

```php
<?php 


use SakuraPlguin\Plugins\Country\Models\Country;



// find example by name

$country = Country::findFirstByName('FRANCE'); // Object Country  { id : 73 , name : FRANCE ... }


// find by number code
$country = Country::findFirstByNum(4); // Object Country  { id : 1 , name : AFGHANISTAN ... }

$country->getNum() // int 250
$country->getIso2() // string FR
$country->getIso3() // string FRA
$country->getTitle() // string France
$country->setStatus($this::DISABLED); // to disable 


```


<b>Enjoy it ! ♥</b>