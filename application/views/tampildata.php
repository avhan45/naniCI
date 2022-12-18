
<?php 
foreach($crips as $data):
?>
<tr>
    <td>
        <input type="checkbox" name="bobot[]" value="1" id="bobot">
    </td>
    <td id="crips"><?= $data['crips']; ?></td>
</tr>
<?php endforeach; ?>