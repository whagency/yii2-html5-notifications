<p align="center">
    <a href="https://webheads.agency/" target="_blank">
        <img src="https://webheads.agency/files/images/LogoWebHeads.png" width="181" alt="WebHeads - Creative Web Agency">
    </a>
</p>

# yii2-html5-notifications

Yii2 extension for converting yii2 flash message to html5 web notifications

[![Latest Stable Version](https://poser.pugx.org/whagency/yii2-html5-notifications/v/stable)](https://packagist.org/packages/whagency/yii2-html5-notifications)
[![License](https://poser.pugx.org/whagency/yii2-html5-notifications/license)](https://packagist.org/packages/whagency/yii2-html5-notifications)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "whagency/yii2-html5-notifications" "*"
```

or add to your composer.json file


```json
...
"require": {
    "whagency/yii2-html5-notifications": "*"
},
```

Usage Example
-------------

1. Add widget to your page before `</body>` tag

~~~php
  ...
    <?= \webheads\notifications\Alert::widget(['options' => [
 	    'logo' => '@web/files/logo.png'
    ]]) ?>
  </body>
</html>
~~~

2. Set yii2 flash message

~~~php
Yii::$app->session->setFlash('success', 'My notification message');
~~~

3. Allow html5 messages in your browser

<img src="https://github.com/whagency/yii2-html5-notifications/tree/master/demo/1.png" alt="Demo 1">

4. Result

<img src="https://github.com/whagency/yii2-html5-notifications/tree/master/demo/2.jpg" alt="Demo 2">