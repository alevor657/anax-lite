<?php

namespace Alvo16\Content;

class Page extends Content
{
    use \Anax\Common\AppInjectableTrait;

    public function getData($id = null)
    {
        if (!$id) {
            $sql = "SELECT `id`, `title`, `type`, `created`, `updated`, `deleted`, `path`, `slug`, `data`, `filter`
            FROM content
            WHERE `type` = 'page'";
        } else {
            $sql = "SELECT `id`, `title`, `type`, `created`, `updated`, `deleted`, `path`, `slug`, `data`, `filter`
            FROM content
            WHERE `type` = 'page'
                AND `id` = '$id'";
        }

        return $this->app->db->executeFetchAll($sql);
    }
}
