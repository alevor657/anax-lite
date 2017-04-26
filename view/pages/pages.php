<div class="pages_wrapper">
    <table class="dashboard_table">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Type</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Path</th>
            <th>Slug</th>
            <?php if ($app->users->isAdmin()): ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>

        <?php foreach ($app->page->getData() as $row) :?>

        <tr>
            <td><?=esc($row->id)?></td>
            <td><?=esc($row->title)?></td>
            <td><?=esc($row->type)?></td>
            <td><?=esc($row->created)?></td>
            <td><?=esc($row->updated)?></td>
            <td><?=esc($row->deleted)?></td>
            <td><?=esc($row->path)?></td>
            <td><?=esc($row->slug)?></td>
            <?php if ($app->users->isAdmin()): ?>
                <td><a href=<?=$app->url->create('content/edit') . "?id=$row->id"?>>Edit</a></td>
            <?php endif; ?>
        </tr>

        <?php endforeach; ?>

    </table>
</div>
