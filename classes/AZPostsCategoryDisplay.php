<?php

class AZPostsCategoryDisplay
{
    public function get_shortcode_page()
    {
        $categoriesArray = array();
        foreach(get_categories() as $category)
        {
            array_push($categoriesArray, array('term_id' => $category->term_id, 'name' => $category->name));
        }
        $categoriesArray = json_encode($categoriesArray);
        ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.17/angular.min.js"></script>
        <script src="<?php echo site_url(); ?>/wp-content/plugins/a_to_z_posts_by_category/js/aZshortcodeApp.js"></script>
        <script src="<?php echo site_url(); ?>/wp-content/plugins/a_to_z_posts_by_category/js/aZshortcodeControllers.js"></script>

        <div class="wrap">
            <h2>Shortcode Creator</h2>
            <div ng-app="aZshortcodeApp" ng-init='init(<?php echo $categoriesArray; ?>)' ng-controller="aZshortcodeController">

                <h3>{{ title }}</h3>

                <select size="10" ng-model="selectedCategories" style="width: 300px" multiple>
                    <option ng-repeat="category in categories" value="{{ category.name }}">{{ category.name }}</option>
                </select>

                <br><br>
                <label for="shortcode">Shortcode:</label> <br>
                <input style="width: 300px" type="text" value="{{ selectedCategories | shortcode }}" size="30" onClick="this.select();">

            </div>
        </div>

        <?php
    }

   public function displayPosts($categories)
    {
        $categories = str_replace(',', '+', $categories);
        $posts = get_posts(array('category_name' => $categories, 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 200));
        

        $content = '';

        $content .= '<style>
            .azUnstyledLi {
                list-style-type: none;
            }
        </style>';

        $content .= '<ul>';
        foreach($posts as $post) { 

            $content .= '<li class="azUnstyledLi">
                <a href="'.get_permalink($post->ID).'">'. $post->post_title.'</a>
            </li>';

         } 
        $content .= '</ul>';

        return $content;
    }

}