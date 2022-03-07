<?php

namespace Timedoor\TmdGitTag;

use Illuminate\Support\Facades\Cache;

class GitTag
{
    /**
     * get latest live tag version
     *
     * @return string
     */
    public static function getLiveVersion()
    {
        $root       = base_path();
        $command    = 'git describe --abbrev=0';
        $currentDir = getcwd();

        chdir($root);

        $output     = shell_exec($command);

        chdir($currentDir);

        return $output ?? '*.*.*';
    }

    /**
     * get tag version from cache
     *
     * @return string
     */
    public static function getVersion()
    {
        $version = Cache::get('tmd-git-tag');

        if ( !$version ) {
            $version = self::getLiveVersion();
            Cache::put( 'tmd-git-tag', $version, config('tmd-git-tag.cache_expired') );
        }

        return $version;
    }
}
