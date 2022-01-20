<?php
namespace Framework\Views;


class Renderer
{

    const DEFAULT_NAMESPACE = '__MAIN';


    const CHARACTER_NAMESPACE = "@";


    private $paths = [];

      public function addPath(string $namespace, ?string $pathName = null): void
      {
          if(is_null($pathName))
          {
              $this->paths[self::DEFAULT_NAMESPACE] = $namespace;
          } else {
              $this->paths[$namespace] = $pathName;
          }
      }


      public function render(string $view): string
      {
          if($this->hasNamespace($view)){
              $namespace = $this->getNamespace($view);
              $view = $this->getFilePath($view);
              $path = $this->paths[$namespace] . $this->getEndFilePath($view);
              return $this->displayView($path);
          }
          $path = $this->paths[self::DEFAULT_NAMESPACE] . $this->getEndFilePath($view);
          return $this->displayView($path);
      }


      private function displayView(string $path): string{
          ob_start();
          require($path);
          return ob_get_clean();
      }


      private function hasNamespace(string $view): bool{
          return $view[0] === self::CHARACTER_NAMESPACE;
      }


      private function getNamespace($view): string{
          $THE_CHARACTER_TO_FIND = "/";
          $TO = strpos($view, $THE_CHARACTER_TO_FIND)-1;
          $FROM = 1;
          return substr($view,$FROM,$TO);
      }


      private function getEndFilePath(string $view): string{
          return DIRECTORY_SEPARATOR . $view . ".php";
      }


      private function getFilePath(string $view): string{
          $THE_CHARACTER_TO_FIND = "/";
          $FROM = strpos($view , "/", strpos($view, $THE_CHARACTER_TO_FIND)) + 1;
          $TO = strlen($view);
          return substr($view, $FROM, $TO);
      }

}