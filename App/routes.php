<?php

class Router {
    private $routes = [];

    // Ajouter une route
    public function add($method, $path, $callback) {
        $this->routes[] = [
            "method" => strtoupper($method),
            "path" => $path,
            "callback" => $callback
        ];
    }

    // Dispatcher la requête
    public function dispatch($method, $uri) {
        foreach ($this->routes as $route) {
            if ($route["method"] == strtoupper($method) && $this->match($route["path"], $uri, $params)) {
                return call_user_func_array($route["callback"], $params);
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }

    // Vérification de la route et extraction des paramètres
    private function match($path, $uri, &$params) {
        $pathRegex = preg_replace('/{(\w+)}/', '(?P<$1>[^/]+)', $path);
        $pathRegex = "#^" . $pathRegex . "$#";

        if (preg_match($pathRegex, $uri, $matches)) {
            $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
            return true;
        }
        return false;
    }
}
