<?php
namespace Yasha;
class ORM
{
    protected static ?PDO $db = null;
    protected string $table;

    protected function __construct()
    {
        if(is_null(self::$db)) {
            $connect = "mysql:host=MySQL-8.2;dbname=wd-16";
            $user = "root";
            $pass = "";
            try {
                $pdo = new \PDO($connect, $user, $pass);
            } catch (PDOException $e) {
                //sms - критичный случай нет подключения к БД
                die('404');
            }
            self::$db = $pdo;
        }
    }

    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    public function all(): array
    {
        $stmt = self::$db->query("SELECT * FROM " . $this->table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $stmt = self::$db->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $stmt = self::$db->prepare("INSERT INTO $this->table ($columns) VALUES ($values)");
        return $stmt->execute($data);
    }
}