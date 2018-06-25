<?php

namespace webheads\notifications;

use Yii;
use yii\helpers\Html;

class Alert extends \yii\bootstrap\Widget
{
	public $alertTypes = [
        'error'   => 'Error',
        'danger'  => 'Danger',
        'success' => 'Success',
        'info'    => 'Info',
        'warning' => 'Warning',
    ];

	public function init()
    {
    	parent::init();

	    $script = <<< JS
			var Notification = window.Notification || window.mozNotification || window.webkitNotification;
		    if (Notification) {
		        Notification.requestPermission(function (permission) {
		            // console.log(permission);
		        });
		    }

		    function showNotify(notify_title, notify_text) {
		        if (Notification) {
		            var instance = new Notification(
		                notify_title, {
		                    tag: 'set',
		                    body: notify_text,
		                    icon: "/files/images/logo.png"
		                }
		            );

		            instance.onclick = function () {};
		            instance.onerror = function () {};
		            instance.onshow = function () {};
		            instance.onclose = function () {};
		            
		            setTimeout(instance.close.bind(instance), 4000);

		            return false;
		        } else {
		            console.log('html5 notification text: ' + notify_text);
		        }
		    }
JS;
		$this->getView()->registerJs($script, yii\web\View::POS_END);  

    	$logo = !empty($this->options['logo'])?intval($this->options['logo']):'';
        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();
        $appendCss = isset($this->options['class'])?' '.$this->options['class']:'';
        foreach ($flashes as $type => $data) {
			$title = (isset($this->alertTypes[$type]))?Yii::t('app', $this->alertTypes[$type]):Yii::t('app', $this->alertTypes['success']);
			echo '<script>showNotify("'.$title.'", "'.$data.'");</script>';
        }
    }
}