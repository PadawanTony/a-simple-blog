<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 10/23/16
 */

namespace Core\database;

use App\Models\Post as Post;
use Core\App;
use PDO;
use App\Models\Model;

class QueryBuilder
{
    /**
     * @var PDO
     */
    private $pdo;

	private $dbName;

	/**
     * QueryBuilder constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;

	    $this->dbName = App::get('config.database')['mysql']['name'];
    }

    public function all(Model $model)
    {
        $statement = $this->pdo->prepare("select * from {$this->dbName}.{$model::getTable()}");

        $statement->execute();

	    return $statement->fetchAll(PDO::FETCH_CLASS, get_class($model));
    }

    public function insert(Model $model, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $model->getTable(),
            implode(', ', array_keys($parameters)),
            ':'.implode(', :', array_keys($parameters))
        );

        $statement = $this->pdo->prepare($sql);

        $statement->execute($parameters);

        return $statement->fetchAll(PDO::FETCH_CLASS, $model);
    }
}