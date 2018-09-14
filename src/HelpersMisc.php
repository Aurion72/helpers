<?php namespace Aurion72\Helpers;

class HelpersMisc
{
    /**
     * Get the current action
     *
     * @param bool $keep_namespace
     * @return mixed|string
     */
    public static function getAction($keep_namespace = false)
    {
        if ($keep_namespace) {
            return request()->route()->getActionName();
        }
        $action = request()->route()->getAction();
        $namespace = $action['namespace'];
        $controller = $action['controller'];

        return str_replace($namespace.'\\', '', $controller);
    }
}