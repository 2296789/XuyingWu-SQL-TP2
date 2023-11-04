<?php
class Twig{
    static public function render($template, $data = array()){
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $twig = new \Twig\Environment($loader, array('auto_reload' => true));
        // 添加此行
        //$twig->addExtension(new \Twig\Extension\DebugExtension()); 
        
        $twig->addGlobal('path', PATH_DIR);        
        echo $twig->render($template, $data);
    }
}
?>