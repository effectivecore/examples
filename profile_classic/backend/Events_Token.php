<?php

######################################################################
### Copyright © 20NN—20NN Author/Rightholder. All rights reserved. ###
######################################################################

namespace effcore\modules\profile_classic;

use effcore\Color;
use effcore\Module;

abstract class Events_Token {

    static function on_apply($name, $args) {
        $settings = Module::settings_get('profile_classic');
        $colors = Color::get_all();
        if ($name === 'color_custom__head' || $name === 'color_custom__foot') {
            if ($name === 'color_custom__head') $color = $colors[$settings->color_custom__head_id] ?? $colors['white'];
            if ($name === 'color_custom__foot') $color = $colors[$settings->color_custom__foot_id] ?? $colors['white'];
            if (empty($color->value_hex) === true) return 'transparent';
            if (empty($color->value_hex) !== true && $args->get_count() === 0) return $color->value_hex;
            if (empty($color->value_hex) !== true && $args->get_count() === 3) return $color->filter_shift((int)$args->get(0), (int)$args->get(1), (int)$args->get(2), 1, Color::RETURN_HEX);
            if (empty($color->value_hex) !== true && $args->get_count() === 4) return $color->filter_shift((int)$args->get(0), (int)$args->get(1), (int)$args->get(2), (float)$args->get(3), Color::RETURN_RGBA);
        }
    }

}
