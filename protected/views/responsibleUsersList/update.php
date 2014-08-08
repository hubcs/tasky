<?php
/* @var $this ResponsibleUsersListController */
/* @var $model ResponsibleUsersList */

$this->breadcrumbs=array(
	'Responsible Users Lists'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ResponsibleUsersList', 'url'=>array('index')),
	array('label'=>'Create ResponsibleUsersList', 'url'=>array('create')),
	array('label'=>'View ResponsibleUsersList', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ResponsibleUsersList', 'url'=>array('admin')),
);
?>

<h1>Update ResponsibleUsersList <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>