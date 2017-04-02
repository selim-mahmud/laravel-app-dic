<?php
/**
 * Created by PhpStorm.
 * User: XC9295
 * Date: 2/04/2017
 * Time: 4:57 PM
 */

namespace App\Http\Controllers;

use Debugbar;
use Exception;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CmsController
 *
 * @package App\Http\Controllers
 */
class CmsController extends Controller
{
    const CMS_CONTENT_ROOT = 'cms-content';

    /**
     * @param string $path1
     * @param string|null $path2
     * @param string|null $path3
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function index(string $path1, string $path2 = null, string $path3 = null)
    {
        $viewPath = self::CMS_CONTENT_ROOT . '.' . $this->normalisePathCapitalisation(
                $this->makeViewPath($path1, $path2, $path3)
            );

        if ($path3) {
            $folderPath = str_ireplace('.' . $path3, '', $viewPath);
            $parentPath = $path1 . '/' . $path2 . '/';
        }
        else if ($path2) {
            $folderPath = str_ireplace('.' . $path2, '', $viewPath);
            $parentPath = $path1 . '/';
        }
        else {
            $folderPath = $viewPath;
            $parentPath = '/';
        }

        $siblingTemplates = $this->getViewsInFolder($folderPath);

        // Does requested path match a template?
        if (View::exists($viewPath)) {

            $renderPath = $viewPath;
        }
        // Does the requested path match a folder with an _index template in it?
        else if( View::exists($folderPath . '._index') ) {

            $renderPath = $folderPath . '._index';
        }
        else {
            throw new NotFoundHttpException('CmsController index method could not find the requested page');
        }

        // if the request URL had any capital letters, redirect to the lower case version
        if( preg_match( '#[A-Z]#', request()->url())) {
            return redirect(strtolower(request()->url()), 301);
        }



        return View::make($renderPath, [
            'parentPath'       => $parentPath,
            'siblingTemplates' => $siblingTemplates
        ]);

    }


    /**
     * Gets an array of the blade views in a specific path
     *
     * Views with name starting with "_" are skipped.
     *
     * @param string $folderPath
     * @return array Key Value Array where the keys are Displayable names and values are template link names
     */
    public function getViewsInFolder(string $folderPath): array
    {
        $folderPathFileSystem = $this->getFolderPathOnFileSystem($folderPath);

        if (!File::exists($folderPathFileSystem)) {
            return [];
        }

        $files = $this->getAllowedViewTemplates($folderPathFileSystem);

        if (!count($files)) {
            return [];
        }

        $displayNames = array_map([$this, 'viewNameToReadableName'], $files);

        return array_combine($displayNames, $files);
    }

    /**
     * @param string $folderPath
     * @return string
     * @throws Exception
     */
    public function getViewsFolderFileSystemPath(string $folderPath): string
    {
        if ((strpos($folderPath, '/')) || (substr($folderPath, 0, 1) == '_')) {
            throw new Exception('Invalid Parameter - use view path syntax with dots not slashes, initial Underscore folders are hidden.');
        }

        $folderPath = str_replace('.', '/', strtolower($folderPath));

        $folderPathFileSystem = resource_path('views/' . $folderPath . '/');

        return $folderPathFileSystem;
    }


    /**
     * @param string $name
     * @return string
     */
    public function viewNameToReadableName(string $name): string
    {
        return ucwords(str_replace('-', ' ', $name));
    }


    /**
     * @param string $path1
     * @param string|null $path2
     * @param string|null $path3
     * @return string
     */
    public function makeViewPath(string $path1, string $path2 = null, string $path3 = null): string
    {
        $viewPath = $path1;

        if ($path2) {

            $viewPath .= '.' . $path2;

            if ($path3) {

                $viewPath .= '.' . $path3;
            }
        }

        return $viewPath;
    }


    /**
     * Converts the input path to a normalised pattern for the on-disc files
     *
     * All words are lower case, spaces are replaced with hyphens
     *
     * @param string $path
     * @return string
     */
    public function normalisePathCapitalisation(string $path): string
    {
        $pathComponents = explode('.', $path);

        foreach ($pathComponents as &$component) {

            $innerPathComponents = explode('-', $component);

            foreach ($innerPathComponents as &$innerComponent) {
                $innerComponent = strtolower($innerComponent);
            }

            $component = implode('-', $innerPathComponents);
        }

        return implode('.', $pathComponents);
    }


    /**
     * @param string $folderPathFileSystem
     * @return array Array of the blade template names which are allowed to be shown
     */
    public function getAllowedViewTemplates(string $folderPathFileSystem): array
    {
        $files = File::glob( strtolower($folderPathFileSystem) . '/*.blade.php');

        // strip path information, file extension
        array_walk($files, function (&$item) {
            $item = basename($item, '.blade.php');
        });

        // discard any files which are hidden (leading underscore)
        $files = array_filter($files, function ($value) {
            return preg_match('#^[^_].+#', $value);
        });

        return $files;
    }


    /**
     * @param string $folderPath
     * @return string
     */
    public function getFolderPathOnFileSystem(string $folderPath): string
    {
        $lowercasedFolderPath = strtolower($folderPath);

        $folderPathFileSystem = $this->getViewsFolderFileSystemPath($lowercasedFolderPath);

        return $folderPathFileSystem;
    }

}