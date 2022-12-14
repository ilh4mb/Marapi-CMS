<?php
/**
 * Copyright 2022 Ilham B
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace classes;

use PDO;

class CONN
{
    public function _PDO(): PDO
    {
        global $DB;

        if (is_file($_SERVER['SELF_ROOT'] . "/core/connetion/PDO.php")) {

            /**
             * @var PDO $DB - Database
             */
            require_once($_SERVER['SELF_ROOT'] . "/core/connetion/PDO.php");
            return $DB;

        } else {

            header("Location: ".SELF_PATH."/mrp/install/");
        }
    }
}
