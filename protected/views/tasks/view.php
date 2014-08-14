<?php
/* @var $this TasksController */
/* @var $model Tasks */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tasks', 'url'=>array('index')),
	array('label'=>'Create Tasks', 'url'=>array('create')),
	array('label'=>'Update Tasks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tasks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tasks', 'url'=>array('admin')),
);
?>

<h1>View Tasks #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'message_id',
		'responsible_user_id',
		'note',
		'status',
		'assigned_by_user_id',
		'date_updated',
		'date_created',
	),
)); ?>
