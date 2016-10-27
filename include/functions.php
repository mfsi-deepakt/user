    <?php
    /**
 * MyClass File Doc Comment
 *
 * PHP version 7
 *
 * @category MyClass
 * @package  MyPackage
 * @author   Deepak Tomar <sdeepak2610@gmail.com>
 * @license  General public license
 * @link     www.xyz.com
 */
    /**
    * Function for autoloading
    * 
    * @param string $className the class name for include in the php page
    *
    * @return void 
    */
    function __autoload($className)
    {
        $class_name = strtolower($className);
        $path = "/include/{$className}.php";
        try {
            if (file_exists($path)) {
                include_once $path;
            } else {
                throw new Exception("The file {$className}.php could not be found");
            }
        }
        catch(Exception $e)
        {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        } 
    }
    /**
    * Function : Implement redirect features in project
    *
    * @param string $url destination url for redirecting
    * 
    *@return void
    */
    function redirectTo($url)
    {
        header('Location: ' . $url, true);  
    }
?>