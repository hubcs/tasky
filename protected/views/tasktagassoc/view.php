<?php
/* @var $this TasktagassocController */
/* @var $model Tasktagassoc */

$this->breadcrumbs=array(
	'Tasktagassocs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tasktagassoc', 'url'=>array('index')),
	array('label'=>'Create Tasktagassoc', 'url'=>array('create')),
	array('label'=>'Update Tasktagassoc', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tasktagassoc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tasktagassoc', 'url'=>array('admin')),
);
?>

<h1>View Tasktagassoc #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'task_id',
		'tag_id',
		'user_id',
		'date_updated',
		'date_created',
	),
)); ?>
