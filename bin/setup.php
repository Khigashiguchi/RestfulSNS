<?php

chdir(dirname(__DIR__) . '/var/db');
passthru('sqlite3 sns.sqlite3 --init sns.sql');