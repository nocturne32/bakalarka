<?php
declare(strict_types=1);


namespace App\Model;


use App\Common\Table;
use Nette\Database\Context;
use Nette\Database\Table\ActiveRow;
use Nette\Security\Passwords;

class UserFacade
{
    /** @var Context */
    private $connection;

    /**
     * UserFacade constructor.
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
    public function getUser($id)
    {
        return $this->connection->table(Table::USER)->get($id);
    }

    /**
     * @param $condition
     * @return false|ActiveRow
     */
    public function findUserBy($condition)
    {
        return $this->connection->table(Table::USER)
            ->where($condition)
            ->fetch();
    }

    /**
     * @param $values
     * @return bool|int|ActiveRow
     */
    public function addUser($values)
    {
        $values->password = Passwords::hash($values->password);
        return $this->connection->table(Table::USER)
            ->insert($values);
    }

    /**
     * @param $values
     * @return int
     */
    public function editUser($values): int
    {
        return $this->connection->table(Table::USER)
            ->where('id', $values->id)
            ->update($values);
    }

}