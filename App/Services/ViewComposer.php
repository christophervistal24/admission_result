<?php
namespace App\Services;

use App\Helpers\Outputter\Transformer;

class ViewComposer
{
    // REFACTOR THIS VIEW COMPOSER
    private const MAX_NO_OF_EXECUTION = 2;
    private static $isAlreadyExecute  = 0;

    private static $filename;
    private static $data = [];

    private static function register()
    {

        self::make('admin/dashboard' , function () {
            $user = load('Models\User');
            $guidance  = load('Models\GuidanceConselor');
            $admission = load('Models\AdmissionResult');
            
            return [
                'no_of_users'  => $user->count(),
                'guidance_conselors' => count( $guidance->get() ),
                'admission_results'  => Transformer::toArray( $admission->results() ),
                'no_of_deleted_admission_results' => count( $admission->deletedResults() ),
            ];
        });

    }


    public static function handle(string $directory, string $filename)
    {
        if ( self::$isAlreadyExecute !== self::MAX_NO_OF_EXECUTION ) {
            self::$filename = $filename;
            self::register();
            self::$isAlreadyExecute++;
            return true;
        }
        return false;
    }

    private static function make(string $file, $callback)
    {
        if ( self::$filename === $file ) {
            self::$data = $callback();
        }
        
    }

    public static function list()
    {
        return self::$data;
    }

}
