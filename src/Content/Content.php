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
        $sql = "UPDATE content
        SET
            title=?,
            type=?,
            path=?,
            slug=?,
            filter=?,
            published=?,
            deleted=?,
            data=?
        WHERE id=?";

        // var_dump($sql);
        // var_dump($data);
        // exit;
        if (!$data['slug']) {
            $data['slug'] = slugify($data['title']);
        }

        if (!$data['deleted']) {
            $data['deleted'] = null;
        }

        $this->app->db->connect();
        $this->app->db->execute($sql, array_values($data));
    }

    public function add($data)
    {
        if (!$data['formPath']) {
            $data['formPath'] = null;
        }

        if (!$data['slug']) {
            $data['slug'] = slugify($data['title']);
        }

        $sql = "INSERT INTO content
        (
            title,
            type,
            path,
            slug,
            filter,
            published,
            data
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?)";

        var_dump($sql);

        $this->app->db->connect();
        $this->app->db->execute($sql, array_values($data));
    }

    public function delete($id)
    {
        // $sql = "DELETE FROM content WHERE `id` = '$id'";
        $sql = "UPDATE content SET deleted=NOW() WHERE id=?";

        $this->app->db->connect();
        $this->app->db->execute($sql, [$id]);
    }

    public function getDataByPath($path)
    {
        // $sql = "SELECT * FROM `content`
        // WHERE path = ?
        //     AND published <= NOW()
        //     AND deleted IS NULL";

        $sql = <<<EOD
SELECT
   *,
   DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
   DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
FROM content
WHERE
   path = ?
   AND type = ?
   AND (deleted IS NULL OR deleted > NOW())
   AND published <= NOW()
;
EOD;

        $this->app->db->connect();
        $data = $this->app->db->executeFetchAll($sql, [$path, 'page']);

        if (!$data) {
            $this->app->response->redirect($this->app->url->create('404'));
            // header("HTTP/1.0 404 Not Found");
        }

        return $data[0];
    }
}
