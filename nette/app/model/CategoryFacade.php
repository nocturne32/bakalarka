<?php
declare(strict_types=1);


namespace App\Model;


use App\Common\Table;
use Nette\Database\Context;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;
use Nette\Utils\ArrayHash;

class CategoryFacade
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
    public function findAllCategories(): Selection
    {
        return $this->connection->table(Table::CATEGORY);
    }

    /**
     * @param int $id
     * @return false|ActiveRow
     */
    public function getCategory(int $id)
    {
        return $this->findAllCategories()->get($id);
    }

    /**
     * @param ArrayHash $values
     * @return bool|int|ActiveRow
     */
    public function insertCategory(ArrayHash $values)
    {
        return $this->connection->table(Table::CATEGORY)
            ->insert($values);
    }

}