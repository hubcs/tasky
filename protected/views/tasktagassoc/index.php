<?php
/* @var $this TasktagassocController */
/* @var $dataProvider CActiveDataProvider */
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php


echo $dataProvider->getTagsCounts();

?>