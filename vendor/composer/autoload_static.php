<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit61f822a742abdc540a4d326cb1c13013
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Whoops\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Whoops\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/whoops/src/Whoops',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Controller',
            1 => __DIR__ . '/../..' . '/App/Contracts',
            2 => __DIR__ . '/../..' . '/App/Core',
            3 => __DIR__ . '/../..' . '/App/Models',
            4 => __DIR__ . '/../..' . '/App/Helpers',
            5 => __DIR__ . '/../..' . '/App/Helpers/Database',
            6 => __DIR__ . '/../..' . '/App/Helpers/Outputter',
            7 => __DIR__ . '/../..' . '/App/Helpers/Form',
            8 => __DIR__ . '/../..' . '/App/Services',
        ),
    );

    public static $classMap = array (
        'App\\Controller\\Admin' => __DIR__ . '/../..' . '/App/Controller/Admin.php',
        'App\\Controller\\Admission' => __DIR__ . '/../..' . '/App/Controller/Admission.php',
        'App\\Controller\\AuthController' => __DIR__ . '/../..' . '/App/Controller/AuthController.php',
        'App\\Controller\\Guidance' => __DIR__ . '/../..' . '/App/Controller/Guidance.php',
        'App\\Controller\\GuidanceApi' => __DIR__ . '/../..' . '/App/Controller/GuidanceApi.php',
        'App\\Controller\\Help' => __DIR__ . '/../..' . '/App/Controller/Help.php',
        'App\\Controller\\Profile' => __DIR__ . '/../..' . '/App/Controller/Profile.php',
        'App\\Controller\\User' => __DIR__ . '/../..' . '/App/Controller/User.php',
        'App\\Core\\App' => __DIR__ . '/../..' . '/App/Core/App.php',
        'App\\Core\\Auth' => __DIR__ . '/../..' . '/App/Core/Auth.php',
        'App\\Core\\Controller' => __DIR__ . '/../..' . '/App/Core/Controller.php',
        'App\\Core\\Database' => __DIR__ . '/../..' . '/App/Core/Database.php',
        'App\\Core\\Functions' => __DIR__ . '/../..' . '/App/Core/Functions.php',
        'App\\Core\\PDF' => __DIR__ . '/../..' . '/App/Core/PDF.php',
        'App\\Core\\QueryBuilder' => __DIR__ . '/../..' . '/App/Core/QueryBuilder.php',
        'App\\Helpers\\Admission\\EquivalentCalculator' => __DIR__ . '/../..' . '/App/Helpers/Admission/EquivalentCalculator.php',
        'App\\Helpers\\Database\\QueryHelper' => __DIR__ . '/../..' . '/App/Helpers/Database/QueryHelper.php',
        'App\\Helpers\\Error' => __DIR__ . '/../..' . '/App/Helpers/Error.php',
        'App\\Helpers\\Form\\Validator' => __DIR__ . '/../..' . '/App/Helpers/Form/Validator.php',
        'App\\Helpers\\Loader' => __DIR__ . '/../..' . '/App/Helpers/Loader.php',
        'App\\Helpers\\Outputter\\Transformer' => __DIR__ . '/../..' . '/App/Helpers/Outputter/Transformer.php',
        'App\\Helpers\\Redirect' => __DIR__ . '/../..' . '/App/Helpers/Redirect.php',
        'App\\Helpers\\Request' => __DIR__ . '/../..' . '/App/Helpers/Request.php',
        'App\\Helpers\\Response' => __DIR__ . '/../..' . '/App/Helpers/Response.php',
        'App\\Helpers\\Rule' => __DIR__ . '/../..' . '/App/Helpers/Rule.php',
        'App\\Helpers\\Session' => __DIR__ . '/../..' . '/App/Helpers/Session.php',
        'App\\Helpers\\Str' => __DIR__ . '/../..' . '/App/Helpers/Str.php',
        'App\\Helpers\\TemplateLoader' => __DIR__ . '/../..' . '/App/Helpers/TemplateLoader.php',
        'App\\Helpers\\ViewLoader' => __DIR__ . '/../..' . '/App/Helpers/ViewLoader.php',
        'App\\Model\\User' => __DIR__ . '/../..' . '/App/Models/OldUser.php',
        'App\\Models\\AdmissionResult' => __DIR__ . '/../..' . '/App/Models/AdmissionResult.php',
        'App\\Models\\Course' => __DIR__ . '/../..' . '/App/Models/Course.php',
        'App\\Models\\EntranceRating' => __DIR__ . '/../..' . '/App/Models/EntranceRating.php',
        'App\\Models\\ExaminerInfo' => __DIR__ . '/../..' . '/App/Models/ExaminerInfo.php',
        'App\\Models\\GuidanceConselor' => __DIR__ . '/../..' . '/App/Models/GuidanceConselor.php',
        'App\\Models\\Model' => __DIR__ . '/../..' . '/App/Models/Model.php',
        'App\\Models\\User' => __DIR__ . '/../..' . '/App/Models/User.php',
        'App\\Models\\UserInfo' => __DIR__ . '/../..' . '/App/Models/UserInfo.php',
        'App\\Services\\Container' => __DIR__ . '/../..' . '/App/Services/Container.php',
        'App\\Services\\ViewComposer' => __DIR__ . '/../..' . '/App/Services/ViewComposer.php',
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
        'Psr\\Log\\AbstractLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/AbstractLogger.php',
        'Psr\\Log\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/log/Psr/Log/InvalidArgumentException.php',
        'Psr\\Log\\LogLevel' => __DIR__ . '/..' . '/psr/log/Psr/Log/LogLevel.php',
        'Psr\\Log\\LoggerAwareInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareInterface.php',
        'Psr\\Log\\LoggerAwareTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareTrait.php',
        'Psr\\Log\\LoggerInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerInterface.php',
        'Psr\\Log\\LoggerTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerTrait.php',
        'Psr\\Log\\NullLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/NullLogger.php',
        'Psr\\Log\\Test\\DummyTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Psr\\Log\\Test\\LoggerInterfaceTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Psr\\Log\\Test\\TestLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/TestLogger.php',
        'Whoops\\Exception\\ErrorException' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Exception/ErrorException.php',
        'Whoops\\Exception\\Formatter' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Exception/Formatter.php',
        'Whoops\\Exception\\Frame' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Exception/Frame.php',
        'Whoops\\Exception\\FrameCollection' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Exception/FrameCollection.php',
        'Whoops\\Exception\\Inspector' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Exception/Inspector.php',
        'Whoops\\Handler\\CallbackHandler' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Handler/CallbackHandler.php',
        'Whoops\\Handler\\Handler' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Handler/Handler.php',
        'Whoops\\Handler\\HandlerInterface' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Handler/HandlerInterface.php',
        'Whoops\\Handler\\JsonResponseHandler' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Handler/JsonResponseHandler.php',
        'Whoops\\Handler\\PlainTextHandler' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Handler/PlainTextHandler.php',
        'Whoops\\Handler\\PrettyPageHandler' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Handler/PrettyPageHandler.php',
        'Whoops\\Handler\\XmlResponseHandler' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Handler/XmlResponseHandler.php',
        'Whoops\\Run' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Run.php',
        'Whoops\\RunInterface' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/RunInterface.php',
        'Whoops\\Util\\HtmlDumperOutput' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Util/HtmlDumperOutput.php',
        'Whoops\\Util\\Misc' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Util/Misc.php',
        'Whoops\\Util\\SystemFacade' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Util/SystemFacade.php',
        'Whoops\\Util\\TemplateHelper' => __DIR__ . '/..' . '/filp/whoops/src/Whoops/Util/TemplateHelper.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit61f822a742abdc540a4d326cb1c13013::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit61f822a742abdc540a4d326cb1c13013::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit61f822a742abdc540a4d326cb1c13013::$classMap;

        }, null, ClassLoader::class);
    }
}
