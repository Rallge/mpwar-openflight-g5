<?php
declare(strict_types=1);


namespace CodelyTv\OpenFlight\Users\Infrastructure;


use CodelyTv\OpenFlight\Users\Domain\NotFoundUser;
use CodelyTv\OpenFlight\Users\Domain\User;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;
use CodelyTv\Shared\Infrastructure\Persistence\Mysql;
use function Symfony\Component\String\u;
use PDO;

final class MysqlUserRepository implements UserRepository
{
    public function __construct(private Mysql $mysql)
    {
    }

    public function Save(User $user): void
    {
        $sql = 'INSERT INTO user VALUES(:id, :username, :name,:last_name, :password)';
        $statement = $this->mysql->PDO()->prepare($sql);
        $statement->bindValue(':id', $user->ID()->value());
        $statement->bindValue(':username', $user->Username());
        $statement->bindValue(':name', $user->Name());
        $statement->bindValue(':last_name', $user->LastName());
        $statement->bindValue(':password', $user->Password());
        $statement->execute();
    }

    public function Login(string $username, string $password):User
    {
        $sql = 'SELECT Id,Username,Name,LastName, Password FROM user WHERE username = :username';
        $statement = $this->mysql->PDO()->prepare($sql);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $fetchUser=$statement->fetch(PDO::FETCH_ASSOC);
        //fetch user --> array asociativo
        if(!$fetchUser){
            throw new NotFoundUser();
        }
        $uuid = new Uuid($fetchUser["Id"]);

        //Instanciando un user new User
        return new User($uuid,$fetchUser["Username"],$fetchUser["Name"],$fetchUser["LastName"],$fetchUser["Password"]);
    }

}