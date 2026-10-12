<?php
/**
 * SANKALP 2027 Entry Point
 * Redirects root workspace access to the production application located in php_app/
 */
header('Location: php_app/', true, 302);
exit;
