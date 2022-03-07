<?php

use Timedoor\TmdGitTag\GitTag;

if ( !function_exists('git_tag') ) {
    function git_tag() {
        return GitTag::getVersion();
    }
}
