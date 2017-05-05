<?php
$cols = $app->shop->getColumnNames();
// var_dump($data);
 ?>

<div class="pages_wrapper">
    <form class="" action="<?=$app->url->create('webshop/edit/addToStock')?>" method="post">
        <table class="dashboard_table">
            <tr>
                <?php foreach (array_values($cols) as $col): ?>
                    <th><?=$col->COLUMN_NAME?></th>
                <?php endforeach; ?>
            </tr>

            <tr>
                <td>ID</td>
                <td><input type="text" name="description" required></td>
                <td><input type="text" name="img" required></td>

                <td><select class="" name="category" required>
                    <option value="1">plate</option>
                    <option value="2">mug</option>
                </select></td>

                <td><input type="text" name="price" required></td>
                <td><input type="text" name="quantity" required></td>
                <input type="text" name="id" hidden>
            </tr>

        </table>
        <input class="edit_data_submit" type="submit" value="Save">
    </form>
</div>
