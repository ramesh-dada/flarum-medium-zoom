<?php

/*
 * This file is part of ramesh-dada/flarum-medium-zoom.
 *
 * Copyright (c) 2021 RameshDada.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace RameshDada\MediumZoom;

use Flarum\Extend;
use Flarum\Frontend\Document;

return [
    (new Extend\Frontend('forum'))
    ->content(function (Document $document) {
        $document->head[] = '<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-zoom/1.0.6/medium-zoom.min.js"></script>';
        $document->foot[] = <<<HTML
<script>
flarum.core.compat.extend.extend(flarum.core.compat['components/CommentPost'].prototype, 'oncreate', function (output, vnode) {
const self = this;
this.$('img').not('.emoji').not(".Avatar").not($(".PostMeta-ip img")).each(function () {
        $().ready(function(){
            const zoom = mediumZoom();
            zoom.attach($(this));
        })
});
});
</script>
HTML;
    })
];
