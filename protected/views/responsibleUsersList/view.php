<?php
/* @var $this ResponsibleUsersListController */
/* @var $model ResponsibleUsersList */

$this->breadcrumbs=array(
	'Responsible Users Lists'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ResponsibleUsersList', 'url'=>array('index')),
	array('label'=>'Create ResponsibleUsersList', 'url'=>array('create')),
	array('label'=>'Update ResponsibleUsersList', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ResponsibleUsersList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ResponsibleUsersList', 'url'=>array('admin')),
);
?>

<h1>View ResponsibleUsersList #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'password_hash',
		'active',
	),
)); ?>
