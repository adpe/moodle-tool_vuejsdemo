require.config({
    paths: {
        "vue": [
            "https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue",
            M.cfg.wwwroot + "/pluginfile.php/" + M.cfg.contextid + "/tool_vuejsdemo/js/vue"
        ],
        "vuetify": [
            "https://cdnjs.cloudflare.com/ajax/libs/vuetify/2.1.1/vuetify",
            M.cfg.wwwroot + "/pluginfile.php/" + M.cfg.contextid + "/tool_vuejsdemo/js/vuetify"
        ],
    }

});

define(['vue', 'vuetify'], function(Vue, Vuetify) {
    function init(title) {
        Vue.component('vuejsdemo-example', {
            data: function () {
                return {
                    message: "It works!"
                }
            },
            template: '<p v-if="message">{{ message }}</p>'
        });

        new Vue({
            delimiters: ["[[", "]]"],
            el: "#app",
            data: {
                title: title
            },
            vuetify: new Vuetify(),
        });
    }

    return {
        init: init
    };
});
