<?php
/* @var $this TasksController */
/* @var $model Tasks */

$this->breadcrumbs=array(
	'Tasks'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Tasks', 'url'=>array('index')),
	array('label'=>'Create Tasks', 'url'=>array('create')),
	array('label'=>'Update Tasks', 'url'=>array('update', 'id'=>$model->message_id)),
	array('label'=>'Delete Tasks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->message_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tasks', 'url'=>array('admin')),
);
?>

<h1>View Tasks #<?php echo $model->message_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'message_id',
		'name',
		'note',
		'status',
		'delegated_by',
		'timestamp',
	),
)); ?>
