<?php


namespace Magenest\ChapterSix\Api;


interface RuleRepositoryInterface
{
    public function loadById($id);
    public function save(\Magenest\ChapterOne\Model\MagenestRule $magenestRule = null);
    public function delete(\Magenest\ChapterOne\Model\MagenestRule $magenestRule = null);
    public function deleteById($id);
    public function setTitle($title);
    public function setStatus($status);
}
