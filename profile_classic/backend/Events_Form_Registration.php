<?php

######################################################################
### Copyright © 20NN—20NN Author/Rightholder. All rights reserved. ###
######################################################################

namespace effcore\modules\profile_classic;

use effcore\Module;
use effcore\Page;
use effcore\URL;

abstract class Events_Form_Registration {

    static function on_submit($event, $form, $items) {
        switch ($form->clicked_button->value_get()) {
            case 'register':
                if (!URL::back_url_get() && Page::get_current()->id === 'registration_ru') {
                    if (Module::settings_get('user')->send_password_to_email)
                         URL::back_url_set('back', '/ru/login');
                    else URL::back_url_set('back', '/ru/user/'.$items['#nickname']->value_get());
                }
                break;
        }
    }

}
