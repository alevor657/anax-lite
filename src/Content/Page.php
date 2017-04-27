<?php

namespace Alvo16\Content;

class Page extends Content
{
    use \Anax\Common\AppInjectableTrait;

    public function getData($id = null)
    {
        if (!$id) {
            $sql = <<<EOD
SELECT
    *,
    CASE
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
FROM content
;
EOD;
        }
        else
        {
            $sql = <<<EOD
SELECT
    *,
    CASE
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
FROM content
WHERE `id` = '$id'
;
EOD;
        }
        return $this->app->db->executeFetchAll($sql);
    }
}
