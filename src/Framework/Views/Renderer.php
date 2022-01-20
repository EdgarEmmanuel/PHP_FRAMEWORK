<?php
namespace Framework\Views;


class Renderer
{
    /**
     * @var string
     */
    const DEFAULT_NAMESPACE = '__MAIN';

    /**
     * @var string
     */
    const CHARACTER_NAMESPACE = "@";

    /**
     * @var array|string|string[]
     */
    private $ROOT;

    /**
     * @var array
     */
    private $paths = [];

    /**
     * @var array
     */
    private $globals = [];


    public function __construct(){
        $this->ROOT = str_replace('public', '', $_SERVER['DOCUMENT_ROOT']);
    }


    /**
     * permits to add namespace for our view
     * so we can match the perfect path to the view
     *
     * @param string $namespace
     * @param string|null $pathName
     * @return void
     */
    public function addPath(string $namespace, ?string $pathName = null): void
    {
        if(is_null($pathName)) {
            $this->paths[self::DEFAULT_NAMESPACE] = $namespace;
        } else {
            $this->paths[$namespace] = $pathName;
        }
    }

    /**
     * To add a global value to the view
     *
     * @param string $key
     * @param $value
     * @return void
     */
    public function addGlobal(string $key, $value){
        $this->globals[$key] = $value;
    }

    /**
     * @param string $view
     * @param array $parameters
     * @return string
     */
    public function render(string $view, array $parameters = []): string
    {
        if($this->hasNamespace($view)) {
            $namespace = $this->getNamespace($view);
            $view = $this->getFilePath($view);
            $path = $this->paths[$namespace] . $this->getEndFilePath($view);
            return $this->displayView($path, $parameters);
        }
        $path = $this->paths[self::DEFAULT_NAMESPACE] . $this->getEndFilePath($view);
        return $this->displayView($path, $parameters);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return string
     */
    private function displayView(string $path, array $parameters): string
    {
        ob_start();
        $renderer = $this;
        extract($this->globals);
        extract($parameters);
        require($path);
        return ob_get_clean();
    }

    /**
     * it starts at the Root of the project so
     * you can personalize to path to your header in the view
     *
     * @param string $path
     * @return void
     */
    private function withHeader(string $path): void{
        require_once($this->ROOT.$path);
    }


    private function withFooter(string $path): void{
        require_once($this->ROOT.$path);
    }


    private function hasNamespace(string $view): bool
    {
        return $view[0] === self::CHARACTER_NAMESPACE;
    }


    private function getNamespace($view): string
    {
        $THE_CHARACTER_TO_FIND = "/";
        $TO = strpos($view, $THE_CHARACTER_TO_FIND)-1;
        $FROM = 1;
        return substr($view, $FROM, $TO);
    }


    private function getEndFilePath(string $view): string
    {
        return DIRECTORY_SEPARATOR . $view . ".php";
    }


    private function getFilePath(string $view): string
    {
        $THE_CHARACTER_TO_FIND = "/";
        $FROM = strpos($view, "/", strpos($view, $THE_CHARACTER_TO_FIND)) + 1;
        $TO = strlen($view);
        return substr($view, $FROM, $TO);
    }

}