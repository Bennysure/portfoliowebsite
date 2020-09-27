<?php
require_once __DIR__ . '/common.php';
$now = time();
?>
<!DOCTYPE html>
<html ng-app="application">
<head>
    <meta charset="utf-8">
    <title ng-bind-template="{{ 'APPLICATION.PAGE_TITLE' | translate }}"><?php echo MotoInstall\System::config('application.title')?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/favicon.ico?t=<?php echo $now ?>" type="image/x-icon">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700&subset=latin,cyrillic">
    <link rel="stylesheet" href="./css/style.min.css?t=<?php echo $now ?>">
</head>
<body>
    <div id="content-wrapper" class="content-wrapper view-animate">
        <ui-view class="content"></ui-view>
        <div ng-if="error.visible" class="errors-block-wrapper" ng-cloak>
            <div class="errors-block">
                <div class="errors-block-icon"></div>
                <div class="errors-block-message">
                    <span ng-if="error.message">{{ ::error.message | translate }} </span>
                    <span translate>{{ ::'APPLICATION.ERROR_MESSAGE.CONTACT_SUPPORT_TEAM' }}</span>
                </div>
                <div ng-if="error.isRetriable" class="errors-block-buttons">
                    <button class="btn btn-primary" ng-click="error.retryFn()">{{ ::'APPLICATION.BUTTON.RETRY' | translate }}</button>
                </div>
            </div>
            <div class="errors-block-overlay"></div>
        </div>
    </div>
    <script src="./js/assets.min.js?t=<?php echo $now ?>" type="text/javascript" data-cfasync="false"></script>
    <script src="./js/templates.min.js?t=<?php echo $now ?>" type="text/javascript" data-cfasync="false"></script>
    <script src="./js/translations.min.js?t=<?php echo $now ?>" type="text/javascript" data-cfasync="false"></script>
    <script type="text/javascript" data-cfasync="false">
        angular.module('application.config.value', ['ng']).constant('application.config.value', <?php echo json_encode(MotoInstall\System::getFrontendConfig())?> );
    </script>
    <script src="./js/application.min.js?t=<?php echo $now ?>" type="text/javascript" data-cfasync="false"></script>
</body>
</html>
