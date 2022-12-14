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


class Main
{

    public THEME $theme;
    public $config;

    function __construct()
    {
        $uriM = new UriManager();
        $paths = $uriM->getPath();

        $this->config = (new Json($_SERVER['SELF_ROOT']."/app/.json"))->getData();

        if(array_key_exists(0, $paths)) {

            if($paths[0] == $this->config['privateZone']) {

                $this->PrivateZone();

                return;
            }
        }

        $this->PublicZone();
    }

    private function PublicZone()
    {
        // INIT THEME
        $this->theme = THEME::getActiveTheme();

        // INIT PLUGIN
        $listPlugin = Plugin::getActivePlugin();

        // INIT VIEW
        $this->view = new VIEW($this);
        $this->view->brand("TOKO MINYAK");

        foreach ($listPlugin as $plugin) {
            /**
             * @var Plugin $plugin
             */
            // CALL PLUGIN
            $plugin->callOnFront($this);
        }

        $this->view->render(); # RENDER
    }
    private function PrivateZone()
    {

        require_once $_SERVER['SELF_ROOT']."/app/admin/index.php";
    }
}
