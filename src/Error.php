<?php

namespace Core;

use Core\Error;
use Config\Application as AppConfig;
use Exception;
use Error as PHPError;

class Error {


    public static function errorHandler(int $level, string $message, string $file, int $line): void {

        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * The exception handler method.
     * 
     * The method will be called when an uncaught exception occurs.
     *
     * @param Exception $exception  The exception
     *
     * @return void
     * @access  public
     */
    public static function exceptionHandler($exception): void {

        // Variables
        $errorinfo = "";
        $header = "404";
        $homepage = AppConfig::DEFAULT_ROUTE;

        // Error code
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }

        // Set the response code
        http_response_code($code);

        // Log type
        if (AppConfig::SHOW_ERRORS) {
            $errorinfo = Error::getErrorInfo($exception);
        } else {
            Error::logToFile($exception);
        }

        // Render error page
        View::renderError(compact(["errorinfo", "header", "homepage"]));
    }

    /**
     * The method that write error info to log file.
     *
     * @param Exception $exception  The exception
     *
     * @return void
     * @access  public
     */
    public static function logToFile(Exception $exception): void {

        // Set log path
        ini_set('error_log', APPLICATION_PATH . '/logs/' . date('Y-m-d') . '.txt');

        // Set error info
        $message = "Uncaught exception: '" . get_class($exception) . "'";
        $message .= " with message '" . $exception->getMessage() . "'";
        $message .= "\nStack trace: " . $exception->getTraceAsString();
        $message .= "\nThrown in '" . $exception->getFile() . "' on line " . $exception->getLine();

        // Write log
        error_log($message);
    }

    /**
     * The method makes error info string.
     *
     * @param Exception $exception  The exception
     *
     * @return string
     * @access  public
     */
    public static function getErrorInfo($exception): string {

        $errorinfo = "";
        $errorinfo .= "<h1>Fatal error</h1>";
        $errorinfo .= "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
        $errorinfo .= "<p class=\"text-danger\">Message: '" . $exception->getMessage() . "'</p>";
        $errorinfo .= "<p class=\"text-warning text-left\">Stack trace:<br /><span>" . nl2br($exception->getTraceAsString()) . "</span></p>";
        $errorinfo .= "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
        return $errorinfo;
    }

}
