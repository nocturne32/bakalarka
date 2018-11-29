<?php
declare(strict_types=1);


namespace App\Model;


use App\Common\Table;
use Nette\Database\Context;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;

class ArticleFacade
{
    /** @var Context */
    private $connection;

    /**
     * ArticleListFacade constructor.
     * @param Context $connection
     */
    public function __construct(Context $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $id
     * @return false|ActiveRow
     */
    public function getArticle($id)
    {
        return $this->connection->table(Table::ARTICLE)->get($id);
    }

    /**
     * @param $values
     * @return bool|int|ActiveRow
     */
    public function insertArticle($values)
    {
        return $this->connection->table(Table::ARTICLE)
            ->insert($values);
    }

    /**
     * @return Selection
     */
    public function findAllArticles(): Selection
    {
        return $this->connection->table(Table::ARTICLE)
            ->order('created_at DESC');
    }

    /**
     * @param array $conditions
     * @return Selection
     */
    public function findArticlesBy(array $conditions): Selection
    {
        return $this->findAllArticles()->where($conditions);
    }
}