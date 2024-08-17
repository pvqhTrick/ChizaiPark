<?php 
$field = $args['field'];
$object = get_field_object($field);
if($object['value']):
?>
<div class="appearanceBox">
    <p class="appearanceName"><?php echo $object['label'] ?></p>
    <ul class="listWorks"><?php echo $object['value'] ?></ul>
</div>
<?php endif ?>