<div class="edit_wrapper">
    <form class="" action="<?=$app->url->create('content/edit/createContent')?>" method="post">
        <table class="dashboard_table">
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Path</th>
                <th>Slug</th>
                <th>Filters</th>
                <th>Published</th>
            </tr>


            <tr>
                <td>
                    <input type="text" name="title">
                </td>
                <td>
                    <select name="type">
                        <option value="page">page</option>
                        <option value="blog">blog</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="formPath">
                </td>
                <td>
                    <input type="text" name="slug">
                </td>
                <td>
                    <input type="text" name="filter">
                </td>
                <td>
                    <input type="date" name="published">
                </td>
            </tr>
        </table>
            <textarea class="edit_data_input" name="data" rows="8" cols="80"></textarea>
            <input class="edit_data_submit" type="submit" value="Save">
    </form>
</div>





<!-- <td>
    <div class="td_filters_wrapper">
        <label for="nl2br">nl2br</label>
        <input id="nl2br" type="checkbox" name="nl2br" value="nl2br">
    </div>

    <div class="td_filters_wrapper">
        <label for="markdown">md</label>
        <input id="markdown" type="checkbox" name="markdown" value="markdown">
    </div>

    <div class="td_filters_wrapper">
        <label for="bbcode">bbcode</label>
        <input id="bbcode" type="checkbox" name="bbcode" value="bbcode">
    </div>

    <div class="td_filters_wrapper">
        <label for="clickable">clickable</label>
        <input id="clickable" type="checkbox" name="clickable" value="clickable">
    </div>
</td> -->
