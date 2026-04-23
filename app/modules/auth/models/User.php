<?php

namespace App\Modules\Auth\Models;

use App\Core\Database;
use App\Core\Helpers;

class User
{
    public static function findByEmailOrEmployeeCode(string $identifier): array|false
    {
        $databaseConfig = Helpers::config('database');
        $connection = Database::connect($databaseConfig);

        $sql = "
            SELECT 
                users.*,
                roles.code AS role_code,
                areas.code AS area_code
            FROM users
            INNER JOIN roles ON roles.id = users.role_id
            INNER JOIN areas ON areas.id = users.area_id
            WHERE (users.email = :identifier OR users.employee_code = :identifier)
              AND users.is_active = 1
            LIMIT 1
        ";

        $statement = $connection->prepare($sql);
        $statement->execute(['identifier' => $identifier]);

        return $statement->fetch();
    }
}