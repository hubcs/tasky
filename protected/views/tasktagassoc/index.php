<?php
/* @var $this TasktagassocController */
/* @var $tagsCounts  array which tells how many tasks are in all the tags of an user */

?>

<h1>Tasktagassocs</h1>

<pre>
<?php
var_dump($tagsCounts);
?>
</pre>

<?php
echo json_encode($tagsCounts);
?>