<?php
declare(strict_types=1);


namespace App\Model;


use App\Common\Table;
use Nette\Database\Context;
use Nette\Database\Table\Selection;

class ArticleListFacade
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
     * @return Selection
     */
    public function findAllArticles(): Selection
    {
        return $this->connection->table(Table::ARTICLE);
    }

    /**
     * @param int $id
     * @return false|\Nette\Database\Table\ActiveRow
     */
    public function getArticle(int $id)
    {
        return $this->findAllArticles()->get($id);
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