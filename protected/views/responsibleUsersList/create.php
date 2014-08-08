<?php
/* @var $this ResponsibleUsersListController */
/* @var $model ResponsibleUsersList */

$this->breadcrumbs=array(
	'Responsible Users Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ResponsibleUsersList', 'url'=>array('index')),
	array('label'=>'Manage ResponsibleUsersList', 'url'=>array('admin')),
);
?>

<h1>Create ResponsibleUsersList</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>