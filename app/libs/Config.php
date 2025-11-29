<?php
/**
 * Config
 * developmetn
 * production
 * testing
 */
class Config
{

    function __construct()
    {
        switch ($ambiente)
        {
            case 'development':
                error_reporting(-1);
                init_set('display_errors', 1);
                break;

                case 'testing':
                    case 'production':
                        init_set('display_errors', 0);
                        if (version_compare(PHP_VERSION, '5.3.0', '>='))
                        {
                            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
                        }
                        else
                        {
                            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
                        }
                        break;
                default:
                    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
                    echo 'The application environment is not set correctly.';
                    exit(1);
        }
    }
}