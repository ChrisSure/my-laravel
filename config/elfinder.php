<?php
return [

    //The dir where to store the images (relative from public)
    'dir' => 'files',
    
    
    //Define an array of Filesystem disks, which use Flysystem.
    //You can set extra options, example:
    /*
    'my-disk' => [
        'URL' => url('to/disk'),
        'alias' => 'Local storage',
    ],
    */
    
    
  	//The default group settings for the elFinder routes.
  	
  	'route' => [
        'prefix'     => config('backpack.base.route_prefix').'/elfinder',
        'middleware' => ['web', 'auth'], //Set to null to disable middleware filter
    ],
  
  	
   	//Filter callback to check the files
	'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',

    
    //By default, the roots file is LocalFileSystem, with the above public dir.
    //If you want custom options, you can set your own roots below.
    'roots' => null,

       
    //These options are merged, together with 'roots' and passed to the Connector.
    'options' => [
        'roots'  => [
        	[
            	'driver' => 'LocalFileSystem',
                'path'   => public_path() . '/upload',
                'URL'    => 'http://list/upload'
            ],
        ]
    ],
]
?>