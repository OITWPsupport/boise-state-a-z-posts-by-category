angular.module('aZshortcodeApp', [
    'aZshortcodeApp.aZshortcodeControllers'
])
.filter('shortcode', function(){
    return function(category){
        if(category.length == 0) return '';
        return '[a_z_posts_category category=\'' + category + '\']';
    }
});