<?php /* @var $this Controller */ ?>
<!doctype html>
<html lang="en" ng-app="todoApp">

<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="Simple Todo Application">
    <meta name="author" content="Alexander Sadovsky">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/taskybird_default/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/taskybird_default/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/taskybird_default/custom.css">
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/angular.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/controllers/todoCtrl.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/directives/todoFocus.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/directives/todoEscape.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom_jquery.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/taskybird_logo3_64x.png" width="32" height="32" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="search" class="form-control" placeholder="Search" ng-model="search">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php if (Yii::app()->user->isGuest): ?><li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/login">Login</a></li> <?php endif; ?>
                <?php if (!Yii::app()->user->isGuest): ?><li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/logout">Logout (<?php echo Yii::app()->user->name; ?>)</a></li> <?php endif; ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/version"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/thunderbird_logo-only_32x.png" />Thunderbird addon</a></li>
                        <li class="divider"></li>
                        <li><a href="#">separate link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container" id="page">

	<!--div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
                array('label'=>'New Task', 'url'=>array('/tasks/create')),
				array('label'=>'Tasks', 'url'=>array('/tasks/admin')),
				array('label'=>'Users', 'url'=>array('/users/admin')),
				array('label'=>'Clients', 'url'=>array('/thunderbirdClients')),
				array('label'=>'SyncList', 'url'=>array('/ThunderbirdSyncList')),
				array('label'=>'Addon', 'url'=>array('/site/version')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div--><!-- mainmenu -->

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">

	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
