<?php


namespace Magenest\ChapterSix\Model;
use Magenest\ChapterSix\Api\RuleRepositoryInterface;
use Magenest\ChapterOne\Model\MagenestRule as ModelRule;
use Magenest\ChapterOne\Model\ResourceModel\MagenestRule as ResourceRule;


class RuleRepositoryModel implements RuleRepositoryInterface
{
    protected $modelRule;
    protected $resourceRule;
    public function __construct
    (
        ModelRule $modelRule,
        ResourceRule $resourceRule
    )
    {
        $this->modelRule = $modelRule;
        $this->resourceRule = $resourceRule;
    }

    public function loadById($id)
    {
        $this->modelRule;
        $this->resourceRule->load($this->modelRule, $id);
        return $this->modelRule;
    }
    public function save(\Magenest\ChapterOne\Model\MagenestRule $magenestRule = null)
    {
        $this->resourceRule->save($magenestRule != null ? $magenestRule : $this->modelRule);
    }
    public function delete(\Magenest\ChapterOne\Model\MagenestRule $magenestRule = null)
    {
        $this->resourceRule->delete($magenestRule != null ? $magenestRule : $this->modelRule);
    }
    public function deleteById($id)
    {
        $this->resourceRule->load($this->modelRule, $id);
        $this->resourceRule->delete($this->modelRule);
    }
    public function setTitle($title)
    {
        $model = $this->modelRule;
        $model->setTitle($title);
    }
    public function setStatus($status)
    {
        $model = $this->modelRule;
        $model->setStatus($status);
    }
}
