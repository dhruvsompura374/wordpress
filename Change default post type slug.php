 <?php

// Make sure that you reset permalink settings and test.

// This function will change the admin posts link to /blog/slug
function custom_post_permalink_structure($permalink, $post, $leavename) {
    // Check if the post type is 'post'
    if ($post->post_type == 'post') {
        // Add "/blog/" before the post name
        $permalink = home_url('/blog/' . $post->post_name . '/');
    }

    return $permalink;
}

add_filter('post_link', 'custom_post_permalink_structure', 10, 3);


// This function will rewrite post slug to /blog/slug

function custom_change_post_slug2($args, $post_type) {
    if ('post' === $post_type) {
        // Change the 'slug' parameter in the $args array
        $args['rewrite']['slug'] = 'blog'; // Change this to your desired new slug
    }
    return $args;
}

add_filter('register_post_type_args', 'custom_change_post_slug2', 999, 2);

