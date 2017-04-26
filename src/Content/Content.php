<?php

namespace Alvo16\Content;

class Content implements \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\AppInjectableTrait;

    public function getColumnNames($db = 'oophp', $table = 'content')
    {
        $sql = "SELECT `COLUMN_NAME`
        FROM `INFORMATION_SCHEMA`.`COLUMNS`
        WHERE `TABLE_SCHEMA`='$db'
            AND `TABLE_NAME`='$table';";

        return $this->app->db->executeFetchAll($sql);
    }

    public function getData()
    {
        $sql = "SELECT `id`, `title`, `type`, `created`
        FROM content";

        return $this->app->db->executeFetchAll($sql);
    }

    public function updateContent($data)
    {
        var_dump($data);

        // $sql = "UPDATE content
        // SET
        //     `path` = '{$data["formPath"]}',
        //     `title` = '{$data["title"]}',
        //     `type` = '{$data["type"]}',
        //     `slug` = '{$data["slug"]}',
        //     `data` = '{$data["data"]}',
        //     `filter` = '{$data["filter"]}'
        // WHERE `id` = '{$data["id"]}'";

        $sql = "UPDATE content
        SET
            title=?,
            type=?,
            path=?,
            slug=?,
            filter=?,
            data=?
        WHERE id=?";

        var_dump($sql);


        $this->app->db->connect();
        $this->app->db->execute($sql, array_values($data));
    }
}
