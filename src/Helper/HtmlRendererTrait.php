<?php

namespace Alura\Mvc\Helper;

trait HtmlRendererTrait
{
    
    private function renderTemplate(string $templateName, array $context = []): string
    {       
        $templatePath = __DIR__ . '/../../views/';
        extract($context);
        
        // Inicializa o buffer de saida
        ob_start();
        require_once $templatePath . $templateName . '.php';
        return ob_get_clean();
    }
}