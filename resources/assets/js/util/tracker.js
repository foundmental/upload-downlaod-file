/**
 * Created by alexandre on 28/12/2017.
 */

import Player from './data'

export default {

    pageVisit: () => {
        (typeof(_jinit) == 'function') && _jinit(Player.openId)
    },

    timelineShare: (success) => {
        (typeof(_jtimelineshare) == 'function') && _jtimelineshare(success)
    },

    appShare: (success) => {
        (typeof(_jappshare) == 'function') && _jappshare(success)
    },

    action: (action, params) => {
        if (params) {
            (typeof(_ja) == 'function') && _ja(action, params);
        } else {
            (typeof(_ja) == 'function') && _ja(action);
        }
    }

}