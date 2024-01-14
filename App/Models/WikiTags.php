<?php

namespace App\Models;

class WikiTags
{
    public $wiki_id;
    public $wiki_name;
    public $tag_id;
    public $tag_name;

    public function getWiki_Id()
    {
        return $this->wiki_id;
    }

    public function setWiki_Id($wiki_id)
    {
        $this->wiki_id = $wiki_id;
    }

    public function getWiki_Name()
    {
        return $this->wiki_name;
    }

    public function setWiki_Name($wiki_name)
    {
        $this->wiki_name = $wiki_name;
    }

    public function getTag_Id()
    {
        return $this->tag_id;
    }

    public function setTag_Id($tag_id)
    {
        $this->tag_id = $tag_id;
    }

    public function getTag_Name()
    {
        return $this->tag_name;
    }

    public function setTag_Name($tag_name)
    {
        $this->tag_name = $tag_name;
    }
}
