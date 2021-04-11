<?php

namespace Core;

class View {

    /**
     * The render method.
     * 
     * TThis method displays the template and site's content.
     *
     * @param string $view A string representation of page template.
     * @param array $params A array of the controller variables.
     *
     * @return void
     * @access  public
     */
    static function render(string $view, array $params): void {

        // Extract controller variables
        extract($params, EXTR_SKIP);

        // Page template path.
        $content = APPLICATION_PATH . "/App/Views/Page/$view.php";

        if (is_readable($content)) {
            
            // Include global template
            require_once APPLICATION_PATH . "/App/Views/Template.php";
            
        } else {
            
            throw new \Exception("View $view not found");
        }
    }

    /**
     * The error render method.
     * 
     * This method displays the errors.
     * 
     * @param array $params A array of the controller variables.
     *
     * @return array  The route details.
     * @access  public
     */
    static function renderError(array $params): void {

        // Extract controller variables
        extract($params, EXTR_SKIP);

        // Error template path
        $content = APPLICATION_PATH . "/App/Views/error.php"; 

        if (is_readable($content)) {
            
            require_once $content;
            
        } else {
            
            throw new \Exception("View ERROR not found");
        }
    }

}
