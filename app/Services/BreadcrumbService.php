<?php
// app/Services/BreadcrumbService.php
namespace App\Services;

class BreadcrumbService
{
    public function generate($routeName, $params = [])
    {
        $breadcrumbs = [];

        $segments = explode('.', $routeName);

        $url = '';
        foreach ($segments as $segment) {
            $url .= '/' . $segment;
            $breadcrumbs[] = [
                'name' => ucfirst($segment), // You can customize this logic
                'url' => $url,
            ];
        }

        return $breadcrumbs;
    }
}
