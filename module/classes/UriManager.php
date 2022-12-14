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

class UriManager
{

    public $path, $query;

    function __construct()
    {

        $this->path = $_SERVER['REQUEST_URI'];
        $exploded = explode("?", $this->path);

        $this->path = array_key_exists(0, $exploded) ? $exploded[0] : null;
        $this->query = array_key_exists(1, $exploded) ? $exploded[1] : null;
    }

    public function getPath()
    {


        $this->path = str_replace(SELF_PATH, "", $this->path);

        return array_slice(explode("/", $this->path), 1);
    }
}
