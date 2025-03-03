<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . 'src/Infraestructure/Config/bootstrap.php';

return ConsoleRunner::createHelperSet($entityManager);
