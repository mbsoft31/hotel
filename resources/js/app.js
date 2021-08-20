
import {DataTable} from "simple-datatables"

window.DataTable = DataTable;

window._ = require('lodash');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.store('layout', {

    sidebar: false,
    userDropdown: false,

    openSidebar(){
        this.sidebar = true;
    },
    closeSidebar(){
        this.sidebar = false;
    },
    toggleSidebar(){
        this.sidebar = ! this.sidebar;
    },

    openUserDropdown(){
        this.userDropdown = true;
    },
    closeUserDropdown(){
        this.userDropdown = false;
    },
    toggleUserDropdown(){
        this.userDropdown = ! this.userDropdown;
    },

})

Alpine.data('modal', () => ({
    open: false,

    openModal() {
        this.open = true
    },

    closeModal() {
        this.open = false
    },

    toggleModal() {
        this.open = ! this.open
    },
}))

Alpine.data('dropdown', {

    open: false,
    openDropdown(){
        this.open = true;
    },
    closeDropdown(){
        this.open = false;
    },
    toggleDropdown(){
        this.open = ! this.open;
    },
})

Alpine.start()


/*import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});*/

