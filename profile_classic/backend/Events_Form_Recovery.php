<?php

######################################################################
### Copyright © 20NN—20NN Author/Rightholder. All rights reserved. ###
######################################################################

namespace effcore\modules\profile_classic;

use effcore\Page;
use effcore\URL;

abstract class Events_Form_Recovery {

    static function on_submit($event, $form, $items) {
        switch ($form->clicked_button->value_get()) {
            case 'recovery':
                if (!URL::back_url_get() && Page::get_current()->id === 'recovery_ru') {
                     URL::back_url_set('back', '/ru/login');
                }
                break;
        }
    }

}
